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
        $admin_list = $this->db->select('a.*,rr.names as role')
            ->from('admin a')
            ->join('rbac_role rr','a.role_name=rr.role_name','left')
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

    /**
     * 添加管理员
     * @param $data
     * @return array
     */
    public function add($data){
        $this->db->trans_begin();
        $admin_list = $this->db->select('*')
            ->from('admin')
            ->get()->result_array();
        foreach ($admin_list as $key=>$val){
            if ($val['username'] == $data['username']) json_error(400, '账号已存在', 'alert', []);
            if ($val['nickname'] == $data['nickname']) json_error(400, '昵称已被使用', 'alert', []);
        }
//        $insert_data = $data;
        $data['salt'] = $this->salt();
        $data['password'] = md5($data['password'].$data['salt']);
        $this->db->insert('admin',$data);
        if (!$this->db->affected_rows()) {
            $this->db->trans_rollback();
            json_error(400, '添加管理员失败', 'alert', []);
        }
        $this->db->trans_commit();
        return true;
    }

    /**
     * 加盐
     * @return string
     */
    private function salt(){
        $rand_salt = '';
        for ($i = 0; $i < 6; $i++)
        {
            $rand_salt .= chr(mt_rand(33, 126));
        }
        return $rand_salt;
    }
}