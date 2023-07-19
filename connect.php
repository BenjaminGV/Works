
<?php
$con = mysqli_connect("localhost","Admin", "csbs", "comic book store");  
$username=$_POST['username'];
$password=$_POST['password'];
$username = stripcslashes($username);  
$password = stripcslashes($password);  
$username = mysqli_real_escape_string($con, $username);  
$password = mysqli_real_escape_string($con, $password);  

$sql = "select * from customer where username = '$username' and password = '$password'";  
$result = mysqli_query($con, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  
  
if($count == 1){  
    header("Location:books.html");
}  
else{  
   header("Location:login2.html");
}
?>
