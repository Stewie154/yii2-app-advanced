<?php

use yii\db\Migration;

/**
 * Class m210423_095545_adding_posts_table
 */
class m210423_095545_adding_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(), 
            'Title' =>$this->string(),
            'Content' =>$this->string(8192),
            'picture' =>$this->string(4096),
            'Twitter' =>$this->string(4096),
            'Instagram' =>$this->string(4096),
            'Facebook' =>$this->string(4096),
            'author_id' =>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('posts');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210423_095545_adding_posts_table cannot be reverted.\n";

        return false;
    }
    */
}
