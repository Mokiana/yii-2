<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 28.04.2019
 * Time: 17:29
 */

namespace app\components;


use app\models\Activity;
use yii\base\Component;
use yii\base\Model;

class ActivityRepository extends Component
{

    public function getDb(){
        return \Yii::$app->db;
    }

    /** @param $model Model */
    public function saveActivity($model){
        $cnt=$this->getDb()->createCommand()->insert('activity',
        $model->
            getAttributes(['title','description','dateStart']))->execute();
        return true;
    }
    public function getActivityById($id){
        $data=$this->getDb()->createCommand('select * from activity where id=:id',[':id'=>$id])->gueryOne();
        $model=new Activity();
        $model->setAttributes($data);
        return $model;
    }

}