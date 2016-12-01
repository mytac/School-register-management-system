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

function querySubjects(){
    $sql="SELECT subject_name,degree,subject_id FROM subject";
    return queryBasic($sql,2,'');
}
function queryCheckName($subject){
    $sql="SELECT subject_id FROM subject WHERE subject_name='$subject'";
    if(!queryBasic($sql,0,'')){
        $sql="INSERT INTO subject (subject_id,subject_name,class_id,degree) VALUES (NULL,'$subject','1','2')";
        queryBasic($sql,'',true);
        return 1;
    }else{return '名称已占用';}
}
function deleteSubject($subjectName){
    $sql="DELETE FROM subject WHERE subject_name='$subjectName'";
    queryBasic($sql,'',true);
    return 1;
}
function modifySubject($subjectName,$degree,$subjectId){
    $subjectId=(int)$subjectId;
    $sql="UPDATE subject SET subject_name='$subjectName',degree=$degree WHERE subject_id=$subjectId";
    queryBasic($sql,'',true);
    return 1;
}
//main
switch($d['chose']){
    case "branch":$back=queryBranches();break;
    case "teachers": $get_key=$d['branch'];$back=queryTeachers($get_key);break;
    case "subjects": $back=querySubjects();break;
    case "checkName":$get_key=$d['className'];$back=queryCheckName($get_key);break;
    case "deleteSubject":$get_key=$d['subject_name'];$back=deleteSubject($get_key);break;
    case "modifySubject":$get_key1=$d['subject_name'];$get_key2=$d['degree'];$get_key3=$d['subject_id'];$back=modifySubject($get_key1,$get_key2,$get_key3);break;
    default: $back="in php there no set 'chose' property";break;
}
//ajax_back
echo json_encode($back);
?>