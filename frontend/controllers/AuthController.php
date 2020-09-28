<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\base\ErrorException; 
use frontend\models\Roles;
use common\models\User; 
use common\models\UserRoleMapping;
use frontend\models\UserRoles;



class AuthController extends \yii\rest\Controller
{

    private $rbacInfo=array();

    protected function verbs()
    {
        return [
            'getuser'=>['POST'],
            'loginpage'=>['POST'], 
        ];
    }



    public function beforeAction($event)
    {

        // Allow from any origin
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');    // cache for 1 day
        }

        // Access-Control headers are received during OPTIONS requests
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
            }

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
                header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
            }

            exit(0);
        }

        $this->enableCsrfValidation = false;
        if($event->actionMethod == 'actionChangepassword') {
            $headers = Yii::$app->request->headers;
            if(!$headers->has('token')) {
                    http_response_code(401);
                    $errorMsg="TOKEN_EXPIRED";
                    $token=Yii::$app->request->headers['token'];
                    $class=__FILE__;
                    $method=__FUNCTION__;
                    $model="SsoUserInformationService";
                    $message=" ERROR $errorMsg at line ".__LINE__;
                    //Yii::$app->utility->logError($class,$method,$model,$token,$message);
                    echo json_encode(array("error" => $errorMsg));
                    exit;
            } else {
                if( Yii::$app->utility->isValidToken(Yii::$app->request->headers['token']) == false) {
                    http_response_code(401);
                    $errorMsg="Unauthorized Access";
                    $token=Yii::$app->request->headers['token'];
                    $class=__FILE__;
                    $method=__FUNCTION__;
                    $model="SsoUserInformationService";
                    $message=" ERROR $errorMsg at line ".__LINE__;
                    //Yii::$app->utility->logError($class,$method,$model,$token,$message);
                    echo json_encode(array("error" => $errorMsg));
                    exit;;
                }
            }
        }

        $action = $event->id;
        if (isset($this->actions[$action])) {
            $verbs = $this->actions[$action];
        } elseif (isset($this->actions['*'])) {
            $verbs = $this->actions['*'];
        } else {
            return $event->isValid;
        }
        $verb = Yii::$app->getRequest()->getMethod();
        $allowed = array_map('strtoupper', $verbs);

        if (!in_array($verb, $allowed)) {
            http_response_code(401);
            $errorMsg="Method not allowed";
            $token=Yii::$app->request->headers['token'];
            $class=__FILE__;
            $method=__FUNCTION__;
            $model="SsoUserInformationService";
            $message=" ERROR $errorMsg at line ".__LINE__;
            //Yii::$app->utility->logError($class, $method, $model, $token, $message);
            echo json_encode(array("error" => $errorMsg));
            exit;
        }
        return true;
    }





    public function actionGetuser() {
         try{
            $params = $_POST;
            if (!isset($params) && empty($params)) {
                http_response_code(400);
                $errorMsg = "Bad request1";
                echo json_encode(array("error" => $errorMsg));
                exit;
            } else { 
                $result = "";
                if(isset($params['token'])){
                    $userDetail = User::find()->where(['token'=>$params['token'],'user_id'=>$params['user_id']])->asArray()->one();
                    
                    if(empty($userDetail)) {
                    http_response_code(400);
                    $errorMsg = "INVALID_KEY";
                    echo json_encode(array("error" => $errorMsg));
                    exit;
                    } else{
                    $msg = "success";
                    http_response_code(200);
                    echo json_encode(array("response" => $msg,'data'=>$userDetail));
                    exit;
                    }
                }
            }
        } catch (yii\db\Exception $e){
            $errorMsg = 'XXX0015 :: Caught exception: '. $e->getMessage();
            $token=Yii::$app->request->headers['token'];
            $class=__FILE__;
            $method=__FUNCTION__;
            $model="user";
            $message= $e->getMessage()." ERROR $errorMsg at line ".__LINE__;
            //Yii::$app->utility->logException($class,$method,$model,$token,$message);
            echo json_encode(array("error" => $errorMsg));
            exit;
        } catch (ErrorException $e) {
            $errorMsg="XXX0016 :: Invalid Method. Please try again";
            $token=Yii::$app->request->headers['token'];
            $class=__FILE__;
            $method=__FUNCTION__;
            $model="user";
            $message= $e->getMessage()." ERROR $errorMsg at line ".__LINE__;
           //Yii::$app->utility->logException($class,$method,$model,$token,$message);
            echo json_encode(array("error" => $errorMsg));
            exit;
        }
     }
  

   
 


	public function actionLoginpage(){
        try{
            $params = $_POST;
            if (!isset($params) && empty($params)) {
                http_response_code(400);
                $errorMsg = "Bad request1";
                echo json_encode(array("error" => $errorMsg));
                exit;
            } else { 
                $result = "";
                if(isset($params['user_uuid'])){
                    $service = new SsoUserInformationService();
                    $result = $service->GenerateResetKey($params['user_uuid'],$params['user_hkey'],$params['reset_key'],$params['base_url']);
                // die;
                    if($result === FALSE){
                    http_response_code(400);
                    $errorMsg = "INVALID_KEY";
                    echo json_encode(array("error" => $errorMsg));
                    exit;
                    } else{
                    $msg = "success";
                    http_response_code(200);
                    echo json_encode(array("response" => $msg));
                    exit;
                    }
                }
            }
        } catch (yii\db\Exception $e){
            $errorMsg = 'XXX0015 :: Caught exception: '. $e->getMessage();
            $token=Yii::$app->request->headers['token'];
            $class=__FILE__;
            $method=__FUNCTION__;
            $model="generateresetkey";
            $message= $e->getMessage()." ERROR $errorMsg at line ".__LINE__;
            //ii::$app->utility->logException($class,$method,$model,$token,$message);
            echo json_encode(array("error" => $errorMsg));
            exit;
        } catch (ErrorException $e) {
            $errorMsg="XXX0016 :: Invalid Method. Please try again";
            $token=Yii::$app->request->headers['token'];
            $class=__FILE__;
            $method=__FUNCTION__;
            $model="generateresetkey";
            $message= $e->getMessage()." ERROR $errorMsg at line ".__LINE__;
            //Yii::$app->utility->logException($class,$method,$model,$token,$message);
            echo json_encode(array("error" => $errorMsg));
            exit;
        }
    }
}
