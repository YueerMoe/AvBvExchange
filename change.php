<?php
$aid = str_replace('av','',$_GET['aid']);
$bid = $_GET['bid'];
global $table;
global $s;
global $add;
global $xor;
global $tr;
$table = array('f','Z','o','d','R','9','X','Q','D','S','U','m','2','1','y','C','k','r','6','z','B','q','i','v','e','Y','a','h','8','b','t','4','x','s','W','p','H','n','J','E','7','j','L','5','V','G','3','g','u','M','T','K','N','P','A','w','c','F');
$s = [11,10,3,8,4,6];
$add = 8728348608;
$xor = 177451812;
$tr = array();
$i = range(0,57);
for ($z = 0;$z <= 58;$z++){
    global $table;
    global $s;
    global $add;
    global $xor;
    global $tr; 
    $tr[$table[$i[$z]]] = $i[$z];
}

function dec($x){
    global $table;
    global $s;
    global $add;
    global $xor;
    global $tr; 
    $range = range(0,6);
    $r = 0;
	for ($i = 0 ;$i < 6 ;$i++){
        $r += $tr[$x[$s[$range[$i]]]]*pow(58,$range[$i]);
    }
	return ($r - $add)^$xor;
}
function enc($x){
    global $table;
    global $s;
    global $add;
    global $xor;
    global $tr;
	$x = ( $x ^ $xor) + $add;
    $r = ['B', 'V', '1', ' ', ' ', '4', ' ', '1', ' ', '7', ' ',' '];
    $range = range(0,5);
    for ($i = 0;$i < 6;$i++){
        $r[$s[$range[$i]]] = $table[floor($x / pow(58,$range[$i])%58)];
    } 
    return ''.join($r);
}

if($aid != ""){
    if(preg_match("/^\d*$/",$fgid)){
        echo enc($aid);
    }
    else{ echo '请输入正确的av号'}
}
else if($bid != ""){
    if(preg_match("/^\d*$/",$fgid)){
        echo '请输入正确的bv号'}
    }else{echo dec($bid);}
}
