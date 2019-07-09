<?php

/**
 * 登录模型
 * Class Login_model
 */
class Login_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function check_login($username,$password){

        $ip = ip('int');
        //检验密码错误次数
        $error_login_pwd_count = (int)cache("error_login_pwd_count{$ip}");
        if($error_login_pwd_count>5){
            json_error(44,'密码错误次数过多，请过10分钟后再试！','alert');
        }
        //管理员详情
        $where['username'] =$username;
        $where['password'] =$password;
        $query = $this->db->select('*')->where($where)->get('admin')->row_array();
        if(!$query){
            json_error(0,'账号不存在！','alert',[]);
        }
        return $query;
    }

}
