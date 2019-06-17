<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "sale".
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int $start_at
 * @property int $end_at
 * @property int $close_at
 * @property string $number
 * @property string $company
 * @property int $partner_id
 * @property double $budget
 * @property double $spend
 * @property int $status
 *
 * @property Partner $partner
 * @property SaleUser[] $saleUsers
 * @property User[] $users
 */
class Sale extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sale';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'start_at', 'end_at', 'close_at'], 'required'],
            [['created_at', 'start_at', 'end_at', 'close_at', 'partner_id', 'status'], 'integer'],
            [['budget', 'spend'], 'number'],
            [['name', 'number', 'company'], 'string', 'max' => 255],
            [['partner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Partner::className(), 'targetAttribute' => ['partner_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'start_at' => 'Start At',
            'end_at' => 'End At',
            'close_at' => 'Close At',
            'number' => 'Number',
            'company' => 'Company',
            'partner_id' => 'Partner ID',
            'budget' => 'Budget',
            'spend' => 'Spend',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartner()
    {
        return $this->hasOne(Partner::className(), ['id' => 'partner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleUsers()
    {
        return $this->hasMany(SaleUser::className(), ['sale_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\app\models\User::className(), ['id' => 'user_id'])->viaTable('sale_user', ['sale_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SaleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SaleQuery(get_called_class());
    }
}
