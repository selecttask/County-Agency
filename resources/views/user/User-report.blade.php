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

    <!-- Link Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;500;600;700&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">

    <!-- ------- Chart js Start ----------------->
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>
    <!-- ------- Chart js End ----------------->

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet" />
</head>
<link rel="stylesheet" href="./assets/css/admin-portal-goal2.css" />
<link rel="stylesheet" href="./assets/css/sidebar.css">
<link rel="stylesheet" href="./assets/css/global.css" />
<!-- for calender -->

<!-- <link rel="stylesheet" href="./assets/css/admin-portal-goal.css"> -->
<link rel="stylesheet" href="./assets/css/global.css">
<!-- Add these lines after the existing link tags -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<style>
    .flatpickr-day.selected.startRange,
    .flatpickr-day.startRange.startRange,
    .flatpickr-day.endRange.startRange,
    .flatpickr-day.selected.startRange,
    .flatpickr-day.startRange.startRange,
    .flatpickr-day.endRange.endRange {
        background-color: #1F95AF;
        border: 1px solid #1F95AF;
    }

    .flatpickr-day.selected.startRange,
    .flatpickr-day.startRange.startRange,
    .flatpickr-day.endRange.startRange:hover,
    .flatpickr-day.selected.startRange,
    .flatpickr-day.startRange.startRange,
    .flatpickr-day.endRange.endRange:hover {
        background-color: #1F95AF;
    }

    .flatpickr-weekdays {
        margin-top: 15px;
    }

    .input-group>.custom-file,
    .input-group>.custom-select,
    .input-group>.form-control,
    .input-group>.form-control-plaintext {
        background: #fff;
    }

    .task {
        margin: 10px;
        font-size: 20px;
        display: flex;
        justify-content: end;
        align-items: center;
    }

    .task .status {
        display: inline-block;
        width: 15px;
        height: 15px;
        /* border-radius: 25%; */
        margin-right: 10px;
        margin-left: 2rem;
        gap: 1rem;
    }

    .complete {
        background-color: #03AF9F;
    }

    .incomplete {
        background-color: #ffcc24;
    }

    .bonus {
        background-color: #DCFF07;
    }

    body {
        overflow: hidden;
    }
</style>

