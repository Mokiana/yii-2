<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 20.04.2019
 * Time: 20:36
 */

namespace app\models;

use app\models\rules\StopTitleValidator;
use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $description;
    public $dateStart;
    public $useNotification;
    public $email;
//    public $emailRepeat;
    public $isBlocked;
//    public $repeat;
    public $repeatCount;
    public $repeatInterval;
    public $file;

    private $repeatCountList=[0=>'Не повторять',1=>'Один раз',2=>'Два раза',3=>'Три раза',4=>'Четыре раза',5=>'Пять раз'];

    public function getRepeatCountList(){
        return $this->repeatCountList;
    }
    public function beforeValidate()
    {
        if(!empty($this->dateStart)){
            $date=\DateTime::createFromFormat('d.m.Y',$this->dateStart);
            if($date){
                $this->dateStart=$date->format('Y-m-d');
            }
        }
        return parent::beforeValidate();
    }
    public function rules() {
        return [
            ['title', 'required'],
            ['title','trim'],
//            ['description','match','pattern' => '/[a-z]{1,}/iu'],
            ['description', 'string', 'min' => 10],
            ['dateStart', 'date', 'format' => 'php:Y-m-d'],
            [['isBlocked','useNotification'],'boolean'],
            ['email','email','message' => 'Указан неправильный адрес'],
//            ['emailRepeat','compare','compareAttribute'=>'email'],
            ['email','required','when' => function($model){
                return $model->useNotification==1;
            }],
            ['file','file','extensions' => ['jpg','png','jpeg','gif']],
//            ['title','stopTitle'],
            [['title'],StopTitleValidator::class,'letters' => [1,2]],
//            ['repeatCount','number','integerOnly' => true,'min' => 0],
            ['repeatCount','in','range' => array_keys($this->repeatCountList)],
            ['repeatInterval','number','integerOnly' => true,'min' => 0],
        ];
    }

//    public function stopTitle($attr){
//        if($this->$attr=='admin'){
//            $this->addError('title','Выберите другой заголовок');
//        }
//    }
    public function attributeLabels() {
        return [
            'title'=>'Заголовок',
            'description'=>'Описание',
            'dateStart'=>'Дата начала',
            'isBlocked'=>'Блокирующее событие',
//            'repeat'=>'Повторение',
            'useNotification'=>'Уведомление на почту (обязательно указать адрес почты)',
            'email'=>'Адрес почты для отправки уведомлений',
            'repeatCount'=>'Количество повторений',
            'repeatInterval'=>'Интервал повторений, дн',
            'file'=>'Выберите файл, разрешенные расширения jpg,png,jpeg,gif',
        ];
    }
}