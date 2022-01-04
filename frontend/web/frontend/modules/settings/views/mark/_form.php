<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\settings\models\Mark */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mark-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tamil')->textInput() ?>

    <?= $form->field($model, 'english')->textInput() ?>

    <?= $form->field($model, 'maths')->textInput() ?>

    <?= $form->field($model, 'science')->textInput() ?>

    <?= $form->field($model, 'social')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
