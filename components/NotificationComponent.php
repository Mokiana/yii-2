<?php
/**
 * Created by PhpStorm.
 * User: Talisman
 * Date: 13.05.2019
 * Time: 19:32
 */

namespace app\components;


use app\models\Activity;
use yii\base\Component;
use yii\mail\MailerInterface;

class NotificationComponent extends Component
{
    /** @var MailerInterface */
    public $mailer;

    /**
     * @param $activities Activity[]
     */
    public function sendActivityInfo($activities)
    {
        foreach ($activities as $activity) {
            if ($this->mailer->compose('activity', ['model' => $activity])
                ->setFrom('geekbrains@onedeveloper.ru')
                ->setTo($activity->email)
                ->setSubject('Событие на сегодня')
                ->send()) {
                echo 'Email to '.$activity->email.' sended'.PHP_EOL;
            }
        }


    }
}