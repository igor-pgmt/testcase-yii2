<?php

namespace app\controllers;

use Yii;
use app\models\Rates;
use app\models\Products;
use app\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\httpclient\Client;
use yii\helpers\ArrayHelper;

/**
* ProductsController implements the CRUD actions for Products model.
*/
class ProductsController extends Controller
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
    * Lists all Products models.
    * @return mixed
    */
    public function actionIndex()
    {
    $searchModel = new ProductsSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
    return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
    }
    
    /**
    * Displays a single Products model.
    * @param integer $_id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
    public function actionView($appid)
    {
        $model=$this->findModelByAppid($appid);
        
        // Запрос к Endpoint на предоставление информации о товаре
        $client = new Client();
        $product = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('http://localhost:8080')
            ->setData(['appid' => $model->appid])
            ->send();
        
        // Получение курсов валют
        $rates = Rates::find()->select(['ask', 'pair'])->asArray()->all();
        $ratesArr = ArrayHelper::map($rates, 'pair', 'ask');
        
        return $this->render('view', [
            'model' => $model,
            'product'=>$product,
            'rates'=>$ratesArr,
        ]);
    }
        
    /**
    * Creates a new Products model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    * @return mixed
    */
    public function actionCreate()
    {
    $model = new Products();
    
    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        return $this->redirect(['view', 'id' => (string)$model->_id]);
    }
    
    return $this->render('create', [
        'model' => $model,
        ]);
    }
    
    /**
    * Updates an existing Products model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $_id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        return $this->redirect(['view', 'id' => (string)$model->_id]);
        }
        
        return $this->render('update', [
            'model' => $model,
        ]);
    }
        
    /**
    * Deletes an existing Products model.
    * If deletion is successful, the browser will be redirected to the 'index' page.
    * @param integer $_id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        
        return $this->redirect(['index']);
    }
    
    /**
    * Finds the Products model based on its primary key value.
    * If the model is not found, a 404 HTTP exception will be thrown.
    * @param integer $_id
    * @return Products the loaded model
    * @throws NotFoundHttpException if the model cannot be found
    */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }
    
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    /**
    * Finds the Products model based on its application ID value.
    * If the model is not found, a 404 HTTP exception will be thrown.
    * @param integer $_id
    * @return Products the loaded model
    * @throws NotFoundHttpException if the model cannot be found
    */
    protected function findModelByAppid($appid)
    {
        if (($model =Products::find()->Where(['appid' =>  (int)$appid])->One()) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
        