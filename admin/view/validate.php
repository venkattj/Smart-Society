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
if(isset($_POST['Refresh']))
{
	$_SESSION["state"]=$_SESSION["state1"];
	$_SESSION["district"]=$_SESSION["district1"];
	$_SESSION["mandal"]="";
	header("Location:result.php");
				exit();

}
if(isset($_POST['solve']))
{
					$state=$_SESSION["state"];
				$district=$_SESSION["district"];
				$mandal=$_SESSION["mandal"];
				$issue=$_SESSION["issue"];
				$sql="DELETE from details where (state= '$state' and district='$district' and issue='$issue' and mandal='$mandal') " ;
				$res=mysqli_query($obj,$sql);
				header("Location: status.php");
				exit();

}
if(isset($_POST['next']))
{
	$_SESSION["text"]=mysqli_real_escape_string($obj,$_POST['problem']);
$_SESSION["state"]=mysqli_real_escape_string($obj,$_POST['state']);
$_SESSION["district"]=mysqli_real_escape_string($obj,$_POST['district']);
$_SESSION["mandal"]=mysqli_real_escape_string($obj,$_POST['mandal']);
$_SESSION["issue"]=mysqli_real_escape_string($obj,$_POST['title']);
				$state=$_SESSION["state"];
				$district=$_SESSION["district"];
				$mandal=$_SESSION["mandal"];
				$issue=$_SESSION["issue"];
				$sql="SELECT chat from details where (state= '$state' and district='$district' and issue='$issue' and mandal='$mandal')  order by chat" ;
				$res=mysqli_query($obj,$sql);
				$chat=mysqli_fetch_array($res);
				$_SESSION["chat"]=$chat;
				header("Location: status.php");
				exit();
}
if(isset($_POST['reply']))
{

$chat=mysqli_real_escape_string($obj,$_POST['chat']);
$state=$_SESSION["state"];
$district=$_SESSION["district"];
$mandal=$_SESSION["mandal"];
$issue=$_SESSION["issue"];
$sql="SELECT chat from details where (state= '$state' and district='$district' and issue='$issue' and mandal='$mandal')  order by chat" ;
				$res=mysqli_query($obj,$sql);
				$chat1=mysqli_fetch_array($res);

		$sql="UPDATE details set chat=('$chat1[0]\r\n$chat')  where (state= '$state' and district='$district' and issue='$issue' and mandal='$mandal') " ;
		$res=mysqli_query($obj,$sql) or die('errors');
		header("Location:result.php");
				exit();

}
if(isset($_POST['submit']))
{
	$_SESSION["state"]=mysqli_real_escape_string($obj,$_POST['state']);
	if($_POST['district'])
	{
		$_SESSION["district"]=mysqli_real_escape_string($obj,$_POST['district']);
	}
	if($_POST['mandal'])
	{
		$_SESSION["mandal"]=mysqli_real_escape_string($obj,$_POST['mandal']);
	}
	
header("Location: ../view/result.php");
exit();
}
if (isset($_POST['view']))
 {
 	$_SESSION["mandal"]=mysqli_real_escape_string($obj,$_POST['mandal']);
	$_SESSION["title"]=mysqli_real_escape_string($obj,$_POST['title']);
	header("Location: ../view/result.php");
exit();
}

?>