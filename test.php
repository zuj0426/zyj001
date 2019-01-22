<?php
//取随机浮点数
function random_float($min = 0.01, $max = 10.00) {
    return $min + mt_rand() / mt_getrandmax() * ($max - $min);
}
$total_price = 20.00;//红包总额
$overage = $total_price;//红包余额
$num = 5;//设置抢红包的人数
$reward = array($num);//每个人获得的红包（数组）
for ($i=1;$i<=$num;$i++){
    if ($i==$num){
        $reward[$i] = $overage;
        $overage = 0;
    }else{
        $random = random_float(0.01,$overage/$num*2);
        $reward[$i] = bcdiv(floor($random*100),100,2);
        $overage = bcsub($overage,$reward[$i],2);
    }
    echo "第 $i 个人抢到的红包金额：";print_r($reward[$i]);echo "剩余红包总额为： $overage";
    echo "<br />";//输出html换行标签
}


?>