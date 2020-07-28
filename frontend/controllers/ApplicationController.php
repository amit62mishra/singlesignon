<?php

namespace frontend\controllers;
use Yii;
use frontend\models\OrderSystem;
use frontend\models\UploadForm;
use frontend\models\Roles;
use frontend\models\User;
use frontend\models\UserRoles;
use frontend\models\ApplicationForwardLevel;
use frontend\models\ConstituencyDetails;
use frontend\models\ProcessFlow;
use yii\web\UploadedFile;


class ApplicationController extends \yii\web\Controller
{
    public function actionForm()
    {
    	$model= new OrderSystem();

    	if ($model->load(Yii::$app->request->post())) {

             //echo "test"; die;
    		 if(isset($_FILES['OrderSystem']['tmp_name']['document']) && !empty($_FILES['OrderSystem']['tmp_name']['document'])){
               $path=Yii::$app->basePath."/uploads/order_system";
               if(!file_exists($path))
                  mkdir($path,0777,true);

                $extention=explode('.', $_FILES['OrderSystem']['name']['document']);
                $fileName=hash_hmac("sha1",$_FILES['OrderSystem']['tmp_name']['document'].time(), "FILE_UPLOAD@908").".".end($extention); 
                $path.="/".$fileName;
                if(!move_uploaded_file($_FILES['OrderSystem']['tmp_name']['document'], $path)){
                     $model->addError('document', 'Could not upload file please try again.');
                    return $this->render('form', [
                        'model' => $model,
                    ]); 
                }
                $model->user_id = Yii::$app->user->identity->user_id;
                $model->document= Yii::$app->basePath.'/uploads/order_system/'.$fileName;
            }

            if( $model->save(false)){
                $SubmisionStep = ProcessFlow::find()->where(['history_label'=>'Application submited'])->one();
                $data = ApplicationForwardLevel::ProcessApplication($model->id,$SubmisionStep->to_role_id,0,'P','');
            }
           
           Yii::$app->getSession()->setFlash('Alert', 'Your Application has been submitted.'); 
        return $this->redirect(['application/index']);


    	}

        return $this->render('form',[
        	'model'=>$model,
        	]);
    }

     public function actionIndex()
    {
        

        $checkRole = UserRoles::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->one();
        if($checkRole->role_id==1){
            $all= OrderSystem::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->all();
        $subQuery = ApplicationForwardLevel::find()->select('application_id')->where(['next_role_id'=>$checkRole->role_id])->andwhere(['IS', 'comment', null]);
            $query = OrderSystem::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->andwhere(['in', 'id', $subQuery]);
            $pending = $query->all();    
        } else {

            $subQuery = ApplicationForwardLevel::find()->select('application_id')->where(['next_role_id'=>$checkRole->role_id])->andwhere(['IS', 'comment', null]);
            $query = OrderSystem::find()->where(['in', 'id', $subQuery]);
            $pending = $query->all(); 

             $subQuery = ApplicationForwardLevel::find()->select('application_id')->where(['next_role_id'=>$checkRole->role_id])->andwhere(['IS NOT', 'comment', null]);
            $query = OrderSystem::find()->where(['in', 'id', $subQuery]);
            $all = $query->all();
        }
          
        return $this->render('index',[
            'pendingWithYou'=>$pending,
            'all'=>$all,
            ]);
    }

    public function actionView($id)
    {
        $model= OrderSystem::find()->where(['id'=>$id])->one();
        $forwardLevel = new ApplicationForwardLevel();
        $checkRole = UserRoles::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->one();
        $checkWithMe = ApplicationForwardLevel::find()->where(['next_role_id'=>$checkRole->role_id,'application_id'=>$id])->andwhere(['IS', 'comment', null])->one();
        $history  =ApplicationForwardLevel::find()->with(['roleName'])->where(['application_id'=>$id])->all();
       // print_r($history); die;    

        if (Yii::$app->request->post()){
            $user_id=Yii::$app->user->identity->user_id;
            $currentRole = UserRoles::getRoleByUserId($user_id);

            $nextStep = ProcessFlow::find()->where(['from_role_id'=>$currentRole->role_id])->one();
            $currentStep = ApplicationForwardLevel::find()->where(['application_id'=>$id])->andwhere(['IS', 'comment', null])->one();
            $comment = Yii::$app->request->post('ApplicationForwardLevel')['comment'] ; 
            // echo"<pre>";
            // echo (Yii::$app->request->post('ApplicationForwardLevel')['comment']); die; 
            $data = ApplicationForwardLevel::ProcessApplication($id,$nextStep->to_role_id,$currentStep->id,'P',$comment);

        Yii::$app->getSession()->setFlash('Alert', 'Application has been Forwarded.'); 
        return $this->redirect(['application/index']);    

        }


         
        return $this->render('view',[
            'forwardLevel'=>$forwardLevel,
            'model'=>$model,
            'checkWithMe'=> $checkWithMe,
            'history'=>$history
            ]);
    }

     

    public function actionConstituencyFrom($id) { 

        $rows = ConstituencyDetails::find()->where(['district_id'=>$id,'type'=>'From'])
                        ->all();
 
        echo "<option>Select</option>";
        
        if(isset($rows)) {
            if(count($rows)>0){
                foreach($rows as $row){
                    echo "<option value='$row->id'>$row->name</option>";
                }
            }
            else{
                echo "<option>No Data Available</option>";
            }
        }
   
 
    }

    public function actionConstituencyTo($id) { 

        $rows = ConstituencyDetails::find()->where(['district_id'=>$id,'type'=>'To'])
                        ->all();
 
        echo "<option>Select</option>";
        
        if(isset($rows)) {
            if(count($rows)>0){
                foreach($rows as $row){
                    echo "<option value='$row->id'>$row->name</option>";
                }
            }
            else{
                echo "<option>No Data Available</option>";
            }
        }
   
 
    }

}
