<?php
/**
 * Created by PhpStorm.
 * User: Talisman
 * Date: 13.05.2019
 * Time: 19:07
 */

namespace app\commands;


use app\components\NotificationComponent;
use yii\console\Controller;

class NotificationController extends Controller
{
    public $first;

    public $from;

    public function options($actionID)
    {
        return ['from'];
    }

    public function optionAliases()
    {
        return ['f'=>'from',];
    }

    public function actionSend(){
        if(empty($this->from)){
            $this->from=date('Y-m-d');
        }

        $acitvities=\Yii::$app->activity->getActivityWithNotification($this->from);

        if(count($acitvities)==0){
            echo 'Activities for notification not found'.PHP_EOL;
            \Yii::$app->end();
        }
        /** @var NotificationComponent $notifComp */
        $notifComp=\Yii::createObject(['class'=>NotificationComponent::class,
            'mailer' => \Yii::$app->mailer]);

        $notifComp->sendActivityInfo($acitvities);


//            echo $this->first.PHP_EOL;
//        echo 'ok send '.implode(',',$args).PHP_EOL;


    }
}