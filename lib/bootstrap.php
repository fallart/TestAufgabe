<?php
/**
 * Created by PhpStorm.
 * User: a.faller
 * Date: 29.05.2015
 * Time: 0:30
 */

include_once('./config/config.php');

function autoLoad_function($className) {
    $filePath = str_replace('_', DS, $className );
    $fileName = DOC_ROOT . DS . 'lib' . DS . $filePath . ".php";
    return include_once($fileName);
}

spl_autoload_register('autoLoad_function');

