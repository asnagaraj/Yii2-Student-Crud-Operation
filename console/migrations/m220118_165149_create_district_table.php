<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%district}}`.
 */
class m220118_165149_create_district_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%district}}', [
            'id' => $this->primaryKey(),
            'district_name' => $this->string()->notNull()->unique(),
            'd_state_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%district}}');
    }
}
