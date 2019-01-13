<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * MyController implements some core functionality for frontend.
 */
class MyController extends Controller
{
    public function init()
    {
        parent::init();

        // If it is not the first time that the user views the page
        if (isset($_POST['lang'])) {
            $_SESSION['lang'] = $_POST['lang'];
            Yii::$app->language = $_POST['lang'];
            return $this->redirect(Yii::$app->request->referrer);
        } elseif (isset($_SESSION['lang'])) {
            Yii::$app->language = $_SESSION['lang'];
        }
    }
}
