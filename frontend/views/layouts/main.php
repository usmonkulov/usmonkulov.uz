<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\components\CategoryWidget;
use frontend\components\CategorySearchWidget;
use yii\helpers\Url;
use frontend\components\InformationWidget;
use frontend\components\NetworkWidget;
use frontend\components\MainLogoWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
    <?php $this->beginBody() ?>
        <!-- HEADER -->
        <header>
            <!-- TOP HEADER -->
            <div id="top-header">
                <div class="container">
                    <ul class="header-links pull-left">
                       <?= InformationWidget::widget()?>
                    </ul>
                    <ul class="header-links pull-right">
                        <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                        <li><a href="#"><i class="fa fa-phone"></i> Operator bilan bog‘lanish</a></li>
                    </ul>
                </div>
            </div>
            <!-- /TOP HEADER -->

            <!-- MAIN HEADER -->
            <div id="header">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <!-- LOGO -->
                        <div class="col-md-3">
                            <div class="header-logo">
                                <a href="<?= Url::to(['/'])?>" class="logo">
                                    <?= MainLogoWidget::widget()?>
                                </a>
                            </div>
                        </div>
                        <!-- /LOGO -->

                        <!-- SEARCH BAR -->
                        <div class="col-md-7">
                            <div class="header-search">
                                <?= CategorySearchWidget::widget()?>
                            </div>
                        </div>
                        <!-- /SEARCH BAR -->

                        <!-- ACCOUNT -->
                        <div class="col-md-2 clearfix">
                            <div class="header-ctn">
                                <!-- Wishlist -->
                               <!--  <div>
                                    <a href="#">
                                        <i class="fa fa-heart-o"></i>
                                        <span>Sizning istaklaringiz ro'yxati</span>
                                        <div class="qty">2</div>
                                    </a>
                                </div> -->
                                <!-- /Wishlist -->

                                <!-- Cart -->
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Savatcha</span>
                                        <div class="qty">3</div>
                                    </a>
                                    <div class="cart-dropdown">
                                        <div class="cart-list">
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="<?=yii::getalias('@web/')?>img/product01.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                    <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                                </div>
                                                <button class="delete"><i class="fa fa-close"></i></button>
                                            </div>

                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="<?=yii::getalias('@web/')?>img/product02.png" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                    <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                                </div>
                                                <button class="delete"><i class="fa fa-close"></i></button>
                                            </div>
                                        </div>
                                        <div class="cart-summary">
                                            <small>3 Item(s) selected</small>
                                            <h5>SUBTOTAL: $2940.00</h5>
                                        </div>
                                        <div class="cart-btns">
                                            <a href="#">View Cart</a>
                                            <a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Cart -->

                                <!-- Menu Toogle -->
                                <div class="menu-toggle">
                                    <a href="#">
                                        <i class="fa fa-bars"></i>
                                        <span>Menyu</span>
                                    </a>
                                </div>
                                <!-- /Menu Toogle -->
                            </div>
                        </div>
                        <!-- /ACCOUNT -->
                    </div>
                    <!-- row -->
                </div>
                <!-- container -->
            </div>
            <!-- /MAIN HEADER -->
        </header>
        <!-- /HEADER -->

        <!-- NAVIGATION -->
        <nav id="navigation">
            <!-- container -->
            <div class="container">
                <!-- responsive-nav -->
                <div id="responsive-nav">
                    <!-- NAV -->
                    <ul class="main-nav nav navbar-nav">
                        <?php $controller = Yii::$app->controller->id; ?>
                        <li class="<?= ($controller=='site')?'active':''?>"><a href="<?= Url::to(['/'])?>"><?=Yii::t('yii', 'Home')?></a></li>

                        <li><a href="#">Yangi mahsulotlar</a></li>
                        <li><a href="#">Eng ko'p sotilgan</a></li>
                        <li><a href="#">Biz bilan hamkorlik qiling</a></li>
                        <!-- <li><a href="#">Categories</a></li>
                        <li><a href="#">Laptops</a></li>
                        <li><a href="#">Smartphones</a></li>
                        <li><a href="#">Cameras</a></li>
                        <li><a href="#">Accessories</a></li> -->
                        <?//= CategoryWidget::widget()?>
                        <?//= \frontend\widgets\CategoryMenu::widget(['view' => 'glMenu']) ?>
                    </ul>
                    <!-- /NAV -->
                </div>
                <!-- /responsive-nav -->
            </div>
            <!-- /container -->
        </nav>
        <!-- /NAVIGATION -->
        <?//php $controller = Yii::$app->controller->id; ?>
        <?//php if(empty($controller == 'category')):?>
        <!-- BREADCRUMB -->
        <div id="breadcrumb" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <?php try {
                            echo Breadcrumbs::widget([
                                'homeLink' => ['label' => '<i class="fa fa-home"></i> '.Yii::t('yii', 'Home'), 'url' => Yii::$app->urlManager->createUrl("site/index")],
                                'tag' => 'ol',
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                'options' => ['class' => 'breadcrumb-tree'],
                                'encodeLabels' => false
                            ]);
                        } catch ( Exception $e ) {
                            echo $e->getMessage();
                        } ?>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /BREADCRUMB -->
        <?//php endif;?>
        <?=$content?>
        <!-- NEWSLETTER -->
        <div id="newsletter" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="newsletter">
                            <p><strong>YANGILIKLAR</strong> uchun ro'yxatdan o'ting</p>
                            <form>
                                <input class="input" type="email" placeholder="Elektron pochtangizni kiriting">
                                <button class="newsletter-btn"><i class="fa fa-envelope"></i> Obuna bo'ling</button>
                            </form>
                            <ul class="newsletter-follow">
                       `    
                                <?= NetworkWidget::widget()?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /NEWSLETTER -->

        <!-- FOOTER -->
        <footer id="footer">
            <!-- top footer -->
            <div class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">Bizning manzilimiz</h3>
                                <ul class="footer-links">
                                    <?= InformationWidget::widget()?>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">Toifalar</h3>
                                <ul class="footer-links">
                                    <li><a href="#">Issiq narxlar</a></li>
                                    <li><a href="#">Noutbuklar</a></li>
                                    <li><a href="#">Smartfonlar</a></li>
                                    <li><a href="#">Kameralar</a></li>
                                    <li><a href="#">Aksessuarlar</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="clearfix visible-xs"></div>

                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">MA'LUMOT</h3>
                                <ul class="footer-links">
                                    <li><a href="#">Biz haqimizda</a></li>
                                    <li><a href="#">Biz bilan bog'lanish</a></li>
                                    <li><a href="#">Maxfiylik siyosati</a></li>
                                    <li><a href="#">Buyurtmalar va qaytarishlar</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">Xizmat</h3>
                                <ul class="footer-links">
                                    <li><a href="#">Mening hisobim</a></li>
                                    <li><a href="#">Savatni ko'rish</a></li>
                                    <li><a href="#">Istaklar ro'yxati</a></li>
                                    <li><a href="#">Yordam bering</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /top footer -->

            <!-- bottom footer -->
            <div id="bottom-footer" class="section">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="footer-payments">
                                <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                                <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                                <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                                <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                                <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                                <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                            </ul>
                            <span class="copyright">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy; <?= date('Y') ?> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </span>
                        </div>
                    </div>
                        <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /bottom footer -->
        </footer>
        <!-- /FOOTER -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
