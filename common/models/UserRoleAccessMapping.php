<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mst_user_role_mapping".
 *
 * @property int $map_id
 * @property int $user_id
 * @property int $role_id
 * @property string $is_active
 * @property string $is_deleted
 * @property string $created_on
 *
 * @property MstUser $user
 * @property MstRoles $role
 */
class UserRoleAccessMapping extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */ 
    public static function tableName()
    {
        return 'user_role_access_mapping';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'role_id'], 'required'],
            [['user_id', 'role_id','dept_id','service_id'], 'integer'],
            [['is_active','url'], 'string'],  
            [['created_on'], 'safe'], 
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'role_id' => 'Role ID',
            'is_active' => 'Is Active', 
            'created_on' => 'Created On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Roles::className(), ['role_id' => 'role_id']);
    }
     public function getDepartment()
    {
        return $this->hasOne(Departments::className(), ['dept_id' => 'department_id']);
    }
}
