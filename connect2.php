<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$conn = mysqli_connect("localhost", "root", "", "comic book store");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$first_name = $_REQUEST['name'];
		$last_name = $_REQUEST['Lname'];
		$user_name = $_REQUEST['Uname'];
		$email = $_REQUEST['email'];
        $password = $_REQUEST['password1'];
		$cpassword=$_REQUEST['password2'];
        $phoneno = $_REQUEST['phno'];
        $pincode = $_REQUEST['pin'];
		$address =$_REQUEST['option'];

		$sql = "select * from customer where username = '$user_name' ";  
       $result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  
  
if($count == 1){  
	echo '<script type ="text/JavaScript">';  
    echo 'alert("Username already exists")';  
    echo '</script>';
} 
elseif($cpassword!=$password)
{
	echo '<script type ="text/JavaScript">';  
    echo 'alert("The Entered Passwords does not match")';  
    echo '</script>';
} 
else{  
		
		$sql = "INSERT INTO customer VALUES ('$first_name',
			'$last_name','$user_name','$email','$password','$phoneno','$pincode','$address')";
		
		if(mysqli_query($conn, $sql)){
			header("Location:books.html");
		}
         else{
			header("Location:Signin2.html");
		}
	}
		// Close connection
		mysqli_close($conn);
		?>
