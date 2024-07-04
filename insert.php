<?php 
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $contno=$_POST['contactno'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
echo "<script>alert('This email or Contact Number already associated with another account');</script>";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FullName, MobileNumber, Email,  Password) value('$fname', '$contno', '$email', '$password' )");
    if ($query) {
    echo "<script>alert('You have successfully registered');</script>";
    echo "<script>window.location.href ='signin.php'</script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
       echo "<script>window.location.href ='index.php'</script>";
    }
}
}
 ?>