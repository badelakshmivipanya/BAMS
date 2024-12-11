<?php
session_start();
$Aadhar_Number=$_SESSION['acno'];
$db_hostname="127.0.0.1";
$db_username="root";
$db_password="";
$db_name="test";
$conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
if(!$conn){
echo "connection failed".mysqli_connect_error();
exit;
}
$sql="select *from user_details where Aadhar_Number='$Aadhar_Number'";
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
        $flag=1;
	}
                //echo $rows['Bank_name'];?>
                <html>
 <head>
        
    <link rel="stylesheet" href="css/first.css"/>
    </head>
    <body >
    <div>
             
            <div ><img src="img\bms.png"  style="width:1263px;height:140px;"></div> 
        
    <div class="sbox1" style="height:200px">
         <h1><strong style="margin-left:70px">Select Account </strong></h1>
            <form method="POST" action="display.php">
            <select  name="acno" size="1" style="margin-left:105px;margin-top:20px;">
            <option value="choose">choose</option>
          <?php  if($flag==1){
    if(!empty($row))
			foreach($row as $rows)
			{?>
            <option ><?php echo $rows['Account_Number'];?></option>
            <?php } 
           }?>
            
            </select><br><br><br>
             
          <input class="but" type="submit" name="submit" value="Display"><br><br>
    </form>

    </div>    
    </div>
    </body>
    </html>

          
          
          
         <?php  mysqli_close($conn);
        
        ?>
        
    