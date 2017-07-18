<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ppmp_item_original".
 *
 * @property integer $ppmp_item_original_id
 * @property integer $ppmp_id
 * @property integer $ppmp_item_cat_id
 * @property integer $ppmp_item_subcat_id
 * @property string $item_description
 * @property integer $inventory_id
 * @property integer $unit_id
 * @property string $addtitional_number
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
class PpmpItemOriginal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppmp_item_original';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppmp_id', 'ppmp_item_subcat_id', 'item_description', 'item_price', 'total_count', 'total_amount'], 'required'],
            [['ppmp_id', 'ppmp_item_cat_id', 'ppmp_item_subcat_id', 'inventory_id', 'unit_id', 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'total_count'], 'integer'],
            [['item_description'], 'string'],
            [['item_price', 'total_amount'], 'number'],
            [['addtitional_number'], 'string', 'max' => 100],
            [['ppmp_id', 'ppmp_item_cat_id', 'ppmp_item_subcat_id', 'inventory_id'], 'unique', 'targetAttribute' => ['ppmp_id', 'ppmp_item_cat_id', 'ppmp_item_subcat_id', 'inventory_id'], 'message' => 'The combination of Ppmp ID, Ppmp Item Cat ID, Ppmp Item Subcat ID and Inventory ID has already been taken.'],
            [['ppmp_id', 'ppmp_item_cat_id', 'ppmp_item_subcat_id', 'inventory_id'], 'unique', 'targetAttribute' => ['ppmp_id', 'ppmp_item_cat_id', 'ppmp_item_subcat_id', 'inventory_id'], 'message' => 'The combination of Ppmp ID, Ppmp Item Cat ID, Ppmp Item Subcat ID and Inventory ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ppmp_item_original_id' => 'Ppmp Item Original ID',
            'ppmp_id' => 'Ppmp ID',
            'ppmp_item_cat_id' => 'Ppmp Item Cat ID',
            'ppmp_item_subcat_id' => 'Ppmp Item Subcat ID',
            'item_description' => 'Item Description',
            'inventory_id' => 'Inventory ID',
            'unit_id' => 'Unit ID',
            'addtitional_number' => 'Addtitional Number',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpmp()
    {
        return $this->hasOne(Ppmp::className(), ['ppmp_id' => 'ppmp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpmpItemCategory()
    {
        return $this->hasOne(PpmpItemCategory::className(), ['ppmp_item_cat_id' => 'ppmp_item_cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpmpItemSubcategory()
    {
        return $this->hasOne(PpmpItemSubcategory::className(), ['ppmp_item_subcat_id' => 'ppmp_item_subcat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemUnit()
    {
        return $this->hasOne(LibItemUnit::className(), ['unit_id' => 'unit_id']);
    }
}
