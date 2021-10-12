<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\db\ActiveRecord;

//use yii;

class Album extends SetPrimaryKey {
    
    public function fields() {
        
        $fields = parent::fields();
        //die(var_dump($fields));

        switch (self::getActionRole()) {
            case 'index':
                unset($fields['user_id'], $fields['photos']);
                break;
            case 'view':                
                $fields['first_name'] = function($model) {
                    return $model->users->first_name;
                };
                $fields['last_name'] = function($model) {
                    return $model->users->last_name;
                };

                $this->photos = json_decode($this->photos, true);
                break;


            default:
                break;
        }        

        return $fields;
    }

    public function getUsers() {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }    
}
