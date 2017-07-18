<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ppmp_item_deduction".
 *
 * @property integer $ppmp_item_deduct_id
 * @property integer $ppmp_item_original_id
 * @property double $item_price
 * @property integer $january
 * @property integer $february
 * @property integer $march
 * @property integer $april
 * @property integer $may
 * @property integer $june
 * @property integer $july
 * @property integer $august
 * @property integer $september
 * @property integer $october
 * @property integer $november
 * @property integer $december
 * @property integer $total_count
 * @property double $total_amount
 */
class PpmpItemDeduction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppmp_item_deduction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppmp_item_original_id', 'item_price', 'total_count', 'total_amount'], 'required'],
            [['ppmp_item_original_id', 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'total_count'], 'integer'],
            [['item_price', 'total_amount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ppmp_item_deduct_id' => 'Ppmp Item Deduct ID',
            'ppmp_item_original_id' => 'Ppmp Item Original ID',
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
            'total_count' => 'Total Count',
            'total_amount' => 'Total Amount',
        ];
    }
}
