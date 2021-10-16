<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">
<!-- form start -->
<?php $form = ActiveForm::begin(
    [
        'options' => [
            'class' => 'form-horizontal',
        ]
    ]
); ?>
  <div class="box-body">
    <?= $form->field($model, 'name',
      [
        'options' => [
            'class' => 'form-group',
        ],

        'inputOptions' => [
            'class' => 'form-control',
        ],

        'labelOptions' => [
            'class' => 'col-sm-2 control-label',
        ],

        'errorOptions' => [
            'tag' => 'span',
            'class' => 'help-block',
        ],

        'template' => '{label}<div class="col-sm-10">{input}{error}{hint}</div>'
      ]
    )->textInput(
      [
      	'placeholder' => Yii::t('yii', 'Name'),
        'maxlength' => true
      ]
    ) ?>

     <?= $form->field($model, 'status',
      [
        'options' => [
            'class' => 'form-group',
        ],

        'inputOptions' => [
            'class' => 'form-control',
        ],

        'labelOptions' => [
            'class' => 'col-sm-2 control-label',
        ],

        'errorOptions' => [
            'tag' => 'span',
            'class' => 'help-block',
        ],

        'template' => '{label}<div class="col-sm-10">{input}{error}{hint}</div>'
      ]
    )->dropDownList(
        [
            1 => Yii::t('yii', 'Active'),
            0 => Yii::t('yii', 'Inactive'),
        ]
    ) ?>
  </div>
  <!-- /.box-body -->
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Yaratish') 
                    : Yii::t('yii', 'Yangilash'), ['class' => $model->isNewRecord 
                    ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('yii', 'Cancel'), ['category/index'], ['class' => 'btn btn-default']) ?>
      </div>
      <!-- /.box-footer -->
    </div>
	</div>
<?php ActiveForm::end(); ?>
</div>