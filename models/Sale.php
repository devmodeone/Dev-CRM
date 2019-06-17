<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
use \yii\db\Expression;
use \yii\behaviors\TimestampBehavior;
use \yii\helpers\ArrayHelper;

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
class Sale extends base\Sale
{
    const STATUS_SET = 0;
    const STATUS_START = 1;
    const STATUS_FINISH = 2;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'end_at'], 'required'],
            [['created_at', 'start_at', 'end_at', 'close_at', 'partner_id', 'status'], 'integer'],
            [['budget', 'spend'], 'number'],
            [['name', 'number', 'company'], 'string', 'max' => 255],
            [['partner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Partner::className(), 'targetAttribute' => ['partner_id' => 'id']],
            ['status', 'default', 'value' => self::STATUS_SET],
            ['status', 'in', 'range' => array_flip(self::getStatuses())],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'created_at' => 'Дата создания',
            'start_at' => 'Дата начала',
            'end_at' => 'Дата завершения',
            'close_at' => 'Дата закрытия',
            'number' => 'Номер',
            'company' => 'Компания',
            'partner_id' => 'Клиент',
            'budget' => 'Буджет',
            'spend' => 'Истрачено',
            'status' => 'Статус',
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
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('sale_user', ['sale_id' => 'id']);
    }

    public function getStatuses()
    {
        return [
            self::STATUS_SET => 'Поставлено',
            self::STATUS_START => 'В процессе',
            self::STATUS_FINISH => 'Завершено',
        ];
    }

    public function init()
    {
        parent::init();

        $this->setAttributes([
            'end_at' => strtotime('+1 day'),
            'close_at' => 0,
            'status' => self::STATUS_SET,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            $this->end_at = Yii::$app->formatter->asTimestamp($this->end_at);
            $this->close_at = Yii::$app->formatter->asTimestamp($this->close_at);

            return true;
        }

        return false;
    }

    public function beforeSave($insert)
    {
        /**
         * Prevent saving if task is done
         */

        if (ArrayHelper::keyExists('status', $this->oldAttributes)) {
            if ((int)$this->oldAttributes['status'] === (int)self::STATUS_FINISH) {
                return false;
            }
        }

        if ((int)$this->attributes['status'] === (int)self::STATUS_FINISH) {
            $this->close_at = time();
        }

        if ((int)$this->attributes['status'] === (int)self::STATUS_START) {
            $this->start_at = time();
        }

        return parent::beforeSave($insert);
    }
}
