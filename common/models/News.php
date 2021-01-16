<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $news_id
 * @property int $user_id
 * @property string $title
 * @property string|null $body
 *
 * @property User $user
 * @property NewsRubric[] $newsRubrics
 * @property Rubric[] $rubrics
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    public function fields()
    {
        $fields = parent::fields();
        return $fields /*+ [
            'rubrics' => $this->getRubrics(),
        ]*/;
    }

    public function extraFields()
    {
        return ['rubrics'];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'title'], 'required'],
            [['user_id'], 'integer'],
            [['body'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'News ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'body' => 'Body',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[NewsRubrics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsRubrics()
    {
        return $this->hasMany(NewsRubric::className(), ['news_id' => 'news_id']);
    }

    /**
     * Gets query for [[Rubrics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRubrics()
    {
        return $this->hasMany(Rubric::className(), ['rubric_id' => 'rubric_id'])->viaTable('news_rubric', ['news_id' => 'news_id']);
    }
}
