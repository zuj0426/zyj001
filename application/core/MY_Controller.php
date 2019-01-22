<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
    public $username;
    public $nickname;
    public function __construct() {
        parent::__construct();
        //检测登录
        $this->check_online();
        //用户权限检测
//        $this->check_power();
    }
    //检验登录
    public function check_online(){
        $this->username = $this->session->userdata('username');
        $this->nickname = $this->session->userdata('nickname');
        if(!$this->username){
            redirect("/main/login");
        }
    }

    //检验权限
//    private function check_power(){
//        $this->_power = $this->session->userdata('power');
//        $menuId=$this->get('menuId','导航ID','var_trim|xss_clean|integer','result',[],44);
//        if(!$menuId){
//            //获取控制器名称跟方法名
//            $controller_name=$this->router->class;
//            $action_name =$this->router->method;
//            $this->load->model('main_model');
//            $menu_data=$this->main_model->get_menu();
//            if($menu_data){
//                foreach ($menu_data as $key=>$val){
//                    if($val['menuHref']=='/'.$controller_name.'/'.$action_name){
//                        $menuId=$val['menuId'];
//                    }
//                }
//            }
//        }
//        if($menuId>0){//导航存在的情况
//            if(!in_array($menuId,$this->_power)){
//                if(is_ajax()){
//                    json_error(404,'对不起你没有权限','',[]);
//                }
//                echo "对不起你没有权限";exit;
//            }
//        }
//    }

}