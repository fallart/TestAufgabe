<?php
/**
 * Created by PhpStorm.
 * User: a.faller
 * Date: 29.05.2015
 * Time: 0:53
 */

include_once('lib/bootstrap.php');

if(isset($_GET['action']) && $_GET['action']){
    $action = $_GET['action'];

    switch($action){
        case 'get_records':
            $filters = array();

            if(isset($_GET['vorname']) && $_GET['vorname']){
                $filters['firstname'] = $_GET['vorname'];
            }

            if(isset($_GET['nachname']) && $_GET['nachname']){
                $filters['lastname'] = $_GET['nachname'];
            }

            if(isset($_GET['postleitzahl']) && $_GET['postleitzahl']){
                $filters['zip_code'] = $_GET['postleitzahl'];
            }

            if(isset($_GET['wohnort']) && $_GET['wohnort']){
                $filters['city'] = $_GET['wohnort'];
            }
            Controllers_Main::getInstance()->getRecords($filters);
            break;
        case 'change_aktiv':
            if(isset($_GET['id'])){
                Controllers_Main::getInstance()->changeAktiv($_GET['id']);
            }
            break;
    }
}
