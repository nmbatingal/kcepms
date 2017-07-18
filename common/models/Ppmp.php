<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ppmp".
 *
 * @property integer $ppmp_id
 * @property integer $ppmp_unit_id
 * @property integer $ppmp_category_id
 * @property double $size_quantity
 * @property double $budget
 * @property double $deduction
 * @property integer $ppmp_mode_id
 * @property string $year
 * @property string $date_created
 * @property integer $encoder
 * @property integer $status
 */
class Ppmp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppmp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ppmp_category_id'], 'required'],
            [['ppmp_unit_id', 'ppmp_category_id', 'ppmp_mode_id', 'encoder', 'status'], 'integer'],
            [['size_quantity', 'budget', 'deduction'], 'number'],
            [['date_created'], 'safe'],
            [['year'], 'string', 'max' => 4],
            [['ppmp_unit_id', 'ppmp_category_id', 'year'], 'unique', 'targetAttribute' => ['ppmp_unit_id', 'ppmp_category_id', 'year'], 'message' => 'The combination of Ppmp Unit ID, Ppmp Category ID and Year has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ppmp_id' => 'Ppmp ID',
            'ppmp_unit_id' => 'Ppmp Unit ID',
            'ppmp_category_id' => 'Ppmp Category ID',
            'size_quantity' => 'Size Quantity',
            'budget' => 'Budget',
            'deduction' => 'Deduction',
            'ppmp_mode_id' => 'Ppmp Mode ID',
            'year' => 'Year',
            'date_created' => 'Date Created',
            'encoder' => 'Encoder',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpmpCategory()
    {
        return $this->hasOne(PpmpCategory::className(), ['ppmp_category_id' => 'ppmp_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpmpMode()
    {
        return $this->hasOne(PpmpMode::className(), ['ppmp_mode_id' => 'ppmp_mode_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpmpUnit()
    {
        return $this->hasOne(PpmpUnit::className(), ['ppmp_unit_id' => 'ppmp_unit_id']);
    }
}
