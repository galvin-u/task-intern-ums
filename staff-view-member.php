<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Staff Dashboard</title>
        <link rel="stylesheet" href="styles.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    </head>
    <body>
        <div class="sidebar">
            <div class="logo"></div>
            <ul class="menu">
                <li >
                    <a href="Staff-Dashboard.php">
                        <i class="fa fa-tachometer"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="active">
                    <a href="staff-view-member.php">
                        <i class="fa fa-id-card"></i>
                        <span>Members</span>
                    </a>
                </li>
                <li>
                    <a href="staff-view-events.php">
                        <i class="fa-regular fa-calendar"></i>
                        <span>Events</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-regular fa-clipboard"></i>
                        <span>Projects</span>
                    </a>
                </li>
                <li>
                    <a href="staff-view-reports.php">
                        <i class="fa fa-pie-chart"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-regular fa-envelope"></i>
                        <span>Apply Leave</span>
                    </a>
                </li>
                <li class="logout">
                    <a href="index.html">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </a>    
                </li>
            </ul>
        </div>

        <div class="main-content">
            <div class="header-wrapper">
                <div class="header-title">
                    <span>View Members</span>
                </div>
            </div>
            <button id="toggleButton" class="add-member-btn" onclick="toggleAddMemberForm()">Add Member</button>


        <!-- New member form (initially hidden) -->
        <form id="addMemberForm" action="add_member.php" method="post" style="display: none;">
            <label for="member_name">Member Name:</label><br>
            <input type="text" id="member_name" name="member_name" required><br>
            <label for="member_benefit">Member Benefit:</label><br>
            <input type="text" id="member_benefit" name="member_benefit" required><br><br>
            <button type="button" onclick="addMember()">Add Member</button>
        </form>

            <table class="member-table" id="memberTable">
                <thead>
                    <tr>
                        <th>Member ID</th>
                        <th>Member Name</th>
                        <th>Member Benefit</th>
                        <th>Action</th>
                      </tr>
                </thead>
                <tbody>
                <?php
                include "db_conn.php";
                $sql = "SELECT * FROM memberinfo"; 
                $result = $conn->query($sql);

                if (!$result){
                    die("Invalid Query: " . $connection->error);
                }
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                    <td>". $row["id"] ."</td>
                    <td>". $row["membername"] ."</td>
                    <td>". $row["memberbenefit"] ."</td>
                    <td>
                    <form action='update.php' method='post' style='display: inline;'>
                        <input type='hidden' name='member_id' value='1'>
                        <button type='submit'>Update</button>
                    </form>
                    <form action='delete.php?id={$row['id']}' method='post' style='display: inline;'>
                        <input type='hidden' name='member_id' value='". $row["id"] ."'>
                        <button type='submit'>Delete</button>
                    </form>
                    </td>
                </tr>";
                }                
                ?>

                </tbody>
            </table>
        </div>
        <script>
        function toggleAddMemberForm() {
        var addMemberForm = document.getElementById("addMemberForm");
        var memberTable = document.getElementById("memberTable");
        var toggleButton = document.getElementById("toggleButton");
        
        if (addMemberForm.style.display === "none") {
            addMemberForm.style.display = "block";
            memberTable.style.visibility = "hidden";
            toggleButton.textContent = "Show Table";
        } else {
            addMemberForm.style.display = "none";
            memberTable.style.visibility = "visible";
            toggleButton.textContent = "Add Member";
        }
    }
        function addMember() {
            var member_name = document.getElementById("member_name").value;
            var member_benefit = document.getElementById("member_benefit").value;

            // Validate input fields
         if (member_name.trim() === '' || member_benefit.trim() === '') {
                alert("Please fill in all fields");
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "add_member.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Update the table with the response
                 document.getElementById("memberTable").innerHTML = xhr.responseText;
                    // Hide the form and show the table
                 document.getElementById("addMemberForm").style.display = "none";
                 document.getElementById("memberTable").style.visibility = "visible";
             }
            };
            xhr.send("member_name=" + member_name + "&member_benefit=" + member_benefit);
        }


    </script>

        
    </body>
</html>