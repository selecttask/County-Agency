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
<link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}" />
<link rel="stylesheet" href="./assets/css/admin-portal-goal2.css" />
<link rel="stylesheet" href="./assets/css/global.css" />
<style>
    @keyframes bounceText {
      0%,
      100% {
        transform: translateY(0);
        opacity: 1;
      }
      50% {
        transform: translateY(-20px);
        opacity: 1;
      }
    }

    #yayText,
    #nameTitle,
    .fs-4 {
      animation: bounceText 2s ease-in-out infinite;
      opacity: 0; /* Start with the text elements hidden */
    }
  </style>
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
        width: 255px;
        /* Set your desired initial width */
        /* transition: width 0.3s ease-in-out; */
        overflow: auto;
        /* Adjust as needed */
    }

    .anychart-credits {
        display: none;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sidebarDiv = document.querySelector(".sidebar");
        const sidebarToggle = document.getElementById("sidebar-toggle");

        sidebarToggle.addEventListener("click", function() {
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
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('admin.goal') }}">
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
                    <a class="nav-link " href="{{ route('admin.report') }}">
                        <img src="./assets/images/reports.png" alt="No Image" />
                        <span>Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.activeGoal') }}">
                        <img src="./assets/images/companyStats.png" alt="No Image" />
                        <span>Active Goals</span>
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column d-md-block collapse mb-2" id="sidebarMenu"
                style="position: absolute; bottom: 0; left: 0;">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">
                        <img src="./assets/images/logout.png" alt="No Image" />
                        Logout
                    </a>
                </li>
            </ul>
            <div class="logout">
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
                        <button class="d-md-inline d-none" id="sidebar-toggle">&#9776;</button>
                        Active Goal
                    </h1>
                </div>
                @if (!is_null($goal))
                    <div class="row ">
                        <div class="col-xl-3 col-lg-6 col-md-6 mt-3 d-flex text-center d-xl-none ">
                            <span class="img-border">
                                <img src="./assets/images/calender-lg.png" style="height: 4rem;" alt="">
                            </span>
                            <div class="text-center mt-2" style="text-align: left!important;">
                                <span class="" style="font-weight: 500;">Active Goal From</span>
                                <p class="" style="font-size: 0.9em;font-weight: 500;">{{ date('d-m-Y', strtotime($goal->start_date)) }} to
                                    {{ date('d-m-Y', strtotime($goal->end_date)) }}</p>
                            </div>
                        </div>

                        @if (isset($userTargetsInfo[0]))
                            <div id="gold-user" class="col-xl-3 col-lg-6 col-md-6 mt-2 mt-xl-0 p-1">
                                <div class="card custom-card">
                                    <span class="icon-and-text">
                                        <img src="assets/images/trouphy.png" alt="Trophy Icon" class="trophy-icon">
                                        <h6 class="custom-heading">{{ $userTargetsInfo[0]['name'] }} </h6>
                                    </span>
                                    <span>
                                        <p class="custom-date p-0 m-0">{{ date('d-m-Y', strtotime($goal->end_date)) }}</p>
                                    </span>
                                    <span>
                                        <td class="progress-bar-container">
                                            <div>
                                                <div>
                                                    <p class="complete-percentage">
                                                        {{ $userTargetsInfo[0]['stats']['completed'] }}% Completed +
                                                        <span
                                                            class="primary-color">{{ $userTargetsInfo[0]['stats']['bonus'] }}%
                                                            bonus</span> </p>
                                                </div>
                                                <div class="progress w-13 position-relative">
                                                    <div class="progress-bar bg-green position-absolute"
                                                        role="progressbar"
                                                        style="width: {{ round($userTargetsInfo[0]['stats']['completed']) }}%; height: 11px;">
                                                    </div>
                                                    {{-- <div class="progress-bar" role="progressbar" style="width: 100%;"></div> --}}
                                                </div>
                                            </div>
                                        </td>
                                    </span>
                                </div>
                            </div>
                        @endif
                        @if (isset($userTargetsInfo[1]))
                            <div id="silver-user" class="col-xl-3 col-lg-6 col-md-6 mt-2 mt-xl-0 p-1">
                                <div class="card custom-card">
                                    <span class="icon-and-text">
                                        <img src="assets/images/trophysilver.png" alt="Trophy Icon"
                                            class="trophy-icon">
                                        <h6 class="custom-heading">{{ $userTargetsInfo[1]['name'] }} </h6>
                                    </span>
                                    <span>
                                        <p class="custom-date p-0 m-0">{{ date('d-m-Y', strtotime($goal->end_date)) }}</p>
                                    </span>
                                    <span>
                                        <td class="progress-bar-container">
                                            <div>
                                                <div>
                                                    <p class="complete-percentage">
                                                        {{ $userTargetsInfo[1]['stats']['completed'] }}% Completed +
                                                        <span
                                                            class="primary-color">{{ round($userTargetsInfo[1]['stats']['bonus']) }}%
                                                            bonus</span> </p>
                                                </div>
                                                <div class="progress w-13 position-relative">
                                                    <div class="progress-bar bg-green position-absolute"
                                                        role="progressbar"
                                                        style="width: {{ round($userTargetsInfo[1]['stats']['completed']) }}%; height: 11px;">
                                                    </div>
                                                    {{-- <div class="progress-bar" role="progressbar" style="width: 100%;"></div> --}}
                                                </div>
                                            </div>
                                        </td>
                                    </span>
                                </div>
                            </div>
                        @endif
                        @if (isset($userTargetsInfo[2]))
                            <div id="bronze-user" class="col-xl-3 col-lg-6 col-md-6 mt-2 mt-xl-0 p-1">
                                <div class="card custom-card">
                                    <span class="icon-and-text">
                                        <img src="assets/images/bronzetrophy.png" alt="Trophy Icon"
                                            class="trophy-icon">
                                        <h6 class="custom-heading">{{ $userTargetsInfo[2]['name'] }} </h6>
                                    </span>
                                    <span>
                                        <p class="custom-date p-0 m-0">{{ date('d-m-Y', strtotime($goal->end_date)) }}</p>
                                    </span>
                                    <span>
                                        <td class="progress-bar-container">
                                            <div>
                                                <div>
                                                    <p class="complete-percentage">
                                                        {{ $userTargetsInfo[2]['stats']['completed'] }}% Completed +
                                                        <span
                                                            class="primary-color">{{ $userTargetsInfo[2]['stats']['bonus'] }}%
                                                            bonus</span> </p>
                                                </div>
                                                <div class="progress w-13 position-relative">
                                                    <div class="progress-bar bg-green position-absolute"
                                                        role="progressbar"
                                                        style="width: {{ round($userTargetsInfo[2]['stats']['completed']) }}%; height: 11px;">
                                                    </div>
                                                    {{-- <div class="progress-bar" role="progressbar" style="width: 100%;"></div> --}}
                                                </div>
                                            </div>
                                        </td>
                                    </span>
                                </div>
                            </div>
                        @endif

                        <div class="col-xl-3 col-lg-6 col-md-6 mt-3 d-xl-flex text-center d-none">
                            <span class="img-border">
                                <img src="./assets/images/calender-lg.png" style="height: 4rem;" alt="">
                            </span>
                            <div class="text-center mt-2 ml-2" style="font-size: 0.9em;">
                                <span class="mr-lg-5" style="font-weight: 500;">Active Goal From</span>
                                <p class="mr-2" style="font-size: 0.9em;font-weight: 500;">{{ date('d-m-Y', strtotime($goal->start_date)) }}
                                    to {{ date('d-m-Y', strtotime($goal->end_date)) }}</p>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-4">
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-8 col-lg-8 margin" id="page-content">
                            <div class="card px-3" style="height: 54vh;">
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
                                        <tbody id="other-users" >
                                            @foreach ($userTargetsInfo as $key => $userInfo)
                                                @if ($key > 2)
                                                    <tr>
                                                        <td>#{{ $loop->iteration }}</td>
                                                        <td>{{ $userInfo['name'] }}</td>
                                                        <td>
                                                            {{ $goal->updated_at == $goal->created_at ? '0000-00-00' : $goal->updated_at->format('Y-m-d') }}
                                                        </td>
                                                        <td class="progress-bar-container">
                                                            <div>
                                                                <div>
                                                                    <p class="complete-percentage">
                                                                        {{ $userInfo['stats']['completed'] }}%
                                                                        Completed + <span
                                                                            class="primary-color">{{ $userInfo['stats']['bonus'] }}%
                                                                            bonus</span> </p>
                                                                </div>
                                                                <div class="progress w-13 position-relative">
                                                                    <div class="progress-bar bg-green position-absolute"
                                                                        role="progressbar"
                                                                        style="width: {{ round($userInfo['stats']['completed']) }}%; height: 11px;">
                                                                    </div>
                                                                    {{-- <div class="progress-bar" role="progressbar"
                                                                 style="width: 100%;"></div> --}}
                                                                </div>
                                                            </div>
                                                            <div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 mt-md-0 mt-2">
                            <div class="card" style="height: 54vh;">
                                <div class="card-body pb-5 px-0">
                                    <h5 class="pl-4">Team Overview</h5>
                                    <div id="pichart" style="height: 100%;"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                @else
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
                @endif

            </div>
        </div>
    </div>

    <div id="animation">
        <div id="overlay"></div>
        <!-- card -->
        <div id="contentContainer">
          <div class="card-animation">
            <div class="card-body text-center text-light">
              <h1 id="yayText" class="display-4 fw-bold">Hooray!</h1>
              <h1 id="nameTitle">
                The moment we've all been waiting for has arrived!
              </h1>
              <p class="fw-normal fs-4">
                Every single person has conqured their goals and achieved
                greatness!
              </p>
            </div>
          </div>
        </div>
        <audio id="celebration">
          <source src="asset('assets/assets/sounds/celebration.mp3')" type="audio/mpeg" />
        </audio>
    </div>

    <!-- Link Bootstrap JS (Optional if you require Bootstrap JS functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Link jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- Link jQuery UI -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="./assets/js/index.js"></script>

    <!-- Include AnyChart library -->
    <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-bundle.min.js"></script>

    <!-- jsDelivr  -->
    <script src="https://cdn.jsdelivr.net/npm/fireworks-js@2.x/dist/index.umd.js"></script>

    <!-- UNPKG -->
    <script src="https://unpkg.com/fireworks-js@2.x/dist/index.umd.js"></script>
    <!-- Add this script at the end of your HTML, after all other content -->
    @if (!is_null($goal))
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

            // $(document).ready(function(){
            //     $("#animation").hide();
            //     $("audio#celebration")[0].pause();
            //     $("audio#celebration")[0].currentTime = 0;
            // })
        </script>

        <script>
            var chart;

            var gold = 0;
            var silver = 0;
            var bronze = 0;

            $(document).ready(function() {

                anychart.onDocumentReady(function() {
                    // set the data
                    var data = [{
                            x: "Completed",
                            value: {{ $goal->stats()['completed_percentage'] }},
                            color: "#03AF9F"
                        },
                        {
                            x: "Bonus",
                            value: {{ $goal->stats()['bonus_percentage'] }},
                            color: "#DCFF07"
                        },
                        {
                            x: "Incomplete",
                            value: {{ $goal->stats()['incompleted_percentage'] }},
                            color: "#FFCE21"
                        },
                    ];
                    console.log(data)
                    // create the chart
                    chart = anychart.pie();

                    console.log(chart);
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
                
                // setInterval(fetchLiveData, 3000);
                // Start the interval and store its ID in the global variable
                ajaxInterval = setInterval(fetchLiveData, 3000);
            });


            function fetchLiveData() {
                $.ajax({
                    url: "{{ route('admin.goalActiveStats') }}",
                    type: "GET",
                    success: handleData,
                    error: handleError
                });
            }

            function handleData(data) {
                if (data && formatPercentage(data.goalStats.completed_percentage) >= 100) {
                    startAnimation(data.goalStats, data.goal.id)
                    // Stop the interval when completed_percentage reaches 100
                    clearInterval(ajaxInterval);
                }

                if (data) {
                    // console.log(data);
                    // console.log(data.userTargetsInfo.length);
                    populateData(data);
                    animationPopUp(data.goalStats, data.goal.id)
                }
            }

            function handleError(error) {
                console.log(error);
            }

            function populateData(data) {
                if (data.userTargetsInfo.length <= 1) {
                    populateGoldUser(data.userTargetsInfo[0], data.goal);
                } else if (data.userTargetsInfo.length <= 2) {
                    populateGoldUser(data.userTargetsInfo[0], data.goal);
                    populateSilverUser(data.userTargetsInfo[1], data.goal);
                } else if (data.userTargetsInfo.length <= 3) {
                    populateGoldUser(data.userTargetsInfo[0], data.goal);
                    populateSilverUser(data.userTargetsInfo[1], data.goal);
                    populateBronzeUser(data.userTargetsInfo[2], data.goal);
                } else if (data.userTargetsInfo.length > 3) {
                    populateGoldUser(data.userTargetsInfo[0], data.goal);
                    populateSilverUser(data.userTargetsInfo[1], data.goal);
                    populateBronzeUser(data.userTargetsInfo[2], data.goal);
                    populateOtherUsers(data.userTargetsInfo, data.goal);
                }
                updateChart(chart, data.goalStats);
            }

            const goldUser = document.getElementById('gold-user');
            const silverUser = document.getElementById('silver-user');
            const bronzeUser = document.getElementById('bronze-user');
            const otherUsers = document.getElementById('other-users');

            function populateGoldUser(data, goal) {
                const completedPercentage = data.stats.completed;
                const bonusPercentage = data.stats.bonus;

                const completed = Math.round(completedPercentage + bonusPercentage)

                // if(completed >= 100) {
                //     gold = 1
                // }

                // if (gold === 1) {
                    goldUser.innerHTML = `
                    <div class="card custom-card">
                        <span class="icon-and-text">
                            <img src="assets/images/trouphy.png" alt="Trophy Icon" class="trophy-icon">
                            <h6 class="custom-heading">${data.name} </h6>
                        </span>
                        <span>
                            <p class="custom-date p-0 m-0">${goal.end_date}</p>
                        </span>
                        <span>
                            <td class="progress-bar-container">
                                <div>
                                    <div>
                                        <p class="complete-percentage">
                                            ${formatPercentage(completedPercentage)}% Completed +
                                            <span class="primary-color">${formatPercentage(bonusPercentage)}%
                                                bonus</span> </p>
                                    </div>
                                    <div class="progress w-13 position-relative">
                                        <div class="progress-bar bg-green position-absolute"
                                            role="progressbar"
                                            style="width: ${formatPercentage(completedPercentage)}%; height: 11px;">
                                        </div>
                                        {{-- <div class="progress-bar" role="progressbar" style="width: 100%;"></div> --}}
                                    </div>
                                </div>
                            </td>
                        </span>
                    </div>
                    `;
                // }

            }

            function populateSilverUser(data, goal) {
                const completedPercentage = data.stats.completed;
                const bonusPercentage = data.stats.bonus;

                const completed = Math.round(completedPercentage + bonusPercentage)

                // if(completed >= 100) {
                //     silver = 1
                // }

                // if (silver === 1) {
                    silverUser.innerHTML = `
                    <div class="card custom-card">
                        <span class="icon-and-text">
                            <img src="assets/images/trophysilver.png" alt="Trophy Icon" class="trophy-icon">
                            <h6 class="custom-heading">${data.name} </h6>
                        </span>
                        <span>
                            <p class="custom-date p-0 m-0">${goal.end_date}</p>
                        </span>
                        <span>
                            <td class="progress-bar-container">
                                <div>
                                    <div>
                                        <p class="complete-percentage">
                                            ${formatPercentage(completedPercentage)}% Completed +
                                            <span class="primary-color">${formatPercentage(bonusPercentage)}%
                                                bonus</span> </p>
                                    </div>
                                    <div class="progress w-13 position-relative">
                                        <div class="progress-bar bg-green position-absolute"
                                            role="progressbar"
                                            style="width: ${formatPercentage(completedPercentage)}%; height: 11px;">
                                        </div>
                                        {{-- <div class="progress-bar" role="progressbar" style="width: 100%;"></div> --}}
                                    </div>
                                </div>
                            </td>
                        </span>
                    </div>
                    `;
                // }

            }

            function populateBronzeUser(data, goal) {
                const completedPercentage = data.stats.completed;
                const bonusPercentage = data.stats.bonus;

                const completed = Math.round(completedPercentage + bonusPercentage)

                // if(completed >= 100) {
                //     bronze = 1
                // }

                // if (bronze === 1) {
                    bronzeUser.innerHTML = `
                    <div class="card custom-card">
                        <span class="icon-and-text">
                            <img src="assets/images/bronzetrophy.png" alt="Trophy Icon" class="trophy-icon">
                            <h6 class="custom-heading">${data.name} </h6>
                        </span>
                        <span>
                            <p class="custom-date p-0 m-0">${goal.end_date}</p>
                        </span>
                        <span>
                            <td class="progress-bar-container">
                                <div>
                                    <div>
                                        <p class="complete-percentage">
                                            ${formatPercentage(completedPercentage)}% Completed +
                                            <span class="primary-color">${formatPercentage(bonusPercentage)}%
                                                bonus</span> </p>
                                    </div>
                                    <div class="progress w-13 position-relative">
                                        <div class="progress-bar bg-green position-absolute"
                                            role="progressbar"
                                            style="width: ${formatPercentage(completedPercentage)}%; height: 11px;">
                                        </div>
                                        {{-- <div class="progress-bar" role="progressbar" style="width: 100%;"></div> --}}
                                    </div>
                                </div>
                            </td>
                        </span>
                    </div>
                    `;
                // }

            }

            function populateOtherUsers(data, goal) {
                let html = '';
                data.forEach((userInfo, index) => {
                    if (index > 2) {
                        const completedPercentage = userInfo.stats.completed;
                        const bonusPercentage = userInfo.stats.bonus;

                        // html should be in this format
                        html += `
                        <tr>
                            <td>#${index + 1}</td>
                            <td>${userInfo.name}</td>
                            <td>
                                ${goal.updated_at == goal.created_at ? '0000-00-00' : goal.updated_at.format('Y-m-d')}
                            </td>
                            <td class="progress-bar-container">
                                <div>
                                    <div>
                                        <p class="complete-percentage">
                                            ${formatPercentage(completedPercentage)}%
                                            Completed + <span
                                                class="primary-color">${formatPercentage(bonusPercentage)}%
                                                bonus</span> </p>
                                    </div>
                                    <div class="progress w-13 position-relative">
                                        <div class="progress-bar bg-green position-absolute"
                                            role="progressbar"
                                            style="width: ${formatPercentage(completedPercentage)}%; height: 11px;">
                                        </div>
                                        {{-- <div class="progress-bar" role="progressbar"
                                        style="width: 100%;"></div> --}}
                                    </div>
                                </div>
                                <div>
                                </div>
                            </td>
                        `
                    }
                });

                otherUsers.innerHTML = html;
            }

            function formatPercentage(percentage) {
                if (Number.isInteger(percentage)) {
                    return percentage.toString();
                } else {
                    return Math.trunc(percentage);
                }
            }

            function updateChart(chart, data) {
                // Update the chart's data with the new values
                chart.data([{
                    x: "Completed",
                    value: formatPercentage(data.completed_percentage),
                    color: "#03AF9F"
                }, {
                    x: "Bonus",
                    value: formatPercentage(data.bonus_percentage),
                    color: "#DCFF07"
                }, {
                    x: "Incomplete",
                    value: formatPercentage(data.incompleted_percentage),
                    color: "#FFCE21"
                }]);

                // Redraw the chart with the updated data
                chart.draw();
            }

            function animationPopUp(data, goalId) {
                var completed = formatPercentage(data.completed_percentage) + formatPercentage(data.bonus_percentage);
                // console.log(completed)
                if (completed >= 100) {
                    const animationShownKey = `adminAnimationShown_${goalId}`;
                    const animationShown = sessionStorage.getItem(animationShownKey);
                    // console.log(animationShown)
                    if (!animationShown) {
                        // navigateToAnimationPage();
                        startAnimation();
                        sessionStorage.setItem(animationShownKey, 'true');
                    }
                }
            }

            function navigateToAnimationPage() {
                window.location.href = "{{ route('admin.animation') }}";
            }

            function startAnimation() {
                $("#animation").show();
                const container = document.querySelector("#overlay");
                const fireworks = new Fireworks.default(container, {
                    lineWidth: {
                        explosion: {
                            min: 1,
                            max: 12,
                        },
                        trace: {
                            min: 1,
                            max: 8,
                        },
                    },
                    intensity: 150
                });
                fireworks.start();
                $("audio#celebration")[0].play();

                setTimeout(function () {
                    $("#animation").hide();
                    $("audio#celebration")[0].pause();
                    $("audio#celebration")[0].currentTime = 0;
                }, 5000); // Adjust the duration as needed (currently set to 3 seconds)
            }

            
            // setTimeout(function () {
            //     $("#animation").hide();
            //     $("audio#celebration")[0].pause();
            //     $("audio#celebration")[0].currentTime = 0;
            //     window.location.href = "{{ route('admin.activeGoal') }}"; 
            // }, 3000);
        </script>

        <!-- Usage -->
    @endif
</body>

</html>
