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
		    if(isset($_POST['next']))

		    {
		    	session_start();
		    	$_SESSION["issue"]=mysqli_real_escape_string($obj, $_POST['issue']);

				$state=$_SESSION["state"];
				$district=$_SESSION["district"];
				$mandal=$_SESSION["mandal"];
				$issue=$_SESSION["issue"];
				$sql="SELECT chat from details where (state= '$state' and district='$district' and issue='$issue' and mandal='$mandal')  order by chat" ;
				$res=mysqli_query($obj,$sql);
				$chat=mysqli_fetch_array($res);
				$_SESSION["chat"]=$chat;
		    	header("Location:../issue/report.php");
		    	exit();
		    }
		    
		    
if(isset($_POST['add']))
{
	$opt=$_POST['newissue'];
	if($opt!=NULL)
	{
		$sq="INSERT INTO issues (issue) VALUES('$opt')";
		mysqli_query($obj,$sq);
	}
	
}
if(isset($_POST['reply']))
{
	$chat=mysqli_real_escape_string($obj,$_POST['chat']);
session_start();
$state=$_SESSION["state"];
$district=$_SESSION["district"];
$mandal=$_SESSION["mandal"];
$issue=$_SESSION["issue"];
$sql="SELECT chat from details where (state= '$state' and district='$district' and issue='$issue' and mandal='$mandal')  order by chat" ;
				$res=mysqli_query($obj,$sql);
				$chat1=mysqli_fetch_array($res);

		$sql="UPDATE details set chat=('$chat1[0]\r\n\t\t$chat')  where (state= '$state' and district='$district' and issue='$issue' and mandal='$mandal') " ;
		$res=mysqli_query($obj,$sql);
}
if(isset($_POST['submit'])){
	session_start();
$name=$_SESSION["name"];
$state=$_SESSION["state"];
$district=$_SESSION["district"];
$mandal=$_SESSION["mandal"];
$street=$_SESSION["street"];
$issue=$_SESSION["issue"];
$problem=mysqli_real_escape_string($obj, $_POST['problem']);




if(empty($issue) && empty($problem) ){
		header("Location: ../issue/getdetails.php?details=empty");
	exit();
}else{
		if($issue==NULL || $problem==NUll){
			header("Location:../issue/issue.php?invalid details");
	exit();
		}else{
				
							$sql="INSERT INTO details (name , state ,district, mandal , street ,issue,problemfile) VALUES('$name' , '$state' , '$district' ,'$mandal','$street','$issue','$problem')";

						if(mysqli_query($obj, $sql)){
						
						header("Location: ../..//main.html?Sucessfully sent");
						exit();
						}
							else{
										echo"error".mysqli_error($obj);
									}	
				}
					
				}
		}


else{
	header("Location: ../issue/issue.php");
	exit();
}

	mysqli_close($obj);
?>