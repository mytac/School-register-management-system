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
    return queryBasic($sql,10,'');
/*    //选出来subjects字段
    $sql="select COLUMN_NAME from information_schema.COLUMNS where table_name = 'score';";
    $preArray=queryBasic($sql,2,true);
    $length=count($preArray);
    $subjectArray=array();
    $backJson=array();
    for($i=0; $i<$length; $i++){
        $key=$preArray[$i][0];
        if(strlen($key)>10){array_push($subjectArray,$key);}
    }
    foreach($subjectArray as $k){
        $sql="SELECT $k FROM score where class_id=$key";
        var_dump(queryBasic($sql,0,''));
        //var_dump(queryBasic($sql,0,''));
    }*/
    /*array_push($backJson,$subjectArray);
    var_dump($backJson);*/
}
//main
switch($d['chose']){
    case "teacherInfo": $get_key=$d['id'];$back=queryTeacherInfo($get_key);break;
    case "studentClassList": $get_key=$d['class_id'];$back=queryStudentList($get_key);break;
    case "scores": $get_key=$d['class_id'];$back=queryScoreList($get_key);break;
    case "average": $get_key=$d['class_id'];$back=queryAverage($get_key);break;
    default: $back="wrong";break;
}
//ajax_back
echo json_encode($back);
?>