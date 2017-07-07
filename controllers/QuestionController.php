<?php

namespace app\controllers;

use app\models\Assessment;
use Yii;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\web\ForbiddenHttpException;
use yii\web\MethodNotAllowedHttpException;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;

class QuestionController extends BaseActiveController
{
    public function actions()
    {
//Disabling ActiveController default view action
        $actions = parent::actions();
//        unset($actions['create']);
//        unset($actions['update']);
//        unset($actions['delete']);
//        unset($actions['index']);
        return $actions;
    }


    public $modelClass = 'app\models\Question';

}
