<?php
/**
 * Class name: admin
 * Author: ChungND
 */
class admin extends MY_Controller
{   
    public function index()
    {
        $data['template'] = "layout/admin";
        $this->loadView("layout/layout",$data);
    }
}