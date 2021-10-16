<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<option value="<?= $category['id'] ?>"
    <?php if ($category['id'] == $this->model->categoryId) echo ' selected' ?>
    <?php if ($category['id'] == $this->model->id) echo ' disabled' ?>
> <?= $tab . $category['title'] ?></option>
<?php if( isset($category['childs']) ):?>

    <?= $this->getMenuHtml($category['childs'], $tab . '⤷') ?>

<?php endif;?>

