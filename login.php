<?php
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to check if the username and password match
    $sql = "SELECT * FROM logininfo WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    // Check if there is a row returned
    if (mysqli_num_rows($result) == 1) {
        // Authentication successful
        $row = mysqli_fetch_assoc($result);
        $usertype = $row['usertype'];
        
        // Redirect to the appropriate dashboard based on usertype
        if ($usertype == 'staff') {
            header("Location: Staff-Dashboard.php");
        } elseif ($usertype == 'member') {
            header("Location: Member-Dashboard.html");
        } else {
            echo "Unknown user type.";
        }
        exit; 
    } else {
        echo "Incorrect username or password.";
    }
}
?>
