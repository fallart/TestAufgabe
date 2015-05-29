<?php
/**
 * Created by PhpStorm.
 * User: a.faller
 * Date: 29.05.2015
 * Time: 0:53
 */

include_once('./lib/bootstrap.php');


if(isset($_GET['action']) && $_GET['action']){
    $action = $_GET['action'];

    switch($action){
        case 'get_all_records':
            Controllers_Main::getInstance()->getAllRecords();
            break;
        default:
            break;
    }
}