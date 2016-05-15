<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "purchases".
 *
 * @property integer $id
 * @property integer $card_id
 * @property string $purchase_date
 * @property double $price
 *
 * @property Cards $card
 */
class Purchases extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchases';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['card_id', 'purchase_date', 'price'], 'required'],
            [['card_id'], 'integer'],
            [['purchase_date'], 'safe'],
            [['price'], 'number'],
            [['card_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cards::className(), 'targetAttribute' => ['card_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'card_id' => 'ID карты',
            'purchase_date' => 'Дата покупки',
            'price' => 'Цена',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCard()
    {
        return $this->hasOne(Cards::className(), ['id' => 'card_id']);
    }
}
