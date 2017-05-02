<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PotsHistorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pots-history-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'flower_light') ?>

    <?= $form->field($model, 'flower_waterlevel') ?>

    <?= $form->field($model, 'flower_temp') ?>

    <?= $form->field($model, 'flower_pressure') ?>

    <?php // echo $form->field($model, 'flower_moisture') ?>

    <?php // echo $form->field($model, 'flower_humidity') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
