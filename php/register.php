<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:PUT,GET,POST');
header('Access-Control-Max-Age:60');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
header('Content-Type:application/json;charset=utf-8');
//ajax_in
$json=$_GET["data"];
$d=json_decode($json,true);
$get_id=$d[0]['id'];
$get_psd=$d[0]['psd'];
//db
function t($s){return json_encode($s);}//转换字符串
function query($a,$b,$c){
    $sql="SELECT $a FROM allmember WHERE $b=$c";
    $conn = mysqli_connect('localhost:3306', 'root', 'root','xueji');
    $res=mysqli_query($conn,$sql);
    return $a!="*"? mysqli_fetch_row($res):mysqli_fetch_array($res);
}


$row=query("id","id",$get_id);
if($row){
$real_psd=query("psd","id",$get_id)[0];
    if($get_psd==$real_psd){
        echo t(query("type","id",$get_id));
    }else{echo t("wrong_psd");}
}
else{echo t("no_existed_id");}

?>