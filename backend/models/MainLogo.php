<?php

namespace backend\models;

use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "main_logo".
 *
 * @property int $id
 * @property string $title
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class MainLogo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $images;

    public static function tableName()
    {
        return 'main_logo';
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
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['images'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'title' => Yii::t('yii', 'Title'),
            'images' => 'Rasm',
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

    public function upload()
    {
        $directory = 'upload' . DIRECTORY_SEPARATOR . 'store' . DIRECTORY_SEPARATOR;
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }
        $filename = $this->getImage();
        $file = 'upload/store/' . $filename->filePath;
        if($this->validate()){
            $path = 'upload/store/' . $this->images->baseName . '.' . $this->images->extension;
            $this->images->saveAs($path);
            $this->attachImage($path, true);
//            debug($this->attachImage($path, false));
                @unlink($path);
                @unlink($file);
            return true;
        }else{
            return false;
        }
    }
}
