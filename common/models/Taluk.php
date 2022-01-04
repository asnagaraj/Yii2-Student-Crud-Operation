<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "taluk".
 *
 * @property int $id
 * @property string $taluk_name
 * @property int $t_district_id
 *
 * @property Student[] $students
 * @property District $tDistrict
 */
class Taluk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'taluk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['taluk_name', 't_district_id'], 'required'],
            [['t_district_id'], 'integer'],
            [['taluk_name'], 'string', 'max' => 30],
            [['t_district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['t_district_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'taluk_name' => 'Taluk',
            't_district_id' => 'District',
        ];
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['taluk_id' => 'id']);
    }

    /**
     * Gets query for [[TDistrict]].
     *
     * @return \yii\db\ActiveQuery|DistrictQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 't_district_id']);
    }

    /**
     * {@inheritdoc}
     * @return TalukQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TalukQuery(get_called_class());
    }
}
