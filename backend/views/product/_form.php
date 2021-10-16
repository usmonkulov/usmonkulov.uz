<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <!-- form start -->
    <?php $form = ActiveForm::begin(
        [
            'options' => [
                'class' => 'form-horizontal',
                'enctype' => 'multipart/form-data'
            ]
        ]
    ); ?>
    <div class="box-body">

   
    <?= $form->field($model, 'category_id',
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
    )->dropDownList($model->getCategoryList(),['prompt' => 'Bo‘limni tanlang']
    ) ?>

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
        'placeholder' => Yii::t('yii', 'Mahsulot'),
        'maxlength' => true
      ]
    ) ?>

    <?= $form->field($model, 'description',
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
    )->widget(CKEditor::className(),
        [
            'editorOptions' => [
                'preset' => 'basic', 
                'inline' => false,
            ],
        ]
    )?>

    <?= $form->field($model, 'content',
        [
            'options' => [
                'class' => 'form-group',
            ],

            'inputOptions' => [
                'class' => 'form-control',
            ],

            'labelOptions' => [
                'class' => 'col-sm-2 col-sm-2 control-label',
            ],

            'errorOptions' => [
                'tag' => 'span',
                'class' => 'help-block',
            ],

            'template' => '{label}<div class="col-sm-10">{input}{error}{hint}</div>'
        ]
    )->widget(CKEditor::className(),
        [
            'editorOptions' => [
                'preset' => 'standard', 
                'inline' => false,
            ],
        ]
    )?>

    <?= $form->field($model, 'images[]',
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
      ])->widget(FileInput::classname(), [
        'options' => ['multiple' => true, 'accept' => 'image/*'],
        'pluginOptions' => ['previewFileType' => 'image']
    ]);?>

       <div class="form-group">
          <label class="col-sm-2 control-label">Gallereya</label>

          <div class="col-sm-10">
           <?php $gal = $model->getImages();//var_dump($gal)?>

            <?php if (!$model->isNewRecord && $model->getImages() != null) : ?>
                <div class="row">

                    <?php  foreach ($gal as $file) :?>

                        <div class="col-sm-4 col-md-2 col-lg-2 del_<?=$file->id?>">
                            <span><i class="fa fa-trash-o del fa-lg delFoto glyphicon glyphicon-trash" data-id="<?= $model->id ?>" data-img = "<?= $file->id ?>"></i></span>
                            <a href="<?=$file->getUrl('600x600')?>" class="photo thumbnail" rel="galery">
                                <?= Html::img("{$file->getUrl('600x600')}")?>
                            </a>
                        </div>

                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
          </div>
        </div>



    <?= $form->field($model, 'price',
      [
        'options' => [
            'class' => 'form-group',
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
        'class' => 'form-control',
        'placeholder' => Yii::t('yii', 'So‘mda'),
        'type' => 'number'
      ]
    ) ?>

    <?= $form->field($model, 'salePrice',
      [
        'options' => [
            'class' => 'form-group',
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
        'class' => 'form-control',
        'placeholder' => Yii::t('yii', 'So‘mda'),
        'type' => 'number'
      ]
    ) ?>

    <?= $form->field($model, 'sale',
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
    )->dropDownList([ '0' => 'To‘liq narxga', '1' => 'Chegirmaga', ], ['prompt' => 'Nimaga sotasiz?']) ?>
    <?= $form->field($model, 'new',
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
    )->dropDownList([ '0' => 'Yangi to\'plam emas', '1' => 'Yangi to\'plam'], ['prompt' => 'To‘plamni tanlang!']) ?>


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
        <?= Html::a(Yii::t('yii', 'Cancel'), ['product/index'], ['class' => 'btn btn-default']) ?>
      </div>
      <!-- /.box-footer -->
    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>