<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
          <title>Admin | Mahanusa Graha Persada</title>
  <!-- Favicon -->
  <link href="{{ url('assets/img/brand/logo.png') }}" rel="icon" type="image/png">        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('css/style.css')}}">
    </head>
    <body>
        <div class="content">
            <div class="box">
                <h1>Sign In</h1>
            <form action="{{url('auth')}}" method="POST">
                    @csrf
                    <input type="text" class="form-control md" placeholder="Username" name="username">
                    <input type="password" class="form-control md" placeholder="Password" name="password">
                    <input type="submit" class="form-control" value="Masuk" name="login">
                </form>
                <h6>© 2019 | Mahanusa Graha Persada</h6>
            </div>
        </div>

        <script src="{{ url('js/jquery.js') }}"></script>
        <script src="{{ url('js/popper.min.js') }}"></script>
        <script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>
    </body>
</html>
