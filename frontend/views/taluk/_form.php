<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\District;
/* @var $this yii\web\View */
/* @var $model common\models\Taluk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="taluk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'taluk_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 't_district_id')->dropDownList(ArrayHelper::map(District::find()->all(), 'id','district_name'),['prompt'=>'Select District']) ?>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
