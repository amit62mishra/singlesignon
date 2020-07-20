<?php

namespace common\models;

use Yii;
/**
 * This is the model class for table "bo_departments".
 *
 * The followings are the available columns in table 'bo_departments':
 * @property string $dept_id
 * @property string $department_name
 * @property string $department_unique_code
 * @property string $department_link
 * @property string $department_img
 * @property string $bank_scheme_code
 * @property string $added_on
 * @property integer $dept_order
 * @property string $updated_on
 * @property integer $is_department_active
 *
 * The followings are the available model relations:
 * @property ApplicationForwardLevel[] $applicationForwardLevels
 * @property ApplicationSubmission[] $applicationSubmissions
 * @property DepartmentApproval[] $departmentApprovals
 * @property User[] $users
 * @property UserRoleMapping[] $userRoleMappings
 */
class Departments extends \yii\db\ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public static function tableName()
	{
		return 'bo_departments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('department_name, department_unique_code, department_link, added_on', 'required'),
			array('dept_order, is_department_active', 'numerical', 'integerOnly'=>true),
			array('department_name', 'length', 'max'=>512),
			array('department_unique_code, department_link, department_img', 'length', 'max'=>128),
			array('bank_scheme_code', 'length', 'max'=>50),
			array('updated_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('dept_id, department_name, department_unique_code, department_link, department_img, bank_scheme_code, added_on, dept_order, updated_on, is_department_active', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	// public function relations()
	// {
	// 	// NOTE: you may need to adjust the relation name and the related
	// 	// class name for the relations automatically generated below.
	// 	return array(
	// 		'applicationForwardLevels' => array(self::HAS_MANY, 'ApplicationForwardLevel', 'forwarded_dept_id'),
	// 		'applicationSubmissions' => array(self::HAS_MANY, 'ApplicationSubmission', 'dept_id'),
	// 		'departmentApprovals' => array(self::HAS_MANY, 'DepartmentApproval', 'department_id'),
	// 		'users' => array(self::HAS_MANY, 'User', 'dept_id'),
	// 		'userRoleMappings' => array(self::HAS_MANY, 'UserRoleMapping', 'department_id'),
	// 	);
	// }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'dept_id' => 'Dept',
			'department_name' => 'Department Name',
			'department_unique_code' => 'Department Unique Code',
			'department_link' => 'Department Link',
			'department_img' => 'Department Img',
			'bank_scheme_code' => 'Bank Scheme Code',
			'added_on' => 'Added On',
			'dept_order' => 'Dept Order',
			'updated_on' => 'Updated On',
			'is_department_active' => 'Is Department Active',
		);
	}
 
	public static function getAllDepartments() {
		$isactive = '1';
		$connection=Yii::app()->db; 
		$sql="SELECT sp_id,service_provider_name,service_provider_tag FROM sso_service_providers WHERE is_service_provider_active = :isactive";
		$sql="SELECT dept_id,department_name,department_unique_code FROM bo_departments WHERE is_department_active = :isactive AND department_unique_code != 'DOI_123'";
		$command=$connection->createCommand($sql);
		$command->bindParam(":isactive",$isactive,PDO::PARAM_INT);
		$deptList=$command->queryAll();	
		return $deptList;
	}
}
