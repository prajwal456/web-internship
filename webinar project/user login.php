<?php
include 'app/connect.php';
session_start();

if(isset($_POST['submit'])){
  $USN = $_POST['USN'];
  $Password = $_POST['pass'];

  $sql = "SELECT USN,NAME,PASSWORD FROM student WHERE USN = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s",$USN);
  $stmt->execute();

  $stmt->bind_result($db_usn,$db_name,$db_pass);
  if($stmt->fetch()){
    //echo $db_usn;
      //echo $db_pass;
      $_SESSION['Name'] = $db_name;
      echo $_SESSION['Name'];
    $pass_decode = password_verify($Password, $db_pass);

    if ($pass_decode) {
      //echo "Login Successful";
      header("location:student after login.php");
    }else{ ?>
      <script> alert("Incorrect Password"); </script>
      <?php
    }
  }else { ?>
    <script> alert("Incorrect USN"); </script>
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
    height: 420px;
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
        <form method="post" action="user login.php">
            <p>USN</p>
            <input type="text" name="USN" placeholder="Enter Usn">
            <p>Password</p>
            <input type="password" name="pass" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login">
            <a href="student registration page.php">Dont have an account?</a>

        </form>
        
    </div>

</body>
</head>
</html>