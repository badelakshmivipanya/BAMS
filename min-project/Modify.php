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
    $Account_Number=$_POST['Account_Number'];
    $Aadhar_Number=$_POST['Aadhar_Number'];
    $Email=$_POST['Email'];
    $Contact_Number=$_POST['Contact_Number'];
    $Address=$_POST['Address'];
    $Gender=$_POST['Gender'];
    $DOB=$_POST['DOB'] ;
    $Acc_Bal=$_POST['Acc_Bal'] ;
    $Acc_type=$_POST['Acc_type'] ;
    $IFSC=$_POST['IFSC'] ;
    $Bank_name=$_POST['Bank_name'] ;

$sql="update user_details set FName='$FName',LName='$LName',Account_Number='$Account_Number',Aadhar_Number='$Aadhar_Number',Email='$Email',Contact_Number='$Contact_Number',Address='$Address',Gender='$Gender',DOB='$DOB',Acc_Bal='$Acc_Bal',Acc_type='$Acc_type',IFSC='$IFSC',Bank_name='$Bank_name' where Account_Number='$Account_Number' ";
if(mysqli_query($conn,$sql))
{
    //echo "details updated successfully";
    echo"<script>alert('Successfully Updated')</script>";
    echo"<script>location.replace('check.php')</script>";
    
}
else{
    echo "error:".$sql."" .mysqli_error($conn);
}
mysqli_close($conn);
?>