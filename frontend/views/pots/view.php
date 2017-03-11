<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pots */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pots-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'flower_name',
            'flower_desc:ntext',
            'flower_light',
            'flower_waterlevel',
            'flower_temp',
            'flower_pressure',
            'flower_moisture',
            'flower_humidity',
            'flower_created_date',
            'flower_last_used_date',
            'pot_name',
        ],
    ]) ?>

</div>
