<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 14.05.2019
 * Time: 21:44
 */

namespace app\commands;


use app\components\NotificationComponent;
use yii\console\Controller;

class NotificationController extends Controller
{

    public $first;

    public $from;

//    public function options($actionID)
//    {
//        return ['first'];
//    }
    public function options($actionID)
    {
        return ['from'];
    }
//    public function optionAliases()
//    {
//        return ['f'=>'first'];
//    }
    public function optionAliases()
    {
        return ['f'=>'from'];
    }
//    public function actionSend($id1, $id2)
//    {
//        echo 'ok send' . $id1 . $id2 . PHP_EOL;
//    }

//    public function actionSend(...$arg)
//{
//       echo 'ok send ' . implode(',',$arg) . PHP_EOL;
//}

    public function actionSend()
    {
        if (empty($this->from)){
            $this->from=date('Y-m-d');
        }

        $activities=\Yii::$app->activity->getActivityWithNotification($this->from);

        if(count($activities)==0){
            echo 'Activities for notification not found'.PHP_EOL;
            \Yii::$app->end();
        }
        /**
         * @var NotificationComponent $notifComp
         */
//        echo count($activities);
        $notifComp=\Yii::createObject(['class'=>NotificationComponent::class,
            'mailer'=> \Yii::$app->mailer]);

        $notifComp->sendActivityInfo($activities);
//        echo $this->first . PHP_EOL;;
//        echo 'ok send ' . implode(',',$arg) . PHP_EOL;
    }
}