<?php
/**
 * Created by PhpStorm.
 * User: ilyamikhalev
 * Date: 29.03.2018
 * Time: 7:56
 */

namespace app\widgets;
use app\controllers\CustomController;
use app\models\DopParamsProduct;
use yii\base\Widget;
use app\modules\admin\models\Product;
use app\modules\admin\models\Property;
use app\modules\admin\models\PropertyValues;
use app\modules\admin\models\ValueProducr;
use app\models\Category;

class DopParamsProd extends Widget
{

    public $url; // роут с категорией продукта


    public function init()
    {
        parent::init();
    }

    public function run()
    {

        $categoryId = $this->url[1]['id'];

        // Если выбрана родительская категория
        $category = Category::findOne(['id' => $categoryId]);

        $ids = [];

        if ($category->parentId == 0){
            foreach ($category->children as $idChildren){
                $ids[] = $idChildren->id;
            }
        }else {
            //$ids[] = end($id);
            $ids[] = $categoryId;
        }

        // Минимальная цена продукта
        $min_price = Product::find()->where(['categoryId' => $ids])->min('price');

        //Максимальная цена продукта
        $max_price = Product::find()->where(['categoryId' => $ids])->max('price');

        // Вытаскиваем все свойства
        $propertyVal = PropertyValues::find()->all();


        // Модель для выборки
        $model = new DopParamsProduct();

        // Разбираем url

        unset($this->url[0]);
        $arrayParams = array();
        foreach ($this->url[1] as $key => $value){
            if($key == 'DopParamsProduct')
            {
                $arrayParams = $value;
            }
        }

        // Наполняем модель из разобраного url
        foreach ($arrayParams as $key => $value){
            if($key == 'propertyValue'){
                $model->propertyValue = $value;
            }
            else if($key == 'range'){
                $model->range = $value;
            }
            else if ($key == 'hid'){
                $model->sort = $value;
                $model->hid = $value;
            }
        }

        //CustomController::printr($model->propertyValue);


        return $this->render('dopParamsValue', [
            'url' => $this->url,
            'propertyVal' => $propertyVal,
            'min_price' => $min_price,
            'max_price' => $max_price,
            'model' => $model,
            'categoryId' => $categoryId
        ]);
    }
}