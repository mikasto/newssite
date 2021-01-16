<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rubric".
 *
 * @property int $rubric_id
 * @property int|null $parent_id
 * @property string $title
 *
 * @property NewsRubric[] $newsRubrics
 * @property News[] $news
 */
class Rubric extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rubric';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rubric_id' => 'Rubric ID',
            'parent_id' => 'Parent ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[NewsRubrics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsRubrics()
    {
        return $this->hasMany(NewsRubric::className(), ['rubric_id' => 'rubric_id']);
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['news_id' => 'news_id'])->viaTable('news_rubric', ['rubric_id' => 'rubric_id']);
    }
}
