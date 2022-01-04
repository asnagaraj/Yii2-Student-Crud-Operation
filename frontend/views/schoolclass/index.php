<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SchoolclassSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schoolclasses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schoolclass-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Schoolclass', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'class_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
