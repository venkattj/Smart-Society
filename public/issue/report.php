<!DOCTYPE html>
<html>
<title>Report</title>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>
		<div>	<button type="submit" name="des" style="position: absolute;padding: 80px ;font-size: 32px;
				left: 300px;top: 300px;" id="myBtn">New Issue</button></div>
	<div >	<button id="myBtn1" name="status" type="submit" style="position: absolute;padding: 80px ;font-size: 32px;
				left: 750px;top: 300px;">Status</button></div>

			<!-- The Modal -->
		<div id="myModal" class="modal">

  <!-- Modal content -->
  		<div class="modal-content">
    	<span class="close">&times;</span>
    	<form action="getdetails.php" method="post">

					<div id="text">
    				<textarea placeholder="add Description" name="problem" type="text" style="width: 500px;height: 400px;background-color: yellow;font-size: 20px;" ></textarea><br>
    				<input type="submit" name="submit" value="Submit">
   					 </div>
    				</form>
  					</div>
					</div>
			<!-- The Modal -->
		<div id="myModal1" class="modal">

  <!-- Modal content -->
  		<div class="modal-content">
    	<span class="close">&times;</span>
    	<form action="getdetails.php" method="post">
            <h style="font-size: 22px;text-align: center;">Status:</h><br>
    		<textarea id = "chatting"><?php
    		session_start();
    		$chat=$_SESSION["chat"];
    		if($chat==NULL)
    		{
    			echo "not reached to leader submit again";
    		}
    		else
    		{ 
    			echo $chat[0];
    		}


    		?></textarea>

    	<div id="res"><textarea id="respond" type="text" name="chat" placeholder="any query"></textarea>
    	<input type="submit" name="reply" value="reply"></div>
    	</form>
  		</div>
		</div>



	<script>
// Get the modal
var modal = document.getElementById('myModal');
var modal1 = document.getElementById('myModal1');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var btn1 = document.getElementById("myBtn1");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span1=document.getElementsByClassName("close")[1];;

// When the user clicks the button, open the modal 

btn1.onclick = function() {
	
    modal1.style.display = "block";

}

btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
        modal1.style.display = "none";
    

}
span1.onclick = function() {
    modal.style.display = "none";
        modal1.style.display = "none";
    

}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal||event.target==modal1) {
        
            modal.style.display = "none";
        modal1.style.display = "none";
    
    }
}
</script>
</body>
</html>
