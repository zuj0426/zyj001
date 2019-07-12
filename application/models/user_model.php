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
        $user_res = $this->db->select('a.*,rr.names as role')
            ->from('admin a')
            ->join('rbac_role rr','a.role_name=rr.role_name','left')
            ->where('a.id = '.$uid)
            ->get()->row_array();
        return $user_res;
    }
}