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

    public function getRecords($filters = array()){
        echo json_encode(Controllers_DataBase::getInstance()->getRecords($filters));
    }

    public function changeAktiv($id){
        $id = intval($id);
        Controllers_Log::message($id);
        echo Controllers_DataBase::getInstance()->changeAktiv($id);
    }

}
