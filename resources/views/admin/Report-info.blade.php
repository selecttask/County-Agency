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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/admin-portal-goal2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}" />
</head>
<style>
    .anychart-credits {
        display: none;
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
                    <a class="nav-link " href="{{ route('admin.goal') }}">
                        <img src="{{ asset('assets/images/goal.png') }}" alt="No Image" />
                        <span>Goal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.profile') }}">
                        <img src="{{ asset('assets/images/profile.png') }}" class="profile" alt="No Image" />
                        <span>Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.report') }}">
                        <img src="{{ asset('assets/images/reports.png') }}" alt="No Image" />
                        <span>Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('admin.activeGoal') }}">
                        <img src="{{ asset('assets/images/companyStats.png') }}" alt="No Image" />
                        <span>Active Goals</span>
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column d-md-block collapse mb-2" id="sidebarMenu"
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
          <a class="nav-link" href="#">
            <img src="./assets/images/logout.png" alt="No Image" />
            <span>Logout</span>
          </a>
        </div> -->
            </div>
        </div>
        <div class="main-screen">
            <div class="main-screen-content mt-4">
                <div class="heading mb-4">
                    <h1>
                        <a class="btn btn-primary ml-3" style="padding: 0px; margin-right: 15px; margin-bottom: 5px;;"
                            href="{{ route('admin.report') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M20.9999 11H6.41394L11.7069 5.707L10.2929 4.293L2.58594 12L10.2929 19.707L11.7069 18.293L6.41394 13H20.9999V11Z"
                                    fill="white" />
                            </svg>

                        </a>{{ \Carbon\Carbon::parse($upcomingGoal->end_date)->format('d-m-Y') }}
                    </h1>
                </div>
                <div class="row ml-2">
                    <div class="col" style="font-weight: 500;">

                        <img src="{{asset('assets/images/calendar 1.png')}}" style="width: 1rem; height: 1rem;"
                            class="ml-1">
                        <span class="ml-2">Active Goal From</span> <span
                            class="ml-4">{{ \Carbon\Carbon::parse($upcomingGoal->start_date)->format('d-m-Y') }} to {{ \Carbon\Carbon::parse($upcomingGoal->end_date)->format('d-m-Y') }}</span>

                        <img src="{{asset('assets/images/statistics 1.jpg')}}" style="width: 1rem; height: 1rem;"
                            class="ml-5">
                        <span class="ml-1">Bonus Goal</span>
                        <span class="ml-4">{{ $upcomingGoal->bonus }}</span>
                    </div>
                </div>

                <div class="row mt-3 mb-2 ml-2" style="font-weight: 500;">
                    <div class=" ">
                        <img src="{{asset('assets/images/trophy 1.png')}}" style="width: 1rem; height: 1rem;"
                            class="ml-3">
                        <span class="ml-2">Goal Reward</span> <span class="ml-md-4"
                            style="margin-left: 3.5rem !important;">{{ $upcomingGoal->reward }}</span>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-lg-8 col-12 margin" id="page-content">
                        <div class="card px-3" style="height: 65vh;">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Users</th>
                                            <th>Progress</th>
                                            <th style="border-bottom: 0.5px solid rgba(128, 128, 128, 0.166);"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($goalUsers as $goalUser)
                                            <tr>
                                                <td>{{ $goalUser->user->first_name . ' ' . $goalUser->user->last_name }}
                                                </td>
                                                <td class="progress-bar-container">
                                                    <div>
                                                        <div>
                                                            <p class="complete-percentage">
                                                                {{ $goalUser->stats()['completed_percentage'] }}%
                                                                Completed </p>
                                                        </div>
                                                        <div class="progress w-13 position-relative">
                                                            <div class="progress-bar bg-yellow position-absolute"
                                                                role="progressbar" style=" height: 11px;"></div>
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: {{ $goalUser->stats()['completed_percentage'] }}%;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a class="btn btn-outline-primary"
                                                        href="{{ route('admin.reportDetails', ['id' => $goalUser->id, 'userId' => $goalUser->user_id, 'goalId' => $goalUser->goal_id]) }}"
                                                        style="font-weight: 500;">Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-lg-4 mt-lg-0 mt-2 px-2">
                        <div class="card" style="height: 65vh;">
                            <div class="card-body px-0 pb-5">
                                <h5 class="pl-4">Team Overview</h5>
                                <div id="pichart" style="height: 100%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class=" center row  w-100" >
                        <nav aria-label="Page navigation example ">
                            <ul class="pagination m-auto" style="position: fixed;bottom:2.5%;left:50%;">
                                @if ($goalUsers->hasPages())
                                    @if ($goalUsers->onFirstPage())
                                        <li class="page-item"><a class="page-link head deactive"
                                                href="#">Prev</a></li>
                                    @else
                                        <li class="page-item"><a class="page-link head"
                                                href="{{ $goalUsers->previousPageUrl() }}">Prev</a>
                                        </li>
                                    @endif
                                    @for ($i = 1; $i <= $goalUsers->lastPage(); $i++)
                                        <li class="page-item"><a
                                                class="page-link links {{ $goalUsers->currentPage() == $i ? 'selected' : '' }}"
                                                href="{{ $goalUsers->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    @if ($goalUsers->hasMorePages())
                                        <li class="page-item"><a class="page-link head"
                                                href="{{ $goalUsers->nextPageUrl() }}">Next</a></li>
                                    @else
                                        <li class="page-item"><a class="page-link head deactive"
                                                href="#">Next</a></li>
                                    @endif
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Link Bootstrap JS (Optional if you require Bootstrap JS functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include jQuery (required for Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- Link jQuery UI -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="./assets/js/index.js"></script>
    <!-- Include AnyChart library -->
    <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-bundle.min.js"></script>


    <script>
        $(document).ready(function() {
            $("#sidebar-toggle").click(function() {
                $(".sidebar").toggleClass('show');
            });
        });

        $(document).ready(function() {

            anychart.onDocumentReady(function() {
                // set the data

                var data = [{
                        x: "Completed",
                        value: {{ $upcomingGoal->stats()['completed_percentage'] }},
                        color: "#03AF9F"
                    },
                    {
                        x: "Bonus",
                        value: {{ $upcomingGoal->stats()['bonus_percentage'] }},
                        color: "#DCFF07"
                    },
                    {
                        x: "Incomplete",
                        value: {{ $upcomingGoal->stats()['incompleted_percentage'] }},
                        color: "#FFCE21"
                    },
                ];
                console.log(data)
                // create the chart
                var chart = anychart.pie();

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
        });
    </script>

</body>

</html>
