<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NewsRubric */

$this->title = 'Create News Rubric';
$this->params['breadcrumbs'][] = ['label' => 'News Rubrics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-rubric-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
