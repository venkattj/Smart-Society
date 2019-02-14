<?php  

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "firstproject";  

// Create connection
$obj =  mysqli_connect($servername, $username, $password, $dbname);
if ($obj->connect_error) {
    die("Connection failed: " . $obj->connect_error);
		    }
		    session_start();
if(isset($_POST['submit'])){


$_SESSION["username"]=mysqli_real_escape_string($obj, $_POST['username']);
$_SESSION["password"]=mysqli_real_escape_string($obj, $_POST['password']);
$_SESSION["state"]=mysqli_real_escape_string($obj, $_POST['State']);
$_SESSION["district"]=mysqli_real_escape_string($obj, $_POST['District']);
$name=$_SESSION["username"];
$state=$_SESSION["state"];
$district=$_SESSION["district"];

$password=$_SESSION["password"];


if(empty($name) || empty($state) || empty($district) || empty($password)) {
		header("Location: ../signup/details.php?signup=empty");
	exit();
}else{
		if($name==NULL || $state==NUll|| $district==NULL||  $password==NULL){
			header("Location: ../signup/signup.php?signup=invalid");
	exit();
		}else{

			$sql="SELECT * FROM login WHERE (username ='$name' and password ='$password')";
						$result=mysqli_query($obj, $sql);
			$count=mysqli_num_rows($result);
			if($count==1){
						echo "already exsit";
						header("Location: ../signup/details.php?try+new+password");
						exit();

						}
						else
						{
				$sql="INSERT INTO login (username , state ,district, password ) VALUES('$name' , '$state' , '$district' ,'$password')";

						if(mysqli_query($obj, $sql)){
						
						header("Location: ../admin.php?user=welcome");
					
						
						exit();
						}
							else{
										echo"error".mysqli_error($obj);
									}
									}	

						

								
				}
					
				}
		}


else{

	header("Location: ../public/details.php");
	exit();
}
	
mysqli_close($obj);
?>