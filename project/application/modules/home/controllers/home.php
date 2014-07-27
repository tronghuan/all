<?php
class home extends MY_Controller
{
    public function index()
    {
        $this->loadModel("product_model");
        $data['listProduct'] = $this->_model->listProduct();
        $this->loadModel("category_model");
        $listCate = $this->_model->listCategory();
        $system = new recursive($listCate);
        $result = $system->buildArray('cate_parent');  
        $data['listCategory'] = $result;
        $data['template'] = "default/home";
        $this->loadView("default/default",$data);
    }
}