<?php

namespace backend\models;

use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string $category_id
 * @property string $name
 * @property string $content
 * @property double $price
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
    public $images; // Mahsulot rasmi

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],

            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    const STATUS_ACTIVE   = 1;
    const STATUS_INACTIVE = 0;

    /**
     * @inheritdoc
     */
     public function rules()
    {
        return [
            [['category_id', 'name', 'status'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['content', 'new', 'sale'], 'string'],
            [['price', 'salePrice'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'description', 'img'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['images'], 'file', 'extensions' => 'png, jpg, jpeg', 'skipOnEmpty' => true, 'maxFiles' => 6],
        ];
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'category_id' => Yii::t('yii', 'Categories'),
            'name' => Yii::t('yii', 'Name'),
            'content' => Yii::t('yii', 'Content'),
            'price' => Yii::t('yii', 'Price'),
            'salePrice' => Yii::t('yii', 'Chegirma'),
            'description' => Yii::t('yii', 'Description'),
            'images' => Yii::t('yii', 'Rasm'),
            'new' => Yii::t('yii', 'New'),
            'sale' => Yii::t('yii', 'Sale'),
            'status' => Yii::t('yii', 'Status'),
            'created_at' => Yii::t('yii', 'Date of creation'),
            'updated_at' => Yii::t('yii', 'Date of change'),
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

    public $statusList = [
        self::STATUS_ACTIVE   => 'Faol',
        self::STATUS_INACTIVE => 'Faol emas',
    ];

    public function getStatus($status)
    {
        return $this->statusList[$status];
    }
    public function status()
    {
        return [
            self::STATUS_ACTIVE   => 'Faol',
            self::STATUS_INACTIVE => 'Faol emas',
        ];
    }

    /**
     * @return bool
     * Сохранение галлереи
     */
    public function uploadGallery()
    {
        if ($this->validate())
        {
            foreach ($this->images as $file)
            {
                $path = 'upload/store' . $file->baseName .'.' . $file->extension;
                $file -> saveAs($path);
                $this->attachImage($path, false);
                @unlink($path);
            }
            return true;
        }
        else{
            return false;
        }
    }

}
