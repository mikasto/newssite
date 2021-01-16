<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News Rubrics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-rubric-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create News Rubric', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'news_id',
            'rubric_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
