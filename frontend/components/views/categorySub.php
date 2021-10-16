<?php foreach ($categories as $categorie): ?>
<?php $products = $categorie->products;?>
<!-- <li><a href="<?//=\yii\helpers\Url::to(['category/view', 'id'=>$categorie->id])?>"><?= $categorie->name?></a></li> -->
<div class="input-checkbox">
    <input type="checkbox" id="category-<?= $categorie->id?>">
    <label for="category-<?= $categorie->id?>">
        <span></span>
        <?= $categorie->name?>
        <small>(<?= count($products)?>)</small>
    </label>
</div>
<?php endforeach; ?>