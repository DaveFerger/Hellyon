<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PotsHistory */

$this->title = 'Update Pots History: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pots Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pots-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
