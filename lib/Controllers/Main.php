<?php
class Controllers_Main {

    protected static $_instance = null;

    /**
     * @return Controllers_Main
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct(){

    }

    public function getAllRecords(){
        echo json_encode(Controllers_DataBase::getInstance()->getAllRecords());
    }

    public function getRecords(){

    }

}
