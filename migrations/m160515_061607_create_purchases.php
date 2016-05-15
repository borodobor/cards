<?php

use yii\db\Migration;

/**
 * Handles the creation for table `purchases`.
 */
class m160515_061607_create_purchases extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('purchases', [
            'id' => $this->primaryKey(),
            'card_id'=>$this->integer(),
            'purchase_date'=>$this->dateTime(),
            'price'=>$this->double()
        ]);

        $this->createIndex('card_id', 'purchases', 'card_id');
        $this->createIndex('price', 'purchases', 'price');
        $this->createIndex('date', 'purchases', 'purchase_date');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('purchases');
    }
}
