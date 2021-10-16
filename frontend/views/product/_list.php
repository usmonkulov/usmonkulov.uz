<?php

use yii\helpers\Url;
use yii\helpers\Html;
$img = $model->getImage();
?>
<div class="col-md-4 col-xs-6" data-key="<?=$model->id?>">
    <!-- product -->
    <div class="product">
        <div class="product-img">
            <img src="<?= $img->getUrl('600x600')?>" alt="">
            <div class="product-label">
                <span class="sale">-30%</span>
                <span class="new">NEW</span>
            </div>
        </div>
        <div class="product-body">
            <p class="product-category"><?= $model->category->name?></p>
            <h3 class="product-name"><a href="#"><?= $model->name?></a></h3>
            <h4 class="product-price"><?= $model->price?> so'm <del class="product-old-price"><?= $model->salePrice?> so'm</del></h4>
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <div class="product-btns">
                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
            </div>
        </div>
        <div class="add-to-cart">
            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
        </div>
    </div>
    <!-- /product -->
</div>
<?php if (($index+1) % 3 == 0) : ?>
    <div class="clearfix visible-lg visible-md"></div>
<?php endif; ?>
