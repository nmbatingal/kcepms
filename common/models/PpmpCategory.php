<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ppmp_category".
 *
 * @property integer $ppmp_category_id
 * @property string $code
 * @property string $description
 */
class PpmpCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppmp_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['code'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ppmp_category_id' => 'Ppmp Category ID',
            'code' => 'Code',
            'description' => 'Description',
        ];
    }
}
