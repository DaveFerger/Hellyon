<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Flowerdb */

$this->title = 'Update Flowerdb: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Flowerdbs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="flowerdb-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
