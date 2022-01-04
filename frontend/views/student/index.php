<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjx;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\export\ExportMenu;
//use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    Modal::begin([

        'header'=>'<h4>Student</h4>',
        'id'=>'modal',
        'size'=>'modal-lg',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();

    
    
    // echo $this->render('_search', ['model' => $searchModel]); 
    ?>
    <?php
    $gridColumns=[
        'id',
        [
            'attribute'=>'s_name',
            'label'=>'Name'
        ],
        [
            'attribute'=>'s_roll_number',
            'label'=>'Roll Number'
        ],
        
        [
            'attribute'=>'schoolclass_id',
            'label'=>'Class',
            'value'=>'schoolclass.class_name'
        ],
        [
            'attribute'=>'country_id',
            'label'=>'Country',
            'value'=>'country.country_name'
        ],
        [
            'attribute'=>'state_id',
            'label'=>'State',
            'value'=>'state.state_name'
        ],
         [
            'attribute'=>'district_id',
            'label'=>'District',
            'value'=>'district.district_name'
        ],
        [
            'attribute'=>'taluk_id',
            'label'=>'Taluk',
            'value'=>'taluk.taluk_name'
        ],
        [
            'attribute'=>'s_address',
            'label'=>'Address'
        ]
    ];

    echo Exportmenu::widget([

        'dataProvider'=>$dataProvider,
        'columns'=>$gridColumns
    ]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //'bootstrap'=>false,
        //'bordered'=>false,
'pjax'=>true,
'rowOptions'=>function($model){

    if($model->s_name =='inactive')
    {
        return ['class'=>'danger'];
    }
    else{
        return ['class'=>'success'];
    }
},



        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
           ['class' => '\kartik\grid\SerialColumn'],
           ['class' => '\kartik\grid\ActionColumn'],
            'id',
            [
                'attribute'=>'s_name',
                'label'=>'Name'
            ],
            [
                'attribute'=>'s_roll_number',
                'label'=>'Roll Number'
            ],
            
            [
                'attribute'=>'schoolclass_id',
                'label'=>'Class',
                'value'=>'schoolclass.class_name'
            ],
            [
                'attribute'=>'country_id',
                'label'=>'Country',
                'value'=>'country.country_name'
            ],
            [
                'attribute'=>'state_id',
                'label'=>'State',
                'value'=>'state.state_name'
            ],
             [
                'attribute'=>'district_id',
                'label'=>'District',
                'value'=>'district.district_name'
            ],
            [
                'attribute'=>'taluk_id',
                'label'=>'Taluk',
                'value'=>'taluk.taluk_name'
            ],
            [
                'attribute'=>'s_address',
                'label'=>'Address'
            ],



           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
