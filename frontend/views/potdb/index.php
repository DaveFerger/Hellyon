<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PotdbSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Potdbs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="potdb-index">

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
        echo Html::a('Create Potdb', ['create'], ['class' => 'btn btn-success']);
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'created_date',
                'last_used_date',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        }
    ?>
</div>
