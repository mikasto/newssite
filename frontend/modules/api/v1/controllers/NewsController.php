<?php

namespace frontend\modules\api\v1\controllers;

use common\models\NewsRubric;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use common\models\News;
use common\models\Rubric;
use common\models\NewsRubrics;

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
            'index' => ['GET', 'HEAD'],
            'rubric' => ['GET', 'HEAD'],
            //'view' => ['GET'],
            //'create' => ['POST'],
            //'update' => ['PUT', 'PATCH'],
            //'delete' => ['DELETE'],
        ];
    }
    
    public function actions()
    {
        //$actions = parent::actions();
        
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
     * Lists all News models by rubric include.
     * @return mixed
     */
    public function actionRubric($rubric_id)
    {
        return new ActiveDataProvider([
            'query' => News::find()
                ->joinWith('rubrics r1')
                ->leftJoin('rubric r2', 'r1.parent_id = r2.rubric_id')
                ->leftJoin('rubric r3', 'r2.parent_id = r3.rubric_id')
                ->orWhere(['r1.rubric_id' => $rubric_id])
                ->orWhere(['r2.rubric_id' => $rubric_id])
                ->orWhere(['r3.rubric_id' => $rubric_id])
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
