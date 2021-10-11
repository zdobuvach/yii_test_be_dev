<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $first_name;
    public $last_name;    

    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required']
        ];
    }
}