<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%order_articles}}".
 *
 * @property int $id
 * @property string $article_name
 * @property int $article_id
 * @property float|null $article_price
 * @property int $order_id
 * @property int $quantity
 *
 * @property Articles $article
 * @property Orders $order
 */
class OrderArticle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order_articles}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_name', 'article_id', 'order_id', 'quantity'], 'required'],
            [['article_id', 'order_id', 'quantity'], 'integer'],
            [['article_price'], 'number'],
            [['article_name'], 'string', 'max' => 255],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Articles::className(), 'targetAttribute' => ['article_id' => 'article_id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'order_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_name' => 'Article Name',
            'article_id' => 'Article ID',
            'article_price' => 'Article Price',
            'order_id' => 'Order ID',
            'quantity' => 'Quantity',
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
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\OrdersQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['order_id' => 'order_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\OrderArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\OrderArticleQuery(get_called_class());
    }
}
