<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\db\ActiveRecord;

//use yii;

class Photo extends ActiveRecord{

 public function getURL() {
        return 'http://bla-bla';
    }     
}