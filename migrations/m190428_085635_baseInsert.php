<?php

use yii\db\Migration;

/**
 * Class m190428_085635_baseInsert
 */
class m190428_085635_baseInsert extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users',[
            'id'=>1,
            'name'=>'test1',
            'login'=>'test1_1',
            'email'=>'test@test.ru',
            'password_hash'=>'qwerqwer',
        ]);

        $this->insert('users',[
            'id'=>2,
            'name'=>'test2',
            'login'=>'test2_2',
            'email'=>'test1@test.ru',
            'password_hash'=>'qwerqwer',
        ]);

        $this->batchInsert('activity',[
            'title','dateStart','dateEnd','user_id','useNotification'],[
            ['title 1',date('Y-m-d'),date('Y-m-d'),1,0],
            ['title 2',date('Y-m-d'),date('Y-m-d'),2,0],
            ['title 3',date('Y-m-d'),date('Y-m-d'),2,1],
            ['title 4',date('Y-m-d'),date('Y-m-d'),1,1],
            ['title 5','2019-03-01','2019-06-01',1,0],
            ['title 6','2019-03-02','2019-04-01',2,1],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190428_085635_baseInsert cannot be reverted.\n";

        return false;
    }
    */
}
