<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\db\ActiveRecord;

//use yii;

class Users extends SetPrimaryKey {

    public function fields() {
        $fields = parent::fields();

        switch (self::getActionRole()) {
            case 'index':
                unset($fields['albums']);
                break;
            case 'view':
                $this->albums = json_decode($this->albums, true);
                break;
            default:
                break;
        }        

        return $fields;
    }


}
