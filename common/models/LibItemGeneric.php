<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lib_item_generic".
 *
 * @property integer $generic_id
 * @property string $description
 * @property integer $status
 */
class LibItemGeneric extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_item_generic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'generic_id' => 'Generic ID',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }
}
