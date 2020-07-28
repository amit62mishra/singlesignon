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
class Districts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['district_name','district_id','is_active'], 'required'],
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'district_id' => 'ID',
            'district_name' => 'District Name',
            'is_active' => 'Is Active',  
        ];
    }
 
}
