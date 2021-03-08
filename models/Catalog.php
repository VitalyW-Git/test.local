<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "catalog".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $article
 * @property string|null $alias
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property CatalogOrderItems[] $catalogOrderItems
 */
class Catalog extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'article' => 'Article',
            'alias' => 'Alias',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[CatalogOrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogOrderItems()
    {
        return $this->hasMany(CatalogOrderItems::class, ['catalog_id' => 'id']);
    }
}
