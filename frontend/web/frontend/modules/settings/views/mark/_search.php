<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\settings\models\MarkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mark-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tamil') ?>

    <?= $form->field($model, 'english') ?>

    <?= $form->field($model, 'maths') ?>

    <?= $form->field($model, 'science') ?>

    <?php // echo $form->field($model, 'social') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
