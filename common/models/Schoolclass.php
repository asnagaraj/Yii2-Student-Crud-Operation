<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "schoolclass".
 *
 * @property int $id
 * @property string $class_name
 *
 * @property Student[] $students
 */
class Schoolclass extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schoolclass';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_name'], 'required'],
            [['class_name'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_name' => 'Class Name',
        ];
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['schoolclass_id' => 'id']);
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
