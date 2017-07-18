<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ppmp_item_subcategory".
 *
 * @property integer $ppmp_item_subcat_id
 * @property string $description
 * @property integer $status
 */
class PpmpItemSubcategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppmp_item_subcategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['status'], 'integer'],
            [['description'], 'string', 'max' => 500],
            [['description'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ppmp_item_subcat_id' => 'Ppmp Item Subcat ID',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }
    
}
