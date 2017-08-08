<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_logs".
 *
 * @property integer $log_id
 * @property integer $encoder
 * @property integer $action
 * @property string $tbl_name
 * @property integer $tbl_id
 * @property string $details
 * @property string $log_date
 */
class TblLogs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['encoder', 'action', 'tbl_id'], 'integer'],
            [['details'], 'string'],
            [['log_date'], 'safe'],
            [['tbl_name', 'tbl_col'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'log_id' => 'Log ID',
            'encoder' => 'Encoder',
            'action' => 'Action',
            'tbl_name' => 'Tbl Name',
            'tbl_col' => 'Tbl Col',
            'tbl_id' => 'Tbl ID',
            'details' => 'Details',
            'log_date' => 'Log Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncoder()
    {
        return $this->hasOne(User::className(), ['id' => 'encoder']);
    }
}
