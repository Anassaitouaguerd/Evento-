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
                        <li class="active"><a href="./index.html">Home</a></li>
                        <li><a href="./about-us.html">About</a></li>
                        @if (session('user_role') && session('user_role') == 'organisateur')
                        <li><a href="./speaker.html">Event management</a>
                            <ul class="dropdown">
                                <li><a href="#">Dashboard Events</a></li>
                                <li><a href="#">Create Event</a></li>
                                <li><a href="/organisateur/Event/{{session('user_id')}}">All My Events</a></li>
                                <li><a href="#">Events Board</a></li>
                            </ul>
                        </li>
                        @endif
                        <li><a href="#">Welcome, {{session('user_name')}}</a>
                            <ul class="dropdown">
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            
                            </ul>
                        </li>
                    </ul>
                </nav>
                <a href="#" class="primary-btn top-btn"><i class="fa fa-ticket"></i> Ticket</a>
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