<?php
use yii\helpers\Html;
?>
<?php foreach ($logos as $logo): ?>
    <?php $img = $logo->getImage(); ?>
        <?= Html::img("{$img->getUrl('169x70')}", ['alt' => Yii::t('yii','no-image')])?>
<?php endforeach; ?>