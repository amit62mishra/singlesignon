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
class ProcessFlow extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process_flow_steps';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_role_id','to_role_id','label','history_label','service_id'], 'required'],
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_role_id' => 'Is active',
            'to_role_id' => 'Is Deleted', 
            'label' => 'Label', 
            'history_label' => 'History Label', 
        ];
    }
 
}
