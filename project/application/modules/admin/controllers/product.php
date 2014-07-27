<?php
/**
 * Class name
 * author:
 * Date
 */
 class product extends MY_Controller
 {
    protected $_proid;
    protected $_proname;
    protected $_proprice;
    protected $_propricesale;
    protected $_proimages;
    protected $_prodesc;
    protected $_proinfo;
    protected $_prostatus;
    protected $_probran;
    protected $_procountry;
    protected $_error;
 
    public function __construct()
    {
        parent::__construct();
    }
    
    public function setId($value)
    {
        $this->_proid = $value;    
    }
    public function getId()
    {
        return $this->_proid;
    }
    
    public function setName($value)
    {
        $this->_proname = $value;    
    }
    public function getName()
    {
        return $this->_proname;
    }
    
    public function setPrice($value)
    {
        $this->_proprice = $value;    
    }
    public function getPrice()
    {
        return $this->_proprice;
    }
    
    public function setPricesale($value)
    {
        $this->_propricesale = $value;    
    }
    public function getPricesale()
    {
        return $this->_propricesale ;
    }
    
    public function setImages($value)
    {
        $this->_proimages = $value;    
    }
    public function getImages()
    {
        return $this->_proimages ;
    }
    
    public function setDesc($value)
    {
        $this->_prodesc = $value;    
    }
    public function getDesc()
    {
        return $this->_prodesc ;
    }
    
    public function setInfo($value)
    {
        $this->_proinfo = $value;    
    }
    public function getInfo()
    {
        return $this->_proinfo ;
    }
    
    public function setStatus($value)
    {
        $this->_prostatus = $value;    
    }
    public function getStatus()
    {
        return $this->_prostatus ;
    }
    
    public function setBran($value)
    {
        $this->_probran = $value;    
    }
 
    public function getBran()
    {
        return $this->_probran;
    }
    
    public function setCountry($value)
    {
        $this->_procountry = $value;    
    }
 
    public function getCountry()
    {
        return $this->_procountry;
    }
    
    public function listProduct()
    {
        $this->loadModel("product_model");
        $data['listProduct'] = $this->_model->getProduct();
        $data['title'] = "Danh sách sản phẩm";
        $data['template'] = "product/listProduct";
        $this->loadView("layout/layout",$data);
    }
    public function insertProduct()
    {
        $params = request::getParams();
        $this->loadModel("category_model");
        $category = $this->_model->getCategory();
        $system = new recursive($category);
        $result = $system->buildArray('cate_parent');  
        $data['listCategory'] = $result;
        //Lấy ra danh sách bran
        $this->loadModel("bran_model");
        $data['bran']  = $this->_model->getBran();
        //get country
        $this->loadModel("country_model");
        $data['country'] = $this->_model->getCountry();
        if(request::is_Post()) {
            if($this->checkData($params)){
                $this->setData($params);
                $dataInsert = $this->getData();
                if($this->uploadMainImage()) {
                    $dataInsert['pro_images'] = $this->uploadMainImage(); 
                }
                $this->loadModel("product_model");
                $idProduct = $this->_model->insertAndUpdate($dataInsert);
                $dataCateProduct = array(
                                        "pro_id"=>$idProduct
                                    );
                if($this->getCategory() != null) {
                    $categoryId = $this->getCategory();
                    foreach($categoryId as $val){
                        $dataCateProduct['cate_id'] = $val;
                        $this->_model->insertCateid($dataCateProduct);
                    }
                }
                //Upload anh phu
                if($this->uploadMultilImages() != null ) {
                    $nameImages = $this->uploadMultilImages();
                    $dataImages = array(
                                        "pro_id"=>$idProduct
                                    );
                    foreach($nameImages as $val) {
                        $dataImages['img_name'] = $val;
                        $this->_model->insertImagesProduct($dataImages);
                    }  
                }
            } 
        }
        $data['error'] = $this->_error;
        $data['titleHead'] = "Thêm mới sản phẩm";
        $data['template'] = "product/insertproduct";
        $this->loadView("layout/layout",$data);
    }
    
    
    public function editProduct()
    {
        $params = request::getParams();
        $idPro = $params['id'];
        $this->loadModel("product_model");
        $data['infoProduct'] = $infoProduct =$this->_model->getInfoUpdate($idPro);
        $this->loadModel("category_model");
        $category = $this->_model->getCategory();
        $system = new recursive($category);
        $result = $system->buildArray('cate_parent');  
        $data['listCategory'] = $result;
        //Lấy ra danh sách bran
        $this->loadModel("bran_model");
        $data['bran']  = $this->_model->getBran();
        //get country
        $this->loadModel("country_model");
        $data['country'] = $this->_model->getCountry();
        // Lấy ra danh sách các category_id;
        $productObj = new product_model;
        $cateIdArr = $productObj->getCateId($idPro);
        $cateArr = array();
        if(isset($cateIdArr) && $cateIdArr != null) {
            foreach($cateIdArr as $valCate) {
                $cateArr[] = $valCate['cate_id'];
            }
        }
        $data['listCateid'] = $cateArr;
        // Lay ra anh thumb cua san pham
        $imagesArr = array();
        $imagesArr = $productObj->getImagesThumb($idPro);
        $data['listThumb'] = $imagesArr;
        
        // Thuc hien viec update
         if(request::is_Post()) {
            if($this->checkData($params)){
                $this->setData($params);
                $dataUpdate = $this->getData();
                
                if($this->uploadMainImage()) {
                    $dataUpdate['pro_images'] = $this->uploadMainImage(); 
                }
                $this->loadModel("product_model");
                $idProduct = $this->_model->insertAndUpdate($dataUpdate,$idPro);
                $dataCateProduct = array(
                                        "pro_id"=>$idProduct
                                    );
                if($this->getCategory() != null) {
                    $categoryId = $this->getCategory();
                    foreach($categoryId as $val){
                        $dataCateProduct['cate_id'] = $val;
                        $this->_model->insertCateid($dataCateProduct);
                    }
                }
            }
         }
        
        $data['template'] = "product/updateproduct";
        $this->loadView("layout/layout",$data);
           
    }
    
    private function checkData($params = array()) {
        $flag = true;
        if(!validation::isNull($params['productname'])) {
            $flag = false;
            $this->_error['errorName'] = "Vui lòng nhập tên sản phẩm";
        }
        if(!validation::isNull($params['product_price'])) {
            $flag = false;
            $this->_error['errorPrice'] = "Vui lòng nhập giá sản phẩm";
        } else if(!validation::isNumber($params['product_price'])) {
            $flag = false;
            $this->_error['errorPrice'] = "Giá sản phẩm phải là số";
        }
        if($this->getCategory() == null ) {
            $flag = false;
            $this->_error['errorCategory'] = "Vui lòng chọn category";
        }
        
        return $flag;
    }
    private function setData($params = array())
    {
        $this->setName($params['productname']);
        $this->setPrice($params['product_price']);
        $this->setPricesale($params['price_sale']);
        $this->setDesc($params['pro_description']);
        $this->setInfo($params['pro_info']);
        $this->setStatus($params['status']);
        $this->setBran($params['bran']);
        $this->setCountry($params['country']);
    }
    private function getCategory()
    {
        $dataCategory = array();
        if(isset($_POST['category']) && $_POST['category'] != null) {
            $dataCategory = $_POST['category'];
        }
        return $dataCategory;
    }
    public function getData()
    {
        $data = array();
        $data['pro_name']  = $this->getName();
        $data['pro_price'] = $this->getPrice();
        $data['pro_price_sale'] = $this->getPricesale();
        $data['pro_desc']    = $this->getDesc();
        $data['pro_info']    = $this->getInfo();
        $data['pro_status']  = $this->getStatus();
        $data['pro_bran']    = $this->getBran();
        $data['pro_country'] = $this->getCountry(); 
        return $data;
    }
    private function uploadMainImage()
    {
        $fileName = "";
        $fileInfo = $_FILES['images'];
        if($fileInfo['name'] != null ) {
            $fileName = time().$fileInfo['name'];
            move_uploaded_file($fileInfo['tmp_name'],"uploads/product/".$fileName);   
        }
        return  $fileName;
    }
    private function uploadMultilImages()
    {
        $fileInfo = $_FILES['imgs'];
        $fileName = array();
        if(isset($fileInfo['name']) && $fileInfo['name'] != null) {
            for($i = 0; $i < count($fileInfo['name']); $i++ ){
                $nameFile = time().$fileInfo['name'][$i];
                $fileName[] = $nameFile;
                move_uploaded_file($fileInfo['tmp_name'][$i],"uploads/product/thumb/".$nameFile);
            }
        }
        return $fileName;
    }
 }