<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\filters\VerbFilter;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;

use app\models\LoginForm;


class AddController extends ActiveController {

    public $modelClass = 'app\models\User';

    public function behaviors() {
       // die(var_dump(Yii::$app->user->isGuest));
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
                HttpBasicAuth::class,
            ],            
        ];      
        //$behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_HTML;
        //$behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;
        return $behaviors;
    }
        /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
