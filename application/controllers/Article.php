<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {
    public function __construct(){
        parent::__construct();
        //检测登录
//        $this->check_online();
//        $this->load->model('main_model');
    }

    //资讯管理
    public function article_list(){
        $this->load->view('article/article_list');
    }

    //资讯分类管理
    public function article_class(){
        $this->load->view('article/article_class');
    }

    //资讯添加
    public function article_add(){
        $this->load->view('article/article_add');
    }

    //资讯分类编辑
    public function article_class_edit(){
        $this->load->view('article/article_class_edit');
    }

}