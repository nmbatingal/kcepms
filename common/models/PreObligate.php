<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pre_obligate".
 *
 * @property integer $obligate_id
 * @property integer $fund_source_id
 * @property string $name
 * @property string $purpose
 * @property string $obligate_amount
 * @property string $amt_release
 * @property integer $alobs_yr
 * @property integer $alobs_month
 * @property integer $alobs_seq
 * @property string $alobs_no
 * @property string $alobs_date
 * @property string $accountable
 */
class PreObligate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'infimos_2017.pre_obligate';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_infimos');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fund_source_id', 'alobs_yr', 'alobs_month', 'alobs_seq'], 'integer'],
            [['purpose'], 'string'],
            [['obligate_amount', 'amt_release'], 'number'],
            [['alobs_date'], 'safe'],
            [['name'], 'string', 'max' => 150],
            [['alobs_no'], 'string', 'max' => 15],
            [['accountable'], 'string', 'max' => 90],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'obligate_id' => 'Obligate ID',
            'fund_source_id' => 'Fund Source ID',
            'name' => 'Name',
            'purpose' => 'Purpose',
            'obligate_amount' => 'Obligate Amount',
            'amt_release' => 'Amt Release',
            'alobs_yr' => 'Alobs Yr',
            'alobs_month' => 'Alobs Month',
            'alobs_seq' => 'Alobs Seq',
            'alobs_no' => 'Alobs No',
            'alobs_date' => 'Alobs Date',
            'accountable' => 'Accountable',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKcPreObligate()
    {
        return $this->hasOne(KcPreObligate::className(), ['alobs_no' => 'alobs_no']);
    }
}
