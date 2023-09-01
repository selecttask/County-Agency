
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="./assets/images/CA-logo 1.png" type="image/x-icon">

    <title>User Portal</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet" />
</head>
<link rel="stylesheet" href="./assets/css/admin-portal-goal2.css" />
<link rel="stylesheet" href="./assets/css/global.css" />

<style>
    /* Custom CSS to override Bootstrap styles */
    .custom-card {
        display: flex;
        padding: 15px 32px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 12px;
        flex: 1 0 0;
        border-radius: 26px;
        background: #FFF;
        box-shadow: 0px 4px 16px -4px rgba(0, 0, 0, 0.12);

    }

    /* Custom CSS for the trophy icon */
    .trophy-icon {
        width: 35px;
        height: 38.281px;
    }

    /* Custom CSS for the heading */
    .custom-heading {
        color: #2A2A2A;
        font-family: Poppins;
        font-size: 1.1em;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        margin-left: 10px;
    }

    .custom-date {
        color: #2A2A2A;
        font-family: Poppins;
        font-size: 0.9em;
        font-style: normal;
        font-weight: 400;
        line-height: normal;

    }

    /* Custom CSS to align icon and text in the same line */
    .icon-and-text {
        display: inline-flex;
        align-items: center;
    }
    .sidebar.collapsed {
    width: 0;
    /* transition: width 0.3s ease-in-out; */
    overflow: hidden;
}

.sidebar {
    width: 255px; /* Set your desired initial width */
    /* transition: width 0.3s ease-in-out; */
    overflow: auto; /* Adjust as needed */
}

</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebarDiv = document.querySelector(".sidebar");
        const sidebarToggle = document.getElementById("sidebar-toggle");

        sidebarToggle.addEventListener("click", function () {
            sidebarDiv.classList.toggle("collapsed");
        });
    });
