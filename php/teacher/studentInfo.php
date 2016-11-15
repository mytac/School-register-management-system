<?php
/**
 * Created by PhpStorm.
 * User: myTac
 * Date: 2016/11/14
 * Time: 16:54
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

//db
function loopQuery($res){
    $arr =  array();
    while($row = mysqli_fetch_array($res)){
        $arr[] = $row;
    }
    return $arr;
}
function queryBasic($sql,$type){
    $conn = mysqli_connect('localhost:3306', 'root', 'root','xueji');
    $res=mysqli_query($conn,$sql);
    $length=mysqli_fetch_lengths($res);
    return $type == 0 ? mysqli_fetch_row($res) : loopQuery($res);
}
function queryTeacherInfo($key){
    $sql = "SELECT classes FROM teacherinfo where id=$key";
    return queryBasic($sql,0);
}
function queryStudentList($key){
    $sql="SELECT * FROM students where class_id=$key";
    return queryBasic($sql,1);
}

//main
switch($d['chose']){
    case "teacherInfo": $get_key=$d['id'];$back=queryTeacherInfo($get_key);break;
    case "studentClassList": $get_key=$d['class_id'];$back=queryStudentList($get_key);break;
    default: $back="wrong";break;
}
//ajax_back
echo json_encode($back);
?>