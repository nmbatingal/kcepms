<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lib_item_subgeneric".
 *
 * @property integer $subgeneric_id
 * @property string $description
 * @property integer $status
 */
class LibItemSubgeneric extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_item_subgeneric';
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
            'subgeneric_id' => 'Subgeneric ID',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }
}
