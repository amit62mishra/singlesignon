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
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_name','is_active','is_deleted'], 'required'],
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'ID',
            'is_active' => 'Is active',
            'is_deleted' => 'Is Deleted', 
            'role_name' => 'Role name', 
        ];
    }
 
}
