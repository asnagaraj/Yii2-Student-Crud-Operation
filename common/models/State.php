<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "state".
 *
 * @property int $id
 * @property string $state_name
 *
 * @property Student[] $students
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'state';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['state_name','country_id'], 'required'],
            [['country_id'],'integer'],
            [['state_name'], 'string', 'max' => 30],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' =>Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'state_name' => 'State',
            'country_id'=>'Country',
        ];
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['state_id' => 'id']);
    }
 /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery|CountryQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * {@inheritdoc}
     * @return StateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StateQuery(get_called_class());
    }
}
