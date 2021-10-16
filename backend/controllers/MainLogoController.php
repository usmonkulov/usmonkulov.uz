<?php

namespace backend\controllers;

use Yii;
use backend\models\MainLogo;
use backend\models\search\MainLogoSearch;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use rico\yii2images\models\Image;

/**
 * MainLogoController implements the CRUD actions for MainLogo model.
 */
class MainLogoController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all MainLogo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MainLogoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MainLogo model.
     * @param integer $id
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
     * Creates a new MainLogo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MainLogo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->images = UploadedFile::getInstance($model, 'images');
            if( $model->images ){
                $model->upload();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MainLogo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->images = UploadedFile::getInstance($model, 'images');
            if( $model->images ){
                $model->upload();
            }
            unset($model->images);

            $isMain = Image::find()->where(['isMain' => 0])->all();
            foreach ($isMain as $clear)
            {
                $model->removeImage($clear);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MainLogo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $image = $model->getImage();
        $model->removeImage($image);
        FileHelper::removeDirectory('upload/store/'.$image[modelName].'s/'.$image[modelName].$image[itemId]);
        $model->delete();

        return $this->redirect(['index']);

    }


    /**
     * Finds the MainLogo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MainLogo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MainLogo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('yii', 'The requested page does not exist.'));
    }

    public function actionActivate($id){
        $activ = MainLogo::findOne($id);
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
