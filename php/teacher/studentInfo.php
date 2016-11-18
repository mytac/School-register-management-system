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
function queryTeacherInfo($key){
    $sql = "SELECT classes FROM teacherinfo where id=$key";
    return queryBasic($sql,0,'');
}
function queryStudentList($key){
    $sql="SELECT * FROM students where class_id=$key";
    return queryBasic($sql,2,'');
}
function queryScoreList($key){
    $sql="SELECT * FROM score where class_id=$key";
    return queryBasic($sql,2,'');
}
function queryAverage($key){
    $sql="select * from score where class_id=$key";
    return queryBasic($sql,2,'');

}
function queryShowClasses($key){
    $sql="SELECT class_id from subject where subject_name='$key'";
    return queryBasic($sql,0,'');
}
function querySubjectScoreList($key1,$key2){
    $sql="SELECT stud_id from score where class_id=$key2";
    return queryBasic($sql,2,'');
}
//main
switch($d['chose']){
    case "teacherInfo": $get_key=$d['id'];$back=queryTeacherInfo($get_key);break;
    case "studentClassList": $get_key=$d['class_id'];$back=queryStudentList($get_key);break;
    case "scores": $get_key=$d['class_id'];$back=queryScoreList($get_key);break;
    case "average": $get_key=$d['class_id'];$back=queryAverage($get_key);break;
    case "showClass": $get_key=$d['subject_name'];$back=queryShowClasses($get_key);break;
    case "subjectScoreList":$get_key1=$d['subject_name'];$get_key2=$d['class_id'];$back=querySubjectScoreList($get_key1,$get_key2);break;
    default: $back="wrong";break;
}
//ajax_back
echo json_encode($back);
?>