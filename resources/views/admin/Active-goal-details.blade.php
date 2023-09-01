
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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
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
  <link rel="stylesheet" href="./assets/css/sidebar.css">
  <link rel="stylesheet" href="./assets/css/global.css">
  <!-- Add these lines after the existing link tags -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<style>
  .ui-widget.ui-widget-content{
    width: fit-content;
  }
  .ui-widget table tr th {
    font-size: 1em;
  }
</style>

<body>
  <div class="custom-flex h-full ">
    <div class="sidebar show h-full" style="position: relative;">
      <div class="sidebar-logo">
        <img src="./assets/images/Logo.png" alt="No Image" />
        <!-- Use the 'data-target' attribute to specify the ID of the element to collapse -->
        <button id="menu-toggle" class="btn btn-primary d-md-none" data-toggle="collapse" data-target="#sidebarMenu">
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
      <div class="logout" >
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
        <div class="heading mb-5">
          <h1>
            <a class="btn btn-primary" style="padding: 0px; margin-right: 20px; margin-bottom: 5px;" href="{{route('admin.currentGoal')}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M20.9999 11H6.41394L11.7069 5.707L10.2929 4.293L2.58594 12L10.2929 19.707L11.7069 18.293L6.41394 13H20.9999V11Z" fill="white"/>
              </svg>

            </a>Alex Jordan</h1>
        </div>
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

        <div class="row mt-4 mb-4" style="font-weight: 500;">
          <div class="col-md-2 col-6 ">
            <img src="./assets/images/trophy 1.png" style="width: 1rem; height: 1rem;" class="">
            <span class="ml-2" >Goal Reward </span>
          </div>
          <div class="ml-3">
           <span >This bonus reward reflects  your excellent performance</span>
          </div>
        </div>
          <div class="row mt-4" >
            <div class="col-sm-12 col-lg-8 col-md-12">
                <div class="card px-3">
                    <div class="table-responsive" style="height: 58vh">
                      <table class="table table-striped" >
                        <thead>
                          <tr>
                            <th>Recruited</th>
                            <th>Updated</th>

                          </tr>
                        </thead>
                        <tbody >
                         <tr>
                          <td>John Doe</td>
                          <td>12-6-2023</td>
                        </tr>
                        <tr>
                          <td>John Doe</td>
                          <td>12-6-2023</td>
                        </tr>
                        <tr>
                          <td>John Doe</td>
                          <td>12-6-2023</td>
                        </tr>
                        <tr>
                          <td>John Doe</td>
                          <td>12-6-2023</td>
                        </tr>
                </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
                <div class="mt-4 center">
                  <nav aria-label="Page navigation example ">
                    <ul class="pagination">
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
            <div class="col-sm-12 col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body " >
                        <h5>User Overview</h5>
                        <div id="pi-chart" style="height: 48.5vh;"></div>
                    </div>
                </div>
            </div>

          </div>

        </div>

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

  <script src="./assets/js/index.js"></script>

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
        tabItem.addEventListener("click", function () {
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
        chart.container('pi-chart');
        chart.draw();
    });



  });
</script>

</body>

</html>
