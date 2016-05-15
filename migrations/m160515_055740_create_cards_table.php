<?php

use yii\db\Migration;

/**
 * Handles the creation for table `cards`.
 */
class m160515_055740_create_cards_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cards', [
            'id' => $this->primaryKey(),
            'series'=>$this->string(3)->notNull(),
            'number'=>$this->integer(6)->notNull(),
            'create_date'=>$this->dateTime()->notNull(),
            'expiration_date'=>$this->dateTime()->notNull(),
            'amount'=>$this->double()->notNull(),
            'status'=>$this->smallInteger()->notNull()
        ]);

        $this->createIndex('number','cards',['series','number'],true);
        $this->createIndex('create','cards','create_date');
        $this->createIndex('expire','cards','expiration_date');
        $this->createIndex('status', 'cards', 'status');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('cards');
    }
}
