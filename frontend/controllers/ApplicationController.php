<?php

namespace frontend\controllers;
use Yii;
use frontend\models\OrderSystem;
use frontend\models\UploadForm;
use frontend\models\Roles;
use common\models\User;
use frontend\models\UserRoles;
use frontend\models\ApplicationForwardLevel;
use frontend\models\ConstituencyDetails;
use frontend\models\ProcessFlow;
use frontend\models\Purpose;
use frontend\models\ApplicationDocument;
use yii\web\UploadedFile;


class ApplicationController extends \yii\web\Controller
{
    public function actionForm()
    {
    	$model= new OrderSystem();
         $all= OrderSystem::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->all();
        $remaining = (Yii::$app->user->identity->total_application) - count($all); 
         if($remaining < 1 ){
            Yii::$app->getSession()->setFlash('Alert', 'You can not apply!.'); 
        return $this->redirect(['application/index']);
         }
    	if ($model->load(Yii::$app->request->post())) { 
              
                $model->user_id = Yii::$app->user->identity->user_id;  
                $model->type_of_request = $model->type_of_request;   

            if($model->validate() && $model->save()){
                 
                foreach ($_POST['doc_path'] as $key => $path) { 
                $document =  new ApplicationDocument();

                $document->application_id = $model->id; 

                $document->name = $_POST['doc_name'][$key]; 

                $document->document = $path;   
     
                $document->save();
                } 


                $SubmisionStep = ProcessFlow::find()->where(['history_label'=>'Application submited'])->one();
                $data = ApplicationForwardLevel::ProcessApplication($model->id,$SubmisionStep->to_role_id,0,'P','');
            } else {

                //print_r($model->errors); die;
                    return $this->render('form',[
                    'model'=>$model,
                    ]);
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
            $all= OrderSystem::find()->with(['request','purpose','received'])->where(['user_id'=>Yii::$app->user->identity->user_id])->all();
        $subQuery = ApplicationForwardLevel::find()->select('application_id')->where(['next_role_id'=>$checkRole->role_id])->andwhere(['IS', 'comment', null]);
            $query = OrderSystem::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->andwhere(['in', 'id', $subQuery]);
            $pending = $query->all();    
        } else {

            $subQuery = ApplicationForwardLevel::find()->select('application_id')->where(['next_role_id'=>$checkRole->role_id])->andwhere(['IS', 'comment', null]);
            $query = OrderSystem::find()->where(['in', 'id', $subQuery]);
            $pending = $query->all(); 

             $subQuery = ApplicationForwardLevel::find()->select('application_id')->where(['next_role_id'=>$checkRole->role_id])->andwhere(['IS NOT', 'comment', null]);
            $query = OrderSystem::find()->with(['request','purpose','received'])->where(['in', 'id', $subQuery]);
            $all = $query->all();
        }

        //print_r($all); die;
          
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

        $rows = ConstituencyDetails::find()->where(['type_of_request'=>$id,'type'=>'From'])
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

        $rows = ConstituencyDetails::find()->where(['type_of_request'=>$id,'type'=>'To'])
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

    public function actionGetPurpose($id) { 

        $rows = Purpose::find()->where(['type_of_request'=>$id])
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

    public function actionGetApplicantSearch($name) { 

        $rows = OrderSystem::find()->with(['request','user'])->andWhere(['like', 'lower(applicant_name)',strtolower($name)])->all(); 
        if(isset($rows)) {
            if(count($rows)>0){
                foreach($rows as $row){
                    echo "<div class='suggest-element'><a onClick='selectApplication($row->id);'>$row->applicant_name</a></div>";
                }
            } 
        }

        
   
 
    }

     public function actionGetApplicant($id) { 

        $rows = OrderSystem::find()->with(['request','user'])->andWhere(['id'=>$id])->all();
        if(count($rows) > 0){
            return $data =  $this->renderPartial('search_data',[ 
            'model'=>$rows, 
            ]);  
        } else {
            echo "No Data Found";
        }

        
   
 
    }

     public function actionAjaxupload() { 
          
          $allowed = array('pdf');
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                return  $data =  json_encode(['msg'=>"Only pdf allowed",'status'=>400]); 
            }

         $docName = 'App'. time() . "_upload" . "_" . $_FILES['file']['name'];
                $ext = pathinfo($_FILES['file']['tmp_name'], PATHINFO_EXTENSION);
                move_uploaded_file($_FILES['file']['tmp_name'], Yii::$app->basePath . '/web/swcs/uploads/' . $docName); 
         $name  = $_POST['name'];       
         return  $data =  json_encode(['msg'=>"<tr >   
                                    <td>$name</td>
                                    <input type='hidden' name='doc_path[]' value=$docName class='form-control'>
                                    <input type='hidden' name='doc_name[]' value=$name class='form-control'>  
                                    <td><a href='swcs/uploads/$docName' target='_blank'>Click here </a>to view</td>  
                                </tr>",'status'=>200]); 

 
    }

    public function actionDownloadFile($id){
        $model= OrderSystem::find()->where(['id'=>$id])->one(); 
        $main_html =  $this->renderPartial('application-print',[ 
            'model'=>$model, 
            ]);
        file_put_contents("application.doc",$main_html);
        header('Content-Description: File Transfer');
        header("Content-type: application/msword; charset=utf-8");
        header("Content-Disposition: attachment;Filename=application.doc");
        readfile("application.doc");
        unlink("application.doc");
        die;
    }

}
