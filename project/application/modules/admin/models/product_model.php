<?php
class product_model extends MY_Model
{
    protected $_table = "tbl_product";
    
    public function __construct()
    {
        parent::__construct();    
    }
    public function getProduct()
    {
        $sql = "SELECT 
                        DISTINCT tbl_product.pro_id, 
                        tbl_product.pro_name, 
                        tbl_product.pro_price, 
                        tbl_product.pro_price_sale, 
                        tbl_product.pro_images, 
                        tbl_bran.bran_name
                FROM tbl_product
                LEFT JOIN tbl_cateproduct ON tbl_cateproduct.pro_id = tbl_product.pro_id
                LEFT JOIN tbl_bran ON tbl_bran.bran_id = tbl_product.pro_bran
               ";
        $this->query($sql);
        return $this->fetchAll();
    }
    public function getInfoUpdate($id)
    {
        $sql = "SELECT *  
                FROM tbl_product
                WHERE pro_id = '".$id."'
               ";
        $this->query($sql);
        return $this->fetchRows();
        
    }
    public function getCateId($idProduct)
    {
        $this->setWhere("pro_id = $idProduct");
        return $this->getAll("tbl_cateproduct");
    }
    public function getImagesThumb($idProduct)
    {
        $this->setWhere("pro_id = $idProduct");
        return $this->getAll("tbl_images");
    }
    
    public function insertAndUpdate($data = array(),$id = "")
    {
        if($id != "") {
            $this->setWhere("pro_id = $id");
                $this->update($data,$this->_table);
        }
        return $this->insert($data,$this->_table);
    }
    
    public function insertCateid($dataCateid = array())
    {
        $this->insert($dataCateid,"tbl_cateproduct");
    }
    public function insertImagesProduct($dataImages = array()) 
    {
        $this->insert($dataImages,"tbl_images");
    }
}