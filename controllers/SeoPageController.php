<?php
namespace noIT\seo\controllers;

use Yii;
use noIT\seo\models\SeoPage;
use noIT\seo\models\search\SeoPageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SeoPageController implements the CRUD actions for SeoPage model.
 */
class SeoPageController extends Controller
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

    public function actions() {
	    return [
		    'image-upload' => [
			    'class' => 'vova07\imperavi\actions\UploadFileAction',
			    'url' => Yii::getAlias('@cdnUrl/seo-page'),
			    'path' => Yii::getAlias('@cdn/seo-page'),
			    'unique' => false,
			    'translit' => true,
		    ],
		    'images-get' => [
			    'class' => 'vova07\imperavi\actions\GetImagesAction',
			    'url' => Yii::getAlias('@cdnUrl/seo-page'),
			    'path' => Yii::getAlias('@cdn/seo-page'),
			    'options' => ['only' => ['*.jpg', '*.jpeg', '*.png', '*.gif']],
		    ],
		    'file-delete' => [
			    'class' => 'vova07\imperavi\actions\DeleteFileAction',
			    'url' => Yii::getAlias('@cdnUrl/seo-page'),
			    'path' => Yii::getAlias('@cdn/seo-page'),
		    ],
	    ];
    }

	/**
     * Lists all SeoPage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SeoPageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new SeoPage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SeoPage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SeoPage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SeoPage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SeoPage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SeoPage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SeoPage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
