<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $username
 * @property string $item
 * @property int $quantity
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'quantity'], 'required'],
            [['quantity'], 'integer'],
            [['username'], 'string', 'max' => 250],
            [['item'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'item' => 'Item',
            'quantity' => 'Quantity',
        ];
    }
    public function getOrderItems(){
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }
}
