<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%schoolclass}}`.
 */
class m220118_170049_create_schoolclass_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schoolclass}}', [
            'id' => $this->primaryKey(),
            'class_name'=>$this->string()->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%schoolclass}}');
    }
}
