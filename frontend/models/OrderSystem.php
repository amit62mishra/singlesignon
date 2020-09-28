<?php

namespace frontend\models;

use Yii;
 
use yii\web\UploadedFile;

use common\models\User;
/**
 * This is the model class for table "order_system".
 *
 * @property int $id
 * @property string $type_of_request
 * @property string $received_through
 * @property string $concerned_department
 * @property string $subject
 * @property string $applicant_name
 * @property string $mobile_number
 * @property string $constituency_detail_from
 * @property string $constituency_detail_to
 * @property string $issued_by
 * @property string $created_at
 * @property string|null $updated_at
 * @property int $user_id
 * @property string $is_active
 * @property string $is_deleted
 */
class OrderSystem extends \yii\db\ActiveRecord
{
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_system';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_of_request','received_through','concerned_department','purpose','applicant_name','mobile_number','constituency_detail_from','issued_by','user_id','letter_date','remark','district_id'], 'required'], 
            [['applicant_name'], 'string', 'max' => 225],
            [['mobile_number'], 'string', 'max' => 20], 
            ['constituency_detail_to', 'required', 'when' => function($model) {

            return $model->type_of_request == 3;

            }],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_of_request' => 'Type Of Request',
            'received_through' => 'Received Through',
            'concerned_department' => 'Concerned Department',
            'purpose' => 'Purpose',
            'applicant_name' => 'Applicant Name',
            'mobile_number' => 'Mobile Number',
            'constituency_detail_from' => 'Constituency Detail From',
            'constituency_detail_to' => 'Constituency Detail To',
            'issued_by' => 'Issued By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
            'is_active' => 'Is Active',
            'is_deleted' => 'Is Deleted',
            'district_id' => 'District',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            echo 'uploads/' . $this->imageFile->baseName . '.' . $this->document->extension;
            $this->document->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->document->extension);
            return true;
        } else {
            return false;
        }
    }

    public function getPurpose()
    {
        return $this->hasOne(Purpose::className(), ['id' => 'purpose']);
    }

    public function getRequest()
    {
        return $this->hasOne(TypeOfRequest::className(), ['id' => 'type_of_request']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
    public function getReceived()
    {
        return $this->hasOne(ReceivedThrough::className(), ['id' => 'received_through']);
    }
    public function getDistrict()
    {
        return $this->hasOne(Districts::className(), ['district_id' => 'district_id']);
    }

    public function getConstituencyfrom()
    {
        return $this->hasOne(ConstituencyDetails::className(), ['id' => 'constituency_detail_from']);
    }

    public function getConstituencyto()
    {
        return $this->hasOne(ConstituencyDetails::className(), ['id' => 'constituency_detail_to']);
    }

    public function getDepartment()
    {
        return $this->hasOne(Departments::className(), ['dept_id' => 'concerned_department']);
    }


}
