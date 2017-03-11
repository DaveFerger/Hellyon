<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Potdb */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="potdb-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->textInput(['readonly' => true, 'value' => date('Y-m-d h:m')]) ?>

    <?= $form->field($model, 'last_used_date')->textInput(['readonly' => true, 'value' => date('Y-m-d h:m')]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
