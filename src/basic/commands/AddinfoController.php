<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\commands;

use yii\console\Controller;

class AddinfoController extends Controller {

    public $message;
    public $count;
    public $modelUsers = 'app\models\Users_change';
    public $modelAbum = 'app\models\Album_change';
    public $modelPhoto = 'app\models\Photo';

    public function options($actionID) {
        return ['message', 'count'];
    }

    public function optionAliases() {
        return ['m' => 'message', 'c' => 'count'];
    }

    public function actionIndex() {
        echo $this->message . "\n";
    }

    public function actionUsers() {

        for ($i = 1; $i <= $this->count; $i++) {
            $users = new $this->modelUsers();
            $users->first_name = 'first_name_' . $i;
            $users->last_name = 'last_name_' . $i;
            $users->save();
            unset($users);
        }

        echo $this->message . " " . $this->count  . " users add";
    }

    public function actionAlbum() {
        $this->addFields($this->modelUsers, $this->modelAbum, function($model, $id, $i) {
            $model->user_id = $id;
            $model->title = 'Album title ' . $i;
        });
        echo $this->message . " " . $this->count  . " albums add";
    }

    public function actionPhoto() {
        $this->addFields($this->modelAbum, $this->modelPhoto, function($model, $id, $i) {
            $model->album_id = $id;
            $model->title = 'phpoto title ' . $i;
        });
        echo $this->message . " " . $this->count  . " photos add";
    }

    public function addFields($modelParent, $modelChild, $addFieldsFunc) {
        $parent = new $modelParent();
        $parentIds = $parent::find()->select('id')->asArray()->all();
        unset($parent);
        for ($i = 1; $i <= $this->count; $i++) {
            $model = new $modelChild();
            $addFieldsFunc($model, $parentIds[array_rand($parentIds)]['id'], $i);
            $model->save();
            unset($model);
        }
    }

}
