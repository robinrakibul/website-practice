<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "register");
 
// Check connection
if(!$link){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM users";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "Users"."<br>";
        echo "<table>";
            echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>User Type</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['user_type'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set. mysqli_free_result() function frees the memory associated with the result.
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

 
// Close connection
mysqli_close($link);
?>

<html>
<body>
    <a href="admin.php">Go Home</a>
</body>
</html>
