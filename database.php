<?php
/**
 * Created by PhpStorm.
 * User: a.faller
 * Date: 29.05.2015
 * Time: 0:53
 */

include_once('./lib/bootstrap.php');

$tmp = Controllers_DataBase::getInstance()->getAllRecords();
var_dump(json_encode($tmp));