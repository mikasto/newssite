<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NewsRubric */

$this->title = 'Update News Rubric: ' . $model->news_id;
$this->params['breadcrumbs'][] = ['label' => 'News Rubrics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->news_id, 'url' => ['view', 'news_id' => $model->news_id, 'rubric_id' => $model->rubric_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="news-rubric-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
