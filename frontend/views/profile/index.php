<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

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
        echo Html::a('Create Profile', ['create'], ['class' => 'btn btn-success']);
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'username',
                'firstname',
                'lastname',
                //'auth_key',
                //'password_hash',
                //'password_reset_token',
                'email:email',
                'status',
                'created_at',
                'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    }
        ?>
</div>
