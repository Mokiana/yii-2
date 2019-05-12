<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 11.05.2019
 * Time: 22:25
 */


namespace app\behaviors;


use app\components\ActivityComponent;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\log\Logger;

class LoggerBehavior extends Behavior
{
    public function events()
    {
        return [
//            ActiveRecord::EVENT_AFTER_INSERT=>'event_funct',
            ActivityComponent::EVENT_CREATED_ACTIVITY=>'event_funct'
        ];
    }

    public function logIt(){
        \Yii::getLogger()->log('log it',Logger::LEVEL_WARNING);
    }

    public function event_funct(){
        \Yii::getLogger()->log('event funct',Logger::LEVEL_WARNING);
    }
}