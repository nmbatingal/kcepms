<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pr_report".
 *
 * @property integer $pr_id
 * @property string $pr_no
 * @property integer $tracker_id
 * @property string $purpose
 * @property string $date_created
 * @property double $total_pr_amount
 * @property integer $requested_by
 * @property integer $approved_by
 * @property integer $encoder
 * @property integer $pr_type
 * @property integer $status
 */
class PrReport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pr_report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pr_type', 'purpose', 'requested_by', 'approved_by'], 'required'],
            [['tracker_id', 'requested_by', 'noted_by', 'reviewed_by', 'approved_by', 'encoder', 'pr_type', 'ppmp_mode', 'status'], 'integer'],
            [['purpose'], 'string'],
            [['date_created'], 'safe'],
            [['total_pr_amount'], 'number'],
            [['pr_no'], 'string', 'max' => 100],
            [['pr_no'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pr_id' => 'Pr ID',
            'pr_no' => 'Pr No',
            'tracker_id' => 'Tracker ID',
            'purpose' => 'Purpose',
            'date_created' => 'Date Created',
            'total_pr_amount' => 'Total Pr Amount',
            'requested_by' => 'Requested By',
            'noted_by' => 'Noted By',
            'reviewed_by' => 'Reviewed By',
            'approved_by' => 'Approved By',
            'encoder' => 'Encoder',
            'pr_type' => 'Pr Type',
            'ppmp_mode' => 'Mode of Procurement',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTracker()
    {
        return $this->hasOne(PrTracker::className(), ['pr_tracker_id' => 'tracker_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPpmpMode()
    {
        return $this->hasOne(PpmpMode::className(), ['ppmp_mode_id' => 'ppmp_mode']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestedBy()
    {
        return $this->hasOne(Assignatories::className(), ['contact_id' => 'requested_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreparedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'requested_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotedBy()
    {
        return $this->hasOne(Assignatories::className(), ['contact_id' => 'noted_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviewedBy()
    {
        return $this->hasOne(Assignatories::className(), ['contact_id' => 'reviewed_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApprovedBy()
    {
        return $this->hasOne(Assignatories::className(), ['contact_id' => 'approved_by']);
    }
}
