<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
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

    public function login(){
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
        $this->load->view('login');
    }

    //检验登录
    public function check_online(){

        redirect("/main/login/");
//        $this->username = $this->session->userdata('username');
//        $this->nickname = $this->session->userdata('nickname');
//        if(!$this->username){
//            redirect("/main/login");
//        }
    }
}