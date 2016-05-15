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
            'card_id'=>$this->integer()->notNull(),
            'purchase_date'=>$this->dateTime()->notNull(),
            'price'=>$this->double()->notNull()
        ]);

        $this->createIndex('card_id', 'purchases', 'card_id');
        $this->createIndex('price', 'purchases', 'price');
        $this->createIndex('date', 'purchases', 'purchase_date');
        $this->addForeignKey('card', 'purchases', 'card_id', 'cards', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('purchases');
    }
}
