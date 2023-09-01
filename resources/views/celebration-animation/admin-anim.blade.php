<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>All Goal Celebration Animation</title>
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
  </head>
  <body>
    <div id="animation">
      <div id="overlay"></div>
      <!-- card -->
      <div id="contentContainer">
        <div class="card">
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



    <!-- jsDelivr  -->
    <script src="https://cdn.jsdelivr.net/npm/fireworks-js@2.x/dist/index.umd.js"></script>

    <!-- UNPKG -->
    <script src="https://unpkg.com/fireworks-js@2.x/dist/index.umd.js"></script>

    <!-- Usage -->
    <script>
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
                window.location.href = "{{ route('admin.activeGoal') }}";
      }, 5000);
    </script>
  </body>
</html>
