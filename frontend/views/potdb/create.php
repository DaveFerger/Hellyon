<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Potdb */

$this->title = 'Create Potdb';
$this->params['breadcrumbs'][] = ['label' => 'Potdbs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="potdb-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
