<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\controllers;

use yii\rest\ActiveController;

class AlbumController extends JsonResponse
{
    public $modelClass = 'app\models\Album';    
    
}