</script>
<body>
    <div class="custom-flex h-full">

        <div class="sidebar show h-full  " style="position: relative;">
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
                <li class="nav-item active">
                    <a class="nav-link " href="{{route('admin.goal')}}">
                        <img src="./assets/images/goal.png" alt="No Image" />
                        <span>Goal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.profile') }}">
                        <img src="./assets/images/profile.png" class="profile" alt="No Image" />
                        <span>Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('admin.report')}}">
                        <img src="./assets/images/reports.png" alt="No Image" />
                        <span>Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('admin.activeGoal')}}">
                        <img src="./assets/images/companyStats.png" alt="No Image" />
                        <span>Active Goals</span>
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column d-md-block collapse mb-2" id="sidebarMenu" style="position: absolute; bottom: 0; left: 0;">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="./assets/images/logout.png" alt="No Image" />
                        Logout
                    </a>
                </li>
            </ul>
            <div class="logout" >
                <!-- <div class="nav-item" >
                    <a class="nav-link " href="#">
                        <img src="./assets/images/logout.png" alt="No Image" />
                        logout
                    </a>
                </div> -->
            </div>
        </div>

        <div class="main-screen">
            <div class="main-screen-content mt-4">

                <div class="heading mb-4">
                    <h1>
                        <button  class="d-md-inline d-none" id="sidebar-toggle">&#9776;</button>
                        Active Goal</h1>
                </div>
                <div class="row ">
                    <div class="col-xl-3 col-lg-6 col-md-6 mt-3 d-flex text-center d-xl-none ">
                        <span class="img-border">
                            <img src="./assets/images/calender-lg.png" style="height: 4rem;" alt="">
                        </span>
                        <div class="text-center mt-2" style="text-align: left!important;">
                            <span class="" style="font-weight: 500;">Active Goal From</span>
                             <p class="" style="font-size: 0.9em;font-weight: 500;">01-02-2023 to 01-08-2023</p>
                    </div>
                </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mt-2 mt-xl-0 p-1">
                        <div class="card custom-card">
                            <span class="icon-and-text">
                                <img src="assets/images/trouphy.png" alt="Trophy Icon" class="trophy-icon">
                                <h6 class="custom-heading">Jhon doe</h6>
                            </span>
                            <span>
                                <p class="custom-date p-0 m-0">12-10-2020</p>
                            </span>
                            <span>
                                <td class="progress-bar-container">
                                    <div>
                                        <div>
                                            <p class="complete-percentage">75% Completed + <span
                                                    class="primary-color">40 %
                                                    bonus</span> </p>
                                        </div>
                                        <div class="progress w-13 position-relative">
                                            <div class="progress-bar bg-yellow position-absolute" role="progressbar"
                                                style="width: 40%; height: 11px;"></div>
                                            <div class="progress-bar" role="progressbar" style="width: 100%;"></div>
                                        </div>
                                    </div>

                                </td>
                            </span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 mt-2 mt-xl-0 p-1">
                        <div class="card custom-card">

                            <span class="icon-and-text">
                                <img src="assets/images/trouphy.png" alt="Trophy Icon" class="trophy-icon">
                                <h6 class="custom-heading">Jhon doe</h6>
                            </span>
                            <span>
                                <p class="custom-date">12-10-2020</p>
                            </span>

                            <span>
                                <td class="progress-bar-container">
                                    <div>
                                        <div>
                                            <p class="complete-percentage">75% Completed + <span
                                                    class="primary-color">40 %
                                                    bonus</span> </p>
                                        </div>
                                        <div class="progress w-13 position-relative">
                                            <div class="progress-bar bg-yellow position-absolute" role="progressbar"
                                                style="width: 40%; height: 11px;"></div>
                                            <div class="progress-bar" role="progressbar" style="width: 100%;"></div>
                                        </div>
                                    </div>

                                </td>
                            </span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mt-2 mt-xl-0  p-1">
                        <div class="card custom-card">

                            <span class="icon-and-text">
                                <img src="assets/images/trophysilver.png" alt="Trophy Icon" class="trophy-icon">
                                <h6 class="custom-heading">Jhon doe</h6>
                            </span>
                            <span>
                                <p class="custom-date">12-10-2020</p>
                            </span>

                            <span>
                                <td class="progress-bar-container">
                                    <div>
                                        <div>
                                            <p class="complete-percentage">75% Completed + <span
                                                    class="primary-color">40 %
                                                    bonus</span> </p>
                                        </div>
                                        <div class="progress w-13 position-relative">
                                            <div class="progress-bar bg-yellow position-absolute" role="progressbar"
                                                style="width: 40%; height: 11px;"></div>
                                            <div class="progress-bar" role="progressbar" style="width: 100%;"></div>
                                        </div>
                                    </div>

                                </td>
                            </span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 mt-3 d-xl-flex text-center d-none">
                            <span class="img-border">
                                <img src="./assets/images/calender-lg.png" style="height: 4rem;" alt="">
                            </span>
                            <div class="text-center mt-2 ml-2" style="font-size: 0.9em;">
                                <span class="mr-lg-5" style="font-weight: 500;">Active Goal From</span>
                                 <p class="mr-2" style="font-size: 0.9em;font-weight: 500;">01-02-2023 to 01-08-2023</p>
                        </div>
                    </div>

                </div>
                <div class="row mt-4">
                    <!-- <div class="col-md-12">
                        <ul class="horizontal-tabs">
                            <li class="tab-item active">Current Goal</li>
                            <li class="tab-item">Upcoming Goal</li>
                        </ul>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8 margin" id="page-content">
                        <div class="card px-3" style="height: 400px;">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ranking</th>
                                            <th>Users</th>
                                            <th>Updated On</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>#4</td>
                                            <td>John Doe</td>
                                            <td>12-6-2023</td>
                                            <td class="progress-bar-container">
                                                <div>
                                                    <div>
                                                        <p class="complete-percentage">75% Completed + <span
                                                                class="primary-color">40 %
                                                                bonus</span> </p>
                                                    </div>
                                                    <div class="progress w-13 position-relative">
                                                        <div class="progress-bar bg-yellow position-absolute"
                                                            role="progressbar" style="width: 40%; height: 11px;"></div>
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                   </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#5</td>
                                            <td>John Doe</td>
                                            <td>12-6-2023</td>
                                            <td class="progress-bar-container">
                                                <div>
                                                    <div>
                                                        <p class="complete-percentage">75% Completed + <span
                                                                class="primary-color">40 %
                                                                bonus</span> </p>
                                                    </div>
                                                    <div class="progress w-13 position-relative">
                                                        <div class="progress-bar bg-yellow position-absolute"
                                                            role="progressbar" style="width: 40%; height: 11px;"></div>
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#6</td>
                                            <td>John Doe</td>
                                            <td>12-6-2023</td>
                                            <td class="progress-bar-container">
                                                <div>
                                                    <div>
                                                        <p class="complete-percentage">75% Completed + <span
                                                                class="primary-color">40 %
                                                                bonus</span> </p>
                                                    </div>
                                                    <div class="progress w-13 position-relative">
                                                        <div class="progress-bar bg-yellow position-absolute"
                                                            role="progressbar" style="width: 40%; height: 11px;"></div>
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                     </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#7</td>
                                            <td>John Doe</td>
                                            <td>12-6-2023</td>
                                            <td class="progress-bar-container">
                                                <div>
                                                    <div>
                                                        <p class="complete-percentage">75% Completed + <span
                                                                class="primary-color">40 %
                                                                bonus</span> </p>
                                                    </div>
                                                    <div class="progress w-13 position-relative">
                                                        <div class="progress-bar bg-yellow position-absolute"
                                                            role="progressbar" style="width: 40%; height: 11px;"></div>
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                     </div>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 mt-md-0 mt-2" >
                        <div class="card">
                            <div class="card-body">
                                <h5>Team Overview</h5>
                                <div id="pichart" style="height: 325px;"></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Link Bootstrap JS (Optional if you require Bootstrap JS functionality) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

       <!-- Link jQuery -->
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
         integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
         crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
         integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
         crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
         integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
         crossorigin="anonymous"></script>

       <script src="https://code.jquery.com/jquery-3.7.0.min.js"
         integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
       <!-- Link jQuery UI -->
       <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
        <script src="./assets/js/index.js"></script>

  <!-- Include AnyChart library -->
  <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-bundle.min.js"></script>
     <!-- Add this script at the end of your HTML, after all other content -->
     <script>

             // JavaScript code to handle the sidebar toggle
            //  document.addEventListener("DOMContentLoaded", function () {
            //     var menuToggle = document.getElementById("menu-toggle");
            //     var sidebarMenu = document.getElementById("sidebarMenu");
            //     menuToggle.addEventListener("click", function () {
            //         // Use Bootstrap's 'toggle' method to show or hide the sidebarMenu
            //         $(sidebarMenu).collapse('toggle');
            //     });
            // });

        $(document).ready(function() {

            anychart.onDocumentReady(function() {
          // set the data
          var data = [
              {x: "Completed", value: 50, color: "#03AF9F"},
              {x: "Bonus", value: 20, color: "#DCFF07"},
              {x: "Incomplete", value: 30, color: "#FFCE21"},
          ];

          // create the chart
          var chart = anychart.pie();

          // add the data
          chart.data(data);

          // Set the size of the chart
          chart.width('100%');
          chart.height('100%');

          // Set the custom colors
          chart.palette(data.map(function(item) {
              return item.color;
          }));

          // Customize the labels to display the percentages and labels
          chart.labels().format(function() {
              return this.value + '%\n' + this.x;
          }).hAlign('center').vAlign('middle');


          // display the chart in the container
          chart.container('pichart');
          chart.draw();
        });

        

       });
     </script>


</body>

</html>
