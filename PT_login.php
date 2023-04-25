<?php
session_start();

	$pagename="Login Page"; 
	echo "<title>".$pagename."</title>"; 
	echo "<body>";
	
        //display the name of the web page
		echo "<h4>".$pagename."</h4>"; 
		
		//create a form
		echo"<form action = PT_login_process.php method = post >";
			echo"<table  style='border: 0px' id = 'logindetails'>";
		echo"<tr>";
					echo"<td style='border: 0px'>E-mail: </td>";
					echo"<td style='border: 0px'><input type = text name = 'l_email' size=35></td>";
				echo"</tr>";
				
				echo"<tr>";
					echo"<td style='border: 0px'>Password: </td>";
					echo"<td style='border: 0px'><input type = text name = 'l_password' size=35 maxlength=10 ></td>";
				echo"</tr>";
				
				echo"<tr>";
					echo"<td style='border: 0px'><input type = reset name='submitbtn' value='Clear Form' id='submitbtn'></td>";
					echo"<td style='border: 0px'><input type = submit name='submitbtn' value='Log In' id='submitbtn'></td>";
				echo"</tr>";
				
			echo"</table>";	
		echo"</form>";		
		
	echo "
	</body>";
?>