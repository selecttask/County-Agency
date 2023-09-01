
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./assets/images/CA-logo 1.png" type="image/x-icon">

  <title>Admin Portal</title>
  <!-- Link Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/admin-portal-goal.css">
  <link rel="stylesheet" href="./assets/css/global.css">
  <link rel="stylesheet" href="./assets/css/admin-portal-goal2.css" />
  <!-- Add these lines after the existing link tags -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebarDiv = document.querySelector(".sidebar");
        const sidebarToggle = document.getElementById("sidebar-toggle");

        sidebarToggle.addEventListener("click", function () {
            sidebarDiv.classList.toggle("collapsed");
        });
    });

  </script>
<style>
.card{
    height: 100%;
}
  .ui-widget.ui-widget-content{
    width: fit-content;
  }
  .ui-datepicker th {
    font-weight: 1em;
  }
  .sidebar.collapsed {
    display: none;
}

.sidebar {
    width: 250px; /* Set your desired initial width */
}
  .flatpickr-day.selected.startRange, .flatpickr-day.startRange.startRange, .flatpickr-day.endRange.startRange,
  .flatpickr-day.selected.startRange, .flatpickr-day.startRange.startRange, .flatpickr-day.endRange.endRange {
    background-color: #1F95AF;
    border: 1px solid #1F95AF;
  }
  .flatpickr-day.selected.startRange, .flatpickr-day.startRange.startRange, .flatpickr-day.endRange.startRange:hover,
  .flatpickr-day.selected.startRange, .flatpickr-day.startRange.startRange, .flatpickr-day.endRange.endRange:hover{
    background-color: #1F95AF;
  }
  .flatpickr-weekdays{
    margin-top: 15px;
  }
  .input-group>.custom-file, .input-group>.custom-select, .input-group>.form-control, .input-group>.form-control-plaintext{
    background: #fff;
  }

  .custom-table-row td:nth-child(2),
  .custom-table-row th:nth-child(2){
    text-align: center;
  }
  body{
    overflow: hidden;
  }

</style>

<body>
  <div class="custom-flex h-full">

    <div class="sidebar show h-full "  style="position: relative;">
      <div class="sidebar-logo">
        <img src="./assets/images/Logo.png" alt="No Image" />
        <!-- Use the 'data-target' attribute to specify the ID of the element to collapse -->
        <button id="menu-toggle" class=" btn btn-primary d-md-none" data-toggle="collapse" data-target="#sidebarMenu">
          <img class="toggle-img" src="./assets/images/toggle.png" alt="No Toggle">
        </button>
      </div>
      <!-- Add the 'collapse' class and an ID to the ul element -->
        <ul class="nav flex-column d-md-block collapse" id="sidebarMenu">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('admin.goal')}}">
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
                <a class="nav-link " href="{{route('admin.report')}}">
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
            <a class="nav-link" href="{{route('logout')}}">
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

    <div class="main-screen " >
      <div class="main-screen-content ">

        <div class="heading mt-4">

          <h1>
            <button class="d-md-inline d-none" id="sidebar-toggle">&#9776;</button> <!-- This is a hamburger icon -->

            Goal</h1>
        </div>

        <div class="row">
          <div class="col-md-12">
            <ul class="nav horizontal-tabs" id="tabMenu">
              <li class="tab-item active"><a class="pad" data-toggle="pill" href="#home">Current Goal</a></li>
              <li class="tab-item"><a class="pad" data-toggle="pill" href="#menu1">Upcoming Goal</a></li>
            </ul>
          </div>
        </div>


        <div class="tab-content">
          <div id="home" class="tab-pane fade in active show">
            <div class="main-screen">
                <div class="main-screen-content mt-4">

                  <div class="row" style="font-weight: 500;">
                    <div class="col-md-5 p-0">
                      <img src="./assets/images/calendar 1.png" style="width: 1rem; height: 1rem;" class="ml-1">
                      <span class="ml-2" >Active Goal Form</span> <span class="ml-md-4" >01-02-2023 to 01-08-2023</span>
                    </div>
                    <div class="col-md-5">
                      <img src="./assets/images/statistics 1.jpg" style="width: 1rem; height: 1rem;" class="ml-1">
                      <span>Bonus Goal</span>
                      <span class="ml-5">150</span>
                    </div>
                  </div>
                  <div class="row mt-4 mb-4" style="font-weight: 500;">
                    <div class="col-md-5 p-0">
                      <img src="./assets/images/trophy 1.png" style="width: 1rem; height: 1rem;" class="ml-1">
                      <span class="ml-2" >Goal Reward</span> <span class="ml-md-4" style="margin-left: 3.4rem !important;" >This bonus reward reflects your excellent performance</span>
                    </div>

                    <div class="col-md-3 col-6">
                        <span class="p-2" style="color: #03AF9F; background-color: #03af9e18; border-radius: 20px;">Repeat Monthly</span>
                       </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-8 margin" id="page-content">
                      <div class="card px-3" style="height: 65vh;">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr style="background-color: white;">
                                <th>Users</th>
                                <th>Last Updated</th>
                                <th>Progress</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Alex Jordan</td>
                                <td>20-12-2022</td>
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
                                  <a class="btn btn-outline-primary" href="{{route('admin.detailsGoal')}}" style="font-weight: 500;">Details</a>
                                </td>
                              </tr>
                              <tr>
                                <td>John Doe</td>
                                <td>20-12-2022</td>
                                <td class="progress-bar-container">
                                  <div>
                                    <div>
                                      <p class="complete-percentage">75% Completed + <span class="primary-color">40 %
                                          bonus</span> </p>
                                    </div>
                                    <div class="progress w-13 position-relative">
                                      <div class="progress-bar bg-yellow position-absolute" role="progressbar"
                                        style="width: 40%; height: 11px;"></div>
                                      <div class="progress-bar" role="progressbar" style="width: 100%;"></div>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <a class="btn btn-outline-primary" href="./goal2.html" style="font-weight: 500;">Details</a>
                                </td>
                              </tr>
                              <tr>
                                <td>John Doe</td>
                                <td>20-12-2022</td>
                                <td class="progress-bar-container">
                                  <div>
                                    <div>
                                      <p class="complete-percentage">75% Completed + <span class="primary-color">40 %
                                          bonus</span> </p>
                                    </div>
                                    <div class="progress w-13 position-relative">
                                      <div class="progress-bar bg-yellow position-absolute" role="progressbar"
                                        style="width: 40%; height: 11px;"></div>
                                      <div class="progress-bar" role="progressbar" style="width: 100%;"></div>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <a class="btn btn-outline-primary" href="./goal2.html" style="font-weight: 500;">Details</a>
                                </td>
                              </tr>
                              <tr>
                                <td>John Doe</td>
                                <td>20-12-2022</td>
                                <td class="progress-bar-container">
                                  <div>
                                    <div>
                                      <p class="complete-percentage">75% Completed + <span class="primary-color">40 %
                                          bonus</span> </p>
                                    </div>
                                    <div class="progress w-13 position-relative">
                                      <div class="progress-bar bg-yellow position-absolute" role="progressbar"
                                        style="width: 40%; height: 11px;"></div>
                                      <div class="progress-bar" role="progressbar" style="width: 100%;"></div>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <a class="btn btn-outline-primary" href="./goal2.html" style="font-weight: 500;">Details</a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="mt-4 center">
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
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-4 pb-5" >
                      <div class="card">
                          <div class="card-body" style="display: flex; flex-direction: column; justify-content: center;">
                              <h5 style ="text-align: center;">Team Overview</h5>
                              <div id="pichart" style="height: 36vh;"></div>
                            <div class="btns row d-flex justify-content-center mt-2">

                              <button class="btn btn-outline-primary col-5 " data-toggle="modal"
                                  data-target="#showModalButton">Edit Goal</button>
                              <button class="btn btn-primary col-5 ml-2"
                              data-target="#ButtonEndGoal" id="ButtonEndGoal">End Goal</button>
                            </div>
                          </div>
                      </div>
                  </div>
                  </div>
                </div>
              </div>
          </div>

          <div id="menu1" class="tab-pane fade h-full">
            <div class="container p-3 mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;border-radius: 20px;; ">
              <div class="row " style="font-weight: 500;">
                <div class="col-md-5">
                  <img src="./assets/images/calendar 1.png" style="width: 1rem; height: 1rem;" class="">
                  <span class="ml-2" >Active Goal Form</span> <span class="ml-md-5">01-02-2023 to 01-08-2023</span>
                </div>
                <div class="col-md-5">
                  <img src="./assets/images/statistics 1.jpg" style="width: 1rem; height: 1rem;" class="ml-1">
                  <span>Bonus Goal</span>
                  <span class="ml-3">150</span>
                </div>
              </div>
              <button class="btn btn-outline-primary float-right mt-lg-0 mt-4 mx-auto " data-toggle="modal"
              data-target="#upcomingGoalshowModal" style="border-radius: 12px;">Edit Goal</button>

              <div class="row mt-4 mb-4" style="font-weight: 500;">
                <div class="col-md-2 col-6 p-0">
                  <img src="./assets/images/trophy 1.png" style="width: 1rem; height: 1rem;" class="">
                  <span class="ml-2" >Goal Reward </span>
                </div>
                <div class="ml-4">
                 <span style="margin-left: 10px;">This bonus reward reflects  your excellent performance</span>
                </div>
                <div class="col-3">
                  <span class="p-2" style="color: #03AF9F; background-color: #03af9e18; border-radius: 20px;">Repeat Weekly</span>
                </div>

              </div>
              <div class="row mt-4" >
                <div class="col-6">
                  <table class="table custom-table-row" style="border-collapse: collapse;border-radius:16px;height: 55vh;" >
                    <thead>
                      <tr>
                        <th  style="border-radius: 10px 0 0 0;">Users</th>
                      <th  style="border-radius: 0 10px 0 0;">Goal No</th>
                      </tr>
                    </thead>
                    <tbody >
                      <tr style="background-color: #dee2e6;">
                        <td >John Doe</td>
                      <td>10</td>
                      </tr>
                      <tr style="background-color: #dee2e6;">
                        <td>John Doe</td>
                      <td>10</td>
                      </tr>
                      <tr style="background-color: #dee2e6;">
                        <td>John Doe</td>
                      <td>10</td>
                      </tr>
                      <tr style="background-color: #dee2e6;">
                        <td>John Doe</td>
                      <td>10</td>
                      </tr>
                      <tr style="background-color: #dee2e6;">
                        <td>John Doe</td>
                      <td>10</td>
                      </tr>
                      <tr style="background-color: #dee2e6;">
                        <td>John Doe</td>
                      <td>10</td>
                      </tr>
                      <tr style="background-color: #dee2e6;">
                        <td>John Doe</td>
                      <td>10</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="modal fade custom-slide-from-right" id="showModalButton" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document" style="width: 30%;">
            <div class="modal-content">
              <form>
                <div class="modal-body">
                  <div class="model-head">
                    <div class="heading ">
                      <h5 class="medel-main-heading">Edit Goal</h5>
                    </div>
                    <div class="cancel">
                      <button type="button" id="close-model" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>
