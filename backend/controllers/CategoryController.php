<?php

namespace backend\controllers;

use Yii;
use backend\models\Category;
use backend\models\search\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post())) {

            $model -> url = CategoryController::translit($model->name);

            $model->save();

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

        if ($model->load(Yii::$app->request->post())) {

            $model -> url = CategoryController::translit($model->name);

            $model->save();

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

     public static function translit($name)
    
    { //$name=strtolower($name);
        $name = mb_strtolower($name, 'utf-8');
        $name=trim($name);
        $name=str_replace("а", "a", $name);
        $name=str_replace("б", "b", $name);
        $name=str_replace("в", "v", $name);
        $name=str_replace("г", "g", $name);
        $name=str_replace("д", "d", $name);
        $name=str_replace("е", "e", $name);
        $name=str_replace("ё", "e", $name);
        $name=str_replace("ж", "zh", $name);
        $name=str_replace("з", "z", $name);
        $name=str_replace("и", "i", $name);
        $name=str_replace("й", "j", $name);
        $name=str_replace("к", "k", $name);
        $name=str_replace("л", "l", $name);
        $name=str_replace("м", "m", $name);
        $name=str_replace("н", "n", $name);
        $name=str_replace("о", "o", $name);
        $name=str_replace("п", "p", $name);
        $name=str_replace("р", "r", $name);
        $name=str_replace("с", "s", $name);
        $name=str_replace("т", "t", $name);
        $name=str_replace("у", "u", $name);
        $name=str_replace("ф", "f", $name);
        $name=str_replace("х", "h", $name);
        $name=str_replace("ц", "c", $name);
        $name=str_replace("ч", "ch", $name);
        $name=str_replace("ш", "sch", $name);
        $name=str_replace("щ", "sh", $name);
        $name=str_replace("ъ", "j", $name);
        $name=str_replace("ы", "y", $name);
        $name=str_replace("ь", "", $name);
        $name=str_replace("э", "e", $name);
        $name=str_replace("ю", "yu", $name);
        $name=str_replace("я", "ya", $name);
        $name=str_replace(" ", "-", $name);
        $name=str_replace("_", "-", $name);
        return $name;
    }

    protected function setMeta ($title = null, $description = null, $keywords = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $keywords]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => $description]);
    }
}
