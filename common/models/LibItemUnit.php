<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inventory_unit".
 *
 * @property integer $unit_id
 * @property string $unit
 */
class LibItemUnit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_item_unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'unit_id' => 'Unit ID',
            'name' => 'Unit',
        ];
    }
}