<!-- First Date Picker starts -->
                  <div class="row px-3">
                    <div class="input-group date ">
                      <input type="text" id="SelectDate" placeholder="Select date" class="datepicker form-control custom text-center rounded" >
                      <span class="input-group-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none">
                          <path
                            d="M17 2H15V1C15 0.734784 14.8946 0.48043 14.7071 0.292893C14.5196 0.105357 14.2652 0 14 0C13.7348 0 13.4804 0.105357 13.2929 0.292893C13.1054 0.48043 13 0.734784 13 1V2H7V1C7 0.734784 6.89464 0.48043 6.70711 0.292893C6.51957 0.105357 6.26522 0 6 0C5.73478 0 5.48043 0.105357 5.29289 0.292893C5.10536 0.48043 5 0.734784 5 1V2H3C2.20435 2 1.44129 2.31607 0.87868 2.87868C0.316071 3.44129 0 4.20435 0 5V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H17C17.7956 20 18.5587 19.6839 19.1213 19.1213C19.6839 18.5587 20 17.7956 20 17V5C20 4.20435 19.6839 3.44129 19.1213 2.87868C18.5587 2.31607 17.7956 2 17 2ZM18 17C18 17.2652 17.8946 17.5196 17.7071 17.7071C17.5196 17.8946 17.2652 18 17 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V10H18V17ZM18 8H2V5C2 4.73478 2.10536 4.48043 2.29289 4.29289C2.48043 4.10536 2.73478 4 3 4H5V5C5 5.26522 5.10536 5.51957 5.29289 5.70711C5.48043 5.89464 5.73478 6 6 6C6.26522 6 6.51957 5.89464 6.70711 5.70711C6.89464 5.51957 7 5.26522 7 5V4H13V5C13 5.26522 13.1054 5.51957 13.2929 5.70711C13.4804 5.89464 13.7348 6 14 6C14.2652 6 14.5196 5.89464 14.7071 5.70711C14.8946 5.51957 15 5.26522 15 5V4H17C17.2652 4 17.5196 4.10536 17.7071 4.29289C17.8946 4.48043 18 4.73478 18 5V8Z"
                            fill="#03AF9F" />
                        </svg>
                      </span>
                    </div>
                  </div>

                  <div class="row px-3 pt-2">
                    <div class="col-sm-12 col-md-12 col-lg-12 dates">
                      <div class="input">
                        <label for="goalReqard">Goal Reward</label>
                        <input type="text" id="goalReqard" placeholder="Goal Reward" class="form-control custom" required>
                      </div>
                    </div>
                  </div>

                  <div class="row px-3 pt-2">
                    <div class="col-12 col-md-12 col-lg-12 dates">
                      <div class="input">
                        <label for="bonusGoal">Bonus Goal</label>
                        <input type="number" min="0" id="bonusGoal" placeholder="Please enter a number"
                          class="form-control custom" required>
                      </div>
                    </div>
                  </div>

                  <div class="row px-3 mt-3">
                    <div class="col-6 col-md-4 col-lg-4 dates">
                      <label class="custom-checkbox">
                        <input type="radio" id="repeatWeekly" name="repeat">
                        <span class="checkmark checkmark-sm"></span>
                        <span class="repeat-checkbox-labels">Repeat Weekly</span>
                      </label>
                    </div>
                    <div class="col-6 col-md-4 col-lg-4 dates">
                      <label class="custom-checkbox">
                        <input type="radio" id="repeatMonthly" name="repeat">
                        <span class="checkmark checkmark-sm"></span>
                        <span class="repeat-checkbox-labels">Repeat Monthly</span>
                      </label>
                    </div>
                  </div>

                  <div class="row px-3 pt-2">
                    <div class="col-12 col-md-12 col-lg-12">
                      <div class="table-container">
                        <table class="table table-borderless custom-table">
                          <thead>
                            <tr>
                              <th scope="col">Assign All</th>
                              <th scope="col">Name</th>
                              <th scope="col">Goal No</th>
                            </tr>
                          </thead>
                          <tbody>

                            <tr>
                              <td>
                                <label class="custom-checkbox">
                                  <input type="checkbox" id="repeatMonthly">
                                  <span class="checkmark checkmark-lg"></span>
                                  <span class="repeat-checkbox-labels"></span>
                                </label>
                              </td>
                              <td>John Doe</td>
                              <td>
                                <div class="">
                                  <span class="mr-4">10</span>
                                  <svg class="cursor" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 13 13" fill="none">
                                    <path
                                      d="M12.5 3.27501C12.5005 3.19276 12.4847 3.11122 12.4536 3.03507C12.4225 2.95892 12.3767 2.88966 12.3188 2.83126L9.66876 0.18126C9.61036 0.123335 9.5411 0.0775063 9.46495 0.0464034C9.3888 0.0153005 9.30727 -0.000465112 9.22501 1.04464e-05C9.14276 -0.000465112 9.06122 0.0153005 8.98507 0.0464034C8.90892 0.0775063 8.83966 0.123335 8.78126 0.18126L7.01251 1.95001L0.18126 8.78126C0.123335 8.83966 0.0775063 8.90892 0.0464034 8.98507C0.0153005 9.06122 -0.000465112 9.14276 1.04464e-05 9.22501V11.875C1.04464e-05 12.0408 0.0658584 12.1997 0.183069 12.317C0.300279 12.4342 0.45925 12.5 0.62501 12.5H3.27501C3.36247 12.5048 3.44994 12.4911 3.53177 12.4599C3.6136 12.4286 3.68795 12.3806 3.75001 12.3188L10.5438 5.48751L12.3188 3.75001C12.3758 3.68944 12.4223 3.61972 12.4563 3.54376C12.4623 3.49394 12.4623 3.44358 12.4563 3.39376C12.4592 3.36467 12.4592 3.33535 12.4563 3.30626L12.5 3.27501ZM3.01876 11.25H1.25001V9.48126L7.45626 3.27501L9.22501 5.04376L3.01876 11.25ZM10.1063 4.16251L8.33751 2.39376L9.22501 1.51251L10.9875 3.27501L10.1063 4.16251Z"
                                      fill="#03AF9F" />
                                  </svg>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label class="custom-checkbox">
                                  <input type="checkbox" id="repeatMonthly">
                                  <span class="checkmark checkmark-lg"></span>
                                  <span class="repeat-checkbox-labels"></span>
                                </label>
                              </td>
                              <td>John Doe</td>
                              <td>
                                <div class="">
                                  <span class="mr-4">10</span>
                                  <svg class="cursor" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 13 13" fill="none">
                                    <path
                                      d="M12.5 3.27501C12.5005 3.19276 12.4847 3.11122 12.4536 3.03507C12.4225 2.95892 12.3767 2.88966 12.3188 2.83126L9.66876 0.18126C9.61036 0.123335 9.5411 0.0775063 9.46495 0.0464034C9.3888 0.0153005 9.30727 -0.000465112 9.22501 1.04464e-05C9.14276 -0.000465112 9.06122 0.0153005 8.98507 0.0464034C8.90892 0.0775063 8.83966 0.123335 8.78126 0.18126L7.01251 1.95001L0.18126 8.78126C0.123335 8.83966 0.0775063 8.90892 0.0464034 8.98507C0.0153005 9.06122 -0.000465112 9.14276 1.04464e-05 9.22501V11.875C1.04464e-05 12.0408 0.0658584 12.1997 0.183069 12.317C0.300279 12.4342 0.45925 12.5 0.62501 12.5H3.27501C3.36247 12.5048 3.44994 12.4911 3.53177 12.4599C3.6136 12.4286 3.68795 12.3806 3.75001 12.3188L10.5438 5.48751L12.3188 3.75001C12.3758 3.68944 12.4223 3.61972 12.4563 3.54376C12.4623 3.49394 12.4623 3.44358 12.4563 3.39376C12.4592 3.36467 12.4592 3.33535 12.4563 3.30626L12.5 3.27501ZM3.01876 11.25H1.25001V9.48126L7.45626 3.27501L9.22501 5.04376L3.01876 11.25ZM10.1063 4.16251L8.33751 2.39376L9.22501 1.51251L10.9875 3.27501L10.1063 4.16251Z"
                                      fill="#03AF9F" />
                                  </svg>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label class="custom-checkbox">
                                  <input type="checkbox" id="repeatMonthly">
                                  <span class="checkmark checkmark-lg"></span>
                                  <span class="repeat-checkbox-labels"></span>
                                </label>
                              </td>
                              <td>John Doe</td>
                              <td>
                                <div class="">
                                  <span class="mr-4">10</span>
                                  <svg class="cursor" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 13 13" fill="none">
                                    <path
                                      d="M12.5 3.27501C12.5005 3.19276 12.4847 3.11122 12.4536 3.03507C12.4225 2.95892 12.3767 2.88966 12.3188 2.83126L9.66876 0.18126C9.61036 0.123335 9.5411 0.0775063 9.46495 0.0464034C9.3888 0.0153005 9.30727 -0.000465112 9.22501 1.04464e-05C9.14276 -0.000465112 9.06122 0.0153005 8.98507 0.0464034C8.90892 0.0775063 8.83966 0.123335 8.78126 0.18126L7.01251 1.95001L0.18126 8.78126C0.123335 8.83966 0.0775063 8.90892 0.0464034 8.98507C0.0153005 9.06122 -0.000465112 9.14276 1.04464e-05 9.22501V11.875C1.04464e-05 12.0408 0.0658584 12.1997 0.183069 12.317C0.300279 12.4342 0.45925 12.5 0.62501 12.5H3.27501C3.36247 12.5048 3.44994 12.4911 3.53177 12.4599C3.6136 12.4286 3.68795 12.3806 3.75001 12.3188L10.5438 5.48751L12.3188 3.75001C12.3758 3.68944 12.4223 3.61972 12.4563 3.54376C12.4623 3.49394 12.4623 3.44358 12.4563 3.39376C12.4592 3.36467 12.4592 3.33535 12.4563 3.30626L12.5 3.27501ZM3.01876 11.25H1.25001V9.48126L7.45626 3.27501L9.22501 5.04376L3.01876 11.25ZM10.1063 4.16251L8.33751 2.39376L9.22501 1.51251L10.9875 3.27501L10.1063 4.16251Z"
                                      fill="#03AF9F" />
                                  </svg>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label class="custom-checkbox">
                                  <input type="checkbox" id="repeatMonthly">
                                  <span class="checkmark checkmark-lg"></span>
                                  <span class="repeat-checkbox-labels"></span>
                                </label>
                              </td>
                              <td>John Doe</td>
                              <td>
                                <div class="">
                                  <span class="mr-4">10</span>
                                  <svg class="cursor" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 13 13" fill="none">
                                    <path
                                      d="M12.5 3.27501C12.5005 3.19276 12.4847 3.11122 12.4536 3.03507C12.4225 2.95892 12.3767 2.88966 12.3188 2.83126L9.66876 0.18126C9.61036 0.123335 9.5411 0.0775063 9.46495 0.0464034C9.3888 0.0153005 9.30727 -0.000465112 9.22501 1.04464e-05C9.14276 -0.000465112 9.06122 0.0153005 8.98507 0.0464034C8.90892 0.0775063 8.83966 0.123335 8.78126 0.18126L7.01251 1.95001L0.18126 8.78126C0.123335 8.83966 0.0775063 8.90892 0.0464034 8.98507C0.0153005 9.06122 -0.000465112 9.14276 1.04464e-05 9.22501V11.875C1.04464e-05 12.0408 0.0658584 12.1997 0.183069 12.317C0.300279 12.4342 0.45925 12.5 0.62501 12.5H3.27501C3.36247 12.5048 3.44994 12.4911 3.53177 12.4599C3.6136 12.4286 3.68795 12.3806 3.75001 12.3188L10.5438 5.48751L12.3188 3.75001C12.3758 3.68944 12.4223 3.61972 12.4563 3.54376C12.4623 3.49394 12.4623 3.44358 12.4563 3.39376C12.4592 3.36467 12.4592 3.33535 12.4563 3.30626L12.5 3.27501ZM3.01876 11.25H1.25001V9.48126L7.45626 3.27501L9.22501 5.04376L3.01876 11.25ZM10.1063 4.16251L8.33751 2.39376L9.22501 1.51251L10.9875 3.27501L10.1063 4.16251Z"
                                      fill="#03AF9F" />
                                  </svg>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label class="custom-checkbox">
                                  <input type="checkbox" id="repeatMonthly">
                                  <span class="checkmark checkmark-lg"></span>
                                  <span class="repeat-checkbox-labels"></span>
                                </label>
                              </td>
                              <td>John Doe</td>
                              <td>
                                <div class="">
                                  <span class="mr-4">10</span>
                                  <svg class="cursor" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 13 13" fill="none">
                                    <path
                                      d="M12.5 3.27501C12.5005 3.19276 12.4847 3.11122 12.4536 3.03507C12.4225 2.95892 12.3767 2.88966 12.3188 2.83126L9.66876 0.18126C9.61036 0.123335 9.5411 0.0775063 9.46495 0.0464034C9.3888 0.0153005 9.30727 -0.000465112 9.22501 1.04464e-05C9.14276 -0.000465112 9.06122 0.0153005 8.98507 0.0464034C8.90892 0.0775063 8.83966 0.123335 8.78126 0.18126L7.01251 1.95001L0.18126 8.78126C0.123335 8.83966 0.0775063 8.90892 0.0464034 8.98507C0.0153005 9.06122 -0.000465112 9.14276 1.04464e-05 9.22501V11.875C1.04464e-05 12.0408 0.0658584 12.1997 0.183069 12.317C0.300279 12.4342 0.45925 12.5 0.62501 12.5H3.27501C3.36247 12.5048 3.44994 12.4911 3.53177 12.4599C3.6136 12.4286 3.68795 12.3806 3.75001 12.3188L10.5438 5.48751L12.3188 3.75001C12.3758 3.68944 12.4223 3.61972 12.4563 3.54376C12.4623 3.49394 12.4623 3.44358 12.4563 3.39376C12.4592 3.36467 12.4592 3.33535 12.4563 3.30626L12.5 3.27501ZM3.01876 11.25H1.25001V9.48126L7.45626 3.27501L9.22501 5.04376L3.01876 11.25ZM10.1063 4.16251L8.33751 2.39376L9.22501 1.51251L10.9875 3.27501L10.1063 4.16251Z"
                                      fill="#03AF9F" />
                                  </svg>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label class="custom-checkbox">
                                  <input type="checkbox" id="repeatMonthly">
                                  <span class="checkmark checkmark-lg"></span>
                                  <span class="repeat-checkbox-labels"></span>
                                </label>
                              </td>
                              <td>John Doe</td>
                              <td>
                                <div class="">
                                  <span class="mr-4">10</span>
                                  <svg class="cursor" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 13 13" fill="none">
                                    <path
                                      d="M12.5 3.27501C12.5005 3.19276 12.4847 3.11122 12.4536 3.03507C12.4225 2.95892 12.3767 2.88966 12.3188 2.83126L9.66876 0.18126C9.61036 0.123335 9.5411 0.0775063 9.46495 0.0464034C9.3888 0.0153005 9.30727 -0.000465112 9.22501 1.04464e-05C9.14276 -0.000465112 9.06122 0.0153005 8.98507 0.0464034C8.90892 0.0775063 8.83966 0.123335 8.78126 0.18126L7.01251 1.95001L0.18126 8.78126C0.123335 8.83966 0.0775063 8.90892 0.0464034 8.98507C0.0153005 9.06122 -0.000465112 9.14276 1.04464e-05 9.22501V11.875C1.04464e-05 12.0408 0.0658584 12.1997 0.183069 12.317C0.300279 12.4342 0.45925 12.5 0.62501 12.5H3.27501C3.36247 12.5048 3.44994 12.4911 3.53177 12.4599C3.6136 12.4286 3.68795 12.3806 3.75001 12.3188L10.5438 5.48751L12.3188 3.75001C12.3758 3.68944 12.4223 3.61972 12.4563 3.54376C12.4623 3.49394 12.4623 3.44358 12.4563 3.39376C12.4592 3.36467 12.4592 3.33535 12.4563 3.30626L12.5 3.27501ZM3.01876 11.25H1.25001V9.48126L7.45626 3.27501L9.22501 5.04376L3.01876 11.25ZM10.1063 4.16251L8.33751 2.39376L9.22501 1.51251L10.9875 3.27501L10.1063 4.16251Z"
                                      fill="#03AF9F" />
                                  </svg>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label class="custom-checkbox">
                                  <input type="checkbox" id="repeatMonthly">
                                  <span class="checkmark checkmark-lg"></span>
                                  <span class="repeat-checkbox-labels"></span>
                                </label>
                              </td>
                              <td>John Doe</td>
                              <td>
                                <div class="">
                                  <span class="mr-4">10</span>
                                  <svg class="cursor" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 13 13" fill="none">
                                    <path
                                      d="M12.5 3.27501C12.5005 3.19276 12.4847 3.11122 12.4536 3.03507C12.4225 2.95892 12.3767 2.88966 12.3188 2.83126L9.66876 0.18126C9.61036 0.123335 9.5411 0.0775063 9.46495 0.0464034C9.3888 0.0153005 9.30727 -0.000465112 9.22501 1.04464e-05C9.14276 -0.000465112 9.06122 0.0153005 8.98507 0.0464034C8.90892 0.0775063 8.83966 0.123335 8.78126 0.18126L7.01251 1.95001L0.18126 8.78126C0.123335 8.83966 0.0775063 8.90892 0.0464034 8.98507C0.0153005 9.06122 -0.000465112 9.14276 1.04464e-05 9.22501V11.875C1.04464e-05 12.0408 0.0658584 12.1997 0.183069 12.317C0.300279 12.4342 0.45925 12.5 0.62501 12.5H3.27501C3.36247 12.5048 3.44994 12.4911 3.53177 12.4599C3.6136 12.4286 3.68795 12.3806 3.75001 12.3188L10.5438 5.48751L12.3188 3.75001C12.3758 3.68944 12.4223 3.61972 12.4563 3.54376C12.4623 3.49394 12.4623 3.44358 12.4563 3.39376C12.4592 3.36467 12.4592 3.33535 12.4563 3.30626L12.5 3.27501ZM3.01876 11.25H1.25001V9.48126L7.45626 3.27501L9.22501 5.04376L3.01876 11.25ZM10.1063 4.16251L8.33751 2.39376L9.22501 1.51251L10.9875 3.27501L10.1063 4.16251Z"
                                      fill="#03AF9F" />
                                  </svg>
                                </div>
                              </td>
                            </tr>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="row px-3 mt-3">
                    <div class="col-12 col-md-12 col-lg-12 dates">
                      <div class="input">
                        <button type="submit" class="btn btn-primary  w-full mt-2" data-toggle="modal"
                        data-target="#openConfirmModelEdit" id="confirmEdit">Submit</button>
                      </div>
                    </div>
                  </div>

                </div>

              </form>
            </div>
          </div>
        </div>

        <!-- modal for upcoming edit top btn start -->
        <div class="modal fade custom-slide-from-right" id="upcomingGoalshowModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document" style="width: 30%;">
            <div class="modal-content">
              <form>
                <div class="modal-body">
                  <div class="model-head">
                    <div class="heading ">
                      <h5 class="medel-main-heading">Edit Goal</h5>
                    </div>
                    <div class="cancel">
                      <button type="button" id="close-model" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>

                  <div class="row px-3">
                    <div class="input-group date">
                      <input type="text" id="startDate" placeholder="Select date"
                        class="datepicker form-control custom text-center mx-2 rounded">
                      <span class="input-group-addon mr-md-">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="none">
                          <path
                            d="M17 2H15V1C15 0.734784 14.8946 0.48043 14.7071 0.292893C14.5196 0.105357 14.2652 0 14 0C13.7348 0 13.4804 0.105357 13.2929 0.292893C13.1054 0.48043 13 0.734784 13 1V2H7V1C7 0.734784 6.89464 0.48043 6.70711 0.292893C6.51957 0.105357 6.26522 0 6 0C5.73478 0 5.48043 0.105357 5.29289 0.292893C5.10536 0.48043 5 0.734784 5 1V2H3C2.20435 2 1.44129 2.31607 0.87868 2.87868C0.316071 3.44129 0 4.20435 0 5V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H17C17.7956 20 18.5587 19.6839 19.1213 19.1213C19.6839 18.5587 20 17.7956 20 17V5C20 4.20435 19.6839 3.44129 19.1213 2.87868C18.5587 2.31607 17.7956 2 17 2ZM18 17C18 17.2652 17.8946 17.5196 17.7071 17.7071C17.5196 17.8946 17.2652 18 17 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V10H18V17ZM18 8H2V5C2 4.73478 2.10536 4.48043 2.29289 4.29289C2.48043 4.10536 2.73478 4 3 4H5V5C5 5.26522 5.10536 5.51957 5.29289 5.70711C5.48043 5.89464 5.73478 6 6 6C6.26522 6 6.51957 5.89464 6.70711 5.70711C6.89464 5.51957 7 5.26522 7 5V4H13V5C13 5.26522 13.1054 5.51957 13.2929 5.70711C13.4804 5.89464 13.7348 6 14 6C14.2652 6 14.5196 5.89464 14.7071 5.70711C14.8946 5.51957 15 5.26522 15 5V4H17C17.2652 4 17.5196 4.10536 17.7071 4.29289C17.8946 4.48043 18 4.73478 18 5V8Z"
                            fill="#03AF9F" />
                        </svg>
                      </span>
                    </div>
                  </div>

                  <div class="row px-3 pt-2">
                    <div class="col-sm-12 col-md-12 col-lg-12 dates">
                      <div class="input">
                        <label for="goalReqard">Goal Reward</label>
                        <input type="text" id="goalReqard" placeholder="Goal Reward" class="form-control custom">
                      </div>
                    </div>
                  </div>

                  <div class="row px-3 pt-2">
                    <div class="col-12 col-md-12 col-lg-12 dates">
                      <div class="input">
                        <label for="bonusGoal">Bonus Goal</label>
                        <input type="number" min="0" id="bonusGoal" placeholder="Please enter a number"
                          class="form-control custom">
                      </div>
                    </div>
                  </div>

                  <div class="row px-3 mt-3">
                    <div class="col-6 col-md-4 col-lg-4 dates">
                      <label class="custom-checkbox">
                        <input type="radio" id="repeatWeekly" name="repeat">
                        <span class="checkmark checkmark-sm"></span>
                        <span class="repeat-checkbox-labels">Repeat Weekly</span>
                      </label>
                    </div>
                    <div class="col-6 col-md-4 col-lg-4 dates">
                      <label class="custom-checkbox">
                        <input type="radio" id="repeatMonthly" name="repeat">
                        <span class="checkmark checkmark-sm"></span>
                        <span class="repeat-checkbox-labels">Repeat Monthly</span>
                      </label>
                    </div>
                  </div>

                  <div class="row px-3 pt-2">
                    <div class="col-12 col-md-12 col-lg-12">
                      <div class="table-container">
                        <table class="table table-borderless custom-table">
                          <thead>
                            <tr>
                              <th scope="col">Assign All</th>
                              <th scope="col">Name</th>
                              <th scope="col">Goal No</th>
                            </tr>
                          </thead>
                          <tbody>

                            <tr>
                              <td>
                                <label class="custom-checkbox">
                                  <input type="checkbox" id="repeatMonthly">
                                  <span class="checkmark checkmark-lg"></span>
                                  <span class="repeat-checkbox-labels"></span>
                                </label>
                              </td>
                              <td>John Doe</td>
                              <td>
                                <div class="">
                                  <span class="mr-4">10</span>
                                  <svg class="cursor" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 13 13" fill="none">
                                    <path
                                      d="M12.5 3.27501C12.5005 3.19276 12.4847 3.11122 12.4536 3.03507C12.4225 2.95892 12.3767 2.88966 12.3188 2.83126L9.66876 0.18126C9.61036 0.123335 9.5411 0.0775063 9.46495 0.0464034C9.3888 0.0153005 9.30727 -0.000465112 9.22501 1.04464e-05C9.14276 -0.000465112 9.06122 0.0153005 8.98507 0.0464034C8.90892 0.0775063 8.83966 0.123335 8.78126 0.18126L7.01251 1.95001L0.18126 8.78126C0.123335 8.83966 0.0775063 8.90892 0.0464034 8.98507C0.0153005 9.06122 -0.000465112 9.14276 1.04464e-05 9.22501V11.875C1.04464e-05 12.0408 0.0658584 12.1997 0.183069 12.317C0.300279 12.4342 0.45925 12.5 0.62501 12.5H3.27501C3.36247 12.5048 3.44994 12.4911 3.53177 12.4599C3.6136 12.4286 3.68795 12.3806 3.75001 12.3188L10.5438 5.48751L12.3188 3.75001C12.3758 3.68944 12.4223 3.61972 12.4563 3.54376C12.4623 3.49394 12.4623 3.44358 12.4563 3.39376C12.4592 3.36467 12.4592 3.33535 12.4563 3.30626L12.5 3.27501ZM3.01876 11.25H1.25001V9.48126L7.45626 3.27501L9.22501 5.04376L3.01876 11.25ZM10.1063 4.16251L8.33751 2.39376L9.22501 1.51251L10.9875 3.27501L10.1063 4.16251Z"
                                      fill="#03AF9F" />
                                  </svg>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label class="custom-checkbox">
                                  <input type="checkbox" id="repeatMonthly">
                                  <span class="checkmark checkmark-lg"></span>
                                  <span class="repeat-checkbox-labels"></span>
                                </label>
                              </td>
                              <td>John Doe</td>
                              <td>
                                <div class="">
                                  <span class="mr-4">10</span>
                                  <svg class="cursor" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 13 13" fill="none">
                                    <path
                                      d="M12.5 3.27501C12.5005 3.19276 12.4847 3.11122 12.4536 3.03507C12.4225 2.95892 12.3767 2.88966 12.3188 2.83126L9.66876 0.18126C9.61036 0.123335 9.5411 0.0775063 9.46495 0.0464034C9.3888 0.0153005 9.30727 -0.000465112 9.22501 1.04464e-05C9.14276 -0.000465112 9.06122 0.0153005 8.98507 0.0464034C8.90892 0.0775063 8.83966 0.123335 8.78126 0.18126L7.01251 1.95001L0.18126 8.78126C0.123335 8.83966 0.0775063 8.90892 0.0464034 8.98507C0.0153005 9.06122 -0.000465112 9.14276 1.04464e-05 9.22501V11.875C1.04464e-05 12.0408 0.0658584 12.1997 0.183069 12.317C0.300279 12.4342 0.45925 12.5 0.62501 12.5H3.27501C3.36247 12.5048 3.44994 12.4911 3.53177 12.4599C3.6136 12.4286 3.68795 12.3806 3.75001 12.3188L10.5438 5.48751L12.3188 3.75001C12.3758 3.68944 12.4223 3.61972 12.4563 3.54376C12.4623 3.49394 12.4623 3.44358 12.4563 3.39376C12.4592 3.36467 12.4592 3.33535 12.4563 3.30626L12.5 3.27501ZM3.01876 11.25H1.25001V9.48126L7.45626 3.27501L9.22501 5.04376L3.01876 11.25ZM10.1063 4.16251L8.33751 2.39376L9.22501 1.51251L10.9875 3.27501L10.1063 4.16251Z"
                                      fill="#03AF9F" />
                                  </svg>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label class="custom-checkbox">
                                  <input type="checkbox" id="repeatMonthly">
                                  <span class="checkmark checkmark-lg"></span>
                                  <span class="repeat-checkbox-labels"></span>
                                </label>
                              </td>
                              <td>John Doe</td>
                              <td>
                                <div class="">
                                  <span class="mr-4">10</span>
                                  <svg class="cursor" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 13 13" fill="none">
                                    <path
                                      d="M12.5 3.27501C12.5005 3.19276 12.4847 3.11122 12.4536 3.03507C12.4225 2.95892 12.3767 2.88966 12.3188 2.83126L9.66876 0.18126C9.61036 0.123335 9.5411 0.0775063 9.46495 0.0464034C9.3888 0.0153005 9.30727 -0.000465112 9.22501 1.04464e-05C9.14276 -0.000465112 9.06122 0.0153005 8.98507 0.0464034C8.90892 0.0775063 8.83966 0.123335 8.78126 0.18126L7.01251 1.95001L0.18126 8.78126C0.123335 8.83966 0.0775063 8.90892 0.0464034 8.98507C0.0153005 9.06122 -0.000465112 9.14276 1.04464e-05 9.22501V11.875C1.04464e-05 12.0408 0.0658584 12.1997 0.183069 12.317C0.300279 12.4342 0.45925 12.5 0.62501 12.5H3.27501C3.36247 12.5048 3.44994 12.4911 3.53177 12.4599C3.6136 12.4286 3.68795 12.3806 3.75001 12.3188L10.5438 5.48751L12.3188 3.75001C12.3758 3.68944 12.4223 3.61972 12.4563 3.54376C12.4623 3.49394 12.4623 3.44358 12.4563 3.39376C12.4592 3.36467 12.4592 3.33535 12.4563 3.30626L12.5 3.27501ZM3.01876 11.25H1.25001V9.48126L7.45626 3.27501L9.22501 5.04376L3.01876 11.25ZM10.1063 4.16251L8.33751 2.39376L9.22501 1.51251L10.9875 3.27501L10.1063 4.16251Z"
                                      fill="#03AF9F" />
                                  </svg>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label class="custom-checkbox">
                                  <input type="checkbox" id="repeatMonthly">
                                  <span class="checkmark checkmark-lg"></span>
                                  <span class="repeat-checkbox-labels"></span>
                                </label>
                              </td>
                              <td>John Doe</td>
                              <td>
                                <div class="">
                                  <span class="mr-4">10</span>
                                  <svg class="cursor" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 13 13" fill="none">
                                    <path
                                      d="M12.5 3.27501C12.5005 3.19276 12.4847 3.11122 12.4536 3.03507C12.4225 2.95892 12.3767 2.88966 12.3188 2.83126L9.66876 0.18126C9.61036 0.123335 9.5411 0.0775063 9.46495 0.0464034C9.3888 0.0153005 9.30727 -0.000465112 9.22501 1.04464e-05C9.14276 -0.000465112 9.06122 0.0153005 8.98507 0.0464034C8.90892 0.0775063 8.83966 0.123335 8.78126 0.18126L7.01251 1.95001L0.18126 8.78126C0.123335 8.83966 0.0775063 8.90892 0.0464034 8.98507C0.0153005 9.06122 -0.000465112 9.14276 1.04464e-05 9.22501V11.875C1.04464e-05 12.0408 0.0658584 12.1997 0.183069 12.317C0.300279 12.4342 0.45925 12.5 0.62501 12.5H3.27501C3.36247 12.5048 3.44994 12.4911 3.53177 12.4599C3.6136 12.4286 3.68795 12.3806 3.75001 12.3188L10.5438 5.48751L12.3188 3.75001C12.3758 3.68944 12.4223 3.61972 12.4563 3.54376C12.4623 3.49394 12.4623 3.44358 12.4563 3.39376C12.4592 3.36467 12.4592 3.33535 12.4563 3.30626L12.5 3.27501ZM3.01876 11.25H1.25001V9.48126L7.45626 3.27501L9.22501 5.04376L3.01876 11.25ZM10.1063 4.16251L8.33751 2.39376L9.22501 1.51251L10.9875 3.27501L10.1063 4.16251Z"
                                      fill="#03AF9F" />
                                  </svg>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label class="custom-checkbox">
                                  <input type="checkbox" id="repeatMonthly">
                                  <span class="checkmark checkmark-lg"></span>
                                  <span class="repeat-checkbox-labels"></span>
                                </label>
                              </td>
                              <td>John Doe</td>
                              <td>
                                <div class="">
                                  <span class="mr-4">10</span>
                                  <svg class="cursor" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 13 13" fill="none">
                                    <path
                                      d="M12.5 3.27501C12.5005 3.19276 12.4847 3.11122 12.4536 3.03507C12.4225 2.95892 12.3767 2.88966 12.3188 2.83126L9.66876 0.18126C9.61036 0.123335 9.5411 0.0775063 9.46495 0.0464034C9.3888 0.0153005 9.30727 -0.000465112 9.22501 1.04464e-05C9.14276 -0.000465112 9.06122 0.0153005 8.98507 0.0464034C8.90892 0.0775063 8.83966 0.123335 8.78126 0.18126L7.01251 1.95001L0.18126 8.78126C0.123335 8.83966 0.0775063 8.90892 0.0464034 8.98507C0.0153005 9.06122 -0.000465112 9.14276 1.04464e-05 9.22501V11.875C1.04464e-05 12.0408 0.0658584 12.1997 0.183069 12.317C0.300279 12.4342 0.45925 12.5 0.62501 12.5H3.27501C3.36247 12.5048 3.44994 12.4911 3.53177 12.4599C3.6136 12.4286 3.68795 12.3806 3.75001 12.3188L10.5438 5.48751L12.3188 3.75001C12.3758 3.68944 12.4223 3.61972 12.4563 3.54376C12.4623 3.49394 12.4623 3.44358 12.4563 3.39376C12.4592 3.36467 12.4592 3.33535 12.4563 3.30626L12.5 3.27501ZM3.01876 11.25H1.25001V9.48126L7.45626 3.27501L9.22501 5.04376L3.01876 11.25ZM10.1063 4.16251L8.33751 2.39376L9.22501 1.51251L10.9875 3.27501L10.1063 4.16251Z"
                                      fill="#03AF9F" />
                                  </svg>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label class="custom-checkbox">
                                  <input type="checkbox" id="repeatMonthly">
                                  <span class="checkmark checkmark-lg"></span>
                                  <span class="repeat-checkbox-labels"></span>
                                </label>
                              </td>
                              <td>John Doe</td>
                              <td>
                                <div class="">
                                  <span class="mr-4">10</span>
                                  <svg class="cursor" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 13 13" fill="none">
                                    <path
                                      d="M12.5 3.27501C12.5005 3.19276 12.4847 3.11122 12.4536 3.03507C12.4225 2.95892 12.3767 2.88966 12.3188 2.83126L9.66876 0.18126C9.61036 0.123335 9.5411 0.0775063 9.46495 0.0464034C9.3888 0.0153005 9.30727 -0.000465112 9.22501 1.04464e-05C9.14276 -0.000465112 9.06122 0.0153005 8.98507 0.0464034C8.90892 0.0775063 8.83966 0.123335 8.78126 0.18126L7.01251 1.95001L0.18126 8.78126C0.123335 8.83966 0.0775063 8.90892 0.0464034 8.98507C0.0153005 9.06122 -0.000465112 9.14276 1.04464e-05 9.22501V11.875C1.04464e-05 12.0408 0.0658584 12.1997 0.183069 12.317C0.300279 12.4342 0.45925 12.5 0.62501 12.5H3.27501C3.36247 12.5048 3.44994 12.4911 3.53177 12.4599C3.6136 12.4286 3.68795 12.3806 3.75001 12.3188L10.5438 5.48751L12.3188 3.75001C12.3758 3.68944 12.4223 3.61972 12.4563 3.54376C12.4623 3.49394 12.4623 3.44358 12.4563 3.39376C12.4592 3.36467 12.4592 3.33535 12.4563 3.30626L12.5 3.27501ZM3.01876 11.25H1.25001V9.48126L7.45626 3.27501L9.22501 5.04376L3.01876 11.25ZM10.1063 4.16251L8.33751 2.39376L9.22501 1.51251L10.9875 3.27501L10.1063 4.16251Z"
                                      fill="#03AF9F" />
                                  </svg>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label class="custom-checkbox">
                                  <input type="checkbox" id="repeatMonthly">
                                  <span class="checkmark checkmark-lg"></span>
                                  <span class="repeat-checkbox-labels"></span>
                                </label>
                              </td>
                              <td>John Doe</td>
                              <td>
                                <div class="">
                                  <span class="mr-4">10</span>
                                  <svg class="cursor" xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 13 13" fill="none">
                                    <path
                                      d="M12.5 3.27501C12.5005 3.19276 12.4847 3.11122 12.4536 3.03507C12.4225 2.95892 12.3767 2.88966 12.3188 2.83126L9.66876 0.18126C9.61036 0.123335 9.5411 0.0775063 9.46495 0.0464034C9.3888 0.0153005 9.30727 -0.000465112 9.22501 1.04464e-05C9.14276 -0.000465112 9.06122 0.0153005 8.98507 0.0464034C8.90892 0.0775063 8.83966 0.123335 8.78126 0.18126L7.01251 1.95001L0.18126 8.78126C0.123335 8.83966 0.0775063 8.90892 0.0464034 8.98507C0.0153005 9.06122 -0.000465112 9.14276 1.04464e-05 9.22501V11.875C1.04464e-05 12.0408 0.0658584 12.1997 0.183069 12.317C0.300279 12.4342 0.45925 12.5 0.62501 12.5H3.27501C3.36247 12.5048 3.44994 12.4911 3.53177 12.4599C3.6136 12.4286 3.68795 12.3806 3.75001 12.3188L10.5438 5.48751L12.3188 3.75001C12.3758 3.68944 12.4223 3.61972 12.4563 3.54376C12.4623 3.49394 12.4623 3.44358 12.4563 3.39376C12.4592 3.36467 12.4592 3.33535 12.4563 3.30626L12.5 3.27501ZM3.01876 11.25H1.25001V9.48126L7.45626 3.27501L9.22501 5.04376L3.01876 11.25ZM10.1063 4.16251L8.33751 2.39376L9.22501 1.51251L10.9875 3.27501L10.1063 4.16251Z"
                                      fill="#03AF9F" />
                                  </svg>
                                </div>
                              </td>
                            </tr>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="row px-3 mt-3">
                    <div class="col-12 col-md-12 col-lg-12 dates">
                      <div class="input">
                        <button type="submit" class="btn btn-primary  w-full btn" data-toggle="modal"
                        data-target="#openConfirmModelEdit" id="confirmeditupcoming">Save</button>
                      </div>
                    </div>
                  </div>

                </div>

              </form>
            </div>
          </div>
        </div>
        <!-- modal for upcoming edit top btn end -->
      </div>
    </div>

    <!-- Add the following HTML code to create the button -->

  </div>
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


  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
       <!-- Link jQuery UI -->
       <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
        <script src="./assets/js/index.js"></script>

  <!-- Include AnyChart library -->
  <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-bundle.min.js"></script>


  <script src="./assets/js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <!-- Link jQuery UI -->
   <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

  <script>
    $(document).ready(function () {
      $("#sidebar-toggle").click(function () {
        $(".sidebar").toggleClass('show');
      });
    });

      // js for calender

      $(document).ready(function () {

flatpickr('#startDate', {
  inline: false,
  mode: 'range',
  minDate: '',
  dateFormat: 'd-m-Y',
});

});


   // js for calender

   $(document).ready(function () {

flatpickr('#SelectDate', {
  inline: false,
  mode: 'range',
  minDate: '',
  dateFormat: 'd-m-Y',
});

      const tabItems = document.querySelectorAll("#tabMenu .tab-item");

      tabItems.forEach((tabItem) => {
        tabItem.addEventListener("click", function () {
          // Remove "active" class from all tab items
          tabItems.forEach((item) => {
            item.classList.remove("active");
          });

          // Add "active" class to the clicked tab item
          this.classList.add("active");
        });
      });


    });

    $(document).ready(function () {

$.datepicker.setDefaults({
  dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
});
$("#startDate1").datepicker({
  showButtonPanel: true,
});

// Initialize the datepicker for the End Date input field
$("#endDate1").datepicker({
  showButtonPanel: true,
});


const tabItems = document.querySelectorAll("#tabMenu .tab-item");

tabItems.forEach((tabItem) => {
  tabItem.addEventListener("click", function () {
    // Remove "active" class from all tab items
    tabItems.forEach((item) => {
      item.classList.remove("active");
    });

    // Add "active" class to the clicked tab item
    this.classList.add("active");
  });
});


});

    $(document).ready(function() {

           anychart.onDocumentReady(function() {
               // set the data

               var data = [
                   {x: "Completed", value: 40, color: "#03AF9F"},
                   {x: "Bonus", value: 30, color: "#DCFF07"},
                   {x: "Incomplete", value: 30, color: "#FFCE21"},
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

          $('#confirmEdit').click((e) => {
      e.preventDefault()

      Swal.fire({
        title: 'Have you finished editing?',
        icon: 'question',
        confirmButtonText: 'Save',
        cancelButtonText: 'No',
        showCancelButton: true,
        iconColor: '#03AF9F',
        customClass: {
          confirmButton: 'btn-primary'
        }
      })
    })
    $('#ButtonEndGoal').click((e) => {
      e.preventDefault()

      Swal.fire({
        title: 'Are you sure you want to end goal?',
        icon: 'question',
        confirmButtonText: 'Save',
        cancelButtonText: 'No',
        showCancelButton: true,
        iconColor: '#03AF9F',
        customClass: {
          confirmButton: 'btn-primary'
        }
      })
    })
// for upcoming up edit btn
    $('#confirmeditupcoming').click((e) => {
      e.preventDefault()

      Swal.fire({
        title: 'Have you finished editing?',
        icon: 'question',
        confirmButtonText: 'Save',
        cancelButtonText: 'No',
        showCancelButton: true,
        iconColor: '#03AF9F',
        customClass: {
          confirmButton: 'btn-primary'
        }
      })
    })
  </script>
</body>

</html>
