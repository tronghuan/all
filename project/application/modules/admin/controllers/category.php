<?php
/**
 * Class name: category
 * Author: ChungND
 */
class category extends MY_Controller
{
    protected $_table = "tbl_category";
    protected $_cate_name;
    protected $_cate_parent;
    protected $_error = array();
    
    public function setCateName($value = "")
    {
        $this->_cate_name = $value;
    }
    public function getCateName()
    {
        return $this->_cate_name;
    }
    public function setCateParent($value = "")
    {
        $this->_cate_parent = $value;
    }
    public function getCateParent()
    {
        return $this->_cate_parent;
    }
    public function index()
    {
        $this->loadModel("category_model");
        $listCategory = $this->_model->getCategory();
        $system = new recursive($listCategory);
        $result = $system->buildArray('cate_parent');      
        $data['listCategory'] = $result;
        $data['template'] = "category/listCategory";
        $this->loadView("layout/layout",$data);
    }
    public function insertCategory()
    { 
        $params = request::getParams();
        if(request::is_Post()){
            $dataCategory = $this->setValue($params);
            if($this->checkData($params)){
                $this->loadModel("category_model");
                $this->_model->insert_update_category($dataCategory);
                redirect("admin","category");
            }else{
                $data = $this->_error;
            }
        }
        $this->loadModel("category_model");
        $data['showCategory'] = $this->getDataInsertCategory(0);
        $data['template'] = "category/insertCategory";
        $this->loadView("layout/layout",$data);
    }
    public function editCategory()
    {
        $params = request::getParams();
        $cateId = $params['id'];
        $this->loadModel("category_model");
        $data['editCategory'] = $this->_model->getCategory($cateId);
        $data['showCategory'] = $this->getDataInsertCategory(0);
        // Update
        if(request::is_Post()) {
            $dataCategoryUpdate = array(
                                    "cate_name"  =>$params['cate_name'],
                                    "cate_parent"=>$params['cate_parent']
                              );
            $this->_model->insert_update_category($dataCategoryUpdate,$cateId);   
        }
        $data['title'] = "Sửa category";
        $data['template'] = "category/editCategory";
        $this->loadView("layout/layout",$data);
    }
    public function deleteCategory()
    {   
        $id = request::getParams("id");
        $this->loadModel("category_model");
        $categoryInfo = $this->_model->getCategory($id);
        $listCategoryParent = $this->_model->getCategoryParent($id);
        $this->_model->deleteCategory($id);
        $dataUpate = array(
                        "cate_parent"=>$categoryInfo['cate_parent']
                     );
        if($listCategoryParent != null) {
           foreach($listCategoryParent as $val) {
                $this->_model->insert_update_category($dataUpate,$val['cate_id']);
           }
        }
    }   
    private function getDataInsertCategory($parent = 0,$gach = '-  ',$data = NULL)
    {
        if(!$data) $data = array();
        $objCategory = new category_model;
        $objCategory->setWhere("cate_parent = $parent");
        $sql = $objCategory->getAll($this->_table);
        //debug($sql);
        foreach($sql as $key=>$value){
            $data[] = array(
                        'cate_id'    =>$value['cate_id'],
                        'cate_name'  =>$gach.$value['cate_name'],
                        'cate_parent'=>$value['cate_parent']
                        );
            $data = $this->getDataInsertCategory($value['cate_id'],$gach.'--   ',$data);
        }
        return $data;
    }
    private function listCategory($data = array())
    {        
        foreach($data as $key1=>$value1){
            foreach($data as $key2=>$value2){
                if($value1['cate_parent'] == 0){
                    $data[$key1]['sub'] = "Menu Cha";
                }
                if($value1['cate_parent'] == $value2['cate_id']){
                    $data[$key1]['sub'] = $data[$key2]['cate_name'];
                }
            }
        }
        return $data;
    }
    private function checkData($params = array())
    {
        $flag = true;
        if(!validation::isNull($params['cate_parent'])){
            $flag = false;
            $this->_error['errorCateParent'] = '<span class="notification-input ni-error">Please select Cate_Parent!</span>';
        }
        if(!validation::isNull($params['cate_name'])){
            $flag = false;
            $this->_error['errorCateName'] = '<span class="notification-input ni-error">Sorry, try again.</span>';
        }
        return $flag;
    }
    private function setValue($params = array())
    {
        $this->setCateName($params['cate_name']);
        $this->setCateParent($params['cate_parent']);
        $dataCategory = array(
                            "cate_name"  =>$this->getCateName(),
                            "cate_parent"=>$this->getCateParent()
                        );
        return $dataCategory;
    }
}