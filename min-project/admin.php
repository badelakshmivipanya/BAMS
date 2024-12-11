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
$Username=$_POST['Username'];
$Password=$_POST['Password'];
$sql="select *from login";
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
    
            if($rows['Username']==$Username && $rows['Password']==$Password)
            {
               
                 $flag=1;
                 break;
            }
           }
   /* if($flag==0){
        echo"<script>alert('check your credentials')</script>";
        echo"<script>location.replace('alogin.html')</script>";
    }*/
    if($flag==1)
    {
        $Username=$rows['Username'];
                $sql1="select *from user_details";
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

    <body style="position:absolute">
            <div ><img src="img\bms.png" style="width:1579px;height:140px;"></div>
	<table >
		<thead>
			<tr>
               <th>FName</th>
               <th>LName</th>
				<th>Account_Number</th>
				<th>Aadhar_Number</th>
				<th>Email</th>
				<th>Contact_Number</th>
				<th>Address</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Acc_Balance</th>
                <th>Acc_type</th>
                <th>IFSC Code</th>
                <th>Bank_name</th>
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
				<td><?php echo $rows1['Aadhar_Number']; ?></td>
				<td><?php echo $rows1['Email']; ?></td>
                <td><?php echo $rows1['Contact_Number']; ?></td>
				<td><?php echo $rows1['Address']; ?></td>
                <td><?php echo $rows1['Gender']; ?></td>
                <td><?php echo $rows1['DOB']; ?></td>
                <td><?php echo $rows1['Acc_Bal']; ?></td>
                <td><?php echo $rows1['Acc_type']; ?></td>
                <td><?php echo $rows1['IFSC']; ?></td>
                <td><?php echo $rows1['Bank_name']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table><br>
	
</body>
</html>
<?php

mysqli_close($conn);
?>





    