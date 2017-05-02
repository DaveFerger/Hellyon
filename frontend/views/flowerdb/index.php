<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FlowerdbSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Flowerdbs';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="flowerdb-index">

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
        echo Html::a('Create Flowerdb', ['create'], ['class' => 'btn btn-success']);
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'description:ntext',
                'temp',
                'light',
                'water',
                'image',
                'location',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    }
    ?>



</div>
