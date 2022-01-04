<?php

namespace frontend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "mark".
 *
 * @property int $id
 * @property int $tamil
 * @property int $english
 * @property int $maths
 * @property int $science
 * @property int $social
 */
class Mark extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mark';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tamil', 'english', 'maths', 'science', 'social'], 'required'],
            [['tamil', 'english', 'maths', 'science', 'social'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tamil' => 'Tamil',
            'english' => 'English',
            'maths' => 'Maths',
            'science' => 'Science',
            'social' => 'Social',
        ];
    }

    /**
     * {@inheritdoc}
     * @return MarkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MarkQuery(get_called_class());
    }
}
