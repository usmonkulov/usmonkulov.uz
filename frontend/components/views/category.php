<?php foreach ($categories as $categorie): ?>
<li><a href="<?=\yii\helpers\Url::to(['category/view', 'id'=>$categorie->id])?>"><?= $categorie->name?></a></li>
<?php endforeach; ?>