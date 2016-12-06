<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/2
 * Time: 17:33
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
function queryBasic($sql,$type,$notQuery){
    $conn = mysqli_connect('localhost:3306', 'root', 'root','xueji');
    $res=mysqli_query($conn,$sql);
    if(!$notQuery){
        switch($type){
            case 0:return mysqli_fetch_row($res);break;//一个object
            case 1:return mysqli_fetch_object($res);break;
            default:return loopQuery($res);break;//【{}，{}】
        }
    }
    else{
        return mysqli_affected_rows($conn);
    }

}

function queryTeachers(){
    $sql="SELECT * FROM teacherinfo";
    return queryBasic($sql,2,'');
}
function addTeacher($d){
    $realName=$d['realname'];
    $sex=$d['sex'];
    $birth=$d['birth'];
    $hometown=$d['hometown'];
    $education=$d['education'];
    $class=$d['classes'];
    //var_dump($realName);
    $sql="INSERT INTO allmember (id,psd,name,type) VALUES (NULL,'1','$realName',1)";
    queryBasic($sql,'',true);
    $sql="SELECT max(id) FROM allmember";
    $maxId=queryBasic($sql,0,'')[0];
    $sql="INSERT INTO teacherinfo (id,realname,sex,birth,branch_id,education,hometown,political,classes) VALUES ($maxId,'$realName','$sex','$birth','1','$education','$hometown','','$class')";

    //$sql="INSERT INTO teacherinfo (id,realname,sex,birth,branch_id,hometown,political,education,classes) VALUES ($maxId,'$realName','$sex',NULL,'1','1','1','1','1')";
    queryBasic($sql,'',true);
    return 0;
}

//main
switch($d['chose']){
    case "allTeachers":$back=queryTeachers();break;
    case "addTeacher": $back=addTeacher($d);break;
    case "teachers": $get_key=$d['branch'];$back=queryTeachers($get_key);break;
    default: $back="in php there no set 'chose' property";break;
}
//ajax_back
echo json_encode($back);
?>