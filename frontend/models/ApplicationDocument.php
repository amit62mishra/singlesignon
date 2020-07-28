<?php

namespace frontend\models;

use Yii;
use yii\base\Model; 
/**
 * This is the model class for table "order_system".
 *
 * @property int $role_id
 * @property int $is_active
 * @property int $is_deleted
 * @property int $role_name 
 */
class ApplicationDocument extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application_documents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['application_id','name','document'], 'required'],
            [['document','name'], 'string']
            //[['document'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg']
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'document_id' => 'ID',
            'application_id' => 'application Id',
            'document' => 'Document', 
            'name' => 'Name',   
        ];
    }


    public function saveDocumentDetails($document,$id,$name) 
    {
        if (!empty($document) && !empty($id)) {
                
            // delete all data of project id 

            ApplicationDocument::deleteAll(['application_id'=>$id]);
            //print_r($document["name"][0]['document']); die;
            foreach($document["tmp_name"][0]['document'] as $key=>$value) {
            $filename = $document['name'][0]['document'][$key];
            $docName = ""; 
            // $allowed = array('jpg');
            // $ext = pathinfo($filename, PATHINFO_EXTENSION);
            // if (!in_array($ext, $allowed)) {
            //     Yii::$app->session->setFlash('error', 'File type not allowed');
            //     return $this->redirect(['application/form']);
            // }
            if ($document['name'][0]['document'][$key] != '') {
                $docName = $id . "_" . time() . "_upload" . "_" . $document['name'][0]['document'][$key];
                $ext = pathinfo($document['name'][0]['document'][$key], PATHINFO_EXTENSION);
                move_uploaded_file($document['tmp_name'][0]['document'][$key], Yii::$app->basePath . '/web/swcs/uploads/' . $docName); 

                $partnerObj =  new ApplicationDocument();

                $partnerObj->application_id = $id; 

                $partnerObj->name = $name[0]['name'][$key]; 

                $partnerObj->document = $docName;   
     
                $partnerObj->save();
                if(!$partnerObj->save()){ 
                    print_r($partnerObj->errors); die;
                }
                //echo "amit 1"; die;
            } 
            }
   
        }
    }

    public function getDocuments($where) 
    {
        return ApplicationDocument::find()->where($where)->all();
    }

    // public function upload()
    // {
    //     if ($this->validate()) {
    //         echo 'uploads/' . $this->imageFile->baseName . '.' . $this->document->extension;
    //         $this->document->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->document->extension);
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
 
}
