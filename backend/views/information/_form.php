<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Information */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="information-form">

    <?php $form = ActiveForm::begin(
        [
            'options' => [
                'class' => 'form-horizontal',
            ]
        ]
    ); ?>

    <div class="box-body">
        <?= $form->field($model, 'address',
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
            'placeholder' => Yii::t('yii', 'Shahar, Tuman, Mahalla, Qishloq, Ovul, Ko‘cha, Uy'),
            'maxlength' => true
          ]
        ) ?>

         <?= $form->field($model, 'phone',
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
            'placeholder' => Yii::t('yii', '(99) 999-99-99'),
            'maxlength' => true,
            'data-inputmask' => '"mask": "(99) 999-99-99"',
            'data-mask' => ''
          ]
        ) ?>

        <?= $form->field($model, 'email',
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
            'placeholder' => Yii::t('yii', 'Elektron pochta manzili'),
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

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="box-footer">
             <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Yaratish') 
                    : Yii::t('yii', 'Yangilash'), ['class' => $model->isNewRecord 
                    ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('yii', 'Cancel'), ['information/index'], ['class' => 'btn btn-default']) ?>
          </div>
          <!-- /.box-footer -->
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div> 
<!-- jQuery 3 -->
<script src="<?=Yii::getAlias('@web/')?>bower_components/jquery/dist/jquery.min.js"></script>
<script>
  $(function () {
    //Money Euro
    $('[data-mask]').inputmask()
  })
</script>