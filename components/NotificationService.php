<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 19.05.2019
 * Time: 20:23
 */

namespace app\components;


use app\components\logger\ILogger;
use yii\mail\MailerInterface;

class NotificationService implements Notification
{
    /** @var MailerInterface */
    private $mailer;
    /** @var ILogger */
    private $logger;

    public function __construct(MailerInterface $mailer, ILogger $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    /**
     * @param $activities Activity[]
     */
    public function sendActivityInfo($activities)
    {
        foreach ($activities as $activity) {
            if ($this->mailer->compose('activity', ['model' => $activity])
                ->setFrom('geekbrains@onedeveloper.ru')
                ->setTo($activity->email)
                ->setSubject('Событие не найдено')
                ->send()) {
                $this->logger->log('Email to ' . $activity->email . ' sended');
            }
        }
    }
}