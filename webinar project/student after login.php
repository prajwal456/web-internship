<?php
session_start();
if(!isset($_SESSION['Name']))
{
  header("location: user login.php");

}






?>
<!DOCTYPE html>
<html>
<head>
	<title>student after login</title>
</head>
<style>
	body{
		background-size: cover;
	    background-attachment: fixed;
	    height: auto;
	    background-image:url("a2.jpg");
	    background-repeat: no-repeat;
	}
      nav{
         width: 100%;
         height: 80px;
         background-color: yellow;
         line-height: 50px;
         border-radius: 15px;
      }
      nav ul{
         float: right;
         margin-right: 30px;
      }
      nav ul li{
         list-style-type: none;
         display: inline-block;
      }
      nav ul li a{
         text-decoration: none;
         color: black;
         padding: 45px;
         font-size: 25px;
      }
      
      #p{
      	
      	float: left;
      	width: 18%;
      	height: 70px;
      	font-size: 20px;
      	font-family: sans-serif;
      	padding: 15px;
      	margin-left: 5%;
      	margin-top: 15%;
      	border-radius: 10px;
      	background: yellow;
      	color: black;
      }
      #q{
      	float: left;
      	width: 15%;
      	height: 70px;
      	font-size: 20px;
      	font-family: sans-serif;
      	padding:15px;
      	margin-left: 11%;
      	margin-top: 15%;
      	border-radius: 10px;
      	background: yellow;
      	color: black;
      	
      }
      #r{
      	float: right;
      	width: 15%;
      	height: 70px;
      	font-size: 20px;
      	font-family: sans-serif;
      	padding: 20px;
      	margin-right: 5%;
      	margin-top: 15%;
      	border-radius: 10px;
        background: yellow;
        color: black;
   }
   h1{
      text-align: center;
      color: white;
   }
 
</style>
<body>
<nav>
      <ul>
         
         <li>
            <a href="#">Dashboard</a>
         </li>
         <li>
            <a href="user login.php">Logout</a>
         </li>
      </ul>
</nav>
<h1><?php echo $_SESSION['Name']; ?></h1>
<a href="company details.php">
	<div id="p">
	<h3>Company Details</h3>
	</div>
	</a>
	<a href="webinarblank.php">
   <div id="q">
   <h3>Webinars</h3>	
   </div>
</a>
<a href="placement.php">
   <div id="r">
	<h3>Placements</h3>	
</div>
</a>
</body>
</html>