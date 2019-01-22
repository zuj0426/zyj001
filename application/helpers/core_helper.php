<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/5
 * Time: 16:00
 */
function json_error($code=0,$error_str ="",$ui_name="alert",$data = "") {
    exit(json_encode(array('code'=>$code+0,"success" => false, "msg" => $error_str, "ui_name" => $ui_name,"data"=>$data)));
}

function json_success($code=0,$success_str ="",$ui_name="alert",$data="") {
    exit(json_encode(array('code'=>$code+0,"success" => true, "msg" => $success_str, "ui_name" => $ui_name,"data"=>$data)));
}
/**
 * 判断是否为ajax请求，常用于判断请求类型，输出不同类型的结果
 *
 * @return boolean
 */
function is_ajax() {
    static $_ret = NULL;
    if ($_ret === NULL) {
        $_ret = isset($_SERVER ['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER ['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }
    return $_ret;
}

/**
 * 获取IP地址
 *
 * @param $format 返回IP格式
 *        	string（默认）表示传统的127.0.0.1，int或其它表示转化为整型，便于存放到数据库字段
 * @param $side IP来源
 *        	client（默认）表示客户端，server或其它表示服务端
 * @return string or int
 */
function ip($format = 'string', $side = 'client') {
    if ($side === 'client') {
        static $_client_ip = NULL;
        if ($_client_ip === NULL) {
            // 获取客户端IP地址
            $ci = &get_instance();
            $_client_ip = $ci->input->ip_address();
        }
        $ip = $_client_ip;
    } else {
        static $_server_ip = NULL;
        if ($_server_ip === NULL) {
            // 获取服务器IP地址
            if (isset($_SERVER)) {
                if ($_SERVER ['SERVER_ADDR']) {
                    $_server_ip = $_SERVER ['SERVER_ADDR'];
                } else {
                    $_server_ip = $_SERVER ['LOCAL_ADDR'];
                }
            } else {
                $_server_ip = getenv('SERVER_ADDR');
            }
        }
        $ip = $_server_ip;
    }

    return $format === 'string' ? $ip : bindec(decbin(ip2long($ip)));
}

/**
 *  获取COOKIE的值
 *
 *  @access public
 *  @param  string $key    为空时将返回所有COOKIE
 *  @return mixed
 */
function nzw_getcookie($key = '') {
    return isset($_COOKIE[$key]) ? $_COOKIE[$key] : 0;
}

/**
 * 格式化时间戳，将时间戳转换成 “年-月-日” 或者“年-月-日 时:分:秒”格式输出
 * @param $string 时间戳字符串
 * @param $formate 格式类型
 */
function date_formate($date, $formate = FALSE) {
    if (!$formate) {
        return date('Y-m-d', $date);
    }
    return date('Y-m-d H:i:s', $date);
}

function timeFormat($time = 0,$format = '')
{
    if (!$time){
        return '';
    }
    switch ($format){
        case 1://完全
            $date_str = date('Y-m-d H:i:s',$time);
            break;
        case 2://不带秒数
            $date_str = date('Y-m-d H:i',$time);
            break;
        case 3:{//距今时间
            $differ = time() - $time;
            if ($differ <= 60){
                $date_str = $differ.'秒前';
            }elseif($differ <= 60 * 60){
                $date_str = (int)($differ / 60).'分钟前';
            }elseif ($differ <= 60 * 60 * 24){
                $date_str = (int)($differ / (60 * 60)).'小时前';
            }elseif($differ <= 60 * 60 * 24 * 30){
                $date_str = (int)($differ / (60 * 60 * 24)).'天前';
            }elseif($differ > 60 * 60 * 24 * 30 && $differ <= 60 * 60 * 24 * 365){
                $date_str = (int)($differ / (60 * 60 * 24 * 30)).'个月前';
            }elseif ($differ >= 60 * 60 * 24 * 365 && $differ <= 60 * 60 * 24 * 365 * 3){
                $date_str = (int)($differ / (60 * 60 * 24 * 365)).'年前';
            }else{
                $date_str = '时间过于久远';
            }
            break;
        }
        case 4:{//昨天今天明天
            $differ = $time - strtotime(date('Y-m-d 00:00:00'));
            if ($differ >= 0){//今天之后
                if ($differ <= 60 * 60 * 24){
                    $date_str = '今天';
                }elseif ($differ <= 60 * 60 * 24 * 2){
                    $date_str = '明天';
                }else{
                    $date_str = date('m-d ',$time);
                }
            }else{//今天之前
                $differ = abs($differ);
                if ($differ <= 60 * 60 * 24){
                    $date_str = '昨天';
                }elseif ($differ <= 60 * 60 * 24 * 2){
                    $date_str = '前天';
                }else{
                    $date_str = date('m-d ',$time);
                }
            }
            $date_str = $date_str. date(' H:i',$time);
            break;
        }
        case 5:{//时分
            $date_str = date('H:i',$time);
            break;
        }
        default:
            $date_str = date('Y-m-d H:i:s',$time);
    }
    return $date_str;
}

/**
 * 全局缓存方法 - 使用Memcache缓存
 *
 * @param $key 缓存key值
 * @param $data 默认为NULL，表示读取；若为FALSE，表示删除；其它表示设置缓存
 * @param $expire 缓存时间。单位：秒，默认1800秒
 *
 */
if (!function_exists('cache')) {
    function cache($key, $data = NULL, $expire = 1800) {
        static $_cache = NULL;
        if ($_cache === NULL) {
            $ci = &get_instance();
            $ci -> load -> library('cache_memcached');
            $_cache = &$ci -> cache_memcached;
        }

        if ($data === NULL) {
            return $_cache -> get("shibiantian_".$key);
        }

        if ($data === FALSE) {
            return $_cache -> delete("shibiantian_".$key);
        }

        return $_cache -> save("shibiantian_".$key, $data, $expire);
    }

}