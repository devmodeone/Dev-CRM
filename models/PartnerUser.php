<?php

namespace app\models;

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
class PartnerUser extends base\PartnerUser
{
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
            'owner' => 'Владелец',
            'shared' => 'Доступно для',
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
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
