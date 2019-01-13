<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\UserStockFavors;
use common\models\Portfolio;
use frontend\controllers\MyController;
use frontend\controllers\StockController;
use yii\helpers\Json;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends MyController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['favorites', 'comparison', 'portfolio', 'delete-stock-from-portfolio', 'profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ], // rules
            ], // access
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Updates an existing User model.
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionProfile()
    {
        $model = $this->findModel(Yii::$app->user->id);

        if (isset($_POST['update-profile-button'])) {

            // This is the default scenario
            $model->load(Yii::$app->request->post());
            if ($model->saveProfile()) {
                Yii::$app->session->setFlash('success', Yii::t('app/messages', 'data_saved'));
                return Yii::$app->getResponse()->redirect(['user/profile']);
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app/messages', 'data_not_saved_check_values'));
            }
            
        } elseif (isset($_POST['change-password-button'])) {
            $model->scenario = 'changePassword';
            // Load only the attributes for the specific scenario
            $model->load(Yii::$app->request->post());
            if ($model->changePassword()) {
                Yii::$app->session->setFlash('success', Yii::t('app/messages', 'data_saved'));
                return $this->redirect(['profile']);
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app/messages', 'data_not_saved_check_values'));
            }
        } elseif (isset($_POST['delete-account-button'])) {
            $model->scenario = 'deleteAccount';
            // Load only the attributes for the specific scenario
            $model->load(Yii::$app->request->post());
            if ($model->deleteAccount($model->id)) {
                Yii::$app->user->logout();
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app/messages', 'data_not_saved_check_values'));
            }
        }

        return $this->render((Yii::$app->user->id % 2 === 1) ? 'profile' : 'profileB', [
            'model' => $model,
        ]);
    }

    /**
     * Shows the favorites list.
     * @return mixed
     * @throws NotFoundHttpException if the stock cannot be found
     */
    public function actionPortfolio()
    {
        $portfolio = Portfolio::find()->with('stock')->where(['user_id' => Yii::$app->user->id])->orderBy('created_at DESC')->all();
        $stockPortfolio = [];

        if (!empty($portfolio)) {
            foreach ($portfolio as $model) {
                $timestamp = strtotime($model->created_at);
                $model->created_at = date('d-m-Y H:i:s', $timestamp);
                $stockPortfolio[] = [
                    'model' => $model,
                    'stockCompany' => Yii::$app->IEXTradingApi->getStockCompany($model->stock->symbol),
                    'stockQuote' => Yii::$app->IEXTradingApi->getStockQuote($model->stock->symbol),
                ];
            }
        }

        return $this->render('portfolio', [
            'stockPortfolio' => $stockPortfolio,
        ]);
    }

    /**
     * Shows the favorites list.
     * @return mixed
     * @throws NotFoundHttpException if the stock cannot be found
     */
    public function actionFavorites()
    {
        $favorites = UserStockFavors::find()->with('stock')->where(['user_id' => Yii::$app->user->id, 'type_id' => UserStockFavors::FAVOR_FAVORITE])->all();
        $stockFavorites = [];

        if (!empty($favorites)) {
            $stockController = new StockController('StockController', $this->module);
            foreach ($favorites as $model) {
                $stockFavorites[] = [
                    'stock_id' => $model->stock_id,
                    'stockLogo' => Yii::$app->IEXTradingApi->getStockLogo($model->stock->symbol),
                    'stockCompany' => Yii::$app->IEXTradingApi->getStockCompany($model->stock->symbol),
                    'stockQuote' => Yii::$app->IEXTradingApi->getStockQuote($model->stock->symbol),
                ];
            }
        }

        return $this->render('favorites', [
            'stockController' => $stockController,
            'stockFavorites' => $stockFavorites,
        ]);
    }

    /**
     * Shows the comparison list.
     * @return mixed
     * @throws NotFoundHttpException if the stock cannot be found
     */
    public function actionComparison()
    {
        $comparison = UserStockFavors::find()->with('stock')->where(['user_id' => Yii::$app->user->id, 'type_id' => UserStockFavors::FAVOR_COMPARISON])->all();
        $stockComparison = [];

        if (!empty($comparison)) {
            foreach ($comparison as $model) {
                $stockComparison[] = [
                    'stock_id' => $model->stock_id,
                    'stockCompany' => Yii::$app->IEXTradingApi->getStockCompany($model->stock->symbol),
                    'stockQuote' => Yii::$app->IEXTradingApi->getStockQuote($model->stock->symbol),
                ];
            }
        }

        return $this->render('comparison', [
            'stockComparison' => $stockComparison,
        ]);
    }

    /**
     * Deletes a stock from portfolio.
     * @return mixed
     * @throws NotFoundHttpException if the stock cannot be found
     */
    public function actionDeleteStockFromPortfolio()
    {
        if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
            $id = Yii::$app->request->post('id');
            $portfolio = Portfolio::find()->where(['user_id' => Yii::$app->user->id, 'id' => $id])->one();
            if ($portfolio && $portfolio->delete()) {
                $growl = [
                    'type' => 'success',
                    'icon' => 'fas fa-check',
                    'title' => Yii::t('app/messages', 'important_notice'),
                    'message' => Yii::t('app/messages', 'data_deleted'),
                ];
            } else {
                $growl = [
                    'type' => 'danger',
                    'icon' => 'fas fa-exclamation-triangle',
                    'title' => Yii::t('app/messages', 'important_notice'),
                    'message' => Yii::t('app/messages', 'data_not_deleted'),
                ];
            }
            echo Json::encode($growl);
        }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app/messages', 'page_404'));
    }
}
