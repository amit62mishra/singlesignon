<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
/**
 * This is the model class for table "order_system".
 *
 * @property int $map_id
 * @property int $user_id
 * @property int $role_id
 * @property int $is_active 
 */
class UserRoles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_user_role_mapping';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id','role_id','is_active'], 'required'],
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'map_id' => 'ID',
            'user_id' => 'User ID',
            'role_id' => 'Role ID', 
            'is_active' => 'Is Active', 
        ];
    }

    public function getRoleByUserId($user_id)
    {
         
         return $model =  UserRoles::find()->where(['user_id'=>$user_id])->one();  
          


    }
 
}
