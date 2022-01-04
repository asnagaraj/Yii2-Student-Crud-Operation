<?php

namespace frontend\controllers;

use Yii;
use common\models\StateList;
use common\models\DistrictList;
use common\models\StudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\State;
use common\models\District;
use common\models\Student;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
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
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Student model.
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
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Student();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
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
     * Deletes an existing Student model.
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
    public function actionState() {
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
     
       if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $count_id = $parents[0];
               
                $out = Student::getStateList($count_id); 
                // the getStateList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                if(!$out)
                {
                    return ['output'=>'', 'selected'=>''];
                }
                $st=[];
                foreach($out as $name  ){
                    $st[]=['id'=>$name['id'],'name'=>$name['state_name']];

                }
              
                return ['output'=>$st, 'selected'=>''];
            }
        }
       
     }
     public function actionDistrict() {
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
     
       if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $dist_id = $parents[0];
               
                $out = Student::getDistrictList($dist_id); 
                // the getStateList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                if(!$out)
                {
                    return ['output'=>'', 'selected'=>''];
                }
                $st=[];
                foreach($out as $name  ){
                    $st[]=['id'=>$name['id'],'name'=>$name['district_name']];

                }
              
                return ['output'=>$st, 'selected'=>''];
            }
        }
       
     }
     public function actionTaluk() {
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
     
       if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $tuk_id = $parents[0];
               
                $out = Student::getTalukList($tuk_id); 
                // the getStateList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                if(!$out)
                {
                    return ['output'=>'', 'selected'=>''];
                }
                $st=[];
                
                foreach($out as $name  ){
                    $st[]=['id'=>$name['id'],'name'=>$name['taluk_name']];

                }
              
                return ['output'=>$st, 'selected'=>''];
            }
        }
       
     }

    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
