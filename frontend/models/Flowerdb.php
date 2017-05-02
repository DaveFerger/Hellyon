<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flowerdb".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $temp
 * @property string $light
 * @property string $water
 * @property string $location
 */
class Flowerdb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'flowerdb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'temp', 'light', 'water', 'location', 'image'], 'required'],
            [['description', 'light', 'water', 'location'], 'string'],
            [['temp'], 'integer'],
            [['name', 'image'], 'string', 'max' => 100],
            [['file'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'temp' => 'Temp',
            'light' => 'Light',
            'water' => 'Water',
            'file' => 'Image',
            'location' => 'Location',
        ];
    }
}
