<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pots".
 *
 * @property integer $id
 * @property string $flower_name
 * @property string $flower_desc
 * @property integer $flower_light
 * @property integer $flower_waterlevel
 * @property integer $flower_temp
 * @property integer $flower_pressure
 * @property integer $flower_moisture
 * @property integer $flower_humidity
 * @property string $flower_created_date
 * @property string $flower_last_used_date
 * @property string $pot_name
 *
 * @property Potdb $potName
 */
class Pots extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pots';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flower_name', 'flower_desc', 'flower_light', 'flower_waterlevel', 'flower_temp', 'flower_pressure', 'flower_moisture', 'flower_humidity', 'flower_created_date', 'flower_last_used_date', 'pot_name'], 'required'],
            [['flower_desc'], 'string'],
            [['flower_light', 'flower_waterlevel', 'flower_temp', 'flower_pressure', 'flower_moisture', 'flower_humidity'], 'integer'],
            [['flower_created_date', 'flower_last_used_date'], 'safe'], // TODO legyen automatikus elmentve, behavior teszt
            [['flower_name', 'pot_name'], 'string', 'max' => 100],
            [['flower_name'], 'unique'], // TODO legyen id, úgy, mint a pot_name, dropdown az űrlapban és ArrayHelper::map()
            [['pot_name'], 'exist', 'skipOnError' => true, 'targetClass' => Potdb::className(), 'targetAttribute' => ['pot_name' => 'name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'flower_name' => 'Flower Name',
            'flower_desc' => 'Flower Desc',
            'flower_light' => 'Flower Light',
            'flower_waterlevel' => 'Flower Waterlevel',
            'flower_temp' => 'Flower Temp',
            'flower_pressure' => 'Flower Pressure',
            'flower_moisture' => 'Flower Moisture',
            'flower_humidity' => 'Flower Humidity',
            'flower_created_date' => 'Flower Created Date',
            'flower_last_used_date' => 'Flower Last Used Date',
            'pot_name' => 'Pot Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPotName()
    {
        return $this->hasOne(Potdb::className(), ['name' => 'pot_name']);
    }

}
