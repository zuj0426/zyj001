<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {
    public function __construct(){
        parent::__construct();
        //检测登录
//        $this->check_online();
//        $this->load->model('main_model');
    }

    public function show(){
        $this->load->view('index');
    }

    /**
     * 登录
     */
    public function login(){
        if($this->input->is_ajax_request()){
            $username = $this->input->post('username');
            $password = $this->input->post('pwd');
            //管理员数据库读出
            $this->load->model('login_model');
            $admin = $this->login_model->check_login($username, $password);
            $arr['uid'] = $admin['id'];
            $arr['username'] = $admin['username'];
            $arr['nickname'] = $admin['nickname'];
//            var_dump($admin);die;
            $this->session->set_userdata($arr);
            json_success(200, "登录成功", "url", array('url' => '/'));
        }
        $this->load->view('login');
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        if(is_ajax()){
            $this->session->sess_destroy();
            json_success(200, "退出成功！", "url", ['url' => '/main/login']);
        }
    }

    /**
     * 切换用户
     */
    public function check_out(){
        if(is_ajax()){
            $this->session->sess_destroy();
            json_success(200, "切换成功！", "url", ['url' => '/main/login']);
        }
    }
}