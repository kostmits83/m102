<?php

namespace frontend\controllers;

use Yii;
use common\models\Stock;
use common\models\search\StockSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
            echo 5;
            return;
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
     * Displays a single Stock model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
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
