<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 20.04.2019
 * Time: 22:25
 */

namespace app\components;


use app\behaviors\LoggerBehavior;
use app\models\Activity;
use yii\base\Component;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class ActivityComponent extends Component
{
    public $activity_class;

    const EVENT_CREATED_ACTIVITY='created_activity';

    public function behaviors()
    {
        return [
            LoggerBehavior::class
        ];
    }

    public function init(){
        parent::init();
        if(empty($this->activity_class)){
            throw new \Exception('Need activity_class param');
        }
        $this->trigger(self::EVENT_CREATED_ACTIVITY);
    }

    /**
     * @return Activity
     */
    public function getModel(){
        return new $this->activity_class;
    }

    /**
     * @param $model Activity
     * @return bool
     */
    public function createActivity(&$model):bool{
        $model->file=$this->getUploadedFile($model,'file');
        $model->user_id=\Yii::$app->user->id;


//        if (!$model->validate()){
        if (!$model->save()){
//            print_r($model->getErrors());
            return false;
        }
        if($model->file){

            $path=$this->genFilePath($this->genFileName($model->file));
            if(!$this->saveUploadedFile($model->file,$path)){
                $model->addError('file','Не удалось сохранить файл');
                return false;
            }else{
                $model->file=basename($path);
            }
        }
        return true;
    }
    private function saveUploadedFile(UploadedFile $file,$path):bool{
        return $file->saveAs($path);
    }

    private function genFileName(UploadedFile $file){
        $file=uniqid().'.'.$file->getExtension();
        return $file;
    }

    private function genFilePath($file_name){
        FileHelper::createDirectory(\Yii::getAlias('@webroot/images'));
        $path=\Yii::getAlias('@webroot/images/'.$file_name);
        return $path;
    }

    /**
     * @param Activity $model
     * @param $attr
     * @return UploadedFile|null
     */
    private function getUploadedFile(Activity $model,$attr){
        $file=UploadedFile::getInstance($model,$attr);
        return $file;
    }

    public function actionUpload()
    {
        $model = new Activity();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $files) {
                $files->saveAs('images/' . $files->baseName . '.' . $files->extension);
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $from
     * @return Activity[]|array|\yii\db\ActiveRecord[]
     */
    public function getActivityWithNotification(string $from){
        $activities=$this->getModel()::find()->andWhere(['useNotification'=>1])
            ->andWhere('dateStart<=:date2',[':date2' => $from.' 23:59:59'])
            ->andWhere('dateStart>=:date',[':date' => $from])
            ->all();

        return $activities;
    }
}