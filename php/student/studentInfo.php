<?php
/**
 * Created by PhpStorm.
 * User: myTac
 * Date: 2016/11/22
 * Time: 21:15
 */
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:PUT,GET,POST');
header('Access-Control-Max-Age:60');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
header('Content-Type:application/json;charset=utf-8');
//ajax_in
$d=json_decode($_GET["data"],true);
$get_key="";
$back="";

//db_main
function queryBasic($sql,$type,$isTable){
    if(!$isTable){
        $conn = mysqli_connect('localhost:3306', 'root', 'root','xueji');
    }
    else{$conn = mysqli_connect('localhost:3306', 'root', 'root');}
    $res=mysqli_query($conn,$sql);
    switch($type){
        case 0:return mysqli_fetch_row($res);break;//一个object
        case 1:return mysqli_fetch_object($res);break;
        default:return loopQuery($res);break;//【{}，{}】
    }
}

function queryStudInfo($id){
    $sql="SELECT * FROM students WHERE id=$id";
    return queryBasic($sql,1,'');
}

//main
switch($d['chose']){
    case "teacherInfo": $get_key=$d['id'];$back=queryStudInfo($get_key);break;
    default: $back="in php there no set 'chose' property";break;
}
//ajax_back
echo json_encode($back);
?>