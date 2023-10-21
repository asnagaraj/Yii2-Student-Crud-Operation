<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%state}}`.
 */
class m220118_165137_create_state_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%state}}', [
            'id' => $this->primaryKey(),
            'state_name' => $this->string()->notNull()->unique(),
            'country_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%state}}');
    }
}