<body>
    <div class="custom-flex h-full">
        <div class="sidebar show " style="position: relative;">
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
                    <a class="nav-link " href="{{ route('user.goal') }}">
                        <img src="./assets/images/goal.png" alt="No Image" />
                        <span>Goal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.profile') }}">
                        <img src="./assets/images/profile.png" class="profile" alt="No Image" />
                        <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('user.reports') }}">
                        <img src="./assets/images/reports.png" alt="No Image" />
                        <span>Reports</span>
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column d-md-block collapse mb-2" id="sidebarMenu"
                style="position: absolute; bottom: 0; left: 0;">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">
                        <img src="./assets/images/logout.png" alt="No Image" />
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
            <div class="logout ">
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
                        <button id="sidebar-toggle" class="d-md-inline d-none">&#9776;</button>
                        Reports
                    </h1>
                </div>
                <div class="row justify-content-end filters">
                    <div class="col-sm-4 col-md-4 col-lg-3 pr-0">
                        <h6 class="filters-head">Filters Goals Date</h3>
                    </div>
                    <div class="col-sm-4 col-md-4 col-xl-3 col-lg-3 p-0 dates">
                        <div class="input-group date ">
                            <input type="text" id="startDate" placeholder="Select date"
                                class="datepicker form-control custom text-center rounded">
                            <span class="input-group-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 20 20" fill="none">
                                    <path
                                        d="M17 2H15V1C15 0.734784 14.8946 0.48043 14.7071 0.292893C14.5196 0.105357 14.2652 0 14 0C13.7348 0 13.4804 0.105357 13.2929 0.292893C13.1054 0.48043 13 0.734784 13 1V2H7V1C7 0.734784 6.89464 0.48043 6.70711 0.292893C6.51957 0.105357 6.26522 0 6 0C5.73478 0 5.48043 0.105357 5.29289 0.292893C5.10536 0.48043 5 0.734784 5 1V2H3C2.20435 2 1.44129 2.31607 0.87868 2.87868C0.316071 3.44129 0 4.20435 0 5V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H17C17.7956 20 18.5587 19.6839 19.1213 19.1213C19.6839 18.5587 20 17.7956 20 17V5C20 4.20435 19.6839 3.44129 19.1213 2.87868C18.5587 2.31607 17.7956 2 17 2ZM18 17C18 17.2652 17.8946 17.5196 17.7071 17.7071C17.5196 17.8946 17.2652 18 17 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V10H18V17ZM18 8H2V5C2 4.73478 2.10536 4.48043 2.29289 4.29289C2.48043 4.10536 2.73478 4 3 4H5V5C5 5.26522 5.10536 5.51957 5.29289 5.70711C5.48043 5.89464 5.73478 6 6 6C6.26522 6 6.51957 5.89464 6.70711 5.70711C6.89464 5.51957 7 5.26522 7 5V4H13V5C13 5.26522 13.1054 5.51957 13.2929 5.70711C13.4804 5.89464 13.7348 6 14 6C14.2652 6 14.5196 5.89464 14.7071 5.70711C14.8946 5.51957 15 5.26522 15 5V4H17C17.2652 4 17.5196 4.10536 17.7071 4.29289C17.8946 4.48043 18 4.73478 18 5V8Z"
                                        fill="#03AF9F" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-xl-2 col-lg-3 p-0 ml-sm-2 ml-0 ">
                        <span class="input-group-addon">
                            <img src="assets/images/mygoal.png" alt="goal" class="mr-lg-3">
                        </span>
                        <select class="custom-select text-center form-control input-element " id="inputGroupSelect02 "
                            style="color:#03AF9F;">
                            <option selected>100% and lower</option>
                            <option>70% and lower</option>
                            <option>50% and lower</option>
                            <option>25% and lower</option>
                        </select>
                    </div>
                </div>
                    <hr style="border: 1px solid grey;opacity:0.2" class="mt-2">
                {{-- <div class="horizental-line mt-0 p-0" style="margin-top: 8px!important;"> </div> --}}
                <div class="task row mt-4 mb-3">
                    <div class="status complete"></div> Completed
                    <div class="status incomplete"></div> Incomplete
                    <div class="status bonus"></div> Bonus
                </div>
                <div class="row">
                    <div class="col-12 margin" id="page-content">
                        <div class="card px-3" style="height: 61vh;">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead style="background-color: transparent;">
                                        <tr>
                                            <th>Last Updated</th>
                                            <th>Progress</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($userGoals as $user)
                                      {{ $user->stats()['completed_percentage'] }}
                                      @endforeach --}}
                                        @foreach ($userGoals as $goal)
                                            <tr>
                                                <td>

                                                    @foreach ($lastUpdates as $lastUpdate)
                                                        @if ($lastUpdate['goal_id'] === $goal->id)
                                                            {{ date('d-m-Y', strtotime($lastUpdate['updatedTime'])) }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td class="progress-bar-container">
                                                    <div>
                                                        <div>
                                                            <p class="complete-percentage">
                                                                {{ $goal->stats()['completed_percentage'] }}% Completed
                                                            </p>
                                                        </div>
                                                        <div class="progress w-13 position-relative">
                                                            <div class="progress-bar bg-yellow position-absolute"
                                                                role="progressbar" style=" height: 11px;"></div>
                                                            <div class="progress-bar" ro    le="progressbar"
                                                                style="width: {{ $goal->stats()['completed_percentage'] }}%;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="{{ route('user.reportDetails', ['id' => $goal->id]) }}"
                                                            class="btn btn-outline-primary submit-outline-btn">Details</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        {{--
                      <tr>
                        <td>12-6-2023</td>
                        <td class="progress-bar-container">
                          <div>
                            <div>
                              <p class="complete-percentage">75% Completed </p>
                            </div>
                            <div class="progress w-13 position-relative">
                              <div class="progress-bar bg-yellow position-absolute" role="progressbar"
                                style=" height: 11px;"></div>
                              <div class="progress-bar" role="progressbar" style="width: 75%;"></div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div>
                            <a href="./report-info.html"
                              class="btn btn btn-outline-primary submit-outline-btn">Details</a>
                          </div>
                        </td>
                      </tr> --}}

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-12 center">
                        <nav aria-label="Page navigation example ">
                            <ul class="pagination m-auto" style="position: fixed;bottom:2.5%;left:50%;">
                                @if ($userGoals->hasPages())
                                    @if ($userGoals->onFirstPage())
                                        <li class="page-item"><a class="page-link head deactive"
                                                href="#">Prev</a>
                                        </li>
                                    @else
                                        <li class="page-item"><a class="page-link head"
                                                href="{{ $userGoals->previousPageUrl() }}">Prev</a>
                                        </li>
                                    @endif
                                    @for ($i = 1; $i <= $userGoals->lastPage(); $i++)
                                        <li class="page-item"><a
                                                class="page-link links {{ $userGoals->currentPage() == $i ? 'selected' : '' }}"
                                                href="{{ $userGoals->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    @if ($userGoals->hasMorePages())
                                        <li class="page-item"><a class="page-link head"
                                                href="{{ $userGoals->nextPageUrl() }}">Next</a></li>
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
        <!-- Link Bootstrap JS (Optional if you require Bootstrap JS functionality) -->
        <script src="./assets/js/index.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Include jQuery (required for Select2) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Include Select2 JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>



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

            });

            // js for calender

            $(document).ready(function() {

                flatpickr('#startDate', {
                    inline: false,
                    mode: 'range',
                    minDate: '',
                    dateFormat: 'd-m-Y',
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


            });
        </script>

</body>

</html>
