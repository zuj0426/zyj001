<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charts extends CI_Controller {
    public function __construct(){
        parent::__construct();
        //检测登录
//        $this->check_online();
//        $this->load->model('main_model');
    }

    //统计图
    public function charts_1(){
        $this->load->view('charts/charts_1');
    }

    public function charts_2(){
        $this->load->view('charts/charts_2');
    }

    public function charts_3(){
        $this->load->view('charts/charts_3');
    }

    public function charts_4(){
        $this->load->view('charts/charts_4');
    }

    public function charts_5(){
        $this->load->view('charts/charts_5');
    }

    public function charts_6(){
        $this->load->view('charts/charts_6');
    }

    public function charts_7(){
        $this->load->view('charts/charts_7');
    }

}