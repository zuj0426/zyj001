<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Picture extends CI_Controller {
    public function __construct(){
        parent::__construct();
        //检测登录
//        $this->check_online();
//        $this->load->model('main_model');
    }

    //图片管理
    public function picture_list(){
        $this->load->view('picture/picture_list');
    }

    //图片添加
    public function picture_add(){
        $this->load->view('picture/picture_add');
    }

    //图片展示
    public function picture_show(){
        $this->load->view('picture/picture_show');
    }

}