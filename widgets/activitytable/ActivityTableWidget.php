<?php


namespace app\widgets\activitytable;


use yii\bootstrap\Widget;
use app\controllers\DayController;

class ActivityTableWidget extends Widget
{
    public $arColumns;
    public $arRows;
    public $arLinkFields;
    public $linkTemplate;
    public $param;

    public function run()
    {
        return $this->render('table',['arColumns'=>$this->arColumns,
            'arRows'=>$this->arRows,'arLinkFields'=>$this->arLinkFields,
            'linkTemplate'=>$this->linkTemplate,'param'=>$this->param]);
    }

//    public $countActivity;
//
//    public function run()
//    {
//        return $this->render('table', ['data'=>$this->$countActivity]);
//    }
}