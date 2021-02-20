<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog_order_items".
 *
 * @property int $id
 * @property int|null $catalog_order_id
 * @property int|null $catalog_id
 * @property int|null $price
 * @property int|null $price_stat
 * @property int|null $quant
 * @property int|null $pre_order
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Catalog $catalog
 * @property CatalogOrder $catalogOrder
 */
class CatalogOrderItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog_order_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catalog_order_id', 'catalog_id', 'price', 'price_stat', 'quant', 'pre_order'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catalog::class, 'targetAttribute' => ['catalog_id' => 'id']],
            [['catalog_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatalogOrder::class, 'targetAttribute' => ['catalog_order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catalog_order_id' => 'Catalog Order ID',
            'catalog_id' => 'Catalog ID',
            'price' => 'Price',
            'price_stat' => 'Price Stat',
            'quant' => 'Quant',
            'pre_order' => 'Pre Order',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Catalog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(Catalog::class, ['id' => 'catalog_id']);
    }

    /**
     * Gets query for [[CatalogOrder]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogOrder()
    {
        return $this->hasOne(CatalogOrder::class, ['id' => 'catalog_order_id']);
    }
}
