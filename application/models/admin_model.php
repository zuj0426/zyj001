<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/6
 * Time: 14:47
 */
class Admin_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }
    /**
     * 获取管理员列表
     * @return array
     */
    public function get_admin_list(){
        $admin_list = $this->db->select('*')
            ->from('admin')
            ->get()->result_array();
        return $admin_list;
    }

    /**
     * 获取角色列表
     * @return array
     */
    public function get_role_list(){
        $admin_list = $this->db->select('*')
            ->from('rbac_role')
            ->order_by('sort')
            ->get()->result_array();
        return $admin_list;
    }
}