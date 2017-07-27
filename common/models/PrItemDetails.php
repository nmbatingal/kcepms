<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pr_item_details".
 *
 * @property integer $pr_item_id
 * @property integer $pr_id
 * @property integer $item_type
 * @property integer $ppmp_item_original_id
 * @property string $group_label
 * @property string $item_description
 * @property string $add_description
 * @property integer $quantity
 * @property double $item_price
 * @property double $total_amount
 * @property integer $status
 */
class PrItemDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pr_item_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pr_id', 'item_type', 'ppmp_item_original_id', 'quantity', 'status', 'ppmp_id', 'item_id'], 'integer'],
            [['item_description', 'date'], 'string'],
            [['item_price', 'total_amount'], 'number'],
            [['group_label'], 'string', 'max' => 200],
            [['add_description', 'unit_id'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pr_item_id' => 'Pr Item ID',
            'pr_id' => 'Pr ID',
            'item_type' => 'Item Type',
            'ppmp_item_original_id' => 'Ppmp Item Original ID',
            'ppmp_id' => 'PPMP ID',
            'item_id' => 'Item ID',
            'group_label' => 'Group Label',
            'unit_id' => 'Unit ID',
            'item_description' => 'Item Description',
            'add_description' => 'Add Description',
            'quantity' => 'Quantity',
            'item_price' => 'Item Price',
            'total_amount' => 'Total Amount',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemUnit()
    {
        return $this->hasOne(LibItemUnit::className(), ['unit_id' => 'unit_id']);
    }
}
