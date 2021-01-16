<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news_rubric}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%news}}`
 * - `{{%rubric}}`
 */
class m210116_125900_create_junction_table_for_news_and_rubric_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news_rubric}}', [
            'news_id' => $this->integer(),
            'rubric_id' => $this->integer(),
            'PRIMARY KEY(news_id, rubric_id)',
        ]);

        // creates index for column `news_id`
        $this->createIndex(
            '{{%idx-news_rubric-news_id}}',
            '{{%news_rubric}}',
            'news_id'
        );

        // add foreign key for table `{{%news}}`
        $this->addForeignKey(
            '{{%fk-news_rubric-news_id}}',
            '{{%news_rubric}}',
            'news_id',
            '{{%news}}',
            'news_id',
            'CASCADE'
        );

        // creates index for column `rubric_id`
        $this->createIndex(
            '{{%idx-news_rubric-rubric_id}}',
            '{{%news_rubric}}',
            'rubric_id'
        );

        // add foreign key for table `{{%rubric}}`
        $this->addForeignKey(
            '{{%fk-news_rubric-rubric_id}}',
            '{{%news_rubric}}',
            'rubric_id',
            '{{%rubric}}',
            'rubric_id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%news}}`
        $this->dropForeignKey(
            '{{%fk-news_rubric-news_id}}',
            '{{%news_rubric}}'
        );

        // drops index for column `news_id`
        $this->dropIndex(
            '{{%idx-news_rubric-news_id}}',
            '{{%news_rubric}}'
        );

        // drops foreign key for table `{{%rubric}}`
        $this->dropForeignKey(
            '{{%fk-news_rubric-rubric_id}}',
            '{{%news_rubric}}'
        );

        // drops index for column `rubric_id`
        $this->dropIndex(
            '{{%idx-news_rubric-rubric_id}}',
            '{{%news_rubric}}'
        );

        $this->dropTable('{{%news_rubric}}');
    }
}
