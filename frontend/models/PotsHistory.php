<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => false,
                'updatedAtAttribute' => 'flower_date',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public static function getLightFromDate($date = null) {
        if ($date == null)
            $date = (new \DateTime('7 days ago'))->format('Y-m-d H:i:s');

        $query = static::find()
            ->select('flower_light')
            ->where(['>=','flower_date', $date])
            ->asArray()
            ->all();
        $data = [];

        foreach ($query as $k => $i)
            $data = array_merge($data, array_values($i));





        return ['data' => $data, 'labels' => ['szerda', 'csütörtök']];
    }
}
