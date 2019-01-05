<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\UserStockFavors;
use frontend\controllers\StockController;

/**
 * UserController implements the CRUD actions for ContactMessage model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['favorites', 'comparison'],
                'rules' => [
                    [
                        'actions' => ['favorites', 'comparison'],
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
     * @param integer $id
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
                Yii::$app->session->setFlash('success', 'Data have been saved successfully!');
                return Yii::$app->getResponse()->redirect(['user/profile']);
            } else {
                Yii::$app->session->setFlash('danger', 'Data could not been saved. Please check your input values.');
            }
            
        } elseif (isset($_POST['change-password-button'])) {
            $model->scenario = 'changePassword';
            // Load only the attributes for the specific scenario
            $model->load(Yii::$app->request->post());
            if ($model->changePassword()) {
                Yii::$app->session->setFlash('success', 'Data have been saved successfully!');
                return $this->redirect(['profile']);
            } else {
                Yii::$app->session->setFlash('danger', 'Data could not been saved. Please check your input values.');
            }
        } elseif (isset($_POST['delete-account-button'])) {
            $model->scenario = 'deleteAccount';
            // Load only the attributes for the specific scenario
            $model->load(Yii::$app->request->post());
            if ($model->deleteAccount()) {
                Yii::$app->user->logout();
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('danger', 'Data could not been saved. Please check your input values.');
            }
        }

        return $this->render('profile', [
            'model' => $model,
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
                    'stockLogo' => Yii::$app->IEXTradingApi->getStockLogo($model->stock->symbol),
                    'stockCompany' => Yii::$app->IEXTradingApi->getStockCompany($model->stock->symbol),
                    'stockQuote' => Yii::$app->IEXTradingApi->getStockQuote($model->stock->symbol),
                    'stockPeers' => Yii::$app->IEXTradingApi->getStockPeers($model->stock->symbol),
                    'stockChart' => Yii::$app->IEXTradingApi->getStockChart($model->stock->symbol),
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
            $stockController = new StockController('StockController', $this->module);
            foreach ($comparison as $model) {
                $stockComparison[] = [
                    'stockLogo' => Yii::$app->IEXTradingApi->getStockLogo($model->stock->symbol),
                    'stockCompany' => Yii::$app->IEXTradingApi->getStockCompany($model->stock->symbol),
                    'stockQuote' => Yii::$app->IEXTradingApi->getStockQuote($model->stock->symbol),
                    'stockPeers' => Yii::$app->IEXTradingApi->getStockPeers($model->stock->symbol),
                    'stockChart' => Yii::$app->IEXTradingApi->getStockChart($model->stock->symbol),
                ];
            }
        }

        return $this->render('comparison', [
            'stockController' => $stockController,
            'stockComparison' => $stockComparison,
        ]);
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

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
