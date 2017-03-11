<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PotsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pots';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pots-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    if (Yii::$app->user->isGuest)
    {
        echo Alert::widget([
            'options' => [
                'class' => 'alert-error',
            ],
            'body' => 'You need to log in to use this page.',
        ]);
    }
    else {
        echo Html::a('Create Pots', ['create'], ['class' => 'btn btn-success']);
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

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

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    }
    ?>
</div>
