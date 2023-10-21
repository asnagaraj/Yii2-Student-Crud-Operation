<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mark}}`.
 */
class m220118_171726_create_mark_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mark}}', [
            'id' => $this->primaryKey(),
            'tamil' => $this->integer(),
            'english' => $this->integer(),
            'maths' => $this->integer(),
            'science' => $this->integer(),
            'social' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mark}}');
    }
}
