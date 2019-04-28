<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 20.04.2019
 * Time: 22:25
 */

namespace app\components;


use app\models\Activity;
use yii\base\Component;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class ActivityComponent extends Component
{
    public $activity_class;

    public function init(){
        parent::init();
        if(empty($this->activity_class)){
            throw new \Exception('Need activity_class param');
        }
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

        if (!$model->validate()){
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
                $files->saveAs('uploads/' . $files->baseName . '.' . $files->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}