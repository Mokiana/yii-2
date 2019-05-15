<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 28.04.2019
 * Time: 14:33
 */

namespace app\components;


use yii\base\Component;
use yii\caching\DbDependency;
use yii\caching\TagDependency;
use yii\db\Connection;
use yii\db\Exception;
use yii\db\Query;

class DaoComponent extends Component
{
    /** @var Connection */
    public $connection;


    /**
     * @return Connection
     */
    public function getDb(){
        return $this->connection;
    }

    public function getActivityNotification(){
        $query=new Query();
        $query->select(['title','dateSTart','user_id'])
            ->from('activity')
            ->andWhere(['useNotification'=>1])
            ->andWhere('user_id=:user',[':user' => 2])
            ->limit(2)
            ->orderBy(['title'=>SORT_DESC]);

//        TagDependency::invalidate(\Yii::$app->cache, 'tag1');
//        return $query->all();
        return $query->cache(10, new TagDependency(['tags'=>'tag1']))->all();
    }

    public function getFirstActivity(){
        $query=new Query();
        return $query->from('activity')
            ->limit(3)
            ->cache(10)
            ->one($this->getDb());
    }

    public function getCountActivity(){
        $query=new Query();
        return $query->from('activity')
            ->select('count(id) as cnt')
            ->cache(10)
            ->scalar();
    }

    public function getActivityUser($user_id){
        $sql='select * from activity where user_id=:user';

        return $this->getDb()->
//        createCommand($sql,[':user'=>$user_id])
//            ->queryAll();
        createCommand($sql,[':user'=>$user_id])
            ->cache(10, new DbDependency(['sql'=>'select max(id) from activity;']))
            ->queryAll();
    }

    public function testInsert(){

        $trans=$this->getDb()->beginTransaction();

        try {
//            $this->getDb()->createCommand()
//                ->insert('activity', ['title' => 'testTile',
//                    'dateStart' => date('Y-m-d'),
//                    'user_id' => 1])
//                ->execute();
            $id = $this->getDb()->getLastInsertID();
//            throw new Exception('test');
            $this->getDb()->createCommand()->update('activity',
                ['user_id' => 2], ['id' => $id])->execute();

            $trans->commit();
        }catch (\Exception $e){
            $trans->rollBack();

        }

    }

    public function getAllUsers(){
        $sql='select * from users';

//        return $this->getDb()->createCommand($sql)->queryAll();
        return $this->getDb()->createCommand($sql)->cache(7)->queryAll();
    }
}