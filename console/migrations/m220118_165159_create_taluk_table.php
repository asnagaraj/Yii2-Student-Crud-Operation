<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%taluk}}`.
 */
class m220118_165159_create_taluk_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%taluk}}', [
            'id' => $this->primaryKey(),
            'taluk_name' => $this->string()->notNull()->unique(),
            't_district_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%taluk}}');
    }
}
