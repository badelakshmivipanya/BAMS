
<html>
 <head>
        
    <link rel="stylesheet" href="css/first.css"/>
    </head>
    <?php
    //$sql="select Account_Number from "
    session_start();
    $ac=$_SESSION['ac'];
    $db_hostname="127.0.0.1";
    $db_username="root";
    $db_password="";
    $db_name="test";
    $conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
    if(!$conn){
    echo "connection failed".mysqli_connect_error();
    exit;
    }
    $sql="select *from user_details where Account_Number='$ac'";
$result=mysqli_query($conn,$sql);
if(!$result){
    echo "Error:".mysqli_error($conn);
    exit;
}
$row=[];
$row = $result->fetch_array(MYSQLI_ASSOC);

    ?>
    <body >
    <div>
          
            <div ><img src="img\bms.png" style="width:1260px;height:140px;"></div> <br>
    
    <div>
         <form action="Modify.php"  method="POST" >
            <div><h1 align="center" style="color:#00609C;"> Form for Modification </h1></div>
            <table align="center" >
            <tr>
            <td>First Name</td>
            <td> <input name="FName" type="text" value="<?php echo $row['FName']; ?>"> </td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td> <input name="LName" type="text" value="<?php echo $row['LName']; ?>"> </td>
        </tr>
        <tr>
        <td>Account Number</td>
        <td> <input name="Account_Number" type="text" value="<?php echo $row['Account_Number']; ?>"  readonly> </td>
        </tr>
        <tr>
        <td>Aadhar Number</td>
        <td> <input name="Aadhar_Number" type="text" value="<?php echo $row['Aadhar_Number']; ?>"> </td>
        </tr>
            <tr>
            <td> E-mail ID</td>
            <td> <input name="Email" type="text" value="<?php echo $row['Email']; ?>"> </td>
            </tr>
            <tr>
            <td> Phone Number </td>
            <td> <input name="Contact_Number" type="text" maxlength="10" value="<?php echo $row['Contact_Number']; ?>"> </td>
            </tr>
            <tr>
                <td>Address </td>
                <td><input type="textarea" cols="30" rows="4" style="margin-left:100px" name="Address" value="<?php echo $row['Address']; ?>"></textarea></td>
            </tr>
            <tr>
                <td> Gender </td>
                <td><input style="margin-left:10px;" name="Gender" type="radio" value="Male"
                <?php if($row['Gender']=="Male")
                {
                    echo "checked";
                } 
                ?>
                >Male<br>
                <input style="margin-left:10px;" name="Gender" type="radio" value="Female"
                <?php if($row['Gender']=="Female")
                {
                    echo "checked";
                } 
                ?>
                >Female</td>
             </tr>
                
           
            <tr>
                <td>Date Of Birth</td>
                <td> <input name="DOB" type="date" value="<?php echo $row['DOB']; ?>"> </td>
            </tr>
            <tr>
                <td>Account Balance</td>
                <td> <input name="Acc_Bal" type="text" value="<?php echo $row['Acc_Bal']; ?>" readonly> </td>
            </tr>
            <tr>
            <td valign="top">Account Type</td>
            <td>
            <input style="margin-left:10px;" name="Acc_type" type="radio" value="Savings"
            <?php if($row['Acc_type']=="Savings")
                {
                    echo "checked";
                } 
                ?>>Savings<br>
            <input style="margin-left:10px;" name="Acc_type" type="radio" value="Current"
            <?php if($row['Acc_type']=="Current")
                {
                    echo "checked";
                } 
                ?>>Current<br>  
            <input  style="margin-left:10px;" name="Acc_type" type="radio" value="Deposit"
            <?php if($row['Acc_type']=="Deposit")
                {
                    echo "checked";
                } 
                ?>>Deposit<br>
            </tr>
            <tr>
            <td>IFSC Code</td>
                <td> <input name="IFSC" type="text" value="<?php echo $row['IFSC']; ?>" readonly> </td>
                </tr><br>
                <td>Bank Name</td>
                <td> <input name="Bank_name" type="text" value="<?php echo $row['Bank_name']; ?>" readonly> </td>
                </tr><br>
            </table><br>
            
             <input style="  font-family:'Times New Roman';
       font-weight: bold;
       border-radius: 5px;
       background-color:white;
       color:black;
       margin-left:490px;
       padding:5px;
       width:80px;" type="submit" value="Save">
                <button style=" font-family:'Times New Roman';
       font-weight: bold;
       border-radius: 5px;
       background-color:white;
       color:black;
       margin-left:100px;
       padding:5px;
       width:80px;"><a style="text-decoration:none;color: black;" href="home.html">Logout</a></button>
        </form>
    </div>
    </div>
    </body>
    </html>