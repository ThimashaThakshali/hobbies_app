<?php
session_start();
include("pt_db.php");
$pageName = "Add Users";

//initialize the variables
$userName = "";
$userEmail = "";
$userType = "";
$userPassword = "";
$phoneNumber = "";
$userHobbies = "";

$errorMessage = "";
$sucessMessage = "";

//Define regular expression variable
$reg = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

//post the values
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $userName = $_POST["userName"];
  $userEmail = $_POST["userEmail"];
  $userType = $_POST["userType"];
  $userPassword = $_POST["userPassword"];
  $phoneNumber = $_POST["phoneNumber"];
  $userHobbies = $_POST["userHobbies"];

  do{
    //if the email does not matche the regular expression 
		if (!preg_match($reg, $userEmail)) 
		{
			
			echo "<br><p>Email not valid";
			echo "<br>Make sure you enter a correct email address</p>";
			break;
		}
    //check whether the fields are empty
    if(empty($userName) || empty($userEmail) ||  empty($userType) || empty($userPassword) || empty($phoneNumber) )
    {
      $errorMessage = "All the fields are Required";
      break;
    }
    if($userType == 'customer' && empty($userHobbies))
    {
      $errorMessage = "Customer should have hobbies";
      break;
    }
    else{
      //Write a SQL query to insert a new user into users table 
      if($userType == 'customer')
      {
        $SQL = "insert into users (userType, userName, userEmail , userPassword, phoneNumber, userHobbies)
      values  ('".$userType."','".$userName."','".$userEmail ."','".$userPassword."','".$phoneNumber."', '".$userHobbies."')";
      }
      if($userType == 'admin')
      {
        $SQL = "insert into users (userType, userName, userEmail , userPassword, phoneNumber)
        values  ('".$userType."','".$userName."','".$userEmail ."','".$userPassword."','".$phoneNumber."')";
      }
     

      //Execute the INSERT INTO SQL query
      //if SQL execution is correct
      if (mysqli_query($conn, $SQL))
      {
        $sucessMessage = "User added correctly";
        header("location:pt_index.php");
        exit;
      }

    } 
  }while(false);
}

echo "<head>";
    echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css'>";
echo "</head>";
echo "<body><h2>$pageName</h2>";
  if (!empty($errorMessage)){
    echo"<div class=alert alert-warning alert-dismissable fade show role = 'alert'>
      
    <strong>$errorMessage</strong>
    <button type=submit class = btn btn-close data-bs-dismiss= alert aria-label- close></button>
 
    </div> 
    ";  
  }
  echo"<div class = container mb-3>";

    echo"<form method = post>";

      echo"<div class=row mb-3>
        <label class = col-sm-3 col-form-label>Name :</label>
        <div class=col-sm-6>
          <input type=text class = form-control name = userName value = $userName>
        </div>  
      </div>
      ";  
      
      echo"<div class=row mb-3>
        <label class = col-sm-3 col-form-label>Email :</label>
        <div class=col-sm-6>
          <input type=text class = form-control name = userEmail value = $userEmail>
        </div>  
      </div>
      ";

      echo"<div class=row mb-3>
        <label class = col-sm-3 col-form-label>Password :</label>
        <div class=col-sm-6>
          <input type=text class = form-control name = userPassword value = $userPassword>
        </div>  
      </div> 
      ";
      echo"<div class=row mb-3>
        <label class=col-sm-3 col-form-label>User Type :</label>
        <div class=col-sm-6>
          <select class=form-select name=userType value = $userType>
            <option value=customer>customer</option>
            <option value=admin>admin</option>
          </select>
        </div>
      </div>
      ";
      echo"<div class=row mb-3>
        <label class = col-sm-3 col-form-label>Phone Numbers :</label>
        <div class=col-sm-6>
          <input type=text class = form-control name = phoneNumber value = $phoneNumber>
        </div>  
      </div>  
      ";
      echo"<div class=row mb-3>
        <label class = col-sm-3 col-form-label>Hobbies :</label>
        <div class=col-sm-6>
          <input type=text class = form-control name = userHobbies value = $userHobbies>
        </div>  
      </div>
      ";
      if (!empty($errorMessage)) {
    
        echo"<div class ='row mb-3'>
          <div class=offset-sm-3 col-sm-6>  
            <div class=alert alert-warning alert-dismissable fade show role = 'alert'>
              <strong>$sucessMessage</strong>
             <button type=submit class = btn btn-close data-bs-dismiss= alert aria-label- close></button>
           </div>
          </div>
        </div> 
        ";
      } 

      echo"<div class=\"row mb-3\">
        <div class=\"offset-sm-3 col-sm-3 d-grid\">
          <button type=submit class =\"btn btn-primary\">Submit</button>
        </div>
        <div class=\"col-sm-3 d-grid\">
          <a class =\"btn btn-outline-primary\" href =pt_index.php role = button>Cancel</a>
        </div>  
      </div>      
      ";
        
    echo"</form>";
  echo"</div>";
echo"
</body>
";
?>