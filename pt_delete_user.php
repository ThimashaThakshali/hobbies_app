<?php
session_start();
if(isset($_GET["userId"]))
{
    $userId = $_GET["userId"];
    include("pt_db.php");

    $errorMessage = "";
    $sucessMessage = "";

    do{
 
            $SQL = "DELETE FROM users WHERE userId = $userId";

            //Execute the INSERT INTO SQL query
            //if SQL execution is correct
            if (mysqli_query($conn, $SQL))
            {
                $sucessMessage = "User deleted correctly";
                header("location:pt_index.php");
                exit;
            }

    
        }while(false);
}

?>