<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 15.05.2019
 * Time: 19:10
 */

namespace app\components;


use yii\base\Component;
use yii\mail\MailerInterface;

class NotificationComponent extends Component
{
    /**
     * @var MailerInterface
     */
    public $mailer;

    public function sendActivityInfo($activities)
    {
        foreach ($activities as $activity) {
            $this->mailer->compose('activity', ['model' => $activity])
                ->setFrom('geekbrains@onedeveloper.ru')
                ->setTo($activity->email)
                ->setSubject('Событие не найдено')
                ->send(); {
            echo 'Email to '.$activity->email.' sended'.PHP_EOL;
            }
        }
    }
}