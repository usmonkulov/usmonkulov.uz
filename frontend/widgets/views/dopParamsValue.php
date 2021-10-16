<?php
/**
 * Created by PhpStorm.
 * User: ilyamikhalev
 * Date: 29.03.2018
 * Time: 9:02
 */


use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;


//\app\controllers\CustomController::printr($model);

$array = array();

$name = array();

$napoln = array();


//Создаём чекбокс лист
foreach ($propertyVal as $value){
    $array[$value->property->id][$value->id] = $value->value;
    $name[$value->property->id] = $value->property->name;
}

?>


<?php $form = ActiveForm::begin([
        'action' => Url::to(['/category/podbor', 'id' => $categoryId]),
        'method' => 'get'
]); ?>
<?php $i = 0; ?>
<?php foreach ($array as $key => $value) :?>
<?php $i++; ?>
    <aside class="widget widget-size">
        <h3 class="widget-title"><?=$name[$key]?></h3>
        <div class="options-size">
            <div class="size-input">
                <?= $form->field($model, "propertyValue[$key]")->checkboxList($value,
                    [
                        'item'=>function ($index, $label, $name, $checked, $value){
                            // Если было выбран чекбокс то активируем его
                            if($checked == true){
                                $ch = 'checked';
                            }
                            return "<input type='checkbox'  name='$name' id='$value' class='css-checkbox' value='$value' $ch/>
                            <label for='$value' class='css-label'>$label</label>";
                        }
                    ])->label(false) ?>
            </div>
        </div>
    </aside>
<?php  endforeach; ?>

        <aside class="widget widget-price">
            <h3 class="widget-title">Цена ₽</h3>
                <?php $arrayRange = explode('-', $model->range ) ?>

                <?= $form->field($model, 'range',
                    ['template' => '<div class="options-price"><p class="price-range" data-min ="'.$min_price.'"
                     data-max="'.$max_price.'" data-minprice="'.min($arrayRange).'" data-maxprice="'.max($arrayRange).'">
                    {label}{input} </p><div id="price-slider"></div>'])
                    ->textInput(['id' => 'amount'])
                    ->label('Диапазон:') ?>
        </aside>



    </div>
    <div class="col-md-9">



        <div class="top-products">
            <div class="sortby">
                <h4>Сортировать по: </h4>

                <?= $form->field($model, 'sort')->dropDownList(

                    \app\models\DopParamsProduct::getTypes(),

                    [
                        'class' => 'custom-select',
                        'prompt' => 'Сортировать по',
                    ]
                )->label(false);?>


                <?= $form->field($model, 'hid')->hiddenInput()->label(false) ?>

            </div>

            <?= Html::submitButton('Применить<i class="fa fa-chevron-right"></i>', ['class' => 'compare-btn']) ?>
            <a href="<?= Url::to(['category/view', 'id' => $categoryId])?>" class="sbros-btn">Сбросить<i class="fa fa-times"></i></a>
        </div>


<?php ActiveForm::end(); ?>

