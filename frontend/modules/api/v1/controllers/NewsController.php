<?php

namespace frontend\modules\api\v1\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use common\models\News;

class NewsController extends ActiveController
{
    public $modelClass = 'common\models\News';
    
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = ['class' => HttpBearerAuth::className(),];
        return $behaviors;
    }
    
    public function verbs()
    {
        return [
            //'index' => ['GET', 'HEAD'],
            //'view' => ['GET'],
            //'create' => ['POST'],
            //'update' => ['PUT', 'PATCH'],
            //'delete' => ['DELETE'],
        ];
    }
    
    public function actions()
    {
        $actions = parent::actions();
        
        // disable defaults
        return [];
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => News::find(),
        ]);
    }
    
    /**
    * Проверяет права текущего пользователя.
    *
    * @param string $action ID действия, которое надо выполнить
    * @param \yii\base\Model $model модель, к которой нужно получить доступ. 
    * @param array $params дополнительные параметры
    * @throws ForbiddenHttpException если у пользователя нет доступа
    *//*
    public function checkAccess($action, $model = null, $params = [])
    {
        if (\Yii::$app->user->isGuest) {
             throw new \yii\web\ForbiddenHttpException(sprintf('Access denied to %s action', $action));
        }
    }*/
}
