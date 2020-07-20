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
class UserRoleMapping extends \yii\db\ActiveRecord
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
            [['user_id', 'role_id'], 'required'],
            [['user_id', 'role_id'], 'integer'],
            [['is_active', 'is_deleted'], 'string'],
            [['created_on'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'user_id']],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['role_id' => 'role_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'map_id' => 'Map ID',
            'user_id' => 'User ID',
            'role_id' => 'Role ID',
            'is_active' => 'Is Active',
            'is_deleted' => 'Is Deleted',
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
}
