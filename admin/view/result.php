<!DOCTYPE html>
<title>leaders Desk</title>
<head>

	<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="logout"><a href="../../main.html">logout</a></div>

	<div id=Box>
		
		<form action="validate.php" method="post">
			<div id="statediv">	State:
				<select id="StateBox" type="text" name= "state">
					<?php
					session_start();
					$state=$_SESSION["state"];
					$obj =  mysqli_connect("localhost","root", "", "problems");
					if($state=="Select State")
					{
						$sql="SELECT DISTINCT state from details order by state";
						$state=mysqli_query($obj,$sql);
						$opt="<option>Select State</option>";
		    			while($row=mysqli_fetch_array($state))
		    				{
		    				$opt.="<option>$row[0]</option>";
		    				}
		    			$opt.='</select><button  id="nx" type="submit"  name="submit">next</button>';
					}
					else
					{
					$opt.="<option >$state</option></select>";
					}
					echo $opt;
					?>
		
			</div>
			<div id="districtdiv"> 
			District:
				<select id="DistrictBox" type="text" name= "district">
					<?php
					$state=$_SESSION["state"];
					$district=$_SESSION["district"];
					$opt="";
					if($state=="Select State")
					{
					$opt.="</select>";
					}
					elseif ($district=="Select District") 
					{
						$sql="SELECT DISTINCT district  from details where state= '$state' order by district asc";
						$dis=mysqli_query($obj,$sql);
						$opt.="<option>Select District</option>";
		    			while($row=mysqli_fetch_array($dis))
		    				{
		    				$opt.="<option>$row[0]</option>";
		    				}
		    			$opt.='</select><button id="nx" type="submit"  name="submit">next</button>';
					}
					else
					{
					$opt.="<option>$district</option></select>";
		    		}
					echo $opt;
					?>
			</div>

			<div id="mandaldiv"> 
			Mandal:
				<select id="MandalBox" type="text" name= "mandal">
					<?php
					$opt="<option></option>";
					$mandal=$_SESSION["mandal"];
					if($mandal)
		    		{
		    			$op="<option>$mandal</option>";
		    			echo $op;
		    		}
		    		else
		    		{
					if($district!="Select District")
					{
						$sql="SELECT DISTINCT mandal  from details where district= '$district' order by mandal asc";
						$man=mysqli_query($obj,$sql);
		    			while($row=mysqli_fetch_array($man))
		    			{
		    				$opt.="<option>$row[0]</option>";
		    			}

		    			echo $opt;
		    		}

					}
						?>
				</select>
			</div>
<div id="Refresh"> <button  type="submit" name="Refresh">Refresh</button></div>
			<div id="titlediv">
				Issues:<br>
				<select id="titleBox" type="text" name="title" >
			<?php
				$mandal=$_SESSION["mandal"];
				$opt="";
				if($state=="Select State")
				{
					$sql="SELECT DISTINCT issue from details order by issue";
					$is=mysqli_query($obj,$sql);
					while($row=mysqli_fetch_array($is))
		    			{
		    				$opt.="<option >$row[0]</option>";
		    			}
		    			echo $opt;
		    	}
		    	if($district=="Select District")
				{
					$sql="SELECT DISTINCT issue from details where (state='$state') order by issue";
					$is=mysqli_query($obj,$sql);
					while($row=mysqli_fetch_array($is))
		    			{
		    				$opt.="<option>$row[0]</option>";
		    			}
		    			echo $opt;
		    	}
				if($mandal)
				{
				$sql="SELECT DISTINCT issue from details where (state= '$state' and district='$district' and mandal='$mandal') order by issue"; 
				$is=mysqli_query($obj,$sql);
		    			while($row=mysqli_fetch_array($is))
		    			{
		    				$opt.="<option>$row[0]</option>";
		    			}
		    			echo $opt;
		    		}
				else
					{
					$sql="SELECT DISTINCT issue from details where (state= '$state' and district='$district' ) order by issue"; 
					$is=mysqli_query($obj,$sql);
		    			while($row=mysqli_fetch_array($is))
		    			{
		    				$opt.="<option>$row[0]</option>";
		    			}
		    			echo $opt;
		    		}
						?>
			</select>
						<button type="submit" name="view">view</button>
		</div>
s
		<div id="problemfile">
			<textarea id="tx" type="text" name="problem" >
		<?php
		$issue=$_SESSION["title"];
		if($issue)
		{
			if($mandal)
			{
		$sql="SELECT problemfile from details where (state= '$state' and district='$district' and issue='$issue' and mandal='$mandal')  order by problemfile" ;
	}
	else
	{
				$sql="SELECT problemfile from details where (state= '$state' and district='$district' and issue='$issue' )  order by problemfile" ;

	}

		$problem=mysqli_query($obj,$sql);
		$row=mysqli_fetch_array($problem);
		echo $row[0];
		}
		else
		{
			echo "no updates";
			
		}
			?>
		</textarea>
		<button type="submit" name="next" style="padding: 5px;font-size: 16px; position: relative;left: 115px;top:20px;">Next--></button>
	
</div>
</form>
</div>
</body>