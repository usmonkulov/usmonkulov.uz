<?php

namespace frontend\models;

use Yii;

class MainLogo extends \yii\db\ActiveRecord
{
	public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    public static function tableName()
    {
        return 'main_logo';
    }
}
