<?php
/**
 * Class name: MY_Model
 * Author: ChungND
 */
 class MY_Model extends db
 {
    protected $_select = "*";
    protected $_where;
    protected $_order;
    protected $_limit;
        
    public function __construct()
    {
        //echo "<br/>Active Record Connect Database<br/>";
        $this->connect();
    }
        
    public function setSelect($col = "")
    {
        if($col != "")
        {
            $this->_select = $col;
        }
    }
        
    public function getSelect()
    {
        return $this->_select;
    }
        
    public function setWhere($where = "")
    {
        if($where != "")
        {
            $this->_where = "WHERE $where";
        }
    }
        
    public function getWhere()
    {
        return $this->_where;
    }
        
    public function setOrder($col = "",$order = 'ASC')
    {
        if($col != "")
        {
            $this->_order = "ORDER BY $col $order";
        }
            /*
            if($col == "")
            {
                return false;
            }
            $this->_order = "ORDER BY $col $order"; 
            */
    }
        
    public function getOrder()
    {
        return $this->_order;    
    }
        
    public function setLimit($limit = "",$start = "")
    {
        if($limit == "")
        {
            return false;
        }else if($limit != "" && $start == "")
        {
            $this->_limit = "LIMIT $limit";
        }else if($limit != "" && $start != "")
        {
            $this->_limit = "LIMIT $start,$limit"; 
        }
    }
        
    public function getLimit()
    {
        return $this->_limit;
    }
        
    public function getAll($table = "")
    {
        $sql = "SELECT {$this->getSelect()} from $table {$this->getWhere()}
                        {$this->getOrder()} {$this->getLimit()} 
                        ";
        $this->query($sql);
        return $this->fetchAll();
    }
        
    public function getOnce($table = "")
    {
        $sql = "SELECT {$this->getSelect()} from $table {$this->getWhere()} 
                        {$this->getOrder()} {$this->getLimit()} 
                        ";
        $this->query($sql);
        return $this->fetchRows();
    }
        
    public function insert($data = array(),$table = "")
    {
        if(is_null($data) || empty($table))
        {
            return false;
        }
        foreach($data as $key=>$val){
            $column[] = $key;
            $values[] = "'".$val."'";
        }
        $stringColumn = implode(",",$column);
        $stringValue = implode(",",$values);
        $sql = "INSERT INTO $table({$stringColumn}) VALUES({$stringValue})";
        $this->query($sql);
        return mysql_insert_id();
    }
        
    public function update($data = array(),$table = "")
    {
        if(is_null($data) || empty($table))
        {
            return false;
        }
            //debug($data);
        foreach($data as $key=>$val){
            $set[] = "$key='$val'";
        }
            //debug($set);
        $stringSet = implode(",",$set);
        $sql = "UPDATE $table SET {$stringSet} {$this->getWhere()}";
        $this->query($sql);
    }
        
    public function delete($table = "")
    {
        if($table == ""){
            return false;
        }
        $sql = "DELETE FROM $table {$this->getWhere()}";
        $this->query($sql);
    }
 }