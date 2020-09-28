<?php

namespace frontend\controllers;
use Yii;
use frontend\models\OrderSystem;
use frontend\models\UploadForm;
use frontend\models\Roles;
use common\models\User;
use common\models\Users;
use common\models\UserRoleMapping;
use frontend\models\UserRoles;
use frontend\models\ApplicationForwardLevel;
use frontend\models\ConstituencyDetails;
use frontend\models\ProcessFlow;
use frontend\models\Purpose;
use frontend\models\ApplicationDocument;
use frontend\models\ResetPasswordForm;
use yii\web\UploadedFile;


class UserController extends \yii\web\Controller
{
    public function actionProfile()
    {
    	$model= User::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->one();
        $modelRole= UserRoleMapping::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->one();
    	if ($model->load(Yii::$app->request->post())) { 
                 $model->is_password_updated = 'Y';   
                 $model->is_profile_updated = 'Y';   
                if($model->validate() && $model->save()){
                    return $this->redirect(['user/index']);
                // $modelRole->load(Yii::$app->request->post()) ;
                // if($modelRole->charge=='Additional'){                    
                //     $modelRole= new UserRoleMapping () ;
                //     $modelRole->load(Yii::$app->request->post());
                //     }
                //  $modelRole->user_id  = Yii::$app->user->identity->user_id ;                     
                // if($modelRole->validate() && $modelRole->save()){                     
                // Yii::$app->getSession()->setFlash('Alert', 'Profile Updated.'); 
                // return $this->redirect(['user/index']);
                // } else {
                //      print_r($modelRole->errors); die;
                // } 

            }else { 

                
                    return $this->render('profile',[
                    'model'=>$model,
                    'modelRole'=>$modelRole,
                    ]);
            }   

    	}

        return $this->render('profile',[
        	 'model'=>$model,
             'modelRole'=>$modelRole,
        	]);
    }

    public function actionTransfer()
    {
        $model= User::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->one();
        $modelRole= UserRoleMapping::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->all(); 
         

        return $this->render('tr-detail',[
            'model'=>$model,
             'modelRole'=>$modelRole,
            ]);
    }

    public function actionTransferform()
    {
        $model= User::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->one();

        $modelRole= UserRoleMapping::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->one(); 
        $allRoles= UserRoleMapping::find()->where(['primary_user_id'=>Yii::$app->user->identity->user_id])->all();
        if(empty($modelRole) ){
        $modelRole= new UserRoleMapping () ;
        } 
        $user = new Users();  
        if($modelRole->load(Yii::$app->request->post())) 
        {
             if($modelRole->charge=='Additional'){   
                    $user->user_name =Yii::$app->request->post('Users')['email_id'] ; 
                    $user->user_full_name =$model->user_full_name ;
                    $user->email_id = Yii::$app->request->post('Users')['email_id'] ;
                    $user->password = $model->password ;
                    $user->auth_key =  $model->auth_key ;
                    $user->district_id =6  ;
                    $user->mobile_number = $model->mobile_number  ;
                    $user->is_active = 'Y';
                    $user->is_deleted = 'N' ;
                    $user->is_password_updated = 'N';
                    $user->office_location = '-';
                    $user->aadhar = $model->aadhar ;
                    if($user->validate() && $user->save()){
                    $modelRole= new UserRoleMapping () ;
                    $modelRole->load(Yii::$app->request->post()); 
                    $modelRole->user_id  = $user->user_id ;
                    } else {
                       return $this->render('transfer',[
                                 'model'=>$model,
                                 'user'=>$user,
                                 'modelRole'=>$modelRole,
                                 'allRoles'=>$allRoles,
                                ]);
                     }
                 }
                $modelRole->primary_user_id = Yii::$app->user->identity->user_id ;                      
                if($modelRole->validate() && $modelRole->save()){                     
                Yii::$app->getSession()->setFlash('success', 'TR-1 Form Updated Updated.'); 
                return $this->redirect(['user/transferform']);
                } else {
                    return $this->render('transfer',[
                         'model'=>$model,   
                         'user'=>$user,
                         'modelRole'=>$modelRole,
                         'allRoles'=>$allRoles,
                        ]);
                }  
                return $this->render('transfer',[
                     'model'=>$model,
                     'user'=>$user,
                     'modelRole'=>$modelRole,
                     'allRoles'=>$allRoles,
                    ]);

        } else {

            return $this->render('transfer',[
                     'model'=>$model,
                     'user'=>$user,
                     'modelRole'=>$modelRole,
                     'allRoles'=>$allRoles,
                    ]);
        }
               
    }


    public function actionIndex()
    {

        $modelRole= UserRoleMapping::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->one(); 
        if( $modelRole->role_id==3){
          return $this->redirect(['users/index']);  
        }

        $userCheckFirst = User::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->one();
        if( $userCheckFirst->is_password_updated=='N'){
            Yii::$app->session->setFlash('danger', 'Please Change your password First');
            return $this->redirect(['user/change-password']);

        }

        if( $userCheckFirst->is_profile_updated=='N'){
            Yii::$app->session->setFlash('danger', 'Please Update Your profile First');
            return $this->redirect(['user/profile']);

        }
         
        $session = Yii::$app->getSession();
        // echo "<pre>";print_r($_SESSION);die;
        // echo $session->get('role_id'); die;
        $select_role = 0; 
        if($session['role_id']=='') {
            if($modelRole->primary_user_id != $modelRole->user_id ) {  
             $select_role = 0; 
            } else {
               $select_role = 1;  
            }
        }
        //$select_role = 1;
        
        $role = Roles::find()->where(['role_id'=>$modelRole->role_id])->one();
        // Yii::$app->session->setFlash('success', 'You Are Logged in as'.$role->role_name);
        return $this->render('dashboard',[
            'data'=>$modelRole,  
            'select_role'=>$select_role           
            ]);
    }

     public function actionRoleselect()
    {

        $modelRole= UserRoleMapping::find()->where(['user_id'=>Yii::$app->user->identity->user_id])->all(); 
         
        return $this->render('role-select',[
            'data'=>$modelRole,             
            ]);
    }

     public function actionRoleselected($id)
    {
        $session = Yii::$app->getSession();
        $session->set('role_id',$id); 
        $_SESSION['role_id'] = $id ;
        echo "<pre>";print_r($_SESSION);die;
        $role = Roles::find()->where(['role_id'=>$id])->one();
        Yii::$app->session->setFlash('success', 'You Are Logged in as'.$role->role_name);
        
        return $this->redirect(['user/index']);

    }

    public function actionChangePassword()
    {
        try {
            $model = new ResetPasswordForm();
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) ) { 
            $user  = User::find()->where(['user_id'=>Yii::$app->user->identity->id,'password'=>$model->old_password])->one();

            if(!empty($user)){

                $user->password = $model->password;
                $user->updated_at =  date('Y-m-d h:i:s');  
                $user->is_password_updated = 'Y';   
                $user->save(false);
                Yii::$app->session->setFlash('success', 'Password Change successfully');
        
                return $this->redirect(['user/index']);

            } else {
                $model->old_password = '';
                $model->password = '';
                $model->password_repeat = '';
                Yii::$app->session->setFlash('alert', 'Old Password is Incorrect');
            }
          }  

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

     public function actionlist()
    {
        $data= User::find()->all();
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) { 

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
            } 
        }

        return $this->render('list',[
            'model'=>$model, 
            ]);
    }

    public function actionChargeDelete($id)
    {
        $modelRole= UserRoleMapping::deleteAll(['map_id'=>$id]); 
        return $this->redirect(['user/transferform']);
    }

    public function actionTr($id)
    { 
     
    }

      

    public function actionGetApplicantSearch($name) { 

        $rows = OrderSystem::find()->with(['request','user'])->andWhere(['like', 'lower(applicant_name)',strtolower($name)])->all(); 
        if(isset($rows)) {
            if(count($rows)>0){
                foreach($rows as $row){

                    echo "<a onClick=selectapplication($row->id,'$row->applicant_name'); href='#'>Name : $row->applicant_name, Mobile : $row->mobile_number, Type of Request : "; echo $row->request->name ;"</a></div>";
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
 

}
