<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    <?php $form = ActiveForm::begin([
        'action' => ['/product/search'],
        'method' => 'get',
    ]); ?>

    <?php $category = \yii\helpers\ArrayHelper::map(\frontend\models\Category::find()->all(), 'id', 'name'); ?>

    <?= $form->field($searchModel, 'category_id',
		[
			'options' => [
				'tag' => false
			],
			'inputOptions' => [
                'class' => 'input-select',
            ],
            'template' => '{input}'
		]
	)->dropDownList($category,
        [
            'onchange'=>'this.form.submit()',
            'prompt' => Yii::t('yii','Toifani tanlang'),
        ]
    )->label(false) ?>

    <?= $form->field($searchModel, 'name',
		[
			'options' => [
				'tag' => false
			],
			'inputOptions' => [
                'class' => 'input',
            ],
            'template' => '{input}'
		]
	)->textInput(
        [
            'placeholder' => 'Mahsulotlar aro qidiruv',
            'onchange'=>'this.form.submit()',
        ]
    )->label(false) ?>

   
    <?= Html::submitButton('Qidirish', ['class' => 'search-btn']) ?>

    <?php ActiveForm::end(); ?>

