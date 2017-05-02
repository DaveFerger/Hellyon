<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PotsHistory */

$this->title = 'Create Pots History';
$this->params['breadcrumbs'][] = ['label' => 'Pots Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pots-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
