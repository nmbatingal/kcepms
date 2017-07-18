<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assignatories".
 *
 * @property integer $contact_id
 * @property string $lastname
 * @property string $firstname
 * @property string $mi
 * @property string $position_abr
 * @property string $position_desc
 * @property string $tel_no
 * @property string $fax_no
 * @property string $cell_no
 * @property string $email
 * @property integer $status
 */
class Assignatories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assignatories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position_desc'], 'string'],
            [['status'], 'integer'],
            [['lastname', 'firstname'], 'string', 'max' => 100],
            [['mi'], 'string', 'max' => 10],
            [['position_abr', 'tel_no', 'fax_no', 'cell_no', 'email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contact_id' => 'Contact ID',
            'lastname' => 'Lastname',
            'firstname' => 'Firstname',
            'mi' => 'Mi',
            'position_abr' => 'Position Abr',
            'position_desc' => 'Position Desc',
            'tel_no' => 'Tel No',
            'fax_no' => 'Fax No',
            'cell_no' => 'Cell No',
            'email' => 'Email',
            'status' => 'Status',
        ];
    }
}
