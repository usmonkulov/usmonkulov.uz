<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MainLogo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-logo-form">

    <?php $form = ActiveForm::begin(
        [
            'options' => [
                'class' => 'form-horizontal',
            ]
        ]
    ); ?>

    <div class="box-body">
        <?php if($img = $model->getImage()):?>
            <?= $form->field($model, 'images',
                [
                    'options' => [
                        'class' => 'form-group',
                    ],
                    'inputOptions' => [
                        'class' => 'uploadlogo-image'
                    ],
                    'labelOptions' => [
                        'class' => 'col-sm-2 control-label',
                    ],
                    'errorOptions' => [
                        'tag' => 'span',
                        'class' => 'help-block',
                    ], 
                    'template' => (!$model->isNewRecord)?'{label}<div class="col-sm-10"><label class="uploadlogo-label" '.'style="background-image:url(\''.$img->getUrl('169x70').'\')">{input}{error}{hint}</label></div>':'{label}<div class="col-sm-10"><label class="uploadlogo-label">{input}{error}{hint}</label></div>', 
                ]
            )->fileInput(); ?>
        
        <?php else:?>
            <?= $form->field($model, 'images',
                [
                    'options' => [
                        'class' => 'form-group',
                    ],
                    'inputOptions' => [
                        'class' => 'uploadlogo-image'
                    ],
                    'labelOptions' => [
                        'class' => 'col-sm-2 control-label',
                    ],
                    'errorOptions' => [
                        'tag' => 'span',
                        'class' => 'help-block',
                    ], 
                    'template' => ($model->isNewRecord && !$model->isNewRecord)?'{label}<div class="col-sm-10"><label class="uploadlogo-label" '.'style="background-image:url(\''.$img->getUrl('169x70').'\')">{input}{error}{hint}</label></div>':'{label}<div class="col-sm-10"><label class="uploadlogo-label">{input}{error}{hint}</label></div>', 
                ]
            )->fileInput(); ?>
        
        <?php endif?>

         <?= $form->field($model, 'title',
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
            'placeholder' => Yii::t('yii', 'Sayt logatib nomi'),
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
            <?= Html::a(Yii::t('yii', 'Cancel'), ['main-logo/index'], ['class' => 'btn btn-default']) ?>
          </div>
          <!-- /.box-footer -->
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
