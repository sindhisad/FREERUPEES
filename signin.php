<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['login']))
{
 $emailcon=$_POST['emailcont'];
$password=md5($_POST['password']);
$query=mysqli_query($con,"select ID from tbluser where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
$ret=mysqli_fetch_array($query);
if($ret>0){
$_SESSION['uid']=$ret['ID'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
  }else{
 echo "<script>alert('Invalid Details');</script>";
 }}
 ?>