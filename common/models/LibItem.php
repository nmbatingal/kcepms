<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lib_item".
 *
 * @property integer $item_id
 * @property integer $item_category_id
 * @property integer $generic_id
 * @property integer $subgeneric_id
 * @property string $item_description
 * @property integer $unit_id
 * @property integer $uacs_id
 * @property string $barcode
 * @property double $price
 * @property string $date_added
 * @property integer $encoder
 * @property integer $status
 */
class LibItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_category_id', 'generic_id', 'subgeneric_id', 'unit_id', 'uacs_id', 'encoder', 'status'], 'integer'],
            [['item_description', 'unit_id'], 'required'],
            [['item_description'], 'string'],
            [['price'], 'number'],
            [['date_added'], 'safe'],
            [['barcode'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_id' => 'Item ID',
            'item_category_id' => 'Item Category ID',
            'generic_id' => 'Generic ID',
            'subgeneric_id' => 'Subgeneric ID',
            'item_description' => 'Item Description',
            'unit_id' => 'Unit ID',
            'uacs_id' => 'Uacs ID',
            'barcode' => 'Barcode',
            'price' => 'Price',
            'date_added' => 'Date Added',
            'encoder' => 'Encoder',
            'status' => 'Status',
        ];
    }
}
