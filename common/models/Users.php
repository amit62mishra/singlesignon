<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mst_user".
 *
 * @property int $user_id
 * @property string $user_name
 * @property string $user_full_name
 * @property string $email_id
 * @property string $password
 * @property int $mobile_number
 * @property int $district_id
 * @property string $is_active
 * @property string $is_deleted
 * @property string $created_on
 * @property string $modified_on
 * @property string $auth_key
 *
 * @property MstNotifications[] $mstNotifications
 * @property MstDistrict $district
 * @property MstUserRoleMapping[] $mstUserRoleMappings
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $role_id;
    // public $
    public static function tableName()
    {
        return 'mst_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_name', 'user_full_name', 'email_id', 'password', 'role_id','mobile_number', 'district_id'], 'required'],
            [['mobile_number', 'district_id'], 'integer'],
            [['email_id'],'email'],
            [['user_name'], 'unique'],
            [['email_id'], 'unique'],
            [['is_active', 'is_deleted'], 'string'],
            [['created_on', 'modified_on'], 'safe'],
            [['user_name'], 'string', 'max' => 100],
            [['user_full_name', 'email_id', 'password'], 'string', 'max' => 255],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['district_id' => 'district_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'user_full_name' => 'Full Name',
            'email_id' => 'Email ID',
            'password' => 'Password',
            'mobile_number' => 'Mobile Number',
            'district_id' => 'District ID',
            'is_active' => 'Is Active',
            'is_deleted' => 'Is Deleted',
            'created_on' => 'Created On',
            'modified_on' => 'Modified On',
            'role_id'=>'Role'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMstNotifications()
    {
        return $this->hasMany(Notifications::className(), ['created_by' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['district_id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMstUserRoleMappings()
    {
        return $this->hasMany(UserRoleMapping::className(), ['user_id' => 'user_id']);
    }
}
