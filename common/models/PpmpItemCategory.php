<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ppmp_item_category".
 *
 * @property integer $ppmp_item_cat_id
 * @property string $description
 * @property integer $status
 */
class PpmpItemCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppmp_item_category';
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
            'ppmp_item_cat_id' => 'Ppmp Item Cat ID',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }
}
