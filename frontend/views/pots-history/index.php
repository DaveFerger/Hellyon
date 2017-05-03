<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PotsHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pots Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pots-history-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pots History', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'flower_light',
            'flower_waterlevel',
            'flower_temp',
            'flower_pressure',
             'flower_moisture',
            'flower_humidity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
