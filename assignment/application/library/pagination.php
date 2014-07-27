<?php
class pagination
{   protected $page;
    public function __construct()
    {
        if(isset($_GET['page']) && $_GET['page']!=null)
            $this->page = $_GET['page'];
        else $this->page = 1;
    }
    public function startPaginate($array=array())
    {
        $data = array();
        $start=($this->page-1)*5;
        if(($start+5)>count($array))
        {
            $end = count($array);
        }
        else    $end = $start+5;
        
        for($start;$start<$end;$start++)
        {
            $data[] = $array[$start];
        }
        return $data;
    }
    public function countPage($array=array()){
        return (int) (count($array)/5)+1;
    }
    public function insert($data = array())
    {
        if(!isset($_SESSION['cart']) || $_SESSION['cart'] == null ) {
            $keys = $data['pro_id'];
            $data['soluong'] = 1;
            $_SESSION['cart'][$keys] = $data;
        }else{
            if(array_key_exists($data['pro_id'],$_SESSION['cart'])) {
                $_SESSION['cart'][$data['pro_id']]['soluong'] +=1;     
            }else{
                $data['soluong'] = 1;
                $_SESSION['cart'][$data['pro_id']] = $data;
            }  
        }
    }
    public function update($data = array())
    {
        if($data == null ){
            return false;
        }
        foreach($data as $key=>$val)
        {
            if($val <= 0){
                unset($_SESSION['cart'][$key]);
            }else{
                $_SESSION['cart'][$key]['soluong'] = $val;   
            }
        }
    }
    public function delete($id)
    {
        if(isset($_SESSION['cart']) && $_SESSION['cart'] != null ){
            unset($_SESSION['cart'][$id]);
        }
    }
    public function total()
    {
        
    }
}