<?php

namespace backend\models;

use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "social_networks".
 *
 * @property int $id
 * @property string $url
 * @property string $messenjer
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class SocialNetworks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'social_networks';
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
            [['url', 'messenjer'], 'required'],
            [['url', 'messenjer'], 'string'],
            ['messenjer', 'unique', 'message' => Yii::t('yii', 'Bu ijtimoiy tarmoq bor!')],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'url' => Yii::t('yii', 'Url manzili'),
            'messenjer' => Yii::t('yii', 'Ijtimiy tarmoqlar'),
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
