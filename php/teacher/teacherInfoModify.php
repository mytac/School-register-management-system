<?php
/**
 * Created by PhpStorm.
 * User: myTac
 * Date: 2016/11/14
 * Time: 9:44
 */
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:PUT,GET,POST');
header('Access-Control-Max-Age:60');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
header('Content-Type:application/json;charset=utf-8');
//ajax_in
$d=json_decode($_GET["data"],true);
$get_id=$d[0]["id"];
$properties=["realname","sex","birth","branch_id","hometown","political","education"];
$t=0;

function modify($id,$a,$b){
    //var_dump($b);
    $sql = "UPDATE teacherinfo SET $a = $b WHERE teacherinfo.id= $id";
    debug_backtrace();
    $conn = mysqli_connect('localhost:3306', 'root', 'root','xueji');
    $res=mysqli_query($conn,$sql);
}

function getProperty($property,$d,$id){
    $get_property=$d[0][$property];//从ajax上得到的每个属性的值
    modify($id,$property,$get_property);
}

foreach($properties as $v){
   getProperty($v,$d,$get_id);
    $t++;
}
if($t==count($properties)){
    echo json_encode("success");
}else{echo json_encode("something wrong");}
