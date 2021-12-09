<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\commands\AddinfoController;

class CreateController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),                
                'rules' => [
                    [                        
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
                     
        ];
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

    
    
    /**
     * Displays message.
     *
     * @return string
     */
    public function actionPhotos($message = 'Привіт')
    {           
        $command = 'cd .. && php yii ';
        exec($command . 'addinfo/index -m=test', $output, $retval);
        $message =  $output[0];
        exec($command .  'addinfo/photo -m="Web add photos" -c=1000', $output);
        $message .=  '\n' . $output[0];
        
        return $this->render('say', ['message' => $message]);
    }
    
}
