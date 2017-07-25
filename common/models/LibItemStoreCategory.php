<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lib_item_store_category".
 *
 * @property integer $store_id
 * @property string $description
 * @property integer $status
 */
class LibItemStoreCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_item_store_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string'],
            [['status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'store_id' => 'Store ID',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }
}
