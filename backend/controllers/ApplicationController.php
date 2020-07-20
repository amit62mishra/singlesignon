<?php

namespace app\controllers;
use Yii;
use app\models\OrderSystem;
use app\models\UploadForm;
use yii\web\UploadedFile;


class ApplicationController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$model=new OrderSystem;

    	if ($model->load(Yii::$app->request->post())) {

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
                $model->document= Yii::$app->basePath.'/uploads/order_system/'.$fileName;
            }

    	}

        return $this->render('form',[
        	'model'=>$model,
        	]);
    }

}
