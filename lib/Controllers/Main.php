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
        $valid = true;
        foreach($filters as $key => $val){
            if(!preg_match('/^[\w0-9\%]+$/i',$val)){
                $valid = false;
				$message = 'Invalid value:' . $val;
				Controllers_Log::message($message);
				echo json_decode(array(
					'result' => 'fail',
					'reason' => $message,
				));
				exit();
				break;
            }
        }
        if($valid){
            echo json_encode(array('result' => 'ok', 'data' => Controllers_DataBase::getInstance()->getRecords($filters)));
        }
    }

    public function changeAktiv($id){
        $id = intval($id);
        if($id || $id === 0){
            Controllers_DataBase::getInstance()->changeAktiv($id);
        }
    }

}
