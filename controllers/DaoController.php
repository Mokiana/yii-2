<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 28.04.2019
 * Time: 14:34
 */

namespace app\controllers;

use app\base\BaseController;
use app\components\DaoComponent;
use yii\filters\PageCache;

class DaoController extends BaseController
{

    public function behaviors()
    {
        return [
            ['class'=>PageCache::class,'only' => ['dao'],'duration' => 10]
        ];
    }

    public function actionDao(){
        /** @var DaoComponent $comp */
        $comp=\Yii::createObject(['class'=>DaoComponent::class,
            'connection' =>\Yii::$app->db]);

        $comp->testInsert();

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

    public function actionCache(){
//        \Yii::$app->cache->set('first','two');

        $first=\Yii::$app->cache->get('first');

        $value=\Yii::$app->cache->getOrSet('key1',function (){
            return 'cache value';
        });

        \Yii::$app->cache->delete('key1');

//        \Yii::$app->cache->flush();
        echo $first.PHP_EOL;

        echo $value.PHP_EOL;
    }
}