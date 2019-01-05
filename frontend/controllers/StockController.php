<?php

namespace frontend\controllers;

use Yii;
use common\models\Stock;
use common\models\search\StockSearch;
use common\models\UserStockFavors;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\Html;

/**
 * StockController implements the CRUD actions for Stock model.
 */
class StockController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['add-stock-to-favors'],
                'rules' => [
                    [
                        'actions' => ['add-stock-to-favors'],
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
     * Copy stocks to database using reference data call request
     * @return mixed
     */
    public function actionCopyToDatabase($token)
    {
        if ($token !== 'mys3cr3tt0ken') {
            return $this->redirect(['/site/index']);
        }
        ini_set('max_execution_time', 3600);
        $response = Yii::$app->IEXTradingApi->getReferenceDataSymbols();

        if (is_array($response)) {
            foreach ($response as $referenceDataSymbol) {
                $company = Yii::$app->IEXTradingApi->getStockCompany($referenceDataSymbol->symbol);
                $logo = Yii::$app->IEXTradingApi->getStockLogo($referenceDataSymbol->symbol);
                $stock = new Stock();
                $stock->store($referenceDataSymbol, $company, $logo);
            }
        }
        ini_set('max_execution_time', 120);
    }

    /**
     * Lists all Stock models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StockSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays the stats for the specific stock.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionStats($id)
    {
        if (Yii::$app->request->isAjax) {
            $model = $this->findModel($id);

            $data = [
                'stockLogo' => Yii::$app->IEXTradingApi->getStockLogo($model->symbol),
                'stockCompany' => Yii::$app->IEXTradingApi->getStockCompany($model->symbol),
                'stockQuote' => Yii::$app->IEXTradingApi->getStockQuote($model->symbol),
                'stockPeers' => Yii::$app->IEXTradingApi->getStockPeers($model->symbol),
                'stockChart' => Yii::$app->IEXTradingApi->getStockChart($model->symbol),
            ];

            return $this->renderAjax('_showStats', [
                'model' => $this->findModel($id),
                'data' => $data,
            ]);
        }
    }

    /**
     * Adds a stock to favorites list.
     * @return mixed
     * @throws NotFoundHttpException if the stock cannot be found
     */
    public function actionAddStockToFavors()
    {
        if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
            $id = $_POST['id'];
            $typeId = $_POST['typeId'];
            $stock = $this->findModel($id);
            $flag = 0;

            if (!UserStockFavors::find()->where(['user_id' => Yii::$app->user->id, 'stock_id' => $stock->id, 'type_id' => $typeId])->one()
                || !in_array($typeId, [UserStockFavors::FAVOR_FAVORITE, UserStockFavors::FAVOR_COMPARISON])
            ) {
                $model = new UserStockFavors();
                $model->user_id = Yii::$app->user->id;
                $model->stock_id = $stock->id;
                $model->type_id = $typeId;
                if ($model->save()) {
                    $flag = 1;
                }
            } else {
                $flag = 2;
            }

            if ($flag === 0) {
                $growl = [
                    'type' => 'danger',
                    'icon' => 'fas fa-exclamation-triangle',
                    'title' => Yii::t('app/messages', 'important_notice'),
                    'message' => Yii::t('app/messages', 'data_not_saved'),
                ];
            } elseif ($flag === 1) {
                $growl = [
                    'type' => 'success',
                    'icon' => 'fas fa-check',
                    'title' => Yii::t('app/messages', 'important_notice'),
                    'message' => Yii::t('app/messages', 'data_saved'),
                ];
            } elseif ($flag === 2) {
                $growl = [
                    'type' => 'danger',
                    'icon' => 'fas fa-exclamation-triangle',
                    'title' => Yii::t('app/messages', 'important_notice'),
                    'message' => Yii::t('app/messages', 'data_already_saved'),
                ];
            }
            echo Json::encode($growl);
        }
    }

    /**
     * Finds the Stock model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Stock the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Stock::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app\labels', 'The requested page does not exist.'));
    }
    
}
