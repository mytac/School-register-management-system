<?php
/**
 * Created by PhpStorm.
 * User: myTac
 * Date: 2016/11/13
 * Time: 17:21
 */
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:PUT,GET,POST');
header('Access-Control-Max-Age:60');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
header('Content-Type:application/json;charset=utf-8');

//ajax_in
$d=json_decode($_GET["data"],true);
$get_id=$d['id'];
//db
function query($a){
    $sql="SELECT * FROM teacherinfo WHERE id=$a";
    $conn = mysqli_connect('localhost:3306', 'root', 'root','xueji');
    $res=mysqli_query($conn,$sql);
    return mysqli_fetch_array($res);
}

echo json_encode(query($get_id));

?>
