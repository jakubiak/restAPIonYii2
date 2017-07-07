<?php

namespace app\controllers;

use Yii;
use app\models\Test;

class ApiController extends BaseActiveController
{
    
   
    public $modelClass = 'app\models\Test';

    /**
     * @return array
     */
    public function actionTest()
    {
        return Yii::$app->getRequest()->getBodyParams();
    }
       
}
