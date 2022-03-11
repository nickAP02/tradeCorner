<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%cart_articles}}".
 *
 * @property int $id
 * @property int $article_id
 * @property int $quantity
 * @property int $user_id
 *
 * @property Articles $article
 * @property User $user
 */
class CartArticle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cart_articles}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id', 'quantity', 'user_id'], 'required'],
            [['article_id', 'quantity', 'user_id'], 'integer'],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Articles::className(), 'targetAttribute' => ['article_id' => 'article_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'quantity' => 'Quantity',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Article]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ArticlesQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Articles::className(), ['article_id' => 'article_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\CartArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CartArticleQuery(get_called_class());
    }
}
