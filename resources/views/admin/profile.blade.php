<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="./assets/images/CA-logo 1.png" type="image/x-icon" />

    <title>Admin Portal</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet" />
</head>
<link rel="stylesheet" href="{{ asset('assets/css/admin-portal-profile.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/global.css') }}" />
<style>
    .error-message{
        color: red;
        font-size: small;
    }
    .no-transition.collapsing {
        transition: none;
    }

    /* Optional: Customize the transition duration */
    .no-transition.collapse {
        transition-duration: 0s;
        /* Set the duration to 0 seconds */
    }

    .custom-slide-from-right {
        opacity: 0;
        transform: translateX(100%);
        transition: opacity 0.5s ease-in-out, transform 0.3s ease-in-out;
        /* Adjust the duration and easing function */
    }

    .modal.fade.show.custom-slide-from-right {
        opacity: 1;
        transform: translateX(0);
    }

    .dropdown-edit-content {
        display: none;
    }

    /* .test:before {
  content: '\2807';
  font-size: 2rem;
  color: rgb(19, 17, 17);
  display: inline-block;
  position: absolute;
  margin-top: -9px;
  margin-left: 20px;
  cursor: pointer;
  /* border: 1px solid red; */
    }

    */ .test:before:hover .dropdown-edit-content {
        display: block;
    }

    .test:hover .dropdown-edit-content {
        display: inline;
    }

    .hover-container {
        position: relative;
        display: inline-block;
    }

    .icon-button {
        background-color: #f0f0f0;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
    }

    .options {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #F4F9F6;
        border: 1px solid #ccc;
        padding: 8px;
        z-index: 99999;
        width: 150px;
        border-radius: 12px;
    }


    .options a {
        color: black;
        display: block;
        text-decoration: none;
        padding-bottom: 7px;
        font-size: 0.9em;
        padding-left: 6px;
    }

    .options a:hover {
        background: #e5e9e7;
    }


    /* ---------------- Pagination Css Start -----------------  */


    .page-link {
        color: #333;
        font-family: Poppins;
        font-size: 13px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        border: none;
    }

    .deactive {
        color: #cccc;
        cursor: no-drop;
    }

    .deactive:hover {
        background-color: #fff;
        color: #ccc
    }

    .selected {
        background-color: var(--primary);
        color: #fff;
    }

    .page-link.links,
    .page-link.head {
        padding: 6px 12px !important;
        border-radius: 8px !important;
        border-bottom-left-radius: ;
    }

    /* {
    padding: 6px 12px !important;
    border-radius: 10px !important;

  } */

    .pagination {
        gap: 8px
    }

    .center {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* ---------------- Pagination Css End -----------------  */
</style>
<script></script>

<body>
    <div class="custom-flex h-full" style="overflow: hidden">
        <div class="sidebar show h-full collapse no-transition" id="collapseExample" style="position: relative;">
            <div class="sidebar-logo">
                <img src="./assets/images/Logo.png" alt="No Image" />
                <!-- Use the 'data-target' attribute to specify the ID of the element to collapse -->
                <button id="menu-toggle" class="btn btn-primary d-md-none" data-toggle="collapse"
                    data-target="#sidebarMenu">
                    <img class="toggle-img" src="./assets/images/toggle.png" alt="No Toggle">
                </button>
            </div>
            <!-- Add the 'collapse' class and an ID to the ul element -->
            @if (auth()->user()->role === 1)
                <ul class="nav flex-column d-md-block collapse" id="sidebarMenu">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('admin.goal') }}">
                            <img src="./assets/images/goal.png" alt="No Image" />
                            <span>Goal</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.profile') }}">
                            <img src="./assets/images/profile.png" class="profile" alt="No Image" />
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.report') }}">
                            <img src="./assets/images/reports.png" alt="No Image" />
                            <span>Reports</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.activeGoal') }}">
                            <img src="./assets/images/companyStats.png" alt="No Image" />
                            <span>Active Goals</span>

                        </a>
                    </li>
                </ul>
            @endif
            @if (auth()->user()->role === 3)
                <ul class="nav flex-column d-md-block collapse" id="sidebarMenu">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('user.goal') }}">
                            <img src="./assets/images/goal.png" alt="No Image" />
                            <span>Goal</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.profile') }}">
                            <img src="./assets/images/profile.png" class="profile" alt="No Image" />
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('user.reports') }}">
                            <img src="./assets/images/reports.png" alt="No Image" />
                            <span>Reports</span>
                        </a>
                    </li>
                </ul>
            @endif

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
                <!-- <div class="nav-item"  style="width: 15.5vw;">
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
                        <button class="d-md-inline d-none" id="sidebar-toggle2" data-toggle="collapse"
                            data-target="#collapseExample" aria-expanded="false"
                            aria-controls="collapseExample">&#9776;</button>
                        Users
                    </h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if (auth()->user()->role === 1)
                            <ul class="nav horizontal-tabs" id="tabMenu">
                                <li class="tab-item">
                                    <a class="pad" data-toggle="pill" href="#home">My Details</a>
                                </li>
                                <li class="tab-item active">
                                    <a class="pad" data-toggle="pill" href="#menu1">Users</a>
                                </li>
                                <li class=" ml-auto p-0 mb-1 h-75">
                                    <button class="pad text-white btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#showModalButtonAdd" type="submit"> Add User</button>

                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="tab-content">
                    <div id="home"
                        class="tab-pane fade in {{ auth()->user()->role === 3 ? 'active show' : '' }}">
                        <div class="card form">
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.updateProfile') }}" id="updateProfile">
                                    @csrf
                                    <div class="form-group">
                                        <label class="label" for="firstName">First Name</label>
                                        <input type="text" name="profile_first_name"
                                            class="form-control input-element"
                                            value="{{ auth()->user()->first_name }}" id="firstName"
                                            placeholder="First Name" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="label" for="lastName">Last Name</label>
                                        <input type="text" name="profile_last_name"
                                            class="form-control input-element"
                                            value="{{ auth()->user()->last_name }}" id="lastName"
                                            placeholder="Last Name" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="label" for="email">Email</label>
                                        <input type="text" name="profile_email" class="form-control input-element"
                                            value="{{ auth()->user()->email }}" id="email"
                                            placeholder="example@gmail.com" required />
                                    </div>
                                    <div class="form-group form-check mb-5">
                                        <a href="#" data-toggle="modal" data-target="#showModalButton">Change
                                            Password</a>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary create-goal-btn w-100 py-2"
                                            style="border-radius: 7px;" id="updateDetails">
                                            Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- edit button modal -->

                    <div id="menu1" class="tab-pane fade {{ auth()->user()->role === 1 ? 'active show' : '' }}">
                        <br />
                        <div class="row">
                            <div class="col-12 margin" id="page-content">
                                <div class="card px-3 border-0" style="height: 68vh;border-radius:18px">
                                    <div class="">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <body>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>
                                                            @if ($user->role == 1)
                                                                Super Admin
                                                            @elseif ($user->role == 2)
                                                                Admin
                                                            @else
                                                                User
                                                            @endif
                                                        </td>
                                                        <td>{{ $user->status == 1 ? 'Active' : 'Freezed' }}</td>
                                                        <td>
                                                            <button type=""
                                                                class="btn btn btn-outline-primary submit-outline-btn px-4 py-1 "
                                                                data-toggle="modal" data-target="#edituser"
                                                                onclick="setUserDetail(
                                '{{ $user->id }}',
                                '{{ $user->first_name }}',
                                '{{ $user->last_name }}',
                                '{{ $user->email }}',
                                '{{ $user->role }}',
                              )">Edit
                                                            </button>

                                                            @if ($user->id != auth()->user()->id)
                                                                <div class="hover-container">
                                                                    <button class="icon-button"
                                                                        style="background-color: transparent;">&#x2807;</button>
                                                                    <div class="options">
                                                                        <!-- Your options content goes here -->
                                                                        @if ($user->status == 0)
                                                                            <a
                                                                                href="{{ route('admin.updateUserStatus', [$user->id, 1]) }}">Activate
                                                                                Account</a>
                                                                        @else
                                                                            <a
                                                                                href="{{ route('admin.updateUserStatus', [$user->id, 0]) }}">Freeze
                                                                                Account</a>
                                                                        @endif
                                                                        <a href="#" data-toggle="modal"
                                                                            data-target="#showUserPasswordReset"
                                                                            onclick="$('#edit_user_pass_id').val('{{ $user->id }}')">Reset
                                                                            Password</a>
                                                                        <a href="#"
                                                                            onclick="confirmRemove({{ $user->id }})">Remove
                                                                            Account</a>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </body>
                                        </table>
                                    </div>
                                    <div class=" center row  w-100" style="margin-top: 20px;">
                                        <nav aria-label="Page navigation example ">
                                            <ul class="pagination m-auto"
                                                style="position: fixed;bottom:2.5%;left:50%">
                                                @if ($users->hasPages())
                                                    @if ($users->onFirstPage())
                                                        <li class="page-item"><a class="page-link head deactive"
                                                                href="#">Prev</a>
                                                        </li>
                                                    @else
                                                        <li class="page-item"><a class="page-link head"
                                                                href="{{ $users->previousPageUrl() }}">Prev</a>
                                                        </li>
                                                    @endif
                                                    @for ($i = 1; $i <= $users->lastPage(); $i++)
                                                        <li class="page-item"><a
                                                                class="page-link links {{ $users->currentPage() == $i ? 'selected' : '' }}"
                                                                href="{{ $users->url($i) }}">{{ $i }}</a>
                                                        </li>
                                                    @endfor
                                                    @if ($users->hasMorePages())
                                                        <li class="page-item"><a class="page-link head"
                                                                href="{{ $users->nextPageUrl() }}">Next</a></li>
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
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade custom-slide-from-right" id="showModalButton" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="width:30%">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.updateProfilePassword') }}"
                        id="updateProfilePassword">
                        @csrf
                        <div class="modal-body">
                            <div class="model-head">
                                <div class="heading">
                                    <h3 class="medel-main-heading">Change Password</h3>
                                </div>
                                <div class="cancel">
                                    <button type="button" id="close-model" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>

                            <br />

                            <div class="form-group">
                                <label class="label" for="firstName">Old Password</label>
                                <input type="text" class="form-control input-element" name="profile_old_password"
                                    id="oldPassword" placeholder="Enter your old password" />
                            </div>
                            <div class="form-group">
                                <label class="label" for="lastName">New Password</label>
                                <input type="text" class="form-control input-element" name="profile_new_password"
                                    id="newPassword" placeholder="Enter your new password" />
                            </div>
                            <div class="form-group">
                                <label class="label" for="email">Confirm Password</label>
                                <input type="text" class="form-control input-element"
                                    name="profile_confirm_password" id="confirmPassword"
                                    placeholder="Confirm your new password" />
                            </div>
                            <br />
                            <div class="form-group">
                                <div class="input">
                                    <button type="button" class="btn btn-primary w-full save-btn"
                                        data-toggle="modal" data-target="#openConfirmModel" id="confirm">
                                        Change
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Update pass --}}
        <div class="modal fade custom-slide-from-right" id="showUserPasswordReset" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="width:30%">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.updateuserPassword') }}" id="updateUserPassword">
                        @csrf
                        <input type="hidden" name="edit_user_pass_id" id="edit_user_pass_id">
                        <div class="modal-body">
                            <div class="model-head">
                                <div class="heading">
                                    <h3 class="medel-main-heading">Change User Password</h3>
                                </div>
                                <div class="cancel">
                                    <button type="button" id="close-model" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>

                            <br />
                            <div class="form-group">
                                <label class="label" for="lastName">New Password</label>
                                <input type="text" class="form-control input-element" name="user_new_password"
                                    id="user_new_password" placeholder="Enter your new password" />
                            </div>
                            <div class="form-group">
                                <label class="label" for="email">Confirm Password</label>
                                <input type="text" class="form-control input-element" name="user_confirm_password"
                                    id="user_confirm_password" placeholder="Confirm your new password" />
                            </div>
                            <br />
                            <div class="form-group">
                                <div class="input">
                                    <button type="button" class="btn btn-primary w-full save-btn"
                                        data-toggle="modal" data-target="#openConfirmModelUserPass"
                                        id="confirmUserPass">
                                        Change
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit User Detail modal -->
        <div class="modal fade custom-slide-from-right" id="edituser" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="width: 30%">
                <div class="modal-content">
                    <form action="{{ route('admin.updateUser') }}" method="POST" id="updateUser">
                        @csrf
                        <div class="modal-body">
                            <div class="model-head">
                                <div class="heading">
                                    <h3 class="medel-main-heading">Edit Details</h3>
                                </div>
                                <div class="cancel">
                                    <button type="button" id="close-model" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>

                            <br />
                            <input type="hidden" name="edit_id" id="edit_id">
                            <div class="form-group">
                                <label class="label" for="firstName">First Name</label>
                                <input type="text" class="form-control input-element" name="edit_first_name"
                                    id="edit_first_name" placeholder="John" />
                            </div>
                            <div class="form-group">
                                <label class="label" for="lastName">Last Name</label>
                                <input type="text" class="form-control input-element" name="edit_last_name"
                                    id="edit_last_name" placeholder="Doe" />
                            </div>
                            <div class="form-group">
                                <label class="label" for="email">Email</label>
                                <input type="email" class="form-control input-element" name="edit_email"
                                    id="edit_email" placeholder="johndoe@gmail.com" />
                            </div>
                            <div class="form-group">
                                <label class="label" for="email">Role</label>
                                <select name="edit_role" id="edit_role" class="form-control input-element"
                                    aria-label="Default select example">
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                    <option value="3">User</option>
                                </select>
                            </div>
                            <br />
                            <div class="form-group">
                                <div class="input">
                                    <button type="button" class="btn btn-primary w-full save-btn"
                                        data-toggle="modal" data-target="#openConfirmModelEdit" id="confirmEdit">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Add New User Detail modal -->
        <div class="modal fade custom-slide-from-right" id="showModalButtonAdd" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="width: 30%">
                <div class="modal-content">
                    <form action="{{ route('admin.createUser') }}" method="POST" id="createUser">
                        @csrf
                        <div class="modal-body">
                            <div class="model-head">
                                <div class="heading">
                                    <h3 class="medel-main-heading">Add User</h3>
                                </div>
                                <div class="cancel">
                                    <button type="button" id="close-model" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>

                            <br />

                            <div class="form-group">
                                <label class="label" for="firstName">First Name</label>
                                <input type="text" class="form-control input-element" name="new_first_name"
                                    id="firstNameModal" placeholder="Enter first name" />
                                <span id="firstNameError" class="error-message"></span>
                            </div>
                            <div class="form-group">
                                <label class="label" for="lastName">Last Name</label>
                                <input type="text" class="form-control input-element" name="new_last_name"
                                    id="lastNameModal" placeholder="Enter last name" />
                                <span id="lastNameError" class="error-message"></span>
                            </div>
                            <div class="form-group">
                                <label class="label" for="lastName">Email</label>
                                <input type="email" class="form-control input-element" name="new_email"
                                    id="emailModal" placeholder="Enter Email" />
                                <span id="emailError" class="error-message"></span>
                            </div>
                            <div class="form-group">
                                <label class="label" for="email">Role</label>
                                <select name="new_role" id="roleModal" class="form-control input-element"
                                    aria-label="Default select example">
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                    <option value="3">User</option>
                                </select>
                                <span id="roleError" class="error-message"></span>

                            </div>
                            <br />
                            <div class="form-group">
                                <div class="input">
                                    <button type="button" class="btn btn-primary w-full save-btn"
                                            data-toggle="modal" data-target="#openConfirmModelAdd" id="confirmAdd">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Link Bootstrap JS (Optional if you require Bootstrap JS functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="./assets/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //js for options
        document.addEventListener("DOMContentLoaded", function() {
            const iconButtons = document.querySelectorAll(".icon-button");

            iconButtons.forEach(function(iconButton) {
                iconButton.addEventListener("click", function(event) {
                    const options = iconButton.nextElementSibling;

                    // Hide options of other icon buttons
                    iconButtons.forEach(function(otherIconButton) {
                        if (otherIconButton !== iconButton) {
                            otherIconButton.nextElementSibling.style.display = "none";
                        }
                    });

                    options.style.display = options.style.display === "block" ? "none" : "block";
                });
            });

            document.addEventListener("click", function(event) {
                if (!event.target.classList.contains("icon-button")) {
                    iconButtons.forEach(function(iconButton) {
                        iconButton.nextElementSibling.style.display = "none";
                    });
                }
            });
        });
        @if (session('alert'))
            Swal.fire({
                icon: '{{ session('alert.type') }}',
                title: '{{ session('alert.message') }}',
                iconColor: '#03AF9F',
                customClass: {
                    confirmButton: 'btn-primary'
                }
            });
        @endif

        function setUserDetail(id, firstname, lastname, email, role) {
            $("#edit_id").val(id)
            $("#edit_first_name").val(firstname)
            $("#edit_last_name").val(lastname)
            $("#edit_email").val(email)
            $(`#edit_role option`).removeAttr('selected')
            $(`#edit_role option[value="${role}"]`).attr('selected', 'selected')
        }

        function confirmRemove(user_id) {

            Swal.fire({
                title: 'Are you sure you want to remove user?',
                icon: 'question',
                confirmButtonText: 'Save',
                cancelButtonText: 'No',
                showCancelButton: true,
                iconColor: '#03AF9F',
                customClass: {
                    confirmButton: 'btn-primary'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = `/delete-user/${user_id}`
                }
            });
        }

        const oldPasswordInput = document.getElementById("oldPassword");
        const newPasswordInput = document.getElementById("newPassword");
        const confirmPasswordInput = document.getElementById("confirmPassword");

        const passwordMatchError = document.createElement("span");
        passwordMatchError.className = "error-message";
        passwordMatchError.style.color = "red"; // Set initial color

        confirmPasswordInput.parentNode.appendChild(passwordMatchError);

        confirmPasswordInput.addEventListener("input", function() {
            if (newPasswordInput.value !== confirmPasswordInput.value) {
                passwordMatchError.textContent = "Passwords do not match!";
                // newPasswordInput.style.color = "red";
                // confirmPasswordInput.style.color = "red";
            } else {
                passwordMatchError.textContent = "";
                newPasswordInput.style.color = "";
                confirmPasswordInput.style.color = "";
            }
        });

        $(document).ready(function() {
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

        $('#confirm').click((e) => {
            e.preventDefault()

            Swal.fire({
                title: 'Are you sure you want change password?',
                icon: 'question',
                confirmButtonText: 'Save',
                cancelButtonText: 'No',
                showCancelButton: true,
                iconColor: '#03AF9F',
                customClass: {
                    confirmButton: 'btn-primary'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#updateProfilePassword').submit();
                }
            });
        })

        $('#confirmUserPass').click((e) => {
            e.preventDefault()

            Swal.fire({
                title: 'Are you sure you want change password?',
                icon: 'question',
                confirmButtonText: 'Save',
                cancelButtonText: 'No',
                showCancelButton: true,
                iconColor: '#03AF9F',
                customClass: {
                    confirmButton: 'btn-primary'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#updateUserPassword').submit();
                }
            });
        })

        $('#confirmEdit').click((e) => {
            e.preventDefault()

            Swal.fire({
                title: 'Are you sure you want to update?',
                icon: 'question',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                showCancelButton: true,
                iconColor: '#03AF9F',
                customClass: {
                    confirmButton: 'btn-primary'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#updateUser').submit();
                }
            });
        })

        $('#updateDetails').click((e) => {
            e.preventDefault()

            Swal.fire({
                title: 'Are you sure you want to update details?',
                icon: 'question',
                confirmButtonText: 'Confirm',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
                iconColor: '#03AF9F',
                customClass: {
                    confirmButton: 'btn-primary'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#updateProfile').submit();
                }
            });
        })
        const testBefore = document.querySelector('.test:before');
        const dropdown = document.querySelector('.dropdown');

        // testBefore.addEventListener('click', () => {
        //   dropdown.classList.toggle('active');
        // });
    </script>
    <script>
        var submitBtn = document.getElementById('confirmAdd');

        var firstNameInput = document.getElementById('firstNameModal');
        var lastNameInput = document.getElementById('lastNameModal');
        var emailInput = document.getElementById('emailModal');
        var roleInput = document.getElementById('roleModal');

        var firstNameError = document.getElementById('firstNameError');
        var lastNameError = document.getElementById('lastNameError');
        var emailError = document.getElementById('emailError');
        var roleError = document.getElementById('roleError');

        submitBtn.addEventListener('click', handleValidation);

        function handleValidation() {

            // Reset previous error messages
            firstNameError.textContent = '';
            lastNameError.textContent = '';
            emailError.textContent = '';
            roleError.textContent = '';

            // Check if any of the input fields is empty
            var isValid = true;

            if (!firstNameInput.value) {
                firstNameError.textContent = 'First Name is required';
                isValid = false;
            }

            if (!lastNameInput.value) {
                lastNameError.textContent = 'Last Name is required';
                isValid = false;
            }

            if (!emailInput.value) {
                emailError.textContent = 'Email is required';
                isValid = false;
            }

            if (!roleInput.value) {
                roleError.textContent = 'Role is required';
                isValid = false;
            }

            console.log(isValid)

            // Open the modal if all fields are valid
            if (isValid) {
                Swal.fire({
                    title: 'Are you sure you want to add new user?',
                    icon: 'question',
                    confirmButtonText: 'Confirm',
                    cancelButtonText: 'Cancel',
                    showCancelButton: true,
                    iconColor: '#03AF9F',
                    customClass: {
                        confirmButton: 'btn-primary'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#createUser').submit();
                    }
                });
            }
        }

        // $('#confirmAdd').click((e) => {
        //
        // })



    </script>
</body>

</html>
