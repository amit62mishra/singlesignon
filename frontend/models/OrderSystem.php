<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
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
            [['type_of_request,received_through,concerned_department,subject,applicant_name,mobile_number,constituency_detail_from,constituency_detail_to,issued_by,user_id','letter_date','remark','action_take','document'], 'required'],
            [['type_of_request,received_through,subject,constituency_detail_from,constituency_detail_to,issued_by,is_active,is_deleted'], 'string'],
            [['created_at,updated_at'], 'safe'],
            [['user_id'], 'integer'],
            [['concerned_department'], 'string', 'max' => 100],
            [['applicant_name'], 'string', 'max' => 225],
            [['mobile_number'], 'string', 'max' => 20],
            [['document'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
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
            'subject' => 'Subject',
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
}
