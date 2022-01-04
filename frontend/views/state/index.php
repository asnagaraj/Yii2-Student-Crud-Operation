<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Country;
/* @var $this yii\web\View */
/* @var $searchModel common\models\StateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'States';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="state-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create State', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['attribute'=>'state_name',
            'label'=>'State'
        ],
        ['attribute'=>'country_id',
            'label'=>'Country',
            'value'=>'country.country_name',
        ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
