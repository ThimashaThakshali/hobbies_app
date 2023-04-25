<?php
session_start();

	$pagename="Login Page"; 
	
    echo "<head>";
        echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css'>";
    echo "</head>";
    
	echo "<body>";
	
        //display the name of the web page
		echo "<h2>".$pagename."</h2>"; 
		
		//create a form
		echo"<form action = PT_login_process.php method = post >";
			echo"<table class=\"table\" style='border: 0px' >";
		        echo"<tr>";
					echo"<td style='border: 0px'>E-mail: </td>";
					echo"<td style='border: 0px'><input type = text name = 'l_email' size=35></td>";
				echo"</tr>";
				
				echo"<tr>";
					echo"<td style='border: 0px'>Password: </td>";
					echo"<td style='border: 0px'><input type = text name = 'l_password' size=35 maxlength=10 ></td>";
				echo"</tr>";
				
				echo"<tr>";
					echo"<td style='border: 0px'><input type = reset name='submitbtn' value='Clear Form' class =\"btn btn-primary\"></td>";
					echo"<td style='border: 0px'><input type = submit name='submitbtn' value='Log In' class =\"btn btn-primary\"></td>";
				echo"</tr>";
				
			echo"</table>";	
		echo"</form>";		
		
	echo "
	</body>";
?>