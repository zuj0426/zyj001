<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Userweb_Controller {
    public function __construct(){
        parent::__construct();
        //检测登录
//        $this->check_online();
        $this->load->model('admin_model');
    }

    //主页
    public function index(){
        $this->load->view('home');
    }

    //管理员添加页面
    public function add(){
        if(is_ajax()){
//            var_dump(1111);die;
            $data = array();
            $data['username'] = $this->input->post('username');
            $data['nickname'] = $this->input->post('nickname');
            $data['password'] = $this->input->post('password');
            $password2 = $this->input->post('password2');
            $data['tel'] = $this->input->post('tel');
            $data['role_name'] = $this->input->post('role_name');
            $data['notes'] = $this->input->post('notes');
            $data['add_time'] = time();
//            var_dump($role_arr);die;
            if($data['password'] != $password2) json_error(400,'确认密码不一致','error',[]);
            $res = $this->admin_model->add($data);
            if ($res) json_success(666,'username','add',[]);
        }
        $role_arr = $this->admin_model->get_role_list();
        $data['role_arr'] = $role_arr;
        $this->load->view('admin/admin_add',$data);
    }

    //管理员列表
    public function admin_list(){
        $admin_list = $this->admin_model->get_admin_list();
        $data['list'] = $admin_list;
//        pd($data);
        $this->load->view('admin/admin_list',$data);
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

    //禁用管理员
    public function admin_stop(){
        if(is_ajax()){
            $admin_id = $this->input->post('id');
            $res = $this->admin_model->admin_stop($admin_id);
            if ($res) json_success(200, "成功！", "url", []);
            json_error(400,'禁用失败','alert',[]);
        }
    }

    //启用管理员
    public function admin_start(){
        if(is_ajax()){
            $admin_id = $this->input->post('id');
            $res = $this->admin_model->admin_start($admin_id);
            if ($res) json_success(200, "成功！", "url", []);
            json_error(400,'启用失败','alert',[]);
        }
    }

}