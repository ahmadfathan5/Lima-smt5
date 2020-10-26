<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Link & Match STT Terpadu Nurul Fikri
  </title>
  <!-- Favicon -->
  <link href="{{asset('lima/assets/img/brand/nf.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('lima/assets/js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
  <link href="{{asset('lima/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{asset('lima/assets/css/argon-dashboard.css?v=1.1.0')}}" rel="stylesheet" />
  <link href="{{asset('lima/assets/css/mod.css')}}" rel="stylesheet" />

  <style>
      html, body {
          background-color: #fff;
          color: #636b6f;
          font-family: 'Raleway', sans-serif;
          font-weight: 100;
          height: 100vh;
          margin: 0;
      }

      .full-height {
          height: 100vh;
      }

      .flex-center {
          align-items: center;
          display: flex;
          justify-content: center;
      }

      .position-ref {
          position: relative;
      }

      .top-right {
          position: absolute;
          right: 10px;
          top: 18px;
      }

      .content {
          text-align: center;
      }

      .title {
          font-size: 84px;
      }

      .links > a {
          color: #636b6f;
          padding: 0 25px;
          font-size: 12px;
          font-weight: 600;
          letter-spacing: .1rem;
          text-decoration: none;
          text-transform: uppercase;
      }

      .m-b-md {
          margin-bottom: 30px;
      }
  </style>
</head>

<body class="">
@include('layouts.includes._sidebar')
  <div class="main-content">
    <!-- Navbar -->
    @include('layouts.includes._navbar')
    <!-- End Navbar -->
    <!-- conten -->
      <!-- Header -->
      <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
          <div class="header-body">
            <!-- Card stats -->
          </div>
        </div>
      </div>
      <div class="container-fluid mt--7">
        <div class="row">
          <!-- profile -->
          @yield('content')
          <!-- endprofile -->
        </div>
      <!-- endconten -->
      <!-- Footer -->
      @include('layouts.includes._footer')
    </div>
  </div>
  <!--   Core   -->
  <script src="{{asset('lima/assets/js/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('lima/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!--   Optional JS   -->
  <script src="{{asset('lima/assets/js/plugins/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('lima/assets/js/plugins/chart.js/dist/Chart.extension.js')}}"></script>
  <!--   Argon JS   -->
  <script src="{{asset('lima/assets/js/argon-dashboard.min.js?v=1.1.0')}}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>

</body>

</html>
