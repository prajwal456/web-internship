<?php
include 'app/connect.php';
session_start();
if(!isset($_SESSION['Name']))
{
  header("location:user login.php");

}


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assests/login.css">
    
</head>
<style>

  body{

     background-image: url("a3.jpg");
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
  border-radius: 10px;
}

td{
  padding: 8px;
  text-align: left;
  color: black;

}

 th {
  padding:8px;
  text-align: left;
  background-color: navy;
  color: white;
}


tr:hover 
{
     background-color:white;
     
}

table.center {
  margin-left: auto; 
  margin-right: auto;
background-color:yellow;

}


h3
{
  text-align: center;
  color: white;
  font-family: verdana;
  font-size: 20px;: 
  }
  #n1{
     color: white;
     font-family: verdana;
     font-size: 20px;
    }
h1{
   text-align: center;
   color: white;
 }
  </style>

<body>


  <div id="main">
    <nav>  
      <ul>
            
            <li><a href="student after login.php">Dashboard</a></li>
            <li><a href=logout1.php>Logout</a></li>
            </ul>
    </nav>
</div>
<h1><?php echo $_SESSION['Name']; ?></h1>

<h3><u>Company Details</u></h3>
<hr>
   <table class="center">
   	<tr>
      <th>COMPANY ID</th>
   		<th>NAME</th>
   		<th>EMAIL</th>
   		<th>PHONE</th>
   		
   	</tr>
   	<?php 
      $sql = "SELECT * FROM company";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) {
        ?> 
        <tr>
        	<td> <?php echo $row['COMPANYID']; ?> </td>
        	<td> <?php echo $row['NAME']; ?> </td>
        	<td> <?php echo $row['EMAIL']; ?> </td>
        	<td> <?php echo $row['PHONE']; ?> </td>
        	
        </tr>  
        <?php     	
            }
     	?>  	
   </table>   



</body>
</html>