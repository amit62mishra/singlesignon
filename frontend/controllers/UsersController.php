<?php

namespace frontend\controllers;

use Yii;
use common\models\Users;
use common\models\UserRoleMapping;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;


/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        // 'actions' => ['getinstitutelist','index','view','create','createauthuser','delete','update','applicant'],
                        'actions' => ['index','create'],
                        'allow' =>  ['@'],
                    ],
                    [
                        // 'actions' => ['getinstitutelist','index','view','create','createauthuser','delete','update','applicant'],
                        'actions' => ['update','view'],
                        'allow' =>  !Yii::$app->user->isGuest,
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    if (Yii::$app->user->isGuest) {
                        return $action->controller->redirect(['/site/login']);
                    }
                    throw new ForbiddenHttpException("Forbidden access");
                }
            ],

        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Users::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
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
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();
        // echo "<pre>";print_r(Yii::$app->request->post());die;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //$model->password='7c4a8d09ca3762af61e59520943dc26494f8941b';
           $token =  sha1($model->email_id).uniqid(); 
            $model->auth_key='Lgb3NC71OPLt4lQWy6CQ96XjOBzT-B4M';
            $model->token=$token;
            $model->is_profile_updated = 'N';
            $model->save();

            
            $transaction = Yii::$app->db->beginTransaction();
            try{
                if($model->save()){
                    $roleModel=new UserRoleMapping;
                    $roleModel->user_id=$model->user_id;
                    $roleModel->department_id=9;
                    $roleModel->primary_user_id = $model->user_id;
                    $roleModel->notification_no='-';
                    $roleModel->time_of_joining='-';
                    $roleModel->date_of_joining='-';
                    $roleModel->charge='Full';
                    $roleModel->role_id=Yii::$app->request->post('Users')['role_id'];
                    if($roleModel->save()){

                       $transaction->commit();
                       return $this->redirect(['view', 'id' => $model->user_id]); 
                    }
                      
                } else {

                }
            }
            catch (Exception $e){
                
              $transaction->rollBack();
            }
           
        }
                // echo "<pre>";print_r($model->geterrors());die;

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $id=base64_decode($id);
        $model = $this->findModel($id);

         if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->password='$2y$13$718x3f03YzOiulsBVmOS7uUy3I2vK9hwgvi0Mboqg1kldt0sszy/6';
            $model->auth_key='Lgb3NC71OPLt4lQWy6CQ96XjOBzT-B4M';

            $model->save();

            
            $transaction = Yii::$app->db->beginTransaction();
            try{
                if($model->save()){
                    $roleModel=UserRoleMapping::find()->where(["user_id"=>$id])->andWhere(["is_active"=>'Y'])->andWhere(["is_deleted"=>"N"])->one();
                    $roleModel->user_id=$model->user_id;
                    $roleModel->department_id=9;
                    $roleModel->notification_no='-';
                    $roleModel->time_of_joining='-';
                    $roleModel->date_of_joining='-';
                    $roleModel->charge='Full';
                    $roleModel->role_id=Yii::$app->request->post('Users')['role_id'];
                    if($roleModel->save()){

                       $transaction->commit();
                       return $this->redirect(['view', 'id' => $model->user_id]); 
                    }
                      
                } else {

                }
            }
            catch (Exception $e){
                
              $transaction->rollBack();
            }
           
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Users model.
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
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
