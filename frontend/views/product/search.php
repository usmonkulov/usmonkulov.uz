<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use frontend\components\CategorycheckboxListWidget;
use frontend\components\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-search">
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Bo'limlar</h3>

                        <?= CategorycheckboxListWidget::widget()?>
                        
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Price</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Brand</h3>
                    <div class="checkbox-filter">
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-1">
                            <label for="brand-1">
                                <span></span>
                                SAMSUNG
                                <small>(578)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-2">
                            <label for="brand-2">
                                <span></span>
                                LG
                                <small>(125)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-3">
                            <label for="brand-3">
                                <span></span>
                                SONY
                                <small>(755)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-4">
                            <label for="brand-4">
                                <span></span>
                                SAMSUNG
                                <small>(578)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-5">
                            <label for="brand-5">
                                <span></span>
                                LG
                                <small>(125)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-6">
                            <label for="brand-6">
                                <span></span>
                                SONY
                                <small>(755)</small>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Top selling</h3>
                    <div class="product-widget">
                        <div class="product-img">
                            <img src="<?=yii::getalias('@web/')?>img/product01.png" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        </div>
                    </div>

                    <div class="product-widget">
                        <div class="product-img">
                            <img src="<?=yii::getalias('@web/')?>img/product02.png" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        </div>
                    </div>

                    <div class="product-widget">
                        <div class="product-img">
                            <img src="<?=yii::getalias('@web/')?>img/product03.png" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Tovarlar soni:
                            <select class="input-select">
                                <option value="1">9</option>
                                <option value="2">12</option>
                                <option value="3">24</option>
                                <option value="4">36</option>
                                <option value="5">48</option>
                                <option value="6">60</option>
                            </select>
                        </label>

                        <label>
                            Saralash:
                            <select class="input-select">
                                <option value="0">Tanlang</option>
                                <option value="1">Nomi (A - Z)</option>
                                <option value="2">Nomi (Z - A)</option>
                                <option value="3">Avval arzonlari</option>
                                <option value="4">Avval qimmatlari</option>
                                <option value="5">Reyting (quyisidan boshlab)</option>
                                <option value="6">Reyting (yuqorisdan boshlab)</option>
                            </select>
                        </label>
                    </div>
                    <ul class="store-grid">
                        <li class="active"><i class="fa fa-th"></i></li>
                        <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                    </ul>
                </div>
                <!-- /store top filter -->
                <!-- <div class="row"> -->
                <!-- store products -->
                    <?= GridView::widget([
                        'summary' => false,
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'tableOptions' => [
                           'class' => false,
                        ],
                        'columns' => [
                            'category_id',
                             [
                            'attribute'=>'category_id',
                            'filter' => \backend\models\Product::getCategoryList(),
                            'content'=>function($data)
                            {
                              if($data->category):
                                return $data->category->name;
                              else:
                                return Yii::t('yii', '(not set)');
                              endif;
                            },
                            'format'=>'html', // raw, html
                          ],
                            'name',
                        ],
                    ]); ?>
                    <?=$dataProvider->sort->link('name')?>
                    <?php debug($dataProvider->sort)?>
                    <?= ListView::widget([
                        // 'options' => [
                        //     'tag' => false
                        // ],
                        'dataProvider' => $dataProvider,
                        // 'itemView' => '_list',
                        'itemView' => function ($model, $key, $index, $widget) {
                            return $this->render('_list', [
                                'model' => $model,
                                'key' => $key,
                                'index' => $index,
                                'widget' => $widget,
                            ]);
                        },
                        'itemOptions' => ['tag' => false],
                        // 'itemOptions' => ['class' => 'col-md-4 col-xs-6'],
                        'layout' => "<div class='row'>{items}\n</div> <div class='clearfix visible-lg visible-md'> </div><div class='store-filter clearfix'><span class='store-qty'>{summary}\n</span> {pager}\n </div>",
                        'summary' => 'SHOWING  {count}-{totalCount} PRODUCTS',
                        'emptyText' => 'В этой категории товар отсутствует',
                        'emptyTextOptions' => ['tag' => 'p'],
                        
                        'pager' => [
                            'options' => [
                                'tag' => 'ul',
                                'class' => 'store-pagination'
                            ],
                            /*'prevPageCssClass' => 'prev',
                            'nextPageCssClass' => 'next',*/
                            'activePageCssClass' =>  [
                                'class' => 'active'
                            ],
                            // 'linkOptions' => ['style' => 'color:#FFF;'],
                            'nextPageLabel' => '<i class="fa fa-angle-right"></i>',
                            'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
                            'maxButtonCount' => 3,
                        ],
                    ]); ?>
                <!-- </div> -->
                <!-- /store products -->

            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
</div>