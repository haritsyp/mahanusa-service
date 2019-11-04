<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Admin | Mahanusa Graha Persada</title>
  <!-- Favicon -->
  <link href="{{ url('assets/img/brand/logo.png') }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ url('assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <!-- Argon CSS -->
  <link href="{{ url('assets/css/argon.css?v=1.0.0') }}" type="text/css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand pt-1 pb-0" href="../index.html">
        <img src="{{url('assets/img/brand/mahanusa.png')}}" class="navbar-brand-img"  width="110px";>
      </a>
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/proyek') }}">
              <i class="ni ni-tv-2 text-primary"></i> Proyek
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/kota') }}">
              <i class="ni ni-planet text-blue"></i> Kota
            </a>
          </li>
          <li class="nav-item">
           <a class="nav-link" href="{{ url('admin/unit') }}">
              <i class="ni ni-pin-3 text-blue"></i> Unit
            </a>
          </li>
          <li class="nav-item">
           <a class="nav-link" href="{{ url('admin/image') }}">
              <i class="ni ni-image text-blue"></i> Image
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('logout')}}">
              <i class="ni ni-user-run text-blue"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="main-content">
	@yield('content')

  </div>
  <script src="{{ url('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('assets/js/argon.js?v=1.0.0') }}"></script>
  @yield('script')
</body>
</html>
