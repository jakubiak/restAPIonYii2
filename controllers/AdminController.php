<?php

namespace app\controllers;

use app\models\Question;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class AdminController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
        $model = null;
        return $this->render('questions', [
            'model' => $model
        ]);
    }

    public function actionAdd()
    {

        \Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
        $model = null;

        return $this->render('add', [
            'model' => $model
        ]);
    }

}
