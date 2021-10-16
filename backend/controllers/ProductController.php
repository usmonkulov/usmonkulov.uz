<?php

namespace backend\controllers;

use Yii;
use backend\models\Product;
use backend\models\search\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use rico\yii2images\models\Image;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post())) {

            $model->save();
            $model->images = UploadedFile::getInstances($model, 'images');

            if($model->images)
            {
                $model->uploadGallery();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'property' => $property,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->images = UploadedFile::getInstances($model, 'images');

            if($model->images)
            {
                $model->uploadGallery();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

      /**
     * @param $id
     * @param null $img
     * @return string
     * Удаление фотографий из редоктирования
     */
    public function actionDelImg($id, $img = null){

        $model = Product::findOne($id);
        //$image = Image::findOne($img);



        if ( $img !== null && ($image = Image::findOne($img)) !== null) {

            //return CustomController::printr($image);
            //exit;

            $model->removeImage( $image );
        }
        if (!$im = Image::find()->where(['itemId' => $id])->all())
        {
            return 'ok';
        }
        /**
         * Устанавливаем главную картинку если мы ее удалили
         */

        foreach ($model->getImages() as $imeges)
        {
            $model->setMainImage($imeges);
            break;
        }

        return 'ok';
    }

     /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        //Удаляем картинки
        foreach ($model->getImages() as $imeges)
        {
            $model->removeImage($imeges);
        }

        $model->delete();

        return $this->redirect(['index']);

    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('yii', 'The requested page does not exist.'));
    }

    public function actionActivate($id){
        $activ = Category::findOne($id);
        $activ->status = ($activ->status=='0') ? '1' : '0';
        $activ->save();
        return $this->redirect('index');
    }

    public function actionActive($id){
        $activ = $this->findModel($id);
        $activ->status = ($activ->status=='0') ? '1' : '0';
        $activ->save();
        return $this->redirect(['view', 'id' => $activ->id]);
    }
}
