<?php
//取随机浮点数
function randomFloat($min = 0, $max = 1) {
    return $min + mt_rand() / mt_getrandmax() * ($max - $min);
}

/*
 * $reward_limit*******红包大小的限额
 * $sum_price**********金额总数
 * $num****************总分享的人数
 * */
function red_bag($reward_limit = 5.00,$sum_price = 20.00,$num = 5){
    $reward_arr = array($num);//每个人获得的红包（数组）
    for ($i=1;$i<=$num;$i++){
        if ($i==$num){
            $reward_arr[$i] = $sum_price;
            $sum_price = 0;
            echo "第 $i 个人的红包：";print_r($reward_arr[$i]);echo "剩余红包总额为： $sum_price";
            echo "<br />";
        }else{
            $reward_arr[$i] = randomFloat(0.01,$sum_price/$num*2);
            //取浮点数的小数点后两位
            $reward_arr[$i] = floor($reward_arr[$i]*100)/100;
            $sum_price = bcsub($sum_price,$reward_arr[$i],2);
            echo "第 $i 个人的红包：";print_r($reward_arr[$i]);echo "剩余红包总额为： $sum_price";
            echo "<br />";
        }
    }
}

interface StackInterface
{
    public function push(string $item);
    public function pop();
    public function top();
    public function isEmpty();
}
