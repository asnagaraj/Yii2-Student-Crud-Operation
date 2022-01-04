<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property int $id
 * @property string $district_name
 * @property int $d_state_id
 *
 * @property State $dState
 * @property Student[] $students
 * @property Taluk[] $taluks
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['district_name', 'd_state_id'], 'required'],
            [['d_state_id'], 'integer'],
            [['district_name'], 'string', 'max' => 30],
            [['d_state_id'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['d_state_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'district_name' => 'District',
            'd_state_id' => 'D State ID',
        ];
    }

    /**
     * Gets query for [[DState]].
     *
     * @return \yii\db\ActiveQuery|StateQuery
     */
    public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'd_state_id']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['district_id' => 'id']);
    }

    /**
     * Gets query for [[Taluks]].
     *
     * @return \yii\db\ActiveQuery|TalukQuery
     */
    public function getTaluks()
    {
        return $this->hasMany(Taluk::className(), ['t_district_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return DistrictQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DistrictQuery(get_called_class());
    }
}
