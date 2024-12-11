<?php
$db_hostname="127.0.0.1";
$db_username="root";
$db_password="";
$db_name="test";
$conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
if(!$conn){
echo "connection failed".mysqli_connect_error();
exit;
}

    $FName=$_POST['FName'];
    $LName=$_POST['LName'];
    $Aadhar_Number=$_POST['Aadhar_Number'];
    $Contact_Number=$_POST['Contact_Number'];
    $Password=$_POST['Password']; 
    session_start();
    $_SESSION['acno']= $Aadhar_Number;

$sql="insert into usignup(FName,LName,Aadhar_Number,Contact_Number, Password) values('$FName','$LName','$Aadhar_Number','$Contact_Number','$Password')";
if(mysqli_query($conn,$sql))
{
    //echo "new details entry inserted";
    //header("location:dlogin.html");
    echo"<script>alert('Successfully Registered')</script>";
    echo"<script>location.replace('ulogin.html')</script>";
}
else{
    echo "error:".$sql."" .mysqli_error($conn);
}
mysqli_close($conn);
?>