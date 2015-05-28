<?php
/**
 * Created by PhpStorm.
 * User: a.faller
 * Date: 29.05.2015
 * Time: 0:55
 */

class Controllers_Log {

    public static function message($message){
        $filePath = $_SERVER['DOCUMENT_ROOT'] . "/" . 'log' . "/Log.txt";
        $time = date_format(new DateTime(), 'Y-m-d H:i:s');
        file_put_contents($filePath, $time . ' - ' . $message . "; \r\n", FILE_APPEND);
    }

} 