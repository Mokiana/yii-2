<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 20.04.2019
 * Time: 18:18
 */

namespace app\controllers;

use app\controllers\actions\ActivityCreateAction;
use app\base\BaseController;
use app\models\Activity;
use app\models\ActivitySearch;
use yii\web\HttpException;

class ActivityController extends BaseController
{
    private function getRbac(){
        return \Yii::$app->rbac;
    }
    public function actions()
    {
        return [
            'create' => ['class'=>ActivityCreateAction::class,'rbac'=>$this->getRbac()]
        ];
    }
//    public function actions()
//    {
//        return [
//            'create'=>['class'=>ActivityCreateAction::class, 'name' => 'one'],
//            'new'=>['class'=>ActivityCreateAction::class, 'name' => 'two']
//
//        ];
//    }
    public function actionView($id){
        /** @var Activity $model */
        $model=\Yii::$app->activity->getModel();
        $model=$model::find()->andWhere(['id'=>$id])->one();

//        $model->title.='1';

//        $model->save();

//        print_r($model->getErrors());exit;

        if(!$this->getRbac()->canViewActivity($model)){
            throw new HttpException(403,'not access view');
        }

        return $this->render('view',['model'=>$model]);
    }

    public function actionIndex(){

        $model=new ActivitySearch();
        $provider=$model->search(\Yii::$app->request->getQueryParams());
        return $this->render('index',['model'=>$model,'provider'=>$provider]);
    }
}