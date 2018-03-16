<?php
include 'conn.php';
session_start();
if(isset($_POST['sub'])){
$uname=$_POST['id'];
$name=$_POST['Name'];
$pass=$_POST['pass'];
$sql="INSERT INTO sign (`id`,`name`,`password`) VALUES('$uname','$name','$pass')";
mysqli_query($conn,$sql); 
header("location:login.php");
}
?> 
<!DOCTYPE html> 
<html>
<head>
    <title>PROPERTY SELLING</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body> 
<h2 align="center">PROPERTY SELLING</h2>
<div id="main">
    <div id="info">
         <form  method="post">
        <h2>REGISTER HERE!!!</h2>
        <label>UserId:</label>
		<input type="text" name="id" placeholder="id" required><br><br>
		<label>UserName:</label>
        <input type="text" name="Name" placeholder="Name"><br><br>
        <label>Password:</label>
        <input type="password" name="pass" placeholder="Password"><br><br>
        <button style="background-color: #6495ed;color:white;" type="submit" name="sub"><b>signup</b></button>
        </form>
    </div>
</div>
</body>
</html>
