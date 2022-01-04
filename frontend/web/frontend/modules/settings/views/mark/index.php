<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\settings\models\MarkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Marks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mark-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mark', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tamil',
            'english',
            'maths',
            'science',
            //'social',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
