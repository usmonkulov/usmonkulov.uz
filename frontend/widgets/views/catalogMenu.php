<?php
/**
 * Created by PhpStorm.
 * User: ilyamikhalev
 * Date: 27.12.2017
 * Time: 9:19
 */
use yii\helpers\Url;
use app\controllers\CustomController;
?>


<!--<li><a href="#">T-SHIRT</a></li>
<li><a href="#">WOMEN</a></li>
<li><a href="#">CLOTHING</a></li>
<li class="has-child">
    <a href="#">ACCESSORY</a>
    <ul class="children">
        <li><a href="#">SUMMER BAGS</a></li>
        <li class="current-cat"><a href="#">SWAG BAGS</a></li>
        <li><a href="#">TEEN BAGS</a></li>
    </ul>
</li>
<li><a href="#">OTHER</a></li>-->



<li <?= isset($category['childs']) ? 'class="has-child"' : '' ?> >
    <a href="<?= Url::to(['category/view' , 'id' => $category['id']]) ?>">
        <?= $category['title'] ?> </a>
<?php if (isset($category['childs'])) : ?>
    <ul class="children">
        <?php endif; ?>

<?php if (isset($category['childs'])) : ?>
        <?= $this->getMenuHtml($category['childs']) ?>
    </ul>
    <?php endif; ?>
</li>
