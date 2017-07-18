<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pr_item_sppmp_details".
 *
 * @property integer $pr_item_id
 * @property integer $pr_id
 * @property integer $item_type
 * @property string $group_label
 * @property string $item_description
 * @property string $add_description
 * @property double $item_price
 * @property double $january
 * @property double $february
 * @property double $march
 * @property double $april
 * @property double $may
 * @property double $june
 * @property double $july
 * @property double $august
 * @property double $september
 * @property double $october
 * @property double $november
 * @property double $december
 * @property double $quantity
 * @property double $total_amount
 * @property integer $status
 */
class PrItemSppmpDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pr_item_sppmp_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pr_id', 'item_type', 'status'], 'integer'],
            [['group_label', 'item_description'], 'string'],
            [['item_price', 'quantity', 'total_amount'], 'required'],
            [['item_price', 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'quantity', 'total_amount'], 'number'],
            [['add_description'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pr_item_id' => 'Pr Sppmp ID',
            'pr_id' => 'Pr ID',
            'item_type' => 'Item Type',
            'group_label' => 'Group Label',
            'item_description' => 'Item Description',
            'add_description' => 'Add Description',
            'item_price' => 'Item Price',
            'january' => 'January',
            'february' => 'February',
            'march' => 'March',
            'april' => 'April',
            'may' => 'May',
            'june' => 'June',
            'july' => 'July',
            'august' => 'August',
            'september' => 'September',
            'october' => 'October',
            'november' => 'November',
            'december' => 'December',
            'quantity' => 'Quantity',
            'total_amount' => 'Total Amount',
            'status' => 'Status',
        ];
    }
}
