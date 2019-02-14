<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "firstproject";  

// Create connection
$con =  mysqli_connect($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
		    }
		   

if(isset($_POST['submit'])){
	
	$uname=mysqli_real_escape_string($con, $_POST['username']);
	$password=mysqli_real_escape_string($con, $_POST['password']);
	if(empty($uname) || empty($password) )
	{
			echo "error";

		header("Location: ../admin/admin.php?login=empty");
		exit();
	}else{
			$sql="SELECT * FROM login WHERE (username ='$uname' and password ='$password')";
			$result=mysqli_query($con, $sql);
			session_start();
			$row=mysqli_fetch_array($result);
			$_SESSION["name"]=$row[0];
			$_SESSION["password"]=$row[1];
			$_SESSION["district"]=$row[2];
			$_SESSION["state"]=$row[3];
			$_SESSION["mandal"]="";
			$_SESSION["title"]="";
			$_SESSION["state1"]=$row[3];
			$_SESSION["district1"]=$row[2];

			$count=mysqli_num_rows($result);
			if($count==1){
						header("Location: ../admin/view/result.php?login=success");
						exit();
				
				}
				else{
						

					header("Location: ../admin/admin.php?login=password_incorrect");
					exit();
				}
				
			}
		}else{
	echo "error connection";
}
	

?> 
