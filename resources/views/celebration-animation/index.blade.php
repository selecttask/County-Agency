<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Celebration Animation</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}" />
    <script
      src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
      integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div id="animation">
      <div id="overlay" ></div>
      <canvas id="confeti" width="300" height="300" class="active"></canvas>
      <canvas id="confeti" width="300" height="300" class="active"></canvas>

      <!-- card -->
      <div id="contentContainer">
        <div class="card">
          <div id="baloonLeftContainer" >
            <img src="{{ asset('assets/assets/img/baloon.gif') }}" height="100%" width="auto" alt="baloon left" class="img-responsive">
          </div>
    
          <div class="card-body text-center text-light">
            <h1 id="yayText" class="display-4 fw-bold">Congratulations!</h1>
            <h1 id="nameTitle" >Johan Doe</h1>
            <p class="fw-normal fs-4" >
              You have completed your goal, your reward is (reward name)!
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

    <script src="{{ asset('assets/assets/js/animations.js') }}"></script>
    <script>
      // Only play the animation if it hasn't been played yet
      if (!sessionStorage.getItem('animationPlayed')) {
          $("#animation").show();
          $("audio#celebration")[0].play();
  
          setTimeout(function () {
              $("#animation").hide();
              $("audio#celebration")[0].pause();
              $("audio#celebration")[0].currentTime = 0;
  
              // Mark the animation as played
              sessionStorage.setItem('animationPlayed', 'true');
  
              window.location.href = "{{ route('user.goal') }}"; 
          }, 5000);
      } else {
          // Redirect immediately if animation has been played before
          window.location.href = "{{ route('user.goal') }}";
      }
  </script>
  
  </body>
</html>
