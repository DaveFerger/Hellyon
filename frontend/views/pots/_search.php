<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PotsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pots-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'flower_name') ?>

    <?= $form->field($model, 'flower_desc') ?>

    <?= $form->field($model, 'flower_light') ?>

    <?= $form->field($model, 'flower_waterlevel') ?>

    <?php // echo $form->field($model, 'flower_temp') ?>

    <?php // echo $form->field($model, 'flower_pressure') ?>

    <?php // echo $form->field($model, 'flower_moisture') ?>

    <?php // echo $form->field($model, 'flower_humidity') ?>

    <?php // echo $form->field($model, 'flower_created_date') ?>

    <?php // echo $form->field($model, 'flower_last_used_date') ?>

    <?php // echo $form->field($model, 'pot_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
