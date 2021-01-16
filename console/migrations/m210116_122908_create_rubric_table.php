<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rubric}}`.
 */
class m210116_122908_create_rubric_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%rubric}}', [
            'rubric_id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'title' => $this->string(255)->notNull(),
        ], $tableOptions);

        $this->createIndex('parent', '{{%rubric}}', 'parent_id');

        $this->insert('{{%rubric}}', ['rubric_id' => '1', 'title' => 'Все рубрики',]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rubric}}');
    }
}
