<?php

return [
    ['class' => 'yii\web\UrlRule', 'pattern' => '/', 'route' => 'site/index'],
    ['class' => 'yii\web\UrlRule', 'pattern' => 'site/login', 'route' => 'site/login'],
    ['class' => 'yii\web\UrlRule', 'pattern' => 'site/contact', 'route' => 'site/contact'],
    ['class' => 'yii\web\UrlRule', 'pattern' => 'site/about', 'route' => 'site/about'],
    ['class' => 'yii\web\UrlRule', 'verb' => 'POST', 'pattern' => 'api/test', 'route' => 'api/test'],

    ['class' => 'yii\web\UrlRule', 'verb' => 'GET', 'pattern' => 'assessment/<id:\d+>', 'route' => 'assessment/view'],
    ['class' => 'yii\web\UrlRule', 'verb' => 'GET', 'pattern' => 'assessment', 'route' => 'assessment/index'],
    ['class' => 'yii\web\UrlRule', 'verb' => 'POST', 'pattern' => 'assessment', 'route' => 'assessment/create'],
    ['class' => 'yii\web\UrlRule', 'verb' => 'PUT', 'pattern' => 'assessment/<id:\d+>', 'route' => 'assessment/update'],
    ['class' => 'yii\web\UrlRule', 'verb' => 'DELETE', 'pattern' => 'assessment/<id:\d+>', 'route' => 'assessment/delete'],

    ['class' => 'yii\rest\UrlRule', 'controller' => 'question'],
    ['class' => 'yii\rest\UrlRule', 'controller' => 'answer'],

    ['class' => 'yii\web\UrlRule', 'pattern' => 'admin/add', 'route' => 'admin/add'],
];
