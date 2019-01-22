<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
    public function __construct(){
        parent::__construct();
        //检测登录
//        $this->check_online();
//        $this->load->model('main_model');
    }

    //用户管理
    public function member_list(){
        $this->load->view('member/member_list');
    }

    //用户添加
    public function member_add(){
        $this->load->view('member/member_add');
    }

    //删除的用户
    public function member_del(){
        $this->load->view('member/member_del');
    }

    //浏览记录
    public function member_record_browse(){
        $this->load->view('member/member_record_browse');
    }

    //下载记录
    public function member_record_download(){
        $this->load->view('member/member_record_download');
    }

    //分享记录
    public function member_record_share(){
        $this->load->view('member/member_record_share');
    }

    //用户查看
    public function member_show(){
        $this->load->view('member/member_show');
    }

}