<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = Yii::t('yii', 'Update Product: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<div class="product-update">

   <div class="row">
		<!-- right column -->
		<div class="col-md-12">
		  <!-- Horizontal Form -->
		  <div class="box box-info">
		    <div class="box-header with-border">
		      	<p class="box-title">
              <?= Html::a('<i class="fa fa-home"></i>', ['/'], ['class' => 'btn btn-default','title'=>Yii::t('yii','Home')]) ?>
            </p>
		    </div>
		    <!-- /.box-header -->
		    <?= $this->render('_form', [
		      'model' => $model,
		    ]) ?>
		  </div>
		  <!-- /.box -->
		</div>
		<!--/.col (right) -->
	</div>
	<!-- /.row -->

</div>
