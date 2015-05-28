<?php
/**
 * Created by PhpStorm.
 * User: a.faller
 * Date: 29.05.2015
 * Time: 0:30
 */

function autoLoad_function($className) {
    $filePath = str_replace('_', '\/', $className );
    $fileName = $_SERVER['DOCUMENT_ROOT'] . "/" . 'lib' . "/" . $filePath . ".php";
    return include_once($fileName);
}

spl_autoload_register('autoLoad_function');

