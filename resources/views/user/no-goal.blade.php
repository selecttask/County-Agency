<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/CA-logo 1.png" type="image/x-icon">

    <title>Goal</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/admin-portal-goal.css">
    <link rel="stylesheet" href="./assets/css/sidebar.css">
    <link rel="stylesheet" href="./assets/css/global.css">
    <!-- Add these lines after the existing link tags -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


<body>
    <div class="custom-flex h-full">
        <div class="sidebar show h-full" style="position: relative;">
            <div class="sidebar-logo">
                <img src="./assets/images/Logo.png" alt="No Image" />
                <!-- Use the 'data-target' attribute to specify the ID of the element to collapse -->
                <button id="menu-toggle" class="btn btn-primary d-md-none" data-toggle="collapse"
                    data-target="#sidebarMenu">
                    <img class="toggle-img" src="./assets/images/toggle.png" alt="No Toggle">
                </button>
            </div>
            <!-- Add the 'collapse' class and an ID to the ul element -->
            <ul class="nav flex-column d-md-block collapse" id="sidebarMenu">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('user.goal')}}">
                        <img src="./assets/images/goal.png" alt="No Image" />
                        <span>Goal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.profile')}}">
                        <img src="./assets/images/profile.png" class="profile" alt="No Image" />
                        <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.reports')}}">
                        <img src="./assets/images/reports.png" alt="No Image" />
                        <span>Reports</span>
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column d-md-block collapse mb-2" id="sidebarMenu"
                style="position: absolute; bottom: 0; left: 0;">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">
                        <img src="./assets/images/logout.png" alt="No Image" />
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
            <div class="logout">
                <!-- <div class="nav-item">
          <a class="nav-link" href="./login.html">
            <img src="./assets/images/logout.png" alt="No Image" />
            <span>Logout</span>
          </a>
        </div> -->
            </div>
        </div>

        <div class="main-screen">
            <div class="main-screen-content mt-4">
                <div class="heading">
                    <h1>
                        <button id="sidebar-toggle">&#9776;</button>
                        {{ auth()->user()->first_name }}'s Goal
                    </h1>
                </div>


                <div class="container d-flex justify-content-center align-item-center" style="height: 70vh;">
                    <a href="#" class="d-flex justify-content-center align-item-center goal-content"
                        style="text-decoration: none;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        flex-direction: column;">
                        <div class="goal-img">
                            <img src="./assets/images/goal-lg.png" alt="No Image">
                        </div>
                        <div class="description">
                            No active Goal
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Add the following HTML code to create the button -->

    </div>
    <!-- Link jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- Link jQuery UI -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="./assets/js/index.js"></script>
</body>

</html>
