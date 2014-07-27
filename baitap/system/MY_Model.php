<?php
class MY_Model extends database
{
    protected $_select = "*";
    protected $_where;
    protected $_order;
    protected $_limit;
    
    public function __construct()
    {
        $this->connect();
    }
    public function setSelect($column = "")
    {
        $this->_select = $column;
    }
    public function getSelect()
    {
        return $this->_select;
    }
    
    public function setWhere($value)
    {
        $this->_where = "WHERE $value";
    }
    public function getWhere()
    {
        return $this->_where;
    }
    
    public function setOrder($column,$type="ASC")
    {
        $this->_order = "ORDER BY $column $type";
    }
    public function getOrder()
    {
        return $this->_order;
    }
    
    public function setLimit($limit,$start = "")
    {
        if($limit != "" && $start == "") 
        {
            $this->_limit = "LIMIT $limit";
        }else{
            $this->_limit = "LIMIT $start,$limit";
        }
    }
    public function getLimit()
    {
        return $this->_limit;
    }
    
    
    public function getAll($table = "")
    {
        if($table == ''){
            return false;
        }
        $sql = "SELECT {$this->getSelect()} FROM $table {$this->getWhere()} {$this->getOrder()} {$this->getLimit()}";
        $this->query($sql);
        return $this->fetchAll();
    }
    public function insert($table_name,$data = array())
    {
        $columnArr = array_keys($data);
        $valueArr = array_values($data);
        foreach($valueArr as $key=>$value)
        {
            $valueArr[$key] = '"'.$value.'"';
        }
        $stringColumn = implode(",",$columnArr);
        $stringValue = implode(",",$valueArr);
        $sql = "INSERT INTO $table_name($stringColumn) VALUES($stringValue)";
        $this->query($sql);
    }
    public function delete($table_name)
    {
        $sql = "DELETE FROM $table_name {$this->getWhere()}";
        $this->query($sql);
    }
    
}