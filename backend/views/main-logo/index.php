<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MainLogoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Main Logos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-logo-index">

   <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
            <p class="box-title">
                <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('yii','Yaratish')]) ?>
                <?= Html::a('<i class="fa fa-home"></i>', ['/'], ['class' => 'btn btn-default','title'=>Yii::t('yii','Bosh sahifa')]) ?>
            </p>
        </div>
        <!-- /.box-header -->
        <?= GridView::widget([
            'options' => ['class' => 'box-body table-responsive'],
            'tableOptions' => [
               'class' => 'table table-bordered table-hover',
            ],
            'rowOptions' => function($model){
                if($model->status == 0)
                  return [
                    'class' => 'danger'
                  ];
                if($model->status == 1)
                  return [
                    'class' => 'default'
                  ];
            },
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                  'class' => 'yii\grid\SerialColumn',
                  'header'=> Html::a(Yii::t('yii','t\r')), 
                  'headerOptions' => ['class' => 'text-center'],
                  'contentOptions' =>['class' => 'text-center'],
                  'options' => ['class' => 'table-bordered'],
                ],
                'title',
                [
                  'header'=> Html::a('Rasm'), 
                  'attribute'=>'images',
                  'headerOptions' => ['class' => 'text-center','width' => '120'],
                  'filterOptions' => ['class' => 'text-center','width' => '120'],
                  'contentOptions' =>['class' => 'text-center','width' => '120'],
                  'options' => ['class' => 'table-bordered'],
                  'format'=>'raw', // raw, html
                  'content' => function($data)
                  {
                    if($file = $data->getImage()):
                      return (Html::a(Html::img($file->getUrl('169x70'),['style'=>'width:100%']),$file->getUrl('169x70'),[/*'rel' => 'galery',*/ 'class' => 'photo']));
                    endif;
                  }
                ],

                [
                  'attribute' => 'status',
                  'headerOptions' => ['class' => 'text-center'],
                  'filterOptions' => ['class' => 'text-center'],
                  'contentOptions' =>['class' => 'text-center'],
                  'options' => ['class' => 'table-bordered'],
                  'label' => Yii::t('yii','Status'),
                  'format' => 'raw',
                  'content' => function($data){
                    return ($data->getStatus($data->status))?$data->getStatus($data->status) : $data->status;
                  },
                  'filter'=>\backend\models\Information::status(),  
                  'footerOptions' =>['class' => 'warning'],          
                ],
                [
                  'attribute' => 'created_at',
                  'headerOptions' => ['class' => 'text-center'],
                  'filterOptions' => ['class' => 'text-center'],
                  'contentOptions' =>['class' => 'text-center'],
                  'options' => ['class' => 'table-bordered'],
                ],

                [
                  'attribute' => 'updated_at',
                  'headerOptions' => ['class' => 'text-center'],
                  'filterOptions' => ['class' => 'text-center'],
                  'contentOptions' =>['class' => 'text-center'],
                  'options' => ['class' => 'table-bordered'],
                ],

                [
                  'class' => 'yii\grid\ActionColumn',
                  'options' => ['class' => 'table-bordered'],
                  'header'=> Html::a(Yii::t('yii','Menu')), 

                  'headerOptions' => ['class' => 'text-center','width' => '121'],
                  'filterOptions' => ['class' => 'text-center','width' => '121'],
                  'contentOptions' =>['class' => 'text-center','width' => '121',],

                  'template' => '{view} {update} {delete} {activate}',
                  'buttons' => [
                    'view' => function($url,$model)
                    {
                      return Html::a('<i class="ace-icon fa fa-eye bigger-130"></i>',['view','id' => $model->id],
                        [
                          'title'=>Yii::t('yii','View'),
                          'class'=>'green text-black',
                          'class' => 'btn btn-info btn-xs'
                        ]
                      );
                    },
                    
                    'update' => function($url,$model)
                    {
                      return Html::a('<i class="ace-icon fa fa-pencil bigger-130"></i>',$url,
                        [
                          'title'=>Yii::t('yii','Update'),
                          'class'=>'green text-success',
                          'class' => 'btn btn-primary btn-xs'
                        ]
                      );
                    },
                    
                    'delete' => function($url,$model)
                    {
                      return Html::a('<i class="ace-icon fa fa-trash-o bigger-130"></i>',$url,
                        [
                          'title'=>Yii::t('yii','Delete'),
                          'data' => 
                            [
                              'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                              'method'=>'post'
                            ],
                            'class'=>'text-danger',
                            'class' => 'btn btn-danger btn-xs'
                        ]
                      );
                    },
                    
                    'activate' => function($url,$model,$key)
                    {
                      return Html::a('<i class="ace-icon fa fa-flag bigger-130"></i>',$url, 
                        [
                          'title'=>Yii::t('yii','Activate'),
                          'class'=>'green text-success',
                          'class' => 'btn btn-success btn-xs'
                        ]
                      );
                    },
                  ],
                ],
              ],
            ]); ?>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
</div>