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
class ConstituencyDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_constituency_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type','name','district_id'], 'required'],
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name', 
            'district_id' => 'District id', 
        ];
    }
 
}
