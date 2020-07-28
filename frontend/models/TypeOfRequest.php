<?php

namespace frontend\models;

use Yii;
use yii\base\Model; 
/**
 * This is the model class for table "order_system".
 *
 * @property int $name
 * @property int $value 
 */
class TypeOfRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_type_of_request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','value'], 'required'],
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'ID',
            'name' => 'Name',
            'value' => 'Value',  
        ];
    }
 
}
