<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Taluk */

$this->title = 'Create Taluk';
$this->params['breadcrumbs'][] = ['label' => 'Taluks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taluk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
