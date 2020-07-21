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
 * @property int $comment 
 * @property int $created_on 
 */
class ApplicationForwardLevel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application_forward_level';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['next_role_id,application_id,comment,created_on,updated_date_time,status,ip_address', 'required'], 
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'next_role_id' => 'Nect Role ID',
            'application_id' => 'Application ID',
            'comment' => 'Comment', 
            'created_on' => 'Created', 
            'status' => 'Status', 
            'updated_date_time' => 'Update Time', 
            'ip_address' =>'IP address'
        ];
    }

    public function ProcessApplication($application_id,$next_role_id,$history_id,$status,$comment)
    {
        if($history_id!=0){
         $model =  ApplicationForwardLevel::find()->where(['id'=>$history_id])->one(); ; 
         $model->comment = $comment;
         $model->updated_date_time = time();
         $model->ip_address = $_SERVER['REMOTE_ADDR'];
         $model->status = $status;
         $model->save(false);
         }
         $model = new ApplicationForwardLevel();
         $model->next_role_id = $next_role_id ; 
         $model->application_id =$application_id ; 
         $model->comment = null;
         $model->updated_date_time = time();
         $model->ip_address = $_SERVER['REMOTE_ADDR'];
         $model->status = 'P';
         $model->save(false);


    }

    public function getRoleName()

    {

        return $this->hasOne(Roles::className(), ['role_id' => 'next_role_id']);

    }
  
}
