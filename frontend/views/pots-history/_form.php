<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PotsHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pots-history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'flower_light')->textInput() ?>

    <?= $form->field($model, 'flower_waterlevel')->textInput() ?>

    <?= $form->field($model, 'flower_temp')->textInput() ?>

    <?= $form->field($model, 'flower_pressure')->textInput() ?>

    <?= $form->field($model, 'flower_moisture')->textInput() ?>

    <?= $form->field($model, 'flower_humidity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
