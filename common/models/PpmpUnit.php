<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ppmp_unit".
 *
 * @property integer $ppmp_unit_id
 * @property string $unit_description
 * @property integer $status
 */
class PpmpUnit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppmp_unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unit_description'], 'string'],
            [['status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ppmp_unit_id' => 'Ppmp Unit ID',
            'unit_description' => 'Unit Description',
            'status' => 'Status',
        ];
    }
}
