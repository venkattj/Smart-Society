<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "problems";  

// Create connection
$obj =  mysqli_connect($servername, $username, $password, $dbname);
if ($obj->connect_error) {
    die("Connection failed: " . $obj->connect_error);
		    }
		    session_start();
if(isset($_POST['submit'])){


$_SESSION["name"]=mysqli_real_escape_string($obj, $_POST['name']);
$_SESSION["state"]=mysqli_real_escape_string($obj, $_POST['State']);
$_SESSION["district"]=mysqli_real_escape_string($obj, $_POST['District']);
$_SESSION["mandal"]=mysqli_real_escape_string($obj, $_POST['Mandal']);
$_SESSION["street"]=mysqli_real_escape_string($obj, $_POST['Street']);
$name=$_SESSION["name"];
$state=$_SESSION["state"];
$district=$_SESSION["district"];
$mandal=$_SESSION["mandal"];
$street=$_SESSION["street"];



if(empty($name) || empty($state) || empty($district) || empty($mandal) || empty($street)){
		header("Location: ../public/list.php?signup=empty");
	exit();
}else{
		if($name==NULL || $state==NUll|| $district==NULL||  $mandal==NULL|| $street==NULL||false){
			header("Location: ../public/details.php?signup=invalid");
	exit();
		}else{
				
						
						header("Location: ../public/issue/issue.php?user=welcome");
						exit();
						
								
				}
					
				}
		}


else{
	echo $name;
	header("Location: ../public/details.php");
	exit();
}
	
mysqli_close($obj);
?>