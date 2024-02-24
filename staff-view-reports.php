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
                <li>
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
                <li class="active">
                    <a href="staff-view-reports.html">
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
                    <span>View Reports</span>
                </div>
            </div>
            <button class="add-report-btn">Add Member</button>
            <table class="report-table"><thead>
                <tr>
                    <th>Report ID</th>
                    <th>Report Title</th>
                    <th>Submitted By</th>
                    <th>Action</th>
                  </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
        </div>

        
    </body>
</html>