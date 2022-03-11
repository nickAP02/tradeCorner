<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%articles_category}}".
 *
 * @property int $category_id
 * @property string $category_name
 * @property string|null $description
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%articles_category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
            [['description'], 'string'],
            [['category_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
            'description' => 'Description',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ArticleCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleCategoryQuery(get_called_class());
    }
}
