<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Potdb;
use app\models\Flowerdb;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Pots */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pots-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'flower_name')->dropDownList(
        ArrayHelper::map(Flowerdb::find()->all(), 'name', 'name'),
        ['prompt'=>'Select Flower']
    ) ?>

    <?= $form->errorSummary($model) ?>

    <?= $form->field($model, 'flower_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'flower_light')->textInput() ?>

    <?= $form->field($model, 'flower_waterlevel')->textInput() ?>

    <?= $form->field($model, 'flower_temp')->textInput() ?>

    <?= $form->field($model, 'flower_pressure')->textInput() ?>

    <?= $form->field($model, 'flower_moisture')->textInput() ?>

    <?= $form->field($model, 'flower_humidity')->textInput() ?>

    <?= $form->field($model, 'flower_last_used_date')->textInput(['readonly' => true, 'value' => date('Y-m-d h:m')])  ?>

    <?= $form->field($model, 'pot_name')->dropDownList(
        ArrayHelper::map(Potdb::find()->all(), 'name', 'name'),
        ['prompt'=>'Select Pot']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>