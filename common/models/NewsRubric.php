<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_rubric".
 *
 * @property int $news_id
 * @property int $rubric_id
 *
 * @property News $news
 * @property Rubric $rubric
 */
class NewsRubric extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_rubric';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_id', 'rubric_id'], 'required'],
            [['news_id', 'rubric_id'], 'integer'],
            [['news_id', 'rubric_id'], 'unique', 'targetAttribute' => ['news_id', 'rubric_id']],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['news_id' => 'news_id']],
            [['rubric_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rubric::className(), 'targetAttribute' => ['rubric_id' => 'rubric_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'News ID',
            'rubric_id' => 'Rubric ID',
        ];
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::className(), ['news_id' => 'news_id']);
    }

    /**
     * Gets query for [[Rubric]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRubric()
    {
        return $this->hasOne(Rubric::className(), ['rubric_id' => 'rubric_id']);
    }
}
