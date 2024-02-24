<?php
include "db_conn.php";

if (isset($_POST["member_id"])) {
    $member_id = $_POST["member_id"];
    
    // SQL query to delete member
    $sql = "DELETE FROM memberinfo WHERE id = '$member_id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: staff-view-member.php"); // Redirect back to the member view page
        exit;
    } else {
        echo "Error deleting member: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Member ID is not set.";
}
?>
