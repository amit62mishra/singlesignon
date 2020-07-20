<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii_process_flow_steps".
 *
 * @property int $id
 * @property int|null $process_step_id
 * @property int|null $next_process_id
 * @property string|null $label
 * @property string|null $history_label
 * @property string|null $created
 */
class ProcessFlowSteps extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yii_process_flow_steps';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['process_step_id', 'next_process_id'], 'integer'],
            [['label', 'history_label'], 'string'],
            [['created'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'process_step_id' => 'Process Step ID',
            'next_process_id' => 'Next Process ID',
            'label' => 'Label',
            'history_label' => 'History Label',
            'created' => 'Created',
        ];
    }
}
