<?php 
include 'app/connect.php';

 session_start();
 if(!isset($_SESSION['Name']))
 {
   header("location:admin login.php");
 }

if (isset($_POST['submit'])) {
   
   $GRD = $_POST['GRD'];
   
  
  /*$sql = "DELETE FROM student WHERE GRAD =?"
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i",$GRAD);
  $result = $stmt->execute();
*/



  $sql = " DELETE FROM student WHERE GRAD = ? ";
  $stmt =$conn->prepare($sql);
  $stmt->bind_param("i",$GRD);
  $stmt->execute();
  echo "$stmt->error";
  
if($stmt){
  echo "deleted";
  ?>
  
  <?php
}
  else{
    echo "not deleted";
  }
  
   
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>CWS</title>



  <link rel="stylesheet" type="text/css" href="assests/login.css">
   

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<style>
body
{
     background-image: url("a5.jpg");
    background-repeat: no-repeat;
    background-size:cover;
}
       
nav 
{ 
  width:100%;
    height:80px;
    background-color:yellow;
    line-height: 50px;
   
}
nav ul
{
    float: right;
    margin-right:30px
}
nav ul li
{
    list-style-type: none;
    display:inline-block;
    transition: 0.8s all;
                
}
nav ul li a
{
    text-decoration: none;
    color: black;
    padding: 40px;
}
nav ul li:hover
{
    background-color: #f39d1a;
}




     table {
  border-collapse: collapse;
  width: 50%;
 
}
h1{
  text-align: center;
  color: white;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  color: white;
}

tr:hover 
{
     background-color:#33BBFF;
     
}

table.center {
  margin-left: auto; 
  margin-right: auto;
}

h3{
  color: white;
  text-align: center;
}




  #n1{
    color: white;
     font-family: verdana;
    font-size: 20px;
     }


</style>
  
</head>
<body>
<div id="main">
    <nav>  
         <ul>
            <li><a href="admin after login.php">Dashboard</a></li>
            <li><a href="logout.php">logout</a></li>
            
        </ul>
    </nav>
</div>
<h1><?php echo $_SESSION['Name']; ?></h1>
<hr>
 <fieldset>
    <form method="post" action="delete.php">
           
            <label for="GRAD">Graduation Year</label>
            <input type="text" name="GRD"  placeholder="Enter the year" >
            <br> 
             
            <button type="submit" name="submit"><b>Submit</b></button>
            <br>
      
           </fieldset>
       </form>

</body>
</html>