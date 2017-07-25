<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_purchase_request".
 *
 * @property string $pr_no
 * @property string $doc_type_id
 * @property string $div_id
 * @property string $unit_id
 * @property string $doc_date
 * @property string $purpose
 * @property string $tot_amount
 * @property string $requested_by
 * @property string $date_encoded
 * @property string $place
 * @property string $responsible
 * @property string $prov_code
 * @property string $city_code
 * @property string $brgy_code
 * @property string $encoded_by
 * @property string $username
 */
class TblPurchaseRequest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supply_procurement_system.tbl_purchase_request';
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
            [['pr_no'], 'required'],
            [['doc_date', 'date_encoded'], 'safe'],
            [['tot_amount'], 'number'],
            [['place'], 'string'],
            [['pr_no'], 'string', 'max' => 20],
            [['doc_type_id', 'div_id', 'unit_id'], 'string', 'max' => 100],
            [['purpose'], 'string', 'max' => 1000],
            [['requested_by', 'responsible'], 'string', 'max' => 50],
            [['prov_code', 'city_code', 'brgy_code'], 'string', 'max' => 9],
            [['encoded_by', 'username'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pr_no' => 'Pr No',
            'doc_type_id' => 'Doc Type ID',
            'div_id' => 'Div ID',
            'unit_id' => 'Unit ID',
            'doc_date' => 'Doc Date',
            'purpose' => 'Purpose',
            'tot_amount' => 'Tot Amount',
            'requested_by' => 'Requested By',
            'date_encoded' => 'Date Encoded',
            'place' => 'Place',
            'responsible' => 'Responsible',
            'prov_code' => 'Prov Code',
            'city_code' => 'City Code',
            'brgy_code' => 'Brgy Code',
            'encoded_by' => 'Encoded By',
            'username' => 'Username',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrReport()
    {
        return $this->hasOne(PrReport::className(), ['pr_no' => 'pr_no']);
    }

    /*** USER DEFINED FUNCTION ***/
    public function getPrNumbers()
    {
        $query = TblPurchaseRequest::find()->orderBy('pr_no DESC')->one();
        return $query;
    }

    /*** USER DEFINED FUNCTION ***/
    public function getAllPR()
    {
        $query = TblPurchaseRequest::find()->count();
        return $query;
    }
}
