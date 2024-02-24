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
                <li class="active">
                    <a href="#">
                        <i class="fa fa-tachometer"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="staff-view-member.php">
                        <i class="fa-solid fa-users"></i>
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
                    <span>User Management System</span>
                </div>
            </div>
        </div>
    </body>
</html>