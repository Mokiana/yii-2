<?php

use yii\db\Migration;

/**
 * Class m190425_161153_createTables
 */
class m190425_161153_createTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity',[
            'id'=>$this->primaryKey(),
            'title'=>$this->string(150)->notNull(),
            'description'=>$this->text(),
            'dateStart'=>$this->date()->notNull(),
            'useNotification'=>$this->tinyInteger()->notNull()->defaultValue(0),
            'email'=>$this->string(150),
            'isBlocked'=>$this->tinyInteger()->notNull()->defaultValue(0),
            'date_created'=>$this->timestamp()->notNull()
                ->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->execute('');

        $this->createTable('users',[
            'id'=>$this->primaryKey(),
            'email'=>$this->string(150)->notNull(),
            'password_hash'=>$this->string('300')->notNull(),
            'token'=>$this->string('300'),
            'auth_key'=>$this->string('300'),
            'date_created'=>$this->timestamp()->notNull()
                ->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->createIndex('users_emailInd','users','email',true);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
        $this->dropTable('activity');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190425_161153_createTables cannot be reverted.\n";

        return false;
    }
    */
}
