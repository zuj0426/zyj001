<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {
    public function __construct(){
        parent::__construct();
        //检测登录
//        $this->check_online();
//        $this->load->model('main_model');
    }

    public function index(){
        $this->load->view('home');
    }

    public function show(){
        $this->load->view('index');
    }

    /**
     * 登录
     */
    public function login(){
//        echo 111;die;
        $this->load->view('login');
        if($this->input->is_ajax_request()){
            $username = $this->input->post('username');
            $password = $this->input->post('pwd');
            //管理员数据库读出
            $this->load->model('login_model');
            $admin = $this->login_model->check_login($username, $password);
            $arr['username'] = $admin['username'];
            $arr['nickname'] = $admin['nickname'];
            $this->session->set_userdata($arr);
            json_success(200, "登录成功", "url", array('url' => '/'));

        }

    }

    /**
     * 退出登录
     */
    public function logout()
    {
//        if(is_ajax()){
//            $this->session->sess_destroy();
//            json_success(201, "退出成功！", "url", ['url' => '/']);
//        }
        $this->load->model('user_model');
        $this->user_model->logout();
        $this->session->sess_destroy();
        redirect("/");
    }
}