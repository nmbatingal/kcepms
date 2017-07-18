<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lib_division".
 *
 * @property integer $division_id
 * @property string $code
 * @property string $acronym
 * @property string $description
 * @property string $head
 * @property string $position
 * @property integer $status
 */
class LibDivision extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lib_division';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_libraries');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['code', 'description', 'head', 'position'], 'string', 'max' => 50],
            [['acronym'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'division_id' => 'Division ID',
            'code' => 'Code',
            'acronym' => 'Acronym',
            'description' => 'Description',
            'head' => 'Head',
            'position' => 'Position',
            'status' => 'Status',
        ];
    }
}
