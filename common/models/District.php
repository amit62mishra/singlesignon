<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mst_district".
 *
 * @property int $district_id
 * @property string $district_name
 * @property string $created_on
 * @property string $is_active
 * @property string $is_deleted
 *
 * @property MstUser[] $mstUsers
 */
class District extends \yii\db\ActiveRecord
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
            [['district_name'], 'required'],
            [['created_on'], 'safe'],
            [['is_active', 'is_deleted'], 'string'],
            [['district_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'district_id' => 'District ID',
            'district_name' => 'District Name',
            'created_on' => 'Created On',
            'is_active' => 'Is Active',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMstUsers()
    {
        return $this->hasMany(MstUser::className(), ['district_id' => 'district_id']);
    }
}
