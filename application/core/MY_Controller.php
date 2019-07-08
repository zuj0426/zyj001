<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class Common_Controller
 * 基类
 */
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
//            redirect($this->config->item('domain_test')."main/login");
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


/**
 * Class Userweb_Controller
 * 已登录
 */
class Userweb_Controller extends MY_Controller {

    public $uid;
    public $phone;

    public function __construct() {
        parent::__construct();
        //检测登录
        $this->check_online();
    }

    //检验登录
    public function check_online(){
        $this->uid = $this->session->userdata('uid');
//        $this->phone = $this->session->userdata('phone');
        if(!$this->uid){
            redirect($this->config->item('domain_test')."main/login");
        }else{

            //获取用户信息
            $this->load->model('user_model');
            $user= $this->user_model->get_user_info($this->uid);

            $this->session->set_userdata($user);
        }
    }

    //加载错误页面
    protected function load_error_view($message = '',$error_code = '400'){
        $data['message'] = $message;
        $data['error_code'] = $error_code;
        $data['http_referrer'] = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER'] : ''; //上一页的地址
        $buffer = $this->load->view('public/error_page',$data,true);
        echo $buffer;
        exit;
    }

    //进入页面时,校验get参数。如果校验不通过，不返回json，而是返回错误页面
    public function validate_page_get($input_name, $output = "", $rules = "pass",$box_name = "",$data_array = "",$code=0) {
        $res =  $this->get($input_name, $output, $rules,$box_name,$data_array,$code,false);
        if(isset($res['success']) && $res['success'] == false){
            $this->load_error_view($res['msg']);
        }
        return $res;
    }

    //针对表单提交的post校验。同样是post请求，表单提交校验不通过时，加载错误页面；而ajax返回json
    public function validate_page_post($input_name, $output = "", $rules = "pass",$box_name = "",$data_array = "",$code=0) {
        $res =  $this->post($input_name, $output, $rules,$box_name,$data_array,$code,false);
        if(isset($res['success']) && $res['success'] == false){
            $this->load_error_view($res['msg']);
        }
        return $res;
    }

}