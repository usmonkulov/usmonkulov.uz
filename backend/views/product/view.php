<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
            <p>
              <?= Html::a('<i class="fa fa-home"></i> '.Yii::t('yii', 'Home'), ['/'], ['class' => 'btn btn-default','title'=>Yii::t('yii','Bosh sahifa')]) ?>
              <?= Html::a('<i class="fa fa-pencil"></i> '.Yii::t('yii','Tahrirlash'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
               
              <?= Html::a('<i class="fa fa-share-square-o"></i> '.Yii::t('yii', 'Orqaga'), ['index'], ['class' => 'btn btn-success']) ?>
               
              <?= Html::a('<i class="fa fa-trash-o"></i> '.Yii::t('yii', 'O‘chirish'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('yii', 'Siz rostdan ham ushbu elementni o‘chirmoqchimisiz?'),
                        'method' => 'post',
                    ],
              ]) ?>

              <?= Html::a('<i class="fa fa-plus"></i> '.Yii::t('yii', 'Yaratish'), ['create'], ['class' => 'btn btn-info']) ?>
              <?= Html::a('<i class="fa fa-thumb-tack"></i> '.Yii::t('yii','Holat'), ['active', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
            </p>
        </div>
        <!-- /.box-header -->
          <?= DetailView::widget([
              'options' => ['class' => 'table table-bordered detail-view'],
              'model' => $model,
              'attributes' => [
                  'id',
                  [
                    'label'=> Yii::t('yii', 'Bo‘limi'),
                    'attribute'=>'category_id',
                    'format' => 'html',
                    'value'=> function ($model) 
                    {
                      if($model->category):
                        return $model->category->name;
                      else:
                        return Yii::t('yii', '(not set)');
                      endif;
                    },
                  ],
                  'name',
                  'description:html',
                  'content:html',
                  'price',
                 
                  [
                    'label' => 'Rasm', 
                    'attribute'=>'images',
                    'format'=>'raw', // raw, html
                    'value' => function($data)
                      {
                          $gal = $data->getImages();
                          $str = '';
                          foreach ($gal as $file)
                          {
                              $str = $str . (Html::a(Html::img($file->getUrl('600x600'),['style' => 'width:15%; margin-top:3px; margin-left:3px']),$file->getUrl('600x600'),['rel' => 'galery', 'class' => 'photo']));
                          }
                          return $str;
                      } ,
                    'contentOptions' =>['width' => '80%'], 
                  ],

                  'new',
                  'sale',
                  [
                    'attribute'=>'status',
                    'format' => 'raw',
                    'value' => function($data){
                         return ($data->getStatus($data->status))?$data->getStatus($data->status) : $data->status;
                    },
                  ],
                  'created_at',
                  'updated_at',
              ],
          ]) ?>
        <!-- /.box-body -->
       
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
</div>

