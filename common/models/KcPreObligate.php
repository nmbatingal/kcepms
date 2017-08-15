<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kc_pre_obligate".
 *
 * @property integer $obligate_id
 * @property string $pr_no
 * @property string $alobs_no
 * @property integer $encoder
 */
class KcPreObligate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kc_pre_obligate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['encoder'], 'integer'],
            [['pr_no', 'alobs_no'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'obligate_id' => 'Obligate ID',
            'pr_no' => 'Pr No',
            'alobs_no' => 'Alobs No',
            'encoder' => 'Encoder',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfimosPreObligate()
    {
        return $this->hasOne(PreObligate::className(), ['alobs_no' => 'alobs_no']);
    }
}
