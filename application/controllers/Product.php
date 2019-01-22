<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct(){
        parent::__construct();
        //检测登录
//        $this->check_online();
//        $this->load->model('main_model');
    }

    //产品管理
    public function Product_list(){
        $this->load->view('product/product_list');
    }

    //产品添加
    public function Product_add(){
        $this->load->view('product/product_add');
    }

    //产品品牌
    public function Product_brand(){
        $this->load->view('product/product_brand');
    }

    //产品种类
    public function Product_category(){
        $this->load->view('product/product_category');
    }

    //产品种类添加
    public function Product_category_add(){
        $this->load->view('product/product_category_add');
    }

}