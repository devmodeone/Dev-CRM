<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "sale_user".
 *
 * @property int $sale_id
 * @property int $user_id
 * @property int $owner
 * @property int $shared
 *
 * @property Sale $sale
 * @property User $user
 */
class SaleUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sale_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sale_id', 'user_id'], 'required'],
            [['sale_id', 'user_id', 'owner', 'shared'], 'integer'],
            [['sale_id', 'user_id'], 'unique', 'targetAttribute' => ['sale_id', 'user_id']],
            [['sale_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sale::className(), 'targetAttribute' => ['sale_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sale_id' => 'Sale ID',
            'user_id' => 'User ID',
            'owner' => 'Owner',
            'shared' => 'Shared',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSale()
    {
        return $this->hasOne(Sale::className(), ['id' => 'sale_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return SaleUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SaleUserQuery(get_called_class());
    }
}
