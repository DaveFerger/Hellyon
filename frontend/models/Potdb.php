<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "potdb".
 *
 * @property integer $id
 * @property string $name
 * @property string $created_date
 * @property string $last_used_date
 *
 * @property Pots[] $pots
 */
class Potdb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'potdb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'created_date', 'last_used_date'], 'required'],
            [['created_date', 'last_used_date'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['name'], 'unique'],
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
            'created_date' => 'Created Date',
            'last_used_date' => 'Last Used Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPots()
    {
        return $this->hasMany(Pots::className(), ['pot_name' => 'name']);
    }
}
