<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cards".
 *
 * @property integer $id
 * @property string $series
 * @property integer $number
 * @property string $create_date
 * @property string $expiration_date
 * @property double $amount
 * @property integer $status
 *
 * @property Purchases[] $purchases
 */
class Cards extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cards';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['series', 'number', 'create_date', 'expiration_date', 'amount', 'status'], 'required'],
            [['number', 'status'], 'integer', 'max'=>999999],
            [['create_date', 'expiration_date'], 'safe'],
            [['amount'], 'number'],
            [['series'], 'string', 'max' => 3],
            [['series', 'number'], 'unique', 'targetAttribute' => ['series', 'number'], 'message' => 'Карта с такой серией и номером уже была зарегистрирована.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'series' => 'Серия',
            'number' => 'Номер',
            'create_date' => 'Создана',
            'expiration_date' => 'Действительна до',
            'amount' => 'Сумма',
            'status' => 'Статус',
        ];
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getPurchases()
    {
        return $this->hasMany(Purchases::className(), ['card_id' => 'id']);
    }
}
