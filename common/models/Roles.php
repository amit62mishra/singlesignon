<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mst_roles".
 *
 * @property int $role_id
 * @property string $role_name
 * @property string $is_active
 * @property string $is_deleted
 * @property string $created_on
 * @property string $modified_on
 *
 * @property MstNotifications[] $mstNotifications
 * @property MstUserRoleMapping[] $mstUserRoleMappings
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
            [['role_name'], 'required'],
            [['is_active', 'is_deleted'], 'string'],
            [['created_on', 'modified_on'], 'safe'],
            [['role_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'role_name' => 'Role Name',
            'is_active' => 'Is Active',
            'is_deleted' => 'Is Deleted',
            'created_on' => 'Created On',
            'modified_on' => 'Modified On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMstNotifications()
    {
        return $this->hasMany(MstNotifications::className(), ['created_by_role_id' => 'role_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMstUserRoleMappings()
    {
        return $this->hasMany(MstUserRoleMapping::className(), ['role_id' => 'role_id']);
    }
}
