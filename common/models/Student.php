<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $s_name
 * @property int $s_roll_number
 * @property string $s_address
 * @property int $schoolclass_id
 * @property int $taluk_id
 * @property int $district_id
 * @property int $state_id
 *
 * @property District $district
 * @property Schoolclass $schoolclass
 * @property State $state
 * @property Taluk $taluk
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['s_name', 's_roll_number', 's_address', 'schoolclass_id', 'taluk_id', 'district_id', 'state_id','country_id'], 'required'],
            [['s_roll_number', 'schoolclass_id','country_id', 'taluk_id', 'district_id', 'state_id'], 'integer'],
            [['s_name'], 'string', 'max' => 30],
            [['s_address'], 'string', 'max' => 200],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['district_id' => 'id']],
            [['schoolclass_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schoolclass::className(), 'targetAttribute' => ['schoolclass_id' => 'id']],
            [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['state_id' => 'id']],
            [['taluk_id'], 'exist', 'skipOnError' => true, 'targetClass' => Taluk::className(), 'targetAttribute' => ['taluk_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            's_name' => 'Name',
            's_roll_number' => 'Roll Number',
            's_address' => 'Address',
            'schoolclass_id' => 'Class',
            'taluk_id' => 'Taluk ',
            'district_id' => 'District',
            'state_id' => 'State',
            'country_id' => 'Country',
        ];
    }

    /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery|DistrictQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }

    /**
     * Gets query for [[Schoolclass]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getSchoolclass()
    {
        return $this->hasOne(Schoolclass::className(), ['id' => 'schoolclass_id']);
    }

    /**
     * Gets query for [[State]].
     *
     * @return \yii\db\ActiveQuery|StateQuery
     */
    public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }

    /**
     * Gets query for [[Taluk]].
     *
     * @return \yii\db\ActiveQuery|TalukQuery
     */
    public function getTaluk()
    {
        return $this->hasOne(Taluk::className(), ['id' => 'taluk_id']);
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
    public static function getStateList($count_id)
    {
     $state=State::find()
     ->select(['id','state_name'])
     ->where(['country_id'=> $count_id])
     ->asArray()
     ->all();
 return $state;
 }
 public static function getDistrictList($dist_id)
    {
     $district=District::find()
     ->select(['id','district_name'])
     ->where(['d_state_id'=> $dist_id])
     ->asArray()
     ->all();
 return $district;
    }
    public static function getTalukList($tuk_id)
    {
     $taluk=Taluk::find()
     ->select(['id','taluk_name'])
     ->where(['t_district_id'=> $tuk_id])
     ->asArray()
     ->all();
 return $taluk;
    }
    
    /**
     * {@inheritdoc}
     * @return StudentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudentQuery(get_called_class());
    }
}
