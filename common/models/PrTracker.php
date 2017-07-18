<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pr_tracker".
 *
 * @property integer $pr_tracker_id
 * @property integer $tracker_year
 * @property integer $tracker_month
 * @property integer $tracker_seq
 * @property string $tracker_no
 * @property string $proposal_no
 * @property string $tracker_title
 * @property string $unit_responsible
 * @property string $proponent
 * @property integer $encoder
 * @property string $date_created
 * @property string $date_updated
 * @property integer $status
 */
class PrTracker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pr_tracker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tracker_title', 'proponent'], 'required'],
            [['tracker_year', 'tracker_month', 'tracker_seq', 'encoder', 'status'], 'integer'],
            [['tracker_title'], 'string'],
            [['date_created', 'date_updated'], 'safe'],
            [['tracker_no', 'proposal_no', 'proponent', 'responsibility_code'], 'string', 'max' => 100],
            [['unit_responsible'], 'string', 'max' => 500],
            [['tracker_seq', 'tracker_no'], 'unique', 'targetAttribute' => ['tracker_seq', 'tracker_no'], 'message' => 'The combination of Tracker Seq and Tracker No has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pr_tracker_id' => 'Pr Tracker ID',
            'tracker_year' => 'Tracker Year',
            'tracker_month' => 'Tracker Month',
            'tracker_seq' => 'Tracker Seq',
            'tracker_no' => 'Tracker No',
            'proposal_no' => 'Proposal No',
            'tracker_title' => 'Tracker Title',
            'unit_responsible' => 'Unit Responsible',
            'responsibility_code' => 'Responsibility Code',
            'proponent' => 'Proponent',
            'encoder' => 'Encoder',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'status' => 'Status',
        ];
    }

    public function getTrackerCount()
    {
        $query = PrTracker::find()->count();
        return $query;
    }

    public function getTrackerNo()
    {
        $query = PrTracker::find()->orderBy('tracker_no DESC')->one();
        return $query;
    }
}
