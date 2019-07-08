<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Userweb_Controller {
    public function __construct(){
        parent::__construct();
        //检测登录
//        $this->check_online();
//        $this->load->model('main_model');
    }

    public function index(){
        $this->load->view('home');
    }

    //管理员添加页面
    public function add(){
        $this->load->view('admin/admin_add');
    }

    //管理员列表
    public function admin_list(){
        $this->load->view('admin/admin_list');
    }

    //管理员密码编辑
    public function pwd_edit(){
        $this->load->view('admin/admin_password_edit');
    }

    //权限管理
    public function permission(){
        $this->load->view('admin/admin_permission');
    }

    //角色管理
    public function role(){
        $this->load->view('admin/admin_role');
    }

    //角色添加
    public function role_add(){
        $this->load->view('admin/admin_role_add');
    }

}