<?php
class db
{
    protected $_connect;
    protected $_query;
    public function connect()
    {
        //echo "Connect OK";
       $this->_connect = mysql_connect(database_config::HOSTNAME,database_config::USERNAME,database_config::PASSWORD) or die("Disconnect !");
       mysql_select_db(database_config::DBNAME,$this->_connect);
       //mysql_query("SET NAMES utf8");
    }
    
    public function query($sql = "")
    {
        //echo "Query OK";
        if($sql == '' || !$this->_connect) {
            return false;
        }
        $this->_query = mysql_query($sql);
    }
    
    public function numRows()
    {
        echo "numRows OK";
        if(!$this->_query){
            return false;
        }
        echo "numRows OK";
        return mysql_num_rows($this->_query);
    }
    
    public function fetchRows()
    {
        //echo "fetchRows OK";
        if(!$this->_query){
            return false;
        }
        return mysql_fetch_assoc($this->_query);
    }
    
    public function fetchAll()
    {
        //echo "fetchAll OK";
        $data = array();
        if(!$this->_query){
            return false;
        }
        while($row = mysql_fetch_assoc($this->_query)){
            $data[] = $row;
        }
        return $data;
    }          
}