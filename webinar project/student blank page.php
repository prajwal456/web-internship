<?php 
include 'app/connect.php';
session_start();
if(!isset($_SESSION['Name']))
{
  header("location:admin login.php");

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>student blank page</title>
	</head>
	<style>
		body{
		background-size: cover;
	    background-attachment: fixed;
	    height: auto;
	    background-image:url("a7.jpg");
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
      	color: black;
      	text-align: center;
      	text-decoration: underline;
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

       #n1{
    color: white;
     font-family: verdana;
    font-size: 20px;
     }

	</style>
	<body>
		  <nav>
      <ul>
        
     
         <li>
            <a href="admin after login.php">Dashboard</a>
         </li>
         <li>
            <a href="logout.php">Logout</a>
         </li>
      </ul>
</nav>
	<div id="p">
	<h2>Student Details</h2>
</div>
<fieldset>
    <form method="post" action="student blank page.php">
             



<table class="center">
    <tr>
      <th>USN</th>
      <th>NAME</th>
      <th>EMAIL</th>
      <th>DEPARTMENT</th>
      <th>PHONE</th>
      <th>GRADUATION YEAR</th>
      
      
    
    </tr>
    <?php
      $sql = "SELECT S.USN,S.NAME,S.EMAIL,S.DEPARTMENT,S.GRAD,S.PHONE FROM student S";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      while($row = $result->fetch_assoc()){
    ?>
    <tr>
       <td> <?php echo $row['USN']; ?> </td>
      <td> <?php echo $row['NAME']; ?> </td>
      <td> <?php echo $row['EMAIL']; ?> </td>
      <td> <?php echo $row['DEPARTMENT']; ?> </td>
      <td><?php echo $row['PHONE']; ?></td>
      <td> <?php echo $row['GRAD']; ?> </td>
      
        
    </tr>
    <?php
      }
    ?>
  </table>
</form>
	</body>
</html>