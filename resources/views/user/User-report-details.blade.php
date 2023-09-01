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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

    <!-- ------- Chart js Start ----------------->
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>
    <!-- ------- Chart js End ----------------->

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/css/admin-portal-goal2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}" />
</head>
<style>
    .anychart-credits-text {
        display: none;
    }

    .anychart-credits-logo {
        display: none;
    }

    body {
        overflow: hidden;
    }
</style>

<body>
    <div class="custom-flex h-full">

        <div class="sidebar show h-full" style="position: relative;">
            <div class="sidebar-logo">
                <img src="{{ asset('assets/images/Logo.png') }}" alt="No Image" />
                <!-- Use the 'data-target' attribute to specify the ID of the element to collapse -->
                <button id="menu-toggle" class="btn btn-primary d-md-none" data-toggle="collapse"
                    data-target="#sidebarMenu">
                    <img class="toggle-img" src="./assets/images/toggle.png" alt="No Toggle">
                </button>
            </div>
            <!-- Add the 'collapse' class and an ID to the ul element -->
            <ul class="nav flex-column d-md-block collapse" id="sidebarMenu">
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('user.goal') }}">
                        <img src="{{ asset('assets/images/goal.png') }}" alt="No Image" />
                        <span>Goal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.profile') }}">
                        <img src="{{ asset('assets/images/profile.png') }}" class="profile" alt="No Image" />
                        <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('user.reports') }}">
                        <img src="{{ asset('assets/images/reports.png') }}" alt="No Image" />
                        <span>Reports</span>
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column d-md-block collapse mb-2 id="sidebarMenu"
                style="position: absolute; bottom: 0; left: 0;">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">
                        <img src="{{ asset('assets/images/logout.png') }}" alt="No Image" />
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

            <!-- <div class="logout">
        <div class="nav-item">
          <a class="nav-link" href="#">
            <img src="./assets/images/logout.png" alt="No Image" />
            <span>Logout</span>
          </a>
        </div>
      </div> -->
        </div>

        <div class="main-screen">
            <div class="main-screen-content mt-4">
                <div class="heading">
                    <h1>
                        <a class="btn btn-primary ml-3" style="padding: 0px; margin-right: 21px; margin-bottom: 5px;"
                            href="{{ route('user.reports') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M20.9999 11H6.41394L11.7069 5.707L10.2929 4.293L2.58594 12L10.2929 19.707L11.7069 18.293L6.41394 13H20.9999V11Z"
                                    fill="white" />
                            </svg>

                        </a>{{ \Carbon\Carbon::parse($goal->end_date)->format('d-m-Y') }}
                    </h1>
                </div>
                <br>
                <div class="row mb-5">
                    <div class="col ml-4" style="gap: 1rem;font-weight: 500;">
                        <span class=" mr-1 border text-center p-2" style="border-radius: 50%;margin-left: 8px;">
                            <img src="{{ asset('assets/images/calendar 1.png') }}" style="width: 1rem; height: 1rem;"
                                alt="" class="ml-1  mb-1">
                        </span>

                        <span class="ml-2">Active Goal From</span> <span class="ml-3 d-sm-inline mt-3 d-block"
                            id="dateSpan">{{ \Carbon\Carbon::parse($goal->start_date)->format('d-m-Y') }} to {{ \Carbon\Carbon::parse($goal->end_date)->format('d-m-Y') }}</span>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-8 margin" id="page-content">
                            <div class="card px-3 border-0" style="height: 63vh;">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr style="display: flex; justify-content: space-around;">
                                                <th>Recruited</th>
                                                <th>Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($recruitDetails as $detail)
                                                <tr style="display: flex; justify-content: space-around;">

                                                    <td >{{ $detail->recruit_name }}</td>
                                                    <td style="text-align: end">{{ $detail->last_update }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 mt-lg-0 mt-4">
                            <div class="card border-0" style="height: 63vh">
                                <div class="card-body px-0 pb-5">
                                    <h5 class="pl-4">User Overview</h5>
                                    <div id="pi-chart" style="height: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-3 center">
                        <nav aria-label="Page navigation example ">
                            <ul class="pagination m-auto" style="position: fixed;bottom:2.5%;left:50%">
                                @if ($recruitDetails->hasPages())
                                    @if ($recruitDetails->onFirstPage())
                                        <li class="page-item"><a class="page-link head deactive"
                                                href="#">Prev</a>
                                        </li>
                                    @else
                                        <li class="page-item"><a class="page-link head"
                                                href="{{ $recruitDetails->previousPageUrl() }}">Prev</a>
                                        </li>
                                    @endif
                                    @for ($i = 1; $i <= $recruitDetails->lastPage(); $i++)
                                        <li class="page-item"><a
                                                class="page-link links {{ $recruitDetails->currentPage() == $i ? 'selected' : '' }}"
                                                href="{{ $recruitDetails->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    @if ($recruitDetails->hasMorePages())
                                        <li class="page-item"><a class="page-link head"
                                                href="{{ $recruitDetails->nextPageUrl() }}">Next</a></li>
                                    @else
                                        <li class="page-item"><a class="page-link head deactive"
                                                href="#">Next</a>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
        <!-- Link jQuery -->
        <script src="./assets/js/index.js"></script>
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


        <!-- Add this script at the end of your HTML, after all other content -->
        <script>
            $(document).ready(function() {


                $.datepicker.setDefaults({
                    dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
                });
                $("#startDate").datepicker({
                    showButtonPanel: true,
                });

                // Initialize the datepicker for the End Date input field
                $("#endDate").datepicker({
                    showButtonPanel: true,
                });

                const tabItems = document.querySelectorAll("#tabMenu .tab-item");

                tabItems.forEach((tabItem) => {
                    tabItem.addEventListener("click", function() {
                        // Remove "active" class from all tab items
                        tabItems.forEach((item) => {
                            item.classList.remove("active");
                        });

                        // Add "active" class to the clicked tab item
                        this.classList.add("active");
                    });
                });


                anychart.onDocumentReady(function() {
                    // set the data
                    var data = [{
                            x: "Completed",
                            value: {{ $stats['completed'] }},
                            color: "#03AF9F"
                        },
                        {
                            x: "Bonus",
                            value: {{ $stats['bonus'] }},
                            color: "#DCFF07",
                        },
                        {
                            x: "Incompleted",
                            value: {{ $stats['incomplete'] }},
                            color: "#FFCE21"
                        },
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
                    chart.container('pi-chart');
                    chart.draw();
                });



            });
        </script>


        <script>
            // JavaScript code to handle the sidebar toggle
            $(document).ready(function() {
                var menuToggle = document.getElementById("menu-toggle");
                var sidebarMenu = document.getElementById("sidebarMenu");
                menuToggle.addEventListener("click", function() {
                    // Use Bootstrap's 'toggle' method to show or hide the sidebarMenu
                    $(sidebarMenu).collapse('toggle');
                });

                $('#inputGroupSelect01').select2();
                $('#inputGroupSelect02').select2();

                // //   // Increase the height in responsive mode
                // const currentwidth = $('.nav-item').width();
                // $('.nav-item:last-child').width(currentwidth);
            });
        </script>

</body>

</html>
