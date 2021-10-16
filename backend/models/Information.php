<?php

namespace backend\models;

use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "information".
 *
 * @property int $id
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Information extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'information';
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
        ];
    }

    const STATUS_ACTIVE   = 1;
    const STATUS_INACTIVE = 0;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'phone', 'address'], 'required'],
            [['address'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['phone'], 'string', 'max' => 255],
            ['email', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'email' => Yii::t('yii', 'Email'),
            'phone' => Yii::t('yii', 'Phone'),
            'address' => Yii::t('yii', 'Address'),
            'status' => Yii::t('yii', 'Status'),
            'created_at' => Yii::t('yii', 'Date of creation'),
            'updated_at' => Yii::t('yii', 'Date of change'),
        ];
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

}
