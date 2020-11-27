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
        $this->createTable('{{%cars}}', [
            'id' => $this->primaryKey(),
            'car_company' => $this->string()->defaultValue(null),
            "model" => $this->string()->defaultValue(null),
            "year" => $this->integer(30),
        ]);
        $this->addColumn('{{%cars}}', 'price', $this->string());
        $this->addColumn('{{%cars}}', 'engine_power', $this->int(11));
        $this->addColumn('{{%cars}}', 'dors', $this->int(11));
        $this->addColumn('{{%cars}}', 'seats', $this->int(11));
        $this->addColumn('{{%cars}}', 'gearing_type', $this->varchar(50));
        $this->addColumn('{{%cars}}', 'fuel_type', $this->varchar(50));
        $this->addColumn('{{%cars}}', "Booking",$this->varchar(20));
        $this->addColumn('{{%cars}}', "user",$this->varchar(20));
        $this->addColumn('{{%cars}}', "car_photo",$this->varchar(40));
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
