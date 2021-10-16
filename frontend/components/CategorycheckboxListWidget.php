<?php

namespace frontend\components;
use frontend\models\search\ProductSearch;
use yii\base\Widget;
use Yii;

class CategorycheckboxListWidget extends Widget{

	public function run(){

        $searchModel = new ProductSearch();

        return $this->render('categoryCheckboxList', compact('searchModel'));
	}
}