<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <title>Document</title>
</head>
<body class="">
  <div class="navbar navbar-expand-lg navbar-dark bg-dark ps-4 pe-4">
    <header class="p-1 container-fluid">
        <div id="left" class="d-flex flex-row align-items-center text-white justify-content-evenly">
            <h1 class="mb-0">
                <i class="bi bi-bullseye"></i>
                ReXsteam
            </h1>
            <h1 class="m-3">
                <a href="{{route('games.index')}}" style="text-decoration-line: none">Home</a>
            </h1>
            @can('admin')
              <h1 class="mb-0">
                <a href="{{route('manage.index')}}" style="text-decoration-line: none">Manage Game</a>
              </h1>
            @endcan
        </div>
        <div id="right" class="d-flex">
          <form action="{{route('games.search')}}" method="GET">
            <div class="d-flex flex-row ">
                <input type="search" name="term" id="term" placeholder="Search" class="form-control me-2">
                <button class="btn btn-secondary me-2" type="submit">
                    <i><i class="bi bi-search"></i></i>
                </button>
            </div>
          </form>
          @auth
          <div class="d-flex flex-row gap-2">
            <a href="{{route('cart.index')}}">
              <button class="btn btn-secondary ml-3 mr-3 position-relative">
                <i class="bi bi-cart"></i>
                <?php $cartTotalQuantity = 0 ?>
                  @if ($cartTotalQuantity > 0)  
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{$cartTotalQuantity}}                 
                    <span class="visually-hidden">unread messages</span>
                  </span>
                  @endif
              </button>
            </a>
            <div class="dropstart">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item" href="{{route('profile.index')}}">Profile</a></li>
                <li><a class="dropdown-item" href="{{route('order.index')}}">Transaction History</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{route('logout')}}">Sign Out</a></li>
              </ul>
            </div>
          </div>
          @else
            <button type="button" class="btn btn-secondary">
              <a href="{{ route('login')}}">Sign In</a>
            </button>
          @endauth
        </div>
    </header>
  </div>
  <div id="main" class="p-5" style="background-color: whitesmoke; width: 100%">
    @yield('page-content')
  </div>
  <footer class="bg-dark d-flex flex-row p-3 align-items-center justify-content-between">
    <div id="left">
      <p class="text-muted mb-0">Ⓒ 2021 ReXsteam. All rights reserved.</p>
    </div>
    <div id="right">
      <a href=""><i class="bi bi-facebook"></i></a>
      <a href=""><i class="bi bi-twitter"></i></a>
      <a href=""><i class="bi bi-link-45deg"></i></a>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>