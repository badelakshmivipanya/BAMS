<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
	
// connect the database with the server
$conn = new mysqli($servername,$username,$password,$dbname);
	
	// if error occurs
	if ($conn -> connect_errno)
	{
	echo "Failed to connect to MySQL: " . $conn -> connect_error;
	exit();
	}
   $sel =$_POST['acno'];
   session_start();
   $_SESSION['ac']=$sel;
	$sql = "select * from user_details where Account_Number='$sel'";	
	$result = ($conn->query($sql));
    
		$row1 = [];

	if ($result->num_rows > 0)
	{
		// fetch all data from db into array
		$row1 = $result->fetch_all(MYSQLI_ASSOC);
	}
?>

<!DOCTYPE html>
<html>
<style>
	td,th {
		border: 1px solid black;
		padding: 10px;
		margin: 5px;
		text-align: center;
	}
    .details{
        font-family:'Times New Roman';
        border:2px solid black;
        background: #00609C;
        width: 510px;
        color:white;
        height: 490px;
        margin-top: 20px;
       margin-left:350px;  
        font-size: 16px;
        padding: 10px;
        border-bottom-left-radius: 5px;
        border-top-left-radius: 5px;
        border-bottom-right-radius: 5px;
        border-top-right-radius: 5px;
    }
    span{
        margin-right:20px;
    }
    </style>

    <body style="position:absolute">
            <div ><img src="img\bms.png" style="width:1258px;height:140px;"></div><br>
            <div><h1 style="margin-left:435px;color: #00609C;">User Account Details</h1></div>
            <?php
			if(!empty($row1))
			foreach($row1 as $rows1)
			{
			?>
            <div class="details"  ><br>
             <b style="margin-right:120px;">FName</b><span>:</span><?php echo $rows1['FName']; ?><br><br>
             <b style="margin-right:120px;">LName</b><span>:</span><?php echo $rows1['LName']; ?><br><br>
             <b style="margin-right:53px;">Account Number</b><span>:</span><?php echo $rows1['Account_Number']; ?><br><br>
             <b style="margin-right:58px;">Aadhar Number</b><span>:</span><?php echo $rows1['Aadhar_Number']; ?><br><br>
             <b style="margin-right:131px;">Email</b><span>:</span><?php echo $rows1['Email']; ?><br><br>
             <b style="margin-right:57px;">Contact Number</b><span>:</span><?php echo $rows1['Contact_Number']; ?><br><br>
             <b style="margin-right:117px;">Address</b><span>:</span><?php echo $rows1['Address']; ?><br><br>
             <b style="margin-right:122px;">Gender</b><span>:</span><?php echo $rows1['Gender']; ?><br><br>
             <b style="margin-right:84px;">Date of Birth</b><span>:</span><?php echo $rows1['DOB']; ?><br><br>
             <b style="margin-right:91px;">Acc Balance</b><span>:</span><?php echo $rows1['Acc_Bal']; ?><br><br>
             <b style="margin-right:116px;">Acc type</b><span>:</span><?php echo $rows1['Acc_type']; ?><br><br>
             <b style="margin-right:100px;">IFSC Code</b><span>:</span><?php echo $rows1['IFSC']; ?><br><br>
             <b style="margin-right:96px;">Bank Name</b><span>:</span><?php echo $rows1['Bank_name']; ?><br>
             <?php }?>

      </div><br>
	  <a style=" font-weight: bold;
       border-radius: 5px;
       background-color:white;
       border:2px solid black;
       color:black; 
       margin-left:490px;
       padding:5px;
       width:80px;
        
	   text-decoration:none;" href="modifying.php">Modify</a>
	   	<a style=" font-weight: bold;
       border-radius: 5px;
       background-color:white;
       border:2px solid black;
       color:black;
       margin-left:110px;
       padding:5px;
       width:100px;
     
	   text-decoration:none;" href="home.html">Logout</a><br><br>
       </body>
</html>
<?php

mysqli_close($conn);
?>