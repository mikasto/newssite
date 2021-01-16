<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NewsRubric */

$this->title = $model->news_id;
$this->params['breadcrumbs'][] = ['label' => 'News Rubrics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-rubric-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'news_id' => $model->news_id, 'rubric_id' => $model->rubric_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'news_id' => $model->news_id, 'rubric_id' => $model->rubric_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'news_id',
            'rubric_id',
        ],
    ]) ?>

</div>
