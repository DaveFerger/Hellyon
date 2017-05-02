<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pots_history".
 *
 * @property integer $id
 * @property integer $flower_light
 * @property integer $flower_waterlevel
 * @property integer $flower_temp
 * @property integer $flower_pressure
 * @property integer $flower_moisture
 * @property integer $flower_humidity
 */
class PotsHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pots_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flower_light', 'flower_waterlevel', 'flower_temp', 'flower_pressure', 'flower_moisture', 'flower_humidity'], 'required'],
            [['flower_light', 'flower_waterlevel', 'flower_temp', 'flower_pressure', 'flower_moisture', 'flower_humidity'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'flower_light' => 'Flower Light',
            'flower_waterlevel' => 'Flower Waterlevel',
            'flower_temp' => 'Flower Temp',
            'flower_pressure' => 'Flower Pressure',
            'flower_moisture' => 'Flower Moisture',
            'flower_humidity' => 'Flower Humidity',
        ];
    }
}
