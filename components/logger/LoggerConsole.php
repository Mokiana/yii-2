<?php
/**
 * Created by PhpStorm.
 * User: Moka-tian
 * Date: 19.05.2019
 * Time: 20:38
 */

namespace app\components\logger;


use yii\helpers\Console;

class LoggerConsole implements ILogger
{

    public function log($txt)
    {
        echo Console::ansiFormat($txt,[Console::FG_GREEN]).PHP_EOL;
    }
}