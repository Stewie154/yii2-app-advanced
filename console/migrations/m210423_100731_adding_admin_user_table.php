<?php

use yii\db\Migration;
use common\models\User;

/**
 * Class m210423_100731_adding_admin_user_table
 */
class m210423_100731_adding_admin_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $model = new User();
        $model->username = 'admin';
        $model->email = 'admin';
        $model->setPassword('password123');
        $model->generateAuthKey();
        $model->save();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $model = User::findOne([
            'username' => 'admin'
        ]);
        if ($model) {
            $model->delete();
        }
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210423_100731_adding_admin_user_table cannot be reverted.\n";

        return false;
    }
    */
}
