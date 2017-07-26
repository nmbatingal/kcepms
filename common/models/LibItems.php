<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lib_items".
 *
 * @property integer $item_id
 * @property string $description
 * @property double $est_price
 * @property string $barcode
 * @property integer $generic_id
 * @property integer $sub_generic_id
 * @property integer $uacs_id
 * @property integer $item_cat_id
 * @property string $date_added
 * @property integer $item_status
 */
class LibItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $full_description;

    public static function tableName()
    {
        return 'supply_procurement_system.lib_items';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_supply');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['est_price'], 'number'],
            [['generic_id', 'sub_generic_id', 'uacs_id', 'item_cat_id', 'item_status'], 'integer'],
            [['date_added', 'full_description'], 'safe'],
            [['description'], 'string', 'max' => 500],
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
            'description' => 'Description',
            'est_price' => 'Est Price',
            'barcode' => 'Barcode',
            'generic_id' => 'Generic ID',
            'sub_generic_id' => 'Sub Generic ID',
            'uacs_id' => 'Uacs ID',
            'item_cat_id' => 'Item Cat ID',
            'date_added' => 'Date Added',
            'item_status' => 'Item Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibGeneric()
    {
        return $this->hasOne(LibGeneric::className(), ['generic_id' => 'generic_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibSubGeneric()
    {
        return $this->hasOne(LibSubGeneric::className(), ['sub_generic_id' => 'sub_generic_id']);
    }
}
