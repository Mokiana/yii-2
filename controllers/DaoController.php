<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\DAOComponent;

class DaoController extends BaseController
{
    public function actionDao(){
        /** @var DAOComponent $comp */
        $comp=\Yii::createObject(['class'=>DAOComponent::class,
            'connection' =>\Yii::$app->db]);

        $users=$comp->getAllUsers();

        $activityUser=$comp->getActivityUser(\Yii::$app->request->get('user',1));

        $activityNotification=$comp->getActivityNotification();

        $firstActivity=$comp->getFirstActivity();

        $countActivity=$comp->getCountActivity();
        return $this->render('dao',['users'=>$users,
            'activityNotification'=>$activityNotification,
            'activityUser'=>$activityUser,
            'firstActivity'=>$firstActivity,
            'countActivity'=>$countActivity]);
    }
}