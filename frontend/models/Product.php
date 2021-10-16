<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string $category_id
 * @property string $name
 * @property string $content
 * @property string $price
 * @property string $salePrice
 * @property string $description
 * @property string $img
 * @property string $new
 * @property string $sale
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property OrderItems[] $orderItems
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    public function behaviors(){
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'status', 'created_at', 'updated_at'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['content', 'new', 'sale'], 'string'],
            [['price', 'salePrice'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'description', 'img'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'content' => 'Content',
            'price' => 'Price',
            'salePrice' => 'Sale Price',
            'description' => 'Description',
            'img' => 'Img',
            'new' => 'New',
            'sale' => 'Sale',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getCategoryList()
    {
        return ArrayHelper::map(Category::find()->orderBy(['id' => SORT_DESC])->where(['status' => Category::STATUS_ACTIVE])->all(),'id','name');
    }
}
