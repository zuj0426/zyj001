<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/22
 * Time: 16:03
 */
class User_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }
    /**
     * 获取用户信息
     * @param int $uid 用户id
     * @return mixed
     */
    public function get_user_info($uid = 0){
        $user_res = $this->db->select('*')
            ->from('admin')
            ->where('id = '.$uid)
            ->get()->row_array();
        return $user_res;
    }
}