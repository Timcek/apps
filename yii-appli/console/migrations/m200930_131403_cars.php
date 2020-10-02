<?php

use yii\db\Migration;

/**
 * Class m200930_131403_cars
 */
class m200930_131403_cars extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
//        $this->createTable('{{%cars}}', [
//            'id' => $this->primaryKey(),
//            'car_company' => $this->string()->defaultValue(null),
//            "model" => $this->string()->defaultValue(null),
//            "year" => $this->integer(30),
//        ]);
//        $this->addColumn('{{%cars}}', 'price', $this->integer(150));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200930_131403_cars cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200930_131403_cars cannot be reverted.\n";

        return false;
    }
    */
}
