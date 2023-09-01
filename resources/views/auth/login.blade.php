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
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"></head>
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/global.css">
  <body>
    <div class="container-full-height">
        <div class="row row-equal-height">
            <!-- Left div with image -->
            <div class="col-lg-6 col-md-6 col-sm-12 left-div" style="height: 100vh;max-width:100%;">
                <img src="./assets/images/left.png" alt="Image" class="img-fluid height-full">
            </div>
            <!-- Right div with login form -->
            <div class="col-md-6 right-div">
              <div class="container width">
                <div class="form-data">
                  <div class="logo">
                    <img  src="./assets/images/Logo.png" alt="No Image" >
                </div>
                  <div class="d-flex justify-content-center align-items-center heading">
                    <h1>Login</h1>
                  </div>
                  <div class="guide">
                    To Login to your account, please enter your Email and Password below to start
                  </div>  
                </div>
                <div class="form">
                  <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="label" for="email">Email</label>
                        <input type="email" placeholder="Enter your email" class="form-control input-element" name="email" id="email" value="{{ isset($rememberedEmail) ? $rememberedEmail : '' }}" required>
                      </div>
                    <div class="form-group">
                        <label class="label" for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" class="form-control input-element" id="password" value="{{ isset($rememberedPassword) ? $rememberedPassword : '' }}" required>
                    </div>
                    <div class="row justify-content-between">
                      <div class="col-auto ">
                          <label class="custom-checkbox">
                            <input type="checkbox" name="remember" id="repeatMonthly">
                            <span class="checkmark"></span>
                            <span class="repeat-checkbox-labels">Remember me</span>
                          </label>
                      </div>
                      <div class="col-auto">
                        <a href="#" class="forgot-password-link">Forgot Password?</a>
                      </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center submit mt-3">
                      <!-- <button type="submit" class="btn btn-primary login-btn">Login</button> -->
                      <button type="submit" class="btn btn-primary login-btn">Login</button>
                    </div>
                </form>
                </div>
              </div>
            </div>
        </div>
    </div>

  

    <!-- Link Bootstrap JS (Optional if you require Bootstrap JS functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
      @if(session('alert'))
    Swal.fire({
        icon: '{{ session('alert.type') }}',
        title: '{{ session('alert.message') }}',
        iconColor: '#03AF9F',
        customClass: {
            confirmButton: 'btn-primary'
        }
    });
  @endif
    </script>
  </body>
</html>
