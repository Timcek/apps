<?php

use yii\db\Migration;

/**
 * Class m200831_144725_burek
 */
class m200831_144725_burek extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%burek}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200831_144725_burek cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200831_144725_burek cannot be reverted.\n";

        return false;
    }
    */
}
