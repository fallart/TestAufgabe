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
     * @return Controllers_DataBase
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
        $filePath = DOC_ROOT . DS . 'config' . DS . 'database.php';
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

    public function getRecords($filters = array()){
        $query = 'SELECT * FROM `adresse`';

        if($filters && is_array($filters)){
            $i = 0;
            foreach($filters as $key => $value){
                if($i === 0){
                    $query .= ' WHERE ';
                }
                else{
                    $query .= ' AND ';
                }

                $query .= '`' . $key . '`' . ' LIKE \'' . $value . '\'';
                $i++;
            }
        }
        Controllers_Log::message($query);
        $res = $this->_db->query($query . ' ORDER BY id ASC');
        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function changeAktiv($id){
        try{
            $stmt = $this->_db->stmt_init();
            $stmt->prepare('UPDATE `adresse` SET `enabled` = !`enabled` WHERE `id`= ?');
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->close();
        }
        catch(Exception $ex){
            Controllers_Log::message('affected_rows: '.$ex->getMessage());
        }
    }
}
