<?php
    session_start();
    $pagename = "Users";
    include("pt_db.php");
    echo "<head>";
        echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css'>";
    echo "</head>";
    echo "<body>";
        echo "<h2>" . $pagename . "</h2>";
        echo "<div>";
            
            
            echo "<br>";
            $SQL = "SELECT * FROM users";
            $result = $conn->query($SQL);
            if (!$result) {
                die("invalid query:" . $conn->error);
            }
            $rows = '';

            foreach ($result as $row) {
                $rows .= '<tr>
                    <td>' . $row['userId'] . '</td>
                    <td>' . $row['userName'] . '</td>
                    <td>' . $row['userEmail'] . '</td>
                    <td>' . $row['userType'] . '</td>
                    <td>' . $row['phoneNumber'] . '</td>
                    <td>' . $row['userHobbies'] . '</td>
                    <td>
                        <button class="btn btn-primary" onclick="location.href=\'pt_edit_user.php?userId=' . $row['userId'] . '\'">Edit</button>
                        <button class="btn btn-danger" onclick="location.href=\'pt_delete_user.php?userId=' . $row['userId'] . '\'">Delete</button>
                    </td>
                </tr>';
            }
            echo "<table id='usertable' class=\"table table-striped table-bordered table-light\">";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Name</th>";
                        echo "<th>Email</th>";
                        echo "<th>User Type</th>";
                        echo "<th>Contact Numbers</th>";
                        echo "<th>Hobbies</th>";
                        echo "<th>Action</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    echo $rows;
                echo "</tbody>";
            echo "</table>";
        echo "</div>";
        echo "<button class=\"btn btn-primary\" onclick=\"location.href='pt_add_users.php'\">Add users</button>";
        
      echo "<br>";
    echo "</body>";
?>

