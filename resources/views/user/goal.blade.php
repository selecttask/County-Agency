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

    <!-- ------- Chart js Start ----------------->
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>
    <!-- ------- Chart js End ----------------->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/goal1.css">
    <link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}" />
    <link rel="stylesheet" href="./assets/css/sidebar.css">
    <link rel="stylesheet" href="./assets/css/global.css">
    <!-- Add these lines after the existing link tags -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

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
        .ui-datepicker th {
            font-size: 0.9em;
        }

        #ui-datepicker-div {
            width: fit-content;
        }

        .modal {
            position: fixed;
            top: 0;
            right: 0;
            z-index: 1050;
            display: none;
            overflow: hidden;
            outline: 0;
        }

        .modal.show {
            display: block;
            height: 100vh !important;
        }


        .modal-dialog {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            transition: all 0.3s ease;
            min-width: 400px;

        }

        .modal-dialog {
            margin: 0;
        }

        .modal-content {
            border-radius: 20px 0 0 20px;
            height: 100%;
        }

        .modal-dialog {

            animation: slideFromRight 0.3s forwards;
        }

        @keyframes slideFromRight {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(0);
            }
        }
    </style>

<body>
    <div class="custom-flex h-full">
        <div class="sidebar show h-full " style="position: relative;">
            <div class="sidebar-logo">
                <img src="./assets/images/Logo.png" alt="No Image" />
                <!-- Use the 'data-target' attribute to specify the ID of the element to collapse -->
                <button id="menu-toggle" class=" btn btn-primary d-md-none" data-toggle="collapse"
                    data-target="#sidebarMenu">
                    <img class="toggle-img" src="./assets/images/toggle.png" alt="No Toggle">
                </button>
            </div>
            <!-- Add the 'collapse' class and an ID to the ul element -->
            <ul class="nav flex-column d-md-block collapse" id="sidebarMenu">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('user.goal') }}">
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
                    <a class="nav-link" href="{{ route('user.reports') }}">
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
            <div class="logout">
                <!-- <div class="nav-item"  style="width: 13.5vw;">
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
                <div class="">
                    <div class="row ml-2">
                        <div class="col" style="font-weight: 500;">

                            <img src="./assets/images/calendar 1.png" style="width: 1rem; height: 1rem;" class="ml-1">
                            <span class="ml-2">Active Goal From</span> <span class="ml-4">{{ \Carbon\Carbon::parse($goal->start_date)->format('d-m-Y') }} to {{ \Carbon\Carbon::parse($goal->end_date)->format('d-m-Y') }}</span>

                            <img src="./assets/images/statistics 1.jpg" style="width: 1rem; height: 1rem;"
                                class="ml-5">
                            <span class="ml-1">Bonus Goal</span>
                            <span class="ml-4">{{ $goal->bonus }}</span>
                        </div>
                    </div>
                    <div class="row mt-3 mb-2 ml-2" style="font-weight: 500;">
                        <div class="col-md- ">
                            <img src="./assets/images/trophy 1.png" style="width: 1rem; height: 1rem;" class="ml-3">
                            <span class="ml-2">Goal Reward</span> <span class="ml-md-4"
                                style="margin-left: 3.5rem !important;">{{ $goal->reward }}</span>
                        </div>
                    </div>
                    <div class="row mt-3" style="font-weight: 500;">

                        <div class="col-sm-12 col-lg-8 col-md-12">
                            <div class="card px-3" style="height: 67vh">
                                <div class="table-responsive" style="min-height: 470px">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Recruit Name</th>
                                                <th>Last Update</th>
                                                <th class=" mr-3">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <form action="{{ route('user.createTarget') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="goal_id"
                                                        value="{{ $goal->id }}">
                                                    <input type="hidden" name="goal_user_id"
                                                        value="{{ $goal->currentUserGoalUser()->id }}">
                                                    <td class="w-9">
                                                        <input type="text" class="w-8 input-element form-control"
                                                            placeholder="Name Here" name="recruit_name" required>
                                                    </td>
                                                    <td class="w-9">
                                                        <div class="input-group date ">
                                                            <input type="text" id="startDate"
                                                                placeholder="Select date" name="last_update"
                                                                class="datepicker form-control custom input-element startDate"
                                                                required value="" readonly>
                                                            <span class="input-group-addon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                                    height="15" viewBox="0 0 20 20"
                                                                    fill="none">
                                                                    <path
                                                                        d="M17 2H15V1C15 0.734784 14.8946 0.48043 14.7071 0.292893C14.5196 0.105357 14.2652 0 14 0C13.7348 0 13.4804 0.105357 13.2929 0.292893C13.1054 0.48043 13 0.734784 13 1V2H7V1C7 0.734784 6.89464 0.48043 6.70711 0.292893C6.51957 0.105357 6.26522 0 6 0C5.73478 0 5.48043 0.105357 5.29289 0.292893C5.10536 0.48043 5 0.734784 5 1V2H3C2.20435 2 1.44129 2.31607 0.87868 2.87868C0.316071 3.44129 0 4.20435 0 5V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H17C17.7956 20 18.5587 19.6839 19.1213 19.1213C19.6839 18.5587 20 17.7956 20 17V5C20 4.20435 19.6839 3.44129 19.1213 2.87868C18.5587 2.31607 17.7956 2 17 2ZM18 17C18 17.2652 17.8946 17.5196 17.7071 17.7071C17.5196 17.8946 17.2652 18 17 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V10H18V17ZM18 8H2V5C2 4.73478 2.10536 4.48043 2.29289 4.29289C2.48043 4.10536 2.73478 4 3 4H5V5C5 5.26522 5.10536 5.51957 5.29289 5.70711C5.48043 5.89464 5.73478 6 6 6C6.26522 6 6.51957 5.89464 6.70711 5.70711C6.89464 5.51957 7 5.26522 7 5V4H13V5C13 5.26522 13.1054 5.51957 13.2929 5.70711C13.4804 5.89464 13.7348 6 14 6C14.2652 6 14.5196 5.89464 14.7071 5.70711C14.8946 5.51957 15 5.26522 15 5V4H17C17.2652 4 17.5196 4.10536 17.7071 4.29289C17.8946 4.48043 18 4.73478 18 5V8Z"
                                                                        fill="#03AF9F" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td class="w-9">
                                                        <button type="submit"
                                                            class="w-8 btn btn-primary  rounded">Save</button>
                                                    </td>
                                                </form>
                                            </tr>
                                            @foreach ($ugts as $ugt)
                                                <tr>
                                                    <td>{{ $ugt->recruit_name }}</td>
                                                    <td>{{ $ugt->last_update }}</td>
                                                    <td>
                                                        <!-- Button to open the modal -->
                                                        <a href="#editModal{{ $ugt->id }}"
                                                            class=" w-8 px-3 btn btn-outline-primary"
                                                            data-toggle="modal">Edit</a>
                                                    </td>
                                                </tr>
                                                <!-- Modal for editing data -->
                                                <div class="modal fade" id="editModal{{ $ugt->id }}"
                                                    tabindex="-1" aria-labelledby="editModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{ route('goals.update', $ugt->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('POST')
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editModalLabel">Edit
                                                                        User Data</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="recruit_name">Recruit Name</label>
                                                                        <input type="text" class="form-control"
                                                                            name="recruit_name"
                                                                            value="{{ $ugt->recruit_name }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="last_update">Last Update</label>
                                                                        <input type="text"
                                                                            placeholder="{{ $ugt->last_update }}"
                                                                            name="last_update"
                                                                            class="datepicker form-control custom input-element selectDate"
                                                                            required value="{{ $ugt->last_update }}"
                                                                            readonly>

                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-primary w-100">Update</button>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="float-right mt-2">
                                <nav aria-label="Page navigation example ">
                                    <ul class="pagination " style="position: fixed; bottom:1%;left:50%;">
                                        @if ($ugts->hasPages())
                                            @if ($ugts->onFirstPage())
                                                <li class="page-item"><a class="page-link head deactive"
                                                        href="#">Prev</a>
                                                </li>
                                            @else
                                                <li class="page-item"><a class="page-link head"
                                                        href="{{ $ugts->previousPageUrl() }}">Prev</a>
                                                </li>
                                            @endif
                                            @for ($i = 1; $i <= $ugts->lastPage(); $i++)
                                                <li class="page-item"><a
                                                        class="page-link links {{ $ugts->currentPage() == $i ? 'selected' : '' }}"
                                                        href="{{ $ugts->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            @if ($ugts->hasMorePages())
                                                <li class="page-item"><a class="page-link head"
                                                        href="{{ $ugts->nextPageUrl() }}">Next</a></li>
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
                        <div class="col-sm-12 col-lg-4 col-md-12">
                            <div class="card" style="height: 67vh">
                                <div class="card-body px-0 pb-5">
                                    <h5 class="pl-4">User Overview</h5>
                                    <div id="pi-chart" style="height: 100%;"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <!-- Add the following HTML code to create the button -->

    </div>

    <div id="animation">
        <div id="overlay" ></div>
        <canvas id="confeti" width="300" height="300" class="active"></canvas>

        <!-- card -->
        <div id="contentContainer">
            <div class="card-animation">
                <div id="baloonLeftContainer" >
                    <img src="{{ asset('assets/assets/img/baloon.gif') }}" height="100%" width="auto" alt="baloon left" class="img-responsive">
                </div>

                <div class="card-body text-center text-light">
                    <h1 id="yayText" class="display-4 fw-bold">Congratulations!</h1>
                    <h1 id="nameTitle" >Johan Doe</h1>
                    <p class="fw-normal fs-4" >
                        You have completed your goal, your reward is <span id="rewardTitle" ></span>!
                    </p>
                </div>
                <div id="baloonRightContainer" >
                    <img src="{{ asset('assets/assets/img/baloon.gif') }}" height="100%" width="auto" alt="baloon right" class="img-responsive">
                </div>
            </div>
        </div>

        <audio id="celebration">
            <source src="{{ asset('assets/assets/sounds/celebration.mp3') }}" type="audio/mpeg" />
        </audio>

        <div id="avatars">
            <img src="{{ asset('assets/assets/img/confettiRight.gif') }}" alt="" id="boy" />
            <img src="{{ asset('assets/assets/img/confettiLeft.gif') }}" alt="" id="girl" />
        </div>
    </div>
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
    <script src="{{ asset('assets/assets/js/animations.js') }}"></script>

    <!-- Add this script at the end of your HTML, after all other content -->
    <script>

        $(document).ready(function (){
            animationPopUp();

            function startAnimation() {
                $("#animation").show();
                $("audio#celebration")[0].play();

                document.getElementById("nameTitle").innerHTML = "{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}";
                document.getElementById("rewardTitle").innerHTML = "{{ $goal->reward }}";


                setTimeout(function () {
                    $("#animation").hide();
                    $("audio#celebration")[0].pause();
                    $("audio#celebration")[0].currentTime = 0;
                }, 5000); // Adjust the duration as needed (currently set to 3 seconds)
            }

            function animationPopUp() {
                var completed = {{ $stats['completed'] + $stats['bonus'] }};
                // console.log(completed)
                if (completed >= 100) {
                    setTimeout(function() {
                        startAnimation();
                    }, 5000);
                }
            }
        });

        // calender for create recruit
        $(document).ready(function() {
            $.datepicker.setDefaults({
                dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']

            });

            var startDateFromPHP = <?php echo json_encode($goal->start_date); ?>;
            var endDateFromPHP = <?php echo json_encode($goal->end_date); ?>;

            $(".startDate").datepicker({
                showButtonPanel: true,
                dateFormat: 'dd-mm-yy',
                minDate: new Date(
                    startDateFromPHP),
                maxDate: new Date(endDateFromPHP)
            });
            //calender for edit
            $(document).ready(function() {
                $.datepicker.setDefaults({
                    dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
                });

                var startDateFromPHP = <?php echo json_encode($goal->start_date); ?>;
                var endDateFromPHP = <?php echo json_encode($goal->end_date); ?>;

                $(".selectDate").datepicker({
                    showButtonPanel: true,
                    dateFormat: 'dd-mm-yy',
                    minDate: new Date(
                        startDateFromPHP), // Use the startDateFromPHP variable as the minimum date
                    maxDate: new Date(
                        endDateFromPHP) // Use the endDateFromPHP variable as the maximum date
                });
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

            // console.log(<?php echo $completed ? 'true' : 'false'; ?>)

            if (<?php echo $completed ? 'true' : 'false'; ?>) {
                const animationShown = sessionStorage.getItem('animationShown');
                if (!animationShown) {
                    navigateToAnimationPage();
                    sessionStorage.setItem('animationShown', 'true');
                }
            }

            function navigateToAnimationPage() {
                window.location.href = "{{ route('show.animation') }}";
            }


            // function navigateToAnimationPage() {
            //     // Redirect to the animation page
            //     window.location.href = "/animation";
            // }



        });
    </script>



</body>

</html>
