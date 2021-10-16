<?php
/**
 * Created by PhpStorm.
 * User: ilyamikhalev
 * Date: 27.12.2017
 * Time: 9:05
 */
use yii\helpers\Url;
// use app\controllers\CustomController;
//CustomController::printr($category);
//exit;

?>

<!--<li>
    <a href="#">CLOTHING</a>
    <ul class="sub-menu">
        <li><a href="auth.html">AUTH</a></li>
        <li>
            <a href="contact.html">CONTACT</a>
            <ul class="sub-menu">
                <li><a href="contact.html">CONTACT1</a></li>
                <li><a href="#">Submenu 22</a></li>
                <li><a href="#">Submenu 23</a></li>
                <li><a href="#">Submenu 24</a></li>
                <li><a href="#">Submenu 25</a></li>
            </ul>
        </li>
        <li><a href="#">Submenu 3</a></li>
        <li><a href="#">Submenu 4</a></li>
        <li><a href="#">Submenu 5</a></li>
    </ul>
</li>-->


<li>
    <a href="<?= Url::to(['category/view', 'id' => $category['id']]) ?>"><?= $category['name'] ?></a>
    <?php if (isset($category['childs'])) : ?>
    <ul class="sub-menu">
        <?php endif;?>

        <?php if (isset($category['childs'])) : ?>
        <?= $this->getMenuHtml($category['childs']) ?>
        </ul>
<?php endif; ?>
</li>


