<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "partner_user".
 *
 * @property int $partner_id
 * @property int $user_id
 * @property int $owner
 * @property int $shared
 *
 * @property Partner $partner
 * @property User $user
 */
class PartnerUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partner_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['partner_id', 'user_id'], 'required'],
            [['partner_id', 'user_id', 'owner', 'shared'], 'integer'],
            [['partner_id', 'user_id'], 'unique', 'targetAttribute' => ['partner_id', 'user_id']],
            [['partner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Partner::className(), 'targetAttribute' => ['partner_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'partner_id' => 'Partner ID',
            'user_id' => 'User ID',
            'owner' => 'Owner',
            'shared' => 'Shared',
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
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return PartnerUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PartnerUserQuery(get_called_class());
    }
}
