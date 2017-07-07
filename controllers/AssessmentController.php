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

class AssessmentController extends BaseActiveController
{
    public function actions()
    {
//Disabling ActiveController default view action
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['delete']);
        unset($actions['index']);
        return $actions;
    }


    public $modelClass = 'app\models\Assessment';

    /**
     * @return array
     */
    public function actionIndex()
    {
        $query = Assessment::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 500,
                'pageSizeLimit' => [1, 9999]
            ],
        ]);
        return $dataProvider;
    }


    public function actionCreate()
    {
        $model = new Assessment();
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        try {
            $connection = $model->getDb()->beginTransaction();
            if ($model->save()) {
                $response = Yii::$app->getResponse();
                $response->setStatusCode(201);
                $connection->commit();
            }
            return $model;
        } catch (Exception $ex) {
            $connection->rollBack();
            throw new MethodNotAllowedHttpException('Failed to create PayPlan. Please contact the helpdesk');
        }
    }

    public function actionUpdate($id)
    {
        $model = Assessment::find()->where(['id' => $id])->one();
        if (!isset($model)) {
            throw new NotFoundHttpException("Assessment does not exist");
        }
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        // prevent from deleting last active plan.
        if ($model->update() === false && !$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to update category for unknown reason.');
        }
        return $model;
    }


    function actionDelete($id)
    {
        $model = Assessment::find()->where(['id' => $id])->one();
        if ($model === null) {
            throw new ForbiddenHttpException('There is no Assessment with given ID');
        }
        if ($model->delete() === false) {
            throw new ServerErrorHttpException('Failed to delete Assessment for unknown reason. Please contact the helpdesk');
        }
        Yii::$app->getResponse()->setStatusCode(204);
    }

}
