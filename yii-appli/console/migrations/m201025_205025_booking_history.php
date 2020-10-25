<?php

use yii\db\Migration;

/**
 * Class m201025_205025_booking_history
 */
class m201025_205025_booking_history extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cars}}', [
                        'id' => $this->integer(11),
                        'booking_date' => $this->date(),
                        "booking_time_days" => $this->integer(6),
                        "user" => $this->char(50),
                    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201025_205025_booking_history cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201025_205025_booking_history cannot be reverted.\n";

        return false;
    }
    */
}
