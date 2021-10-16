<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<?php $form = ActiveForm::begin([
    'action' => ['/product/search'],
    'method' => 'get',
]); ?>

<?php $category = \yii\helpers\ArrayHelper::map(\frontend\models\Category::find()->all(), 'id', 'name'); ?>

<?php
echo $form->field($searchModel, 'category_id',
	[
			'options' => [
				'tag' => false
			],
			'template' => '{input}',
			'errorOptions' => [
				'tag' => false
			],
		]
)->checkboxList($category,
	[
		'class' => 'checkbox-filter',
		// 'id' => false,
        'item' => function($index, $label, $name, $checked, $value) {
    	if($checked == true){
            $ch = 'checked';
        }
        return"
			<div class='input-checkbox'>
				<input onchange='this.form.submit()' name='ProductSearch[category_id]' value='$value' type='checkbox' {$ch} id='$value'>
				<label for='$value'>
					<span></span>
					$label
					<small>(".count($category_id).")</small>
				</label>
			</div>
		";

        }
    ]
);
?>

<?php ActiveForm::end(); ?>