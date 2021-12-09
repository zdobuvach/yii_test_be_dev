<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

//use yii;

class Photo extends ActiveRecord {
    public static $actionRole = 'index';

    public function getURL() {
        
        exec('cd /app/web/images/ && ls *.JPG', $photos, $retval); 
        $requestScheme = isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'http'; // $_SERVER['REQUEST_SCHEME'] - під час тесту не існує
        return $requestScheme .
                '://' . Yii::$app->request->headers['host'] . 
                Yii::$app->request->baseUrl . '/images/' . 
                $photos[array_rand($photos)];
    }

    public function fields() {

        $fields = parent::fields();

        $fields['URL'] = function($model) {
            return $model->URL;
        };


        return $fields;
    }

}
