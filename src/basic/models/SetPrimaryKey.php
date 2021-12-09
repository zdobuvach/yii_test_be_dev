<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\db\ActiveRecord;

//use yii;

class SetPrimaryKey extends ActiveRecord
{  
    public static $actionRole = 'index';

    
    public static function primaryKey() {
        return ["id"];
    }
    
    public static function setActiveRole($role){
        self::$actionRole = $role;
    }
    
    public static function getActionRole(){
        return self::$actionRole;
    }

}
