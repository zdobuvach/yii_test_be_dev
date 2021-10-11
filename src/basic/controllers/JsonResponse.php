<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\controllers;

use yii\rest\ActiveController;

class JsonResponse extends ActiveController
{   
    public function behaviors()
    {
       return [
            [
              'class' => \yii\filters\ContentNegotiator::className(),
              'only' => ['index', 'view'],
              'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
              ],
            ],
          ];
    }
}
