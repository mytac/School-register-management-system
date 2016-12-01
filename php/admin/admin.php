<?php
/**
 * Created by PhpStorm.
 * User: myTac
 * Date: 2016/12/1
 * Time: 12:27
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

//loop
function loopQuery($res){
    $arr =  array();
    while($row = mysqli_fetch_object($res)){
        $arr[] = $row;
    }
    return $arr;
}
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

function queryBranches(){
    $sql="SELECT name FROM branch";
    return queryBasic($sql,2,'');
}
function queryTeachers($branch){
    $sql="SELECT id FROM branch WHERE name='$branch'";
    $branchId=(int)queryBasic($sql,0,'')[0];
    $sql="SELECT * FROM teacherinfo WHERE branch_id=$branchId";
    return queryBasic($sql,2,'');
}
//main
switch($d['chose']){
    case "branch":$back=queryBranches();break;
    case "teachers": $get_key=$d['branch'];$back=queryTeachers($get_key);break;
    default: $back="in php there no set 'chose' property";break;
}
//ajax_back
echo json_encode($back);
?>