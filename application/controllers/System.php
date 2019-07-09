<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends CI_Controller {
    public function __construct(){
        parent::__construct();
        //检测登录
//        $this->check_online();
//        $this->load->model('main_model');
    }

    //用户管理
    public function system_base(){
        $this->load->view('system/system_base');
    }

    //用户添加
    public function system_category(){
        $this->load->view('system/system_category');
    }

    //删除的用户
    public function system_category_add(){
        $this->load->view('system/system_category_add');
    }

    //浏览记录
    public function system_data(){
        $this->load->view('system/system_data');
    }

    //下载记录
    public function system_log(){
        $this->load->view('system/system_log');
    }

    //分享记录
    public function system_shielding(){
        $this->load->view('system/system_shielding');
    }

}