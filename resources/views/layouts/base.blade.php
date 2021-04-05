<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Indonesia || @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
  <div class="wrapper">
    <div class="header">
        <img src="{{asset('img/header.jpg')}}" alt="">
    </div>
    <div class="navbar">
      <div class="nav-left">
        @yield('left-navbar')
      </div>
      <div class="nav-right">
        <form action="/logout" method="POST">
          @csrf
          <button class="btn" type="submit">Logout</button>
        </form>
      </div>
    </div>

    <div class="body">
      <div class="left-body">
        <div class="header-left-body">
          @yield('header-left-body')
        </div>
        <div class="content-left-body">
          @yield('content-left-body')
        </div>
        <div class="image-left-body">
            <img src="{{asset('img/g2.jpg')}}" alt="">
            <img src="{{asset('img/g1.jpg')}}" alt="">
        </div>
      </div>
      <div class="right-body">
        @yield('right-body')
      </div>
    </div>
  
    <div class="footer">
      <span>Copyright @fikihamar  &copy 2021</span>
    </div>
  </div>
</body>
</html>