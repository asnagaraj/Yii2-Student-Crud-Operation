<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student}}`.
 */
class m220118_164201_create_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student}}', [
            'id' => $this->primaryKey(),
            's_name' => $this->string()->notNull()->unique(),
            'schoolclass_id'=> $this->integer(),
            's_roll_number' => $this->integer(11)->unique(),
            's_address' => $this->string(),
            'country_id' => $this->integer(12),
            'state_id' => $this->integer(12),
            'district_id' => $this->integer(12),
            'taluk_id' => $this->integer(12),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%student}}');
    }
}
