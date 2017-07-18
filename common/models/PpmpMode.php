<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ppmp_mode".
 *
 * @property integer $ppmp_mode_id
 * @property string $mode
 * @property string $description
 * @property integer $status
 */
class PpmpMode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppmp_mode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['status'], 'integer'],
            [['mode'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ppmp_mode_id' => 'Ppmp Mode ID',
            'mode' => 'Mode',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }
}
