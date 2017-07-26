<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lib_sub_generic".
 *
 * @property integer $sub_generic_id
 * @property integer $generic_id
 * @property string $name
 * @property integer $is_active
 */
class LibSubGeneric extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_sub_generic';
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
            [['generic_id', 'is_active'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sub_generic_id' => 'Sub Generic ID',
            'generic_id' => 'Generic ID',
            'name' => 'Name',
            'is_active' => 'Is Active',
        ];
    }
}
