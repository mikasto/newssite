<?php

namespace backend\controllers;

use Yii;
use common\models\NewsRubric;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsRubricController implements the CRUD actions for NewsRubric model.
 */
class NewsRubricController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all NewsRubric models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => NewsRubric::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NewsRubric model.
     * @param integer $news_id
     * @param integer $rubric_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($news_id, $rubric_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($news_id, $rubric_id),
        ]);
    }

    /**
     * Creates a new NewsRubric model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NewsRubric();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'news_id' => $model->news_id, 'rubric_id' => $model->rubric_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing NewsRubric model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $news_id
     * @param integer $rubric_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($news_id, $rubric_id)
    {
        $model = $this->findModel($news_id, $rubric_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'news_id' => $model->news_id, 'rubric_id' => $model->rubric_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing NewsRubric model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $news_id
     * @param integer $rubric_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($news_id, $rubric_id)
    {
        $this->findModel($news_id, $rubric_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NewsRubric model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $news_id
     * @param integer $rubric_id
     * @return NewsRubric the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($news_id, $rubric_id)
    {
        if (($model = NewsRubric::findOne(['news_id' => $news_id, 'rubric_id' => $rubric_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
