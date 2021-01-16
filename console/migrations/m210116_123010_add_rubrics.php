<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rubric}}`.
 */
class m210116_123010_add_rubrics extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%rubric}}', ['rubric_id' => 2, 'parent_id' => 1, 'title' => 'Общество',]);
        $this->insert('{{%rubric}}', ['rubric_id' => 3, 'parent_id' => 1, 'title' => 'День города',]);
        $this->insert('{{%rubric}}', ['rubric_id' => 4, 'parent_id' => 1, 'title' => 'Спорт',]);
        $this->insert('{{%rubric}}', ['rubric_id' => 5, 'parent_id' => 2, 'title' => 'Городская жизнь',]);
        $this->insert('{{%rubric}}', ['rubric_id' => 6, 'parent_id' => 2, 'title' => 'выборы',]);
        $this->insert('{{%rubric}}', ['rubric_id' => 7, 'parent_id' => 3, 'title' => 'салюты',]);
        $this->insert('{{%rubric}}', ['rubric_id' => 8, 'parent_id' => 3, 'title' => 'детская площадка',]);
        $this->insert('{{%rubric}}', ['rubric_id' => 9, 'parent_id' => 8, 'title' => '0-3 года',]);
        $this->insert('{{%rubric}}', ['rubric_id' => 10, 'parent_id' => 8, 'title' => '3-7 года',]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%rubric}}', 'rubric_id BETWEEN 2 AND 10');
    }
}
