<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trace & Track|Eco Hero International</title>

  

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('./assets/dist/icon.png') }}" rel="icon">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('./assets/dist/css/adminlte.min.css') }}">
     <link rel="stylesheet" href="{{ asset('./assets/dist/css/adminlte.css') }}">
    <!-- Additional CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/css/timeline.css') }}">
     <link rel="stylesheet" href="{{ asset('./assets/css/mine.css') }}">

     


    <style>
        /* Navbar */
        .navbar-brand img {
            max-width: 100%;
            height: auto;
            margin-right: 2px; /* Geser ke kanan 2px */
            
        }

        .navbar-nav {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            margin-left: auto; /* Memindahkan menu ke tengah */
            margin-right: auto; /* Memindahkan menu ke tengah */
            
        }

        .nav-item {
            margin-left: 10px; /* Memberikan margin kiri pada setiap menu */
            
        }

        .nav-link {
            color: black !important;
            font-weight: bold;
        
        }

        @media (max-width: 768px) {
            .navbar-nav {
                justify-content: flex-start;
            }
        }

        
    </style>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper" style="line-height:normal;">
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container d-flex justify-content-between align-items-center">
                <a href="index.php" class="navbar-brand">
                    <img src="{{ asset('./assets/dist/img/ecohero.png') }}" alt="AdminLTE Logo">
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a href="https://ecoherocargo.world/" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://ecoherocargo.world/about-us/" class="nav-link">About Us</a>
                        </li>
                        
                         <li class="nav-item">
                            <a href="https://ecoherocargo.world/personal-shopper/" class="nav-link">Personal Shopper</a>
                        </li>
                         <li class="nav-item">
                            <a href="https://ecoherocargo.world/blog/" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://ecoherocargo.world/contact-us/" class="nav-link">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content goes here -->
        @yield('content')

    </div>

    <!-- jQuery -->
    <script src="{{ asset('./assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('./assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Your additional scripts here -->

</body>

</html>
