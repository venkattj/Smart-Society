<!DOCTYPE html>
<html>
<title>issue</title>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script language="Javascript" src="jadd.js"></script>
	<link rel="stylesheet" href="style.css">
</head>

	<body>
				<form action="getdetails.php" method="post">
    					<div id="issue">
						Issue:
						<?php
	 					$con=mysqli_connect("localhost","root","","problems");
	 					if ($con->connect_error) {
    					die("Connection failed: " . $con->connect_error);
		    			}
		    			$qur="SELECT Distinct issue from issues order by issue asc";
		    			$res=mysqli_query($con,$qur) or die ("error");
		    			$opt='<select id="titleBox" type="text" name= "issue">';
		    			$opt.="<option>Title</option>";
		    			while($row=mysqli_fetch_array($res))
		    				{
		    					$opt.="<option>$row[0]</option>";
		    				}
		    			$opt.="</select>";
		    			echo $opt;
		    			?>	
		    		
						</div>
							<div id="next"><button id="nex" type="submit" name="next" value="next" style="left: 600px;top:400px;position: absolute;padding: 20px;padding-left: 20px; font-size: 20px;">Next--></button>	
					<div id="newissue"> 
						New Issue:
						<input id="titleBox1" type="text" name= "newissue">
						<br><br>
						<div id="addb"><button id="adds" type="submit" name="add" >Add New</button></div>
					</div>
				</form>
				<!-- Trigger/Open The Modal -->

</body>
</html>
