<?php

use yii\db\Migration;

/**
 * Class m210423_094826_adding_author_table
 */
class m210423_094826_adding_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('authors', [
            'id' => $this->primaryKey(), 
            'name' =>$this->string(),
            'age' =>$this->integer(),
            'bio' =>$this->string(4096),
            'fact' =>$this->string(),
            'picture' =>$this->string(4096),
            'location' =>$this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('authors');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210423_094826_adding_author_table cannot be reverted.\n";

        return false;
    }
    */
}
