<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="./assets/images/CA-logo 1.png" type="image/x-icon">

    <title>Admin Portal</title>
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    /* Custom CSS to override Bootstrap styles */
    .custom-card {
        display: flex;
        padding: 15px 32px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 22px;
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
        font-size: 24px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .custom-date {
        color: #2A2A2A;
        font-family: Poppins;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    /* Custom CSS to align icon and text in the same line */
    .icon-and-text {
        display: inline-flex;
        align-items: center;
    }
</style>

<body>
    <div class="custom-flex h-full">

        <div class="sidebar">
            <div class="sidebar-logo" >
                <img src="./assets/images/Logo.png" alt="No Image" />
                <!-- <button id="menu-toggle" class="btn btn-primary " data-toggle="collapse"
                    data-target="#sidebarMenu">
                    <img class="toggle-img" src="./assets/images/toggle.png" alt="No Toggle">
                </button> -->
            </div>
            <!-- Add the 'collapse' class and an ID to the ul element -->
            <ul class="nav flex-column d-md-block collapse" id="sidebarMenu">
                <li class="nav-item">
                    <a class="nav-link" href="./admin-portal-goal.html">
                        <img src="./assets/images/goal.png" alt="No Image" />
                        <span>Goal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./admin-portal-profile.html">
                        <img src="./assets/images/profile.png" class="profile" alt="No Image" />
                        <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./report.html">
                        <img src="./assets/images/reports.png" alt="No Image" />
                        <span>Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./active-goal.html">
                        <img src="./assets/images/companyStats.png" alt="No Image" />
                        <span>Active Goals</span>
                    </a>
                </li>
            </ul>
            <div class="logout">
                <div class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="./assets/images/logout.png" alt="No Image" />
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="main-screen">
            <div class="main-screen-content mt-4">
                <div class="heading">
                    <button id="sidebar-toggle">&#9776;</button>
                    <h1>Active Goal</h1>
                </div>

                <div class="row">

                    <div class="col-md-3">
                        <div class="card custom-card">

                            <span class="icon-and-text">
                                <img src="assets/images/trouphy.png" alt="Trophy Icon" class="trophy-icon">
                                <h6 class="custom-heading">Jhon doe</h6>
                            </span>
                            <span>
                                <p class="custom-date">12-10-2020</p>
                            </span>
                            <span>
                                <p class="custom-date">100% Completed + 40 % bonus </p>

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

                    <div class="col-md-3">
                        <div class="card custom-card">

                            <span class="icon-and-text">
                                <img src="assets/images/trouphy.png" alt="Trophy Icon" class="trophy-icon">
                                <h6 class="custom-heading">Jhon doe</h6>
                            </span>
                            <span>
                                <p class="custom-date">12-10-2020</p>
                            </span>
                            <span>
                                <p class="custom-date">100% Completed + 40 % bonus </p>

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

                    <div class="col-md-3">
                        <div class="card custom-card">

                            <span class="icon-and-text">
                                <img src="assets/images/trouphy.png" alt="Trophy Icon" class="trophy-icon">
                                <h6 class="custom-heading">Jhon doe</h6>
                            </span>
                            <span>
                                <p class="custom-date">12-10-2020</p>
                            </span>
                            <span>
                                <p class="custom-date">100% Completed + 40 % bonus </p>

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


                    <div class="col-md-3">
                        <br>
                        <br>
                        <br>
                        <br>
                        <div style="width: 18rem; background-color: transparent; border: none;">
                            <div>
                                <div style="display: flex; align-items: center;">
                                    <div style="flex: 0 0 25%;">
                                        <i class="fa fa-calendar fa-2x" style="color: #03AF9F;"></i>
                                    </div>
                                    <div style="flex: 1;">
                                        <h3 style="margin-bottom: .5rem;">Event Date</h3>
                                        <h4 style="margin-top: 0;">12-10-2023</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>


                <br>

                
                <div class="row">
                    <div class="col-md-12">
                        <ul class="horizontal-tabs">
                            <li class="tab-item active">Current Goal</li>
                            <li class="tab-item">Upcoming Goal</li>
                        </ul>
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8 margin" id="page-content">
                        <div class="card px-3">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>User name</th>
                                            <th>Last Update</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
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
                                                    <button type="submit"
                                                        class="btn btn btn-outline-primary submit-outline-btn">Details</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
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
                                                    <button type="submit"
                                                        class="btn btn btn-outline-primary submit-outline-btn">Details</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
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
                                                    <button type="submit"
                                                        class="btn btn btn-outline-primary submit-outline-btn">Details</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
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
                                                    <button type="submit"
                                                        class="btn btn btn-outline-primary submit-outline-btn">Details</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
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
                                                    <button type="submit"
                                                        class="btn btn btn-outline-primary submit-outline-btn">Details</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
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
                                                    <button type="submit"
                                                        class="btn btn btn-outline-primary submit-outline-btn">Details</button>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="float-right mt-2">
                            <nav aria-label="Page navigation example ">
                              <ul class="pagination" style="position: fixed;bottom:2.5%;left:50%;">
                                <li class="page-item"><a class="page-link head deactive" href="#">Prev</a></li>
                                <li class="page-item"><a class="page-link links selected" href="#">1</a></li>
                                <li class="page-item"><a class="page-link links" href="#">2</a></li>
                                <li class="page-item"><a class="page-link links" href="#">3</a></li>
                                <li class="page-item"><a class="page-link links" href="#">...</a></li>
                                <li class="page-item"><a class="page-link links" href="#">10</a></li>
                                <li class="page-item"><a class="page-link head" href="#">Next</a></li>
                              </ul>
                            </nav>
                          </div> 
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-4">
                        <div class="card pie-card">
                            <div class="card-body">
                                <h5 class="chart-heading">Team Overview</h5>
                                <canvas id="pieChart"></canvas>
                                <div class="text-center mt-4">

                                </div>

                            </div>
                        </div>
                    </div>

                </div>




            </div>
        </div>
        <script>
            // Chart.js configuration
            var ctx = document.getElementById('pieChart').getContext('2d');
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Completed', 'Incompleted', 'Bonus'],
                    datasets: [{
                        data: [70, 30, 10], // Set your desired percentages here
                        backgroundColor: [
                            '#03AF9F',  // Color for Completed
                            '#DCFF07',   // Color for Incompleted
                            '#ffcc24'    // Color for Bonus
                        ],
                    }],
                },
                options: {
                    responsive: true,
                    legend: null, // Hide the legend
                },
            });
        </script>

        <script>
            // JavaScript code to handle the sidebar toggle
            document.addEventListener("DOMContentLoaded", function () {
                var menuToggle = document.getElementById("menu-toggle");
                var sidebarMenu = document.getElementById("sidebarMenu");
                menuToggle.addEventListener("click", function () {
                    // Use Bootstrap's 'toggle' method to show or hide the sidebarMenu
                    $(sidebarMenu).collapse('toggle');
                });
            });
        </script>
        <!-- Link Bootstrap JS (Optional if you require Bootstrap JS functionality) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>