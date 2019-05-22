<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 15.05.2019
 * Time: 19:10
 */

namespace app\components;


use yii\base\Component;
use yii\console\Application;
use yii\log\Logger;
use yii\mail\MailerInterface;
use app\models\Activity;

class NotificationComponent extends Component
{
    /**
     * @var MailerInterface
     */
    public $mailer;

    /**
     * @param $activities Activity[]
     */
    public function sendActivityInfo($activities)
    {
        foreach ($activities as $activity) {
            $this->mailer->compose('activity', ['model' => $activity])
                ->setFrom('geekbrains@onedeveloper.ru')
                ->setTo($activity->email)
                ->setSubject('Событие не найдено')
                ->send();
            {
                if (\Yii::$app instanceof Application) {
                    echo 'Email to ' . $activity->email . ' sended' . PHP_EOL;
                } else {
                    \Yii::getLogger()->log('Email to ' . $activity->email . ' sended', Logger::LEVEL_INFO);
                }
            }
        }
    }
}