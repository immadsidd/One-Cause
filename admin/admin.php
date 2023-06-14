<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbconnection.php');
//admin login verification 
if (!isset($_SESSION['is_admin'])){
    if(isset($_POST['check']) &&isset($_POST['ademail']) &&isset($_POST['adpass']) )
{
    $ademail =$_POST['ademail'];
    $adpass =$_POST['adpass'];

    $sql ="SELECT ADMIN_EMAIL, ADMIN_PASS  from admin where ADMIN_EMAIL= '".$ademail."' AND ADMIN_PASS= '".$adpass."'";
    $result=$conn->query($sql);
    $row =$result->num_rows;

    if($row==1){
        $_SESSION['is_admin']=true;
        $_SESSION['admin_email']=$ademail;
        echo json_encode($row);
    }
    else if($row ===0){
        echo json_encode($row);
    }
} 
}

?>