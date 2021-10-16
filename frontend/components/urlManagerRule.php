<?php

namespace frontend\components;

use frontend\models\Category;
use yii\web\UrlRuleInterface;
use yii\base\BaseObject;

class urlManagerRule extends BaseObject implements UrlRuleInterface
{


    //Формирует ссылки в заданном виде
    public function createUrl($manager, $route, $params)
    {
        if ($route === 'category/view')
        {
           $model = Category::find()->where(['id' => $params['id']])->one();

           if($model->id){
               $url = 'category/' . $model->url;
           }

           if(count($params ) > 1)
           {
               foreach ($params as $key => $value)
               {
                   if($key != 'id'){
                       $url = $url . '?' . $key . '=' . $value;
                   }
               }
           }

           return $url;

        }

        return false;
    }

    //Разбирает входящий URL запрос, преобразует ссылки произвольного вида  в нужный для Yii2
    public function parseRequest($manager, $request)
    {
        $pathInfo = $request->getPathInfo();


        $urls = explode("/", $pathInfo);



        $params = $request->absoluteUrl;

        $param = explode("?", $params);


        unset($param[0]);



        if ($urls[0] == 'category')
        {
                unset($urls[0]);

                $id = [];

                if (count($urls) > 1) {
                    $cat = Category::find()->where(['url' => reset($urls)])->one();
                    $model = Category::find()->where(['id' => $cat->id])->asArray()->one();
                } else {
                    $model = Category::find()->where(['url' => $urls])->asArray()->one();
                }

                $id['id'][] = $model['id'];


            $params = array();
            if(isset($param)){
                $temp = explode('&',$param[1]);
                foreach($temp as $t){
                    $t = explode('=', $t);
                    $params[$t[0]] = $t[1];
                }
            }

                return ['category/view' , $id, $params];
        }

        return false;


    }
}
