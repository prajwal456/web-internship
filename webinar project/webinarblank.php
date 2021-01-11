<?php
include 'app/connect.php';

session_start();
if(!isset($_SESSION['Name']))
{
  header("location: user login.php");

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>webinar blank page</title>
	</head>
	<style>
		#n1{
     color: white;
     font-family: verdana;
     font-size: 20px;
    }
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

footer 
{
  text-align: center;
  padding: 3px;
  background-color: black;
  color: white;
  margin-top: 10%;
  margin-right: 
}


table {
 border-collapse: collapse;
 width: 90%;
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
    color: black;
    text-align: center;
    font-family: verdana;
    font-size: 30px;
    color: white;
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
            <li><a href="logout1.php">logout</a></li>
        </ul>
    </nav>
</div>
<h1><?php echo $_SESSION['Name'];  ?></h1>
<h3><u>Webinar Details</u></h3>

<hr>

<table class="center">
    <tr>
      <th>WEBINAR ID</th>
      <th>NAME</th>
      <th>DESCRIPTION</th>
      <th>LOCATION</th>
      <th>START_DATE</th>
      <th>END_DATE</th>
      <th>SKILLS</th>
    
    </tr>
    <?php
      $sql = "SELECT W.WEBINARID,W.DESCRIPTION,W.LOCATION,W.STARTDATE,W.ENDDATE,W.SKILLS,C.NAME FROM webinar W, company C WHERE W.COMPANYID=C.COMPANYID";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->get_result();
      while($row = $result->fetch_assoc()){
    ?>
    <tr>
       <td> <?php echo $row['WEBINARID']; ?> </td>
      <td> <?php echo $row['NAME']; ?> </td>
      <td> <?php echo $row['DESCRIPTION']; ?> </td>
      <td> <?php echo $row['LOCATION']; ?> </td>
      <td> <?php echo $row['STARTDATE']; ?> </td>
       <td> <?php echo $row['ENDDATE']; ?> </td>
        <td> <?php echo $row['SKILLS']; ?> </td>
    </tr>
    <?php
      }
    ?>
  </table>
	</body>
</html>