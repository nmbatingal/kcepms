<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lib_generic".
 *
 * @property integer $generic_id
 * @property string $name
 * @property integer $is_active
 */
class LibGeneric extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supply_procurement_system.lib_generic';
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
            [['is_active'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'generic_id' => 'Generic ID',
            'name' => 'Name',
            'is_active' => 'Is Active',
        ];
    }
}
