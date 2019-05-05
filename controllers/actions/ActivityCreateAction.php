<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 20.04.2019
 * Time: 21:31
 */

namespace app\controllers\actions;

use app\components\ActivityComponent;
use app\components\RbacComponent;
use app\models\Activity;
use yii\base\Action;
use yii\bootstrap\ActiveForm;
use yii\web\HttpException;
use yii\web\Response;

class ActivityCreateAction extends Action
{
    /** @var RbacComponent */
    public $rbac;
    public $name;

    /**
     * @return string
     * @throws \yii\base\InvalidConfigException
     * @var ActivityComponent $component
     */
    public function run()
    {
        if(!$this->rbac->canCreateActivity()){
            throw new HttpException(403,'Not access create activity');
        }
        $model = \Yii::$app->activity->getModel();

        /**
         * @return string
         * @throws \yii\base\InvalidConfigException
         * @var ActivityComponent @comp
         */
        $comp = \Yii::createObject(['class' => ActivityComponent::class, 'activity_class' => Activity::class]);
        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
//            print_r($model->getAttributes());
//                $model->title=null;
//                if (!$model->validate()){
////                    print_r($model->getErrors());
////                }
////                exit;
            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            if ($comp->createActivity($model)) {
                return $this->controller->render('view', ['model' => $model]);
            };
        }
        return $this->controller->render('create', ['model' => $model, 'name' => $this->name]); // в активити не было слова контроллер
    }
}