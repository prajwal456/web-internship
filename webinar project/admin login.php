<?php
include 'app/connect.php';
session_start();

if(isset($_POST['submit'])){
  $ADMINID = $_POST['AID'];
  $Name = $_POST['name'];
  $Password = $_POST['pass'];

  $sql = "SELECT PERSONID,NAME,PASSWORD FROM admin WHERE PERSONID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s",$ADMINID);
  $stmt->execute();

  $stmt->bind_result($db_aid,$db_name,$db_pass);
  if($stmt->fetch()){
       

        $_SESSION['Name'] = $db_name;//assicative array
        //echo $_SESSION['Name'];
        $pass_decode = password_verify($Password, $db_pass);

    if($pass_decode){
     echo "Login successful";
      header("location:admin after login.php");
  }else{
   ?>
     <script> alert("Incorrect Password"); </script>
   <?php } } else {
    ?>
    <script> alert("Incorrect AdminID"); </script>
    <?php
   }
 }


?>
<html>
<style >
    body{
    margin: 0;
    padding: 0;
    background: url(a3.jpg);
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
}

.loginbox{
    width: 320px;
    height: 450px;
    background: #000;
    color: #fff;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
}

.avatar{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
}

h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
}

.loginbox p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.loginbox input{
    width: 100%;
    margin-bottom: 20px;
}

.loginbox input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.loginbox input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #fb2525;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.loginbox input[type="submit"]:hover
{
    cursor: pointer;
    background: #ffc107;
    color: #000;
}
.loginbox a{
    text-decoration: none;
    font-size: 12px;
    line-height: 20px;
    color: darkgrey;
}

.loginbox a:hover
{
    color: #ffc107;
}
a{
    color: white;
}
</style>
<head>
<title>Login Form Design</title>
    
<body>
    <a href="homepage.php">home</a>
    <div class="loginbox">
    <img src="avatar.png" class="avatar">
        <h1>Login Here</h1>
        <form onsubmit="return validate()" method="post" action="admin login.php">
            <p>Admin Id</p>
            <input type="text" name="AID" placeholder="Enter Your Id">
            <p>Name</p>
            <input type="text" name="name" placeholder="Enter Your Name">
            <p>Password</p>
            <input type="password" name="pass" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login">
            
        </form>
        
    </div>

</body>
</head>
</html>