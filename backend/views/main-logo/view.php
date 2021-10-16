<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MainLogo */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Main Logos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="main-logo-view">

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
                'title',

                [
                  'label' => 'Rasm', 
                  'attribute'=>'images',
                  'format'=>'raw', // raw, html
                  'value' => function($data)
                  {
                    if($file = $data->getImage()):
                      return (Html::a(Html::img($file->getUrl('169x70'),['style'=>'width:40%']),$file->getUrl('169x70'),['rel' => 'galery', 'class' => 'photo']));
                    endif;
                  }
                ],
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

