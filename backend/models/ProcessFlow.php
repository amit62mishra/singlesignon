<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii_process_flow".
 *
 * @property int $step_id
 * @property int|null $service_id
 * @property string|null $name
 * @property string|null $discription
 * @property string|null $step_action
 * @property string|null $web_action
 * @property int|null $role_id
 * @property int|null $sla_days
 * @property string|null $available_after_sla
 * @property string|null $can_update
 * @property string|null $updated
 * @property string|null $created
 * @property string $status
 * @property string|null $forward_action
 * @property int|null $disp_order
 * @property int|null $in_inbox
 * @property int|null $office_id
 */
class ProcessFlow extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yii_process_flow';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'role_id', 'sla_days', 'disp_order', 'in_inbox', 'office_id'], 'integer'],
            [['name', 'discription', 'step_action', 'web_action'], 'string'],
            [['updated', 'created'], 'safe'],
            [['available_after_sla', 'can_update', 'status'], 'string', 'max' => 10],
            [['forward_action'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'step_id' => 'Step ID',
            'service_id' => 'Service ID',
            'name' => 'Name',
            'discription' => 'Discription',
            'step_action' => 'Step Action',
            'web_action' => 'Web Action',
            'role_id' => 'Role ID',
            'sla_days' => 'Sla Days',
            'available_after_sla' => 'Available After Sla',
            'can_update' => 'Can Update',
            'updated' => 'Updated',
            'created' => 'Created',
            'status' => 'Status',
            'forward_action' => 'Forward Action',
            'disp_order' => 'Disp Order',
            'in_inbox' => 'In Inbox',
            'office_id' => 'Office ID',
        ];
    }
}
