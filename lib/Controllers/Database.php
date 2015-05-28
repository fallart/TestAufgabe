<?php
/**
 * Created by PhpStorm.
 * User: a.faller
 * Date: 29.05.2015
 * Time: 0:09
 */

class Controllers_DataBase
{

    protected $_db;
    protected static $_instance = null;

    /**
     * @return Controllers_DataBase|null
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct()
    {
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
        include_once($filePath);
        if (isset($data)) {
            $this->_db = new mysqli($data['hostname'], $data['username'], $data['password'], $data['db_name']);
            if ($this->_db->connect_errno) {
                Controllers_Log::message("Unable to connect: (" . $this->_db->connect_errno . ") " . $this->_db->connect_error);
                exit();
            }
        } else {
            Controllers_Log::message('Config load error: ' . $filePath);
        }
    }

    public function getAllRecords(){
        $res = $this->_db->query('SELECT * FROM adresse ORDER BY id ASC');
        return $res->fetch_all();
    }
}