<?php
include "db_conn.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $member_name = mysqli_real_escape_string($conn, $_POST['member_name']);
    $member_benefit = mysqli_real_escape_string($conn, $_POST['member_benefit']);

    // SQL query to insert new member into the database
    $sql = "INSERT INTO memberinfo (membername, memberbenefit) VALUES ('$member_name', '$member_benefit')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Retrieve updated member list from the database
        $updated_table_html = "<thead>
                                <tr>
                                    <th>Member ID</th>
                                    <th>Member Name</th>
                                    <th>Member Benefit</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>";
        $result = mysqli_query($conn, "SELECT * FROM memberinfo");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $updated_table_html .= "<tr>";
                $updated_table_html .= "<td>" . $row["id"] . "</td>";
                $updated_table_html .= "<td>" . $row["membername"] . "</td>";
                $updated_table_html .= "<td>" . $row["memberbenefit"] . "</td>";
                // Add any additional columns here
                $updated_table_html .= "<td>
                                            <form action='update.php' method='post' style='display: inline;'>
                                                <input type='hidden' name='member_id' value='{$row["id"]}'>
                                                <button type='submit'>Update</button>
                                            </form>
                                            <form action='delete.php' method='post' style='display: inline;'>
                                                <input type='hidden' name='member_id' value='{$row["id"]}'>
                                                <button type='submit'>Delete</button>
                                            </form>
                                        </td>";
                $updated_table_html .= "</tr>";
            }
        } else {
            $updated_table_html .= "<tr><td colspan='4'>No members found</td></tr>";
        }
        $updated_table_html .= "</tbody>";
        echo $updated_table_html;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>
