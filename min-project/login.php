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
$Aadhar_Number=$_POST['Aadhar_Number'];
$Password=$_POST['Password'];
session_start();
$_SESSION['acno']= $Aadhar_Number;
$sql="select *from usignup";
$result=mysqli_query($conn,$sql);
if(!$result){
    echo "Error:".mysqli_error($conn);
    exit;
}
$row = [];
$flag=0;

	if ($result->num_rows > 0)
	{
		// fetch all data from db into array
		$row = $result->fetch_all(MYSQLI_ASSOC);
	}
    if(!empty($row))
			foreach($row as $rows)
			{
    
            if($rows['Aadhar_Number']==$Aadhar_Number && $rows['Password']==$Password)
            {
                $flag=1;
                break;
        
            }
           }
    if($flag==0){
        echo"<script>alert('check your credentials')</script>";
        echo"<script>location.replace('ulogin.html')</script>";
    }
    if($flag==1)
    {
        $Aadhar_Number=$rows['Aadhar_Number'];
                $sql1="select *from user_details where Aadhar_Number='$Aadhar_Number'";
            $result1=mysqli_query($conn,$sql1);
            if(!$result1){
             echo "Error:".mysqli_error($conn);
             exit;
             }
             $row1 = [];

	      if ($result1->num_rows > 0)
	    {
		// fetch all data from db into array
		$row1 = $result1->fetch_all(MYSQLI_ASSOC);
	   } 
      
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
    
    </style>
<body style="position:fixed">
          <div ><img src="img\bms.png" style="width:1258px;height:140px;"></div>
            <div><h1 style="margin-left:530px;color: #00609C;">User Accounts</h1></div>
	<table align=center>
		<thead>
			<tr>
				<th>FName</th>
                <th>LName</th>
				<th>Account Numbers</th>
				<th>Bank Names</th>
                
				
			</tr>
		</thead>
		<tbody>
			<?php
			if(!empty($row1))
			foreach($row1 as $rows1)
			{
			?>
			<tr>

				<td><?php echo $rows1['FName']; ?></td>
				<td><?php echo $rows1['LName']; ?></td>
				<td><?php echo $rows1['Account_Number']; ?></td>
				<td><?php echo $rows1['Bank_name']; ?></td>
                

            </tr>
          
			<?php 
        
        } ?>
		</tbody>
        </table><br>
    
            <a style=" font-weight: bold;
       border-radius: 5px;
       background-color:black;
       color:white;
      margin-left:570px;
       padding:5px;
       width:80px;
	   text-decoration:none;" href="bank.php">Select Account</a>
	
</body>
</html>
<?php
mysqli_close($conn);
?>
    