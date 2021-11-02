
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    
  </head>
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
        
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
          @auth <!--- user is logged in --->
            <h4 class="text-white">User Name: {{Auth::user()->name}}</h4>
            <br>
            <h4 class="text-white">User Type: {{Auth::user()->type}}</h4>
            <br>
            <h4 class="text-white"><a href='{{url("user")}}'>All Users</a></h4>
            <form method="POST" action= "{{url('/logout')}}">
            {{csrf_field()}}
            <input type="submit" value="Logout">
            </form>
            @else <!--- user is not logged in --->
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endauth
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">

    <h4 class="text-white"><a href='{{url("book")}}'>Home Page</a></h4>
    @auth
    <h4 class="text-white"><a href='{{url("following")}}'>Followings</a></h4>
    <h4 class="text-white"><a href='{{url("recommended")}}'>Recommended</a></h4>
    @endauth
    <h4 class="text-white"><a href='{{url("documentation")}}'>Documentation</a></h4>
    <h4 class="text-white"><a href='{{url("taskTwo")}}'>Task Two</a></h4>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

@yield('content')

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    </div>
</footer>
      
  </body>
</html>
