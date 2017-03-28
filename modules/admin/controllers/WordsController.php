<?php

namespace app\modules\admin\controllers;

use app\models\ImageUpload;
use Yii;
use app\models\Words;
use app\models\WordsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * WordsController implements the CRUD actions for Words model.
 */
class WordsController extends Controller
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
     * Lists all Words models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WordsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Words model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Words model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Words();
        $uploadim = new ImageUpload();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $word = $this->findModel($model->id);
            $file = UploadedFile::getInstance($uploadim, 'image');
            $word->saveImage($uploadim->upload($file, $word->image));

            return $this->redirect(['view', 'id' => $model->id]);

        } else {
            return $this->render('create', [
                'model' => $model,
                'uploadim' => $uploadim,
            ]);
        }
    }

    /**
     * Updates an existing Words model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $imageUploadModel = new ImageUpload();
            $file = UploadedFile::getInstance($imageUploadModel, 'image');
            $model->saveImage($imageUploadModel->upload($file, $model->image));

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Words model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($model->image);

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Words model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Words the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Words::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
