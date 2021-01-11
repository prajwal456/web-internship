<?php 
include 'app/connect.php';

if(isset($_POST['submit'])){

    $PID = $_POST['Personid'];
    $Name = $_POST['Name'];
    $Password = $_POST['Password'];
    
   

    $pass = password_hash($Password, PASSWORD_DEFAULT);
    
    $pid_check = "SELECT * FROM admin WHERE PERSONID = ?";
    $stmt = $conn->prepare($pid_check);
    $stmt->bind_param("s",$USN);
    $stmt->execute();

    $stmt->store_result();
    if($stmt->num_rows()>0){
        ?> 
        <script type="text/javascript"> alert(" User ALready Registered!");</script>
        <?php
    }
    else{


    //template for the sql query
    $sql = "INSERT INTO admin(PERSONID,NAME,PASSWORD) VALUES(?,?,?)";

    //preparing the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss",$PID,$Name,$pass);
    $result = $stmt->execute();

    if($result){
       header("location:admin login.html");
    }
  }
}
/*
    $expectedData = 1;
    $spoiledData = "1; DROP TABLE student";
    $query = "select * from student where USN = $spoiledData";
    select * from student where USN=1; 
    Drop table student;
*/

?>
<!DOCTYPE html>
<html>
<head>
	<title>The admin registration page</title>
</head>
<style>
	body{
	
	background-size: cover;
	background-attachment: fixed;
	height: auto;
	background-image:url("a1.jpg");
	background-repeat: no-repeat;

        }
fieldset{
  
	background: rgb(0,0,0,0.3);
	background-color: none;
	border-radius: 13px;
	text-align: center;
	margin-top: 10%;
	margin-left: 30%;
    width: 25%;

}
legend{
	border: 1.5px solid white;
	border-radius: 13px;
    color: white;
    background: rgb(0,0,0,0.6);
}
label{
	padding:5px;
	color:white;
	 
}
button{
	border:1px solid light white;
	border-radius: 15px;
	padding: 5px;
	color: green;
}
</style>
<body>
	<form onsubmit="return validate()" method="post" action="admin registration page.php">
	
		<fieldset>
			<legend id="reg">REGISTER</legend>
			<br>

			<label for="Personid"> PERSONID  </label><br> 			
				<input type="text" name="Personid" placeholder="Enter Personid" required ><br>
			
			<label for="Name"> NAME   </label><br>			
			<input type="Name" name="Name" placeholder="Enter Name" ><br>
			
			<label for="Password"> PASSWORD    </label><br> 	
			<input type="password" name="Password" id="password" placeholder="Enter Password" ><br>
			
			<br>
			<button type="submit" name="submit"><b> SUBMIT </b> </button>
			
			<br>
			</fieldset>
	</form>
</body>
</html>