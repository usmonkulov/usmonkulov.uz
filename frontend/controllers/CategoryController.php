<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Category;
use yii\web\NotFoundHttpException;
use frontend\models\Product;
use yii\data\Pagination;

class CategoryController extends AppController
{

    public function actionIndex()
    {
        $categorys = Category::find()->where(['status' => '1'])->limit(4)->orderBy(['id' => SORT_DESC])->all();
        $news = Product::find()->where(['new'=> '1','status' => '1'])->limit(6)->orderBy(['id' => SORT_DESC])->all();
        $tops = Product::find()->where(['new'=> '1','status' => '1'])->limit(6)->orderBy(['id' => SORT_DESC])->all(); 
        return $this->render('index', compact('categorys','news','tops'));
    }

    public function actionView()
    {
        $id = Yii::$app->request->get('id');

        $categorys = Category::findOne(['id' => $id]);
        if(empty($categorys->status))
          throw new \yii\web\HttpException(404, Yii::t('yii','Bunday bo‘lim mavjud emas'));

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' =>3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta($categorys->name);
        return $this->render('view', compact('categorys','products', 'pages'));
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSearch()
    {
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta($q);
        if(!$q)
            return $this->render('search');
        $query = Product::find()->orderBy(['id' => SORT_DESC])->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' =>15, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('search', compact('pages','products','q'));
    }
}
