<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Flowerdb */

$this->title = 'Create Flowerdb';
$this->params['breadcrumbs'][] = ['label' => 'Flowerdbs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flowerdb-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
