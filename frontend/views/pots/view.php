<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use dosamigos\chartjs\ChartJs;

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

    <?php
    // TODO pots_history tábla, feltöltöd adatokkal kézzel, majd itt a data leszívja és megjeleníti, a nézetig
        echo ChartJs::widget([
            'type' => 'line',
            'options' => [
                'height' => 200,
                'width' => 1500,
            ],
            'data' => [
                'labels' => ["Monday", "Thusday", "Wendnesday", "Thursday", "Friday", "Saturday", "Sunday"],
                'datasets' => [
                    [
                        'label'=> 'Light',
                        'backgroundColor' => "rgba(255, 255, 0, 1)",
                        'borderColor' => "rgba(179,181,198,1)",
                        'pointBackgroundColor' => "rgba(179,181,198,1)",
                        'pointBorderColor' => "#fff",
                        'pointHoverBackgroundColor' => "#fff",
                        'pointHoverBorderColor' => "rgba(179,181,198,1)",
                        'data' => [10, 0, 30, 0, 50, 0, 70]
                    ]
                ]
            ],
        ]);
        echo ChartJs::widget([
            'type' => 'line',
            'options' => [
                'height' => 200,
                'width' => 1500,
            ],
            'data' => [
                'labels' => ["Monday", "Thusday", "Wendnesday", "Thursday", "Friday", "Saturday", "Sunday"],
                'datasets' => [
                    [
                        'label'=> 'Waterlevel',
                        'backgroundColor' => "rgba(0, 0, 255, 1)",
                        'borderColor' => "rgba(179,181,198,1)",
                        'pointBackgroundColor' => "rgba(179,181,198,1)",
                        'pointBorderColor' => "#fff",
                        'pointHoverBackgroundColor' => "#fff",
                        'pointHoverBorderColor' => "rgba(179,181,198,1)",
                        'data' => [10, 20, 30, 40, 50, 60, 70]
                    ]
                ]
            ]
        ]);echo ChartJs::widget([
            'type' => 'line',
            'options' => [
                'height' => 200,
                'width' => 1500,
            ],
            'data' => [
                'labels' => ["Monday", "Thusday", "Wendnesday", "Thursday", "Friday", "Saturday", "Sunday"],
                'datasets' => [
                    [
                        'label'=> 'Tempature',
                        'backgroundColor' => "rgba(255, 0, 0, 1)",
                        'borderColor' => "rgba(179,181,198,1)",
                        'pointBackgroundColor' => "rgba(179,181,198,1)",
                        'pointBorderColor' => "#fff",
                        'pointHoverBackgroundColor' => "#fff",
                        'pointHoverBorderColor' => "rgba(179,181,198,1)",
                        'data' => [10, 20, 30, 40, 50, 60, 70]
                    ]
                ]
            ]
        ]);echo ChartJs::widget([
            'type' => 'line',
            'options' => [
                'height' => 200,
                'width' => 1500,
            ],
            'data' => [
                'labels' => ["Monday", "Thusday", "Wendnesday", "Thursday", "Friday", "Saturday", "Sunday"],
                'datasets' => [
                    [
                        'label'=> 'Pressure',
                        'backgroundColor' => "rgba(255, 0, 255, 1)",
                        'borderColor' => "rgba(179,181,198,1)",
                        'pointBackgroundColor' => "rgba(179,181,198,1)",
                        'pointBorderColor' => "#fff",
                        'pointHoverBackgroundColor' => "#fff",
                        'pointHoverBorderColor' => "rgba(179,181,198,1)",
                        'data' => [10, 20, 30, 40, 50, 60, 70]
                    ]
                ]
            ]
        ]);echo ChartJs::widget([
            'type' => 'line',
            'options' => [
                'height' => 200,
                'width' => 1500,
            ],
            'data' => [
                'labels' => ["Monday", "Thusday", "Wendnesday", "Thursday", "Friday", "Saturday", "Sunday"],
                'datasets' => [
                    [
                        'label'=> 'Moisture',
                        'backgroundColor' => "rgba(0, 255, 0, 1)",
                        'borderColor' => "rgba(179,181,198,1)",
                        'pointBackgroundColor' => "rgba(179,181,198,1)",
                        'pointBorderColor' => "#fff",
                        'pointHoverBackgroundColor' => "#fff",
                        'pointHoverBorderColor' => "rgba(179,181,198,1)",
                        'data' => [10, 20, 30, 40, 50, 60, 70]
                    ]
                ]
            ]
        ]);echo ChartJs::widget([
            'type' => 'line',
            'options' => [
                'height' => 200,
                'width' => 1500,
            ],
            'data' => [
                'labels' => ["Monday", "Thusday", "Wendnesday", "Thursday", "Friday", "Saturday", "Sunday"],
                'datasets' => [
                    [
                        'label'=> 'Humidity',
                        'backgroundColor' => "rgb(139,69,19)",
                        'borderColor' => "rgba(179,181,198,1)",
                        'pointBackgroundColor' => "rgba(179,181,198,1)",
                        'pointBorderColor' => "#fff",
                        'pointHoverBackgroundColor' => "#fff",
                        'pointHoverBorderColor' => "rgba(179,181,198,1)",
                        'data' => [10, 20, 30, 40, 50, 60, 70]
                    ]
                ]
            ]
        ]);

    ?>


</div>
