<?php

use yii\db\Migration;

/**
 * Class m190425_163044_addColumn
 */
class m190425_163044_addColumn extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity','user_id',
            $this->integer()->notNull());

        $this->addForeignKey('activity_useridFK',
            'activity','user_id','users','id',
            'CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('activity_useridFK','activity');

        $this->dropColumn('activity','user_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190425_163044_addColumn cannot be reverted.\n";

        return false;
    }
    */
}
