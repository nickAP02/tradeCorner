<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\OrderArticle]].
 *
 * @see \common\models\OrderArticle
 */
class OrderArticleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\OrderArticle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\OrderArticle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
