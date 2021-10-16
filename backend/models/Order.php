<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property string $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $qty
 * @property double $sum
 * @property int $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property int $region_id
 * @property int $city_id
 * @property string $address
 *
 * @property OrderItems[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'qty', 'sum', 'name', 'email', 'phone', 'region_id', 'city_id', 'address'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['qty', 'status', 'region_id', 'city_id'], 'integer'],
            [['sum'], 'number'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'created_at' => Yii::t('yii', 'Created At'),
            'updated_at' => Yii::t('yii', 'Updated At'),
            'qty' => Yii::t('yii', 'Qty'),
            'sum' => Yii::t('yii', 'Sum'),
            'status' => Yii::t('yii', 'Status'),
            'name' => Yii::t('yii', 'Name'),
            'email' => Yii::t('yii', 'Email'),
            'phone' => Yii::t('yii', 'Phone'),
            'region_id' => Yii::t('yii', 'Region ID'),
            'city_id' => Yii::t('yii', 'City ID'),
            'address' => Yii::t('yii', 'Address'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }
}
