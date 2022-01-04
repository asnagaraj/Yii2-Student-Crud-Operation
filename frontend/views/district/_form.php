<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\State;

/* @var $this yii\web\View */
/* @var $model common\models\District */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="district-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'district_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_state_id')->textInput()->dropDownList(ArrayHelper::map(State::find()->all(), 'id','state_name'),['prompt'=>'Select Category Id']) ?> 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
