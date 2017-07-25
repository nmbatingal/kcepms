<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lib_item_category".
 *
 * @property integer $item_category_id
 * @property integer $store_id
 * @property string $account_title
 * @property string $rca_code
 * @property string $form
 * @property integer $status
 */
class LibItemCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_item_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['store_id', 'status'], 'integer'],
            [['account_title'], 'required'],
            [['account_title'], 'string'],
            [['rca_code', 'form'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_category_id' => 'Item Category ID',
            'store_id' => 'Store ID',
            'account_title' => 'Account Title',
            'rca_code' => 'Rca Code',
            'form' => 'Form',
            'status' => 'Status',
        ];
    }
}
