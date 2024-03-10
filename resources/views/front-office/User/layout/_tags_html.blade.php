<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Manup Template">
    <meta name="keywords" content="Manup, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title' , 'home')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800,900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
    
    <!-- Css Styles -->
    <link rel="stylesheet" href="/assets/css/front-office/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/front-office/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/front-office/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/front-office/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/front-office/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/front-office/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/front-office/style.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/front-office/main.css" type="text/css">
</head>

<body>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">
            <div class="logo">
                <a href="./index.html">
                    <img src="img/logo.png" alt="">
                </a>
            </div>
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        
                        <li class="active"><a href="/home">Home</a></li>
                        @if (session('user') && session('user')->role == 'organisateur')
                        <li><a href="/organisateur/Event/{{session('user')->id}}">Event management</a>
                        </li>
                        @endif
                        @if (session('user') && session('user')->role == 'admin')
                        <li><a href="/dashboard">Dashboard</a>
                        </li>
                        @endif
                        @if (session('user') && !session('user')->role == 'admin')
                        <li><a href="/Board">Board Tickets</a>
                        </li>
                        @endif
                        @if (session('user'))
                        <li><a href="" class="d-flex align-items-center">
                            <span class="account-user-avatar px-2">
                                <img src="/organisateur/assets/images/profile.jpg" alt="user-image" width="32" class="rounded-circle">
                            </span>
                            Welcome, {{session('user')->name}}</a>
                            <ul class="dropdown">
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            
                            </ul>
                        </li>
                        @else
                        <li><a href="" class="d-flex align-items-center">
                            <span class="account-user-avatar px-2">
                                <img src="/organisateur/assets/images/profile.jpg" alt="user-image" width="32" class="rounded-circle">
                            </span>
                            Welcome,</a>
                            <ul class="dropdown">
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                <li><a class="dropdown-item" href="/login">Login</a></li>
                                <li><a class="dropdown-item" href="/register">Register</a></li>
                            
                            </ul>
                        </li>
                        
                        @endif
                    </ul>
                </nav>
                <a href="#by-tecket" class="primary-btn top-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-perforated-fill" viewBox="0 0 16 16">
                    <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6zm4-1v1h1v-1zm1 3v-1H4v1zm7 0v-1h-1v1zm-1-2h1v-1h-1zm-6 3H4v1h1zm7 1v-1h-1v1zm-7 1H4v1h1zm7 1v-1h-1v1zm-8 1v1h1v-1zm7 1h1v-1h-1z"/>
                  </svg> Ticket</a>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->
    @yield('content')
  <!-- Js Plugins -->
  <script src="/assets/js/jquery-3.3.1.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  <script src="/assets/js/jquery.magnific-popup.min.js"></script>
  <script src="/assets/js/jquery.countdown.min.js"></script>
  <script src="/assets/js/jquery.slicknav.js"></script>
  <script src="/assets/js/owl.carousel.min.js"></script>
  <script src="/assets/js/main.js"></script>
</body>

</html>