<?php 
include 'app/connect.php';

if(isset($_POST['submit'])){

    $USN = $_POST['USN'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Confirm = $_POST['ConfirmPassword'];
    $Phone = $_POST['Phone'];
    $Department = $_POST['Department'];
    $GraduationYear = $_POST['Year'];

    $pass = password_hash($Password, PASSWORD_DEFAULT);
    
    $usn_check = "SELECT * FROM student WHERE USN = ?";
    $usn_stmt = $conn->prepare($usn_check);
    $usn_stmt->bind_param("s",$USN);
    $usn_stmt->execute();

    $usn_stmt->store_result();
    if($usn_stmt->num_rows()>0){
        ?> 
        <script type="text/javascript"> alert(" User ALready Registered!");</script>
        <?php
    }
    else{


    //template for the sql query
    $sql = "INSERT INTO student(USN,NAME,EMAIL,PASSWORD,PHONE,DEPARTMENT,GRAD) VALUES(?,?,?,?,?,?,?)";

    //preparing the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssisi",$USN,$Name,$Email,$pass,$Phone,$Department,$GraduationYear);
    $result = $stmt->execute();

    if($result){
       header("location:user login.php");
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
	<title>The student registration page</title>
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
a{
	color: white;
}
</style>
<body>
	<a href="homepage.php">home</a>
	<br>
	<a href="user login.php">back</a>
	<form onsubmit="return validate()" method="post" action="student registration page.php">
		<fieldset>
			<legend id="reg">REGISTER</legend>
			<br>
			<label for="USN"> USN </label><br> 
				<input type="text" name="USN" placeholder="Enter Usn" required ><br>

			<label for="Name"> NAME    </label><br> 			
				<input type="text" name="Name" placeholder="Enter Name" required ><br>
			
			<label for="Email"> EMAIL    </label><br>			
			<input type="email" name="Email" placeholder="Enter Email-Id" ><br>
			
			<label for="Password"> PASSWORD    </label><br> 	
			<input type="password" name="Password" id="password" placeholder="Enter Password" ><br>
			
			<label for="Password"> CONFIRM PASSWORD</label><br> 
			<input type="password" name="ConfirmPassword" id="confirmPassword" placeholder="Re-Enter Password" ><br>

			<label for="mobile"> MOBILE NO</label> <br>
			<input type="tel" name="Phone" placeholder="Enter valid mobile no." maxlength="10" ><br>
			
			<label for="Department"> DEPARTMENT</label><br> 			
				<select name="Department">
					<option value="">Select...</option>
					<option value="CSE">Computer Science Engineering</option>
  					<option value="MECH">Mechanical Engineering</option>
  					<option value="IEM">Industrial Engineering and Management</option>
  					<option value="CIVIL">Civil Engineering</option>
  					<option value="ISE">Information Science Engineering</option>
  					<option value="ECE">Electronics and Communication Engineering </option>

  				</select> <br>
  				
				<label for="GraduationYear"> GRADUATION YEAR </label><br>
				<input type="number" name="Year" min="2021" max="2099" step="1" value="2021" /><br><br>
			<button type="submit" name="submit"><b> SUBMIT </b> </button>
			<br>
			
			<br>
			</fieldset>
	</form>
</body>
</html>