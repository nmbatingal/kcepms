<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_pr_no".
 *
 * @property integer $id
 * @property integer $pr_year
 * @property integer $pr_month
 * @property integer $pr_seq
 * @property string $pr_no
 * @property string $pr_title
 * @property string $program
 * @property string $pr_amount
 * @property string $requested_by
 * @property string $ppo_assigned
 * @property string $date_created
 * @property integer $encoder
 * @property integer $status
 */
class TblPrNo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_pr_no';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pr_year', 'pr_month', 'pr_seq', 'encoder', 'status'], 'integer'],
            [['pr_title'], 'string'],
            [['pr_amount'], 'number'],
            [['date_created'], 'safe'],
            [['encoder'], 'required'],
            [['pr_no', 'program', 'requested_by'], 'string', 'max' => 100],
            [['ppo_assigned'], 'string', 'max' => 200],
            [['pr_no'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pr_year' => 'Pr Year',
            'pr_month' => 'Pr Month',
            'pr_seq' => 'Pr Seq',
            'pr_no' => 'Pr No',
            'pr_title' => 'Pr Title',
            'program' => 'Program',
            'pr_amount' => 'Pr Amount',
            'requested_by' => 'Requested By',
            'ppo_assigned' => 'Ppo Assigned',
            'date_created' => 'Date Created',
            'encoder' => 'Encoder',
            'status' => 'Status',
        ];
    }

    public function getPrNumbers()
    {
        $query = TblPrNo::find()->orderBy('pr_no DESC')->one();
        return $query;
    }

    public function getAllPR()
    {
        $query = TblPrNo::find()->count();
        return $query;
    }
}
