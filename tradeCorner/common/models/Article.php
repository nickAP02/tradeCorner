<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%articles}}".
 *
 * @property int $article_id
 * @property string $article_name
 * @property string|null $description
 * @property string|null $image
 * @property float $price
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property CartArticles[] $cartArticles
 * @property User $createdBy
 * @property OrderArticles[] $orderArticles
 * @property User $updatedBy
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%articles}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_name', 'price', 'status'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['imageFile'],'image'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['article_name'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 2000],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'article_id' => 'Article ID',
            'article_name' => 'Article Name',
            'description' => 'Description',
            'image' => 'Article Image',
            'imageFile' => 'Article Image',
            'price' => 'Price',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[CartArticles]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CartArticlesQuery
     */
    public function getCartArticles()
    {
        return $this->hasMany(CartArticles::className(), ['article_id' => 'article_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[OrderArticles]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\OrderArticlesQuery
     */
    public function getOrderArticles()
    {
        return $this->hasMany(OrderArticles::className(), ['article_id' => 'article_id']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ArticleQuery(get_called_class());
    }
}
