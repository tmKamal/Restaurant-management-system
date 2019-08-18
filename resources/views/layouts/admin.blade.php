<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="css/admin_style.css">
    <title>Admin Panel</title>
</head>
<body>
    <!--Admin Panel-->
    <div id="wrapper" class="toggled">
        <!--======================
        SIDE BAR
        ==========================-->
        <div id="sidebar-wrapper">
            <div class="logo-side-bar ">
                <img src="img/logo.png" alt="logo">
            </div>
                <div class="first-list-item">
                        <ul class="navigation_section list-container">
                            <li class="navigation_item">
                                <div class="row">
                                    <div class="col-2 icon-containerSidebar">
                                        <i class="material-icons crsidebarIcon">mail_outline</i>
                                    </div>
                                    <div class="col-10 sidebarText">
                                        MESSAGES
                                    </div>
                                </div>
                            </li>
                                    <li class="navigation_item">
                                            <div class="row">
                                                <div class="col-2 icon-containerSidebar">
                                                    <i class="material-icons crsidebarIcon">local_shipping</i>
                                                </div>
                                                <div class="col-10 sidebarText">
                                                    ORDERS
                                                </div>
                                            </div>
                                        </li>
                                        <li class="navigation_item">
                                                <div class="row">
                                                    <div class="col-2 icon-containerSidebar">
                                                        <i class="material-icons crsidebarIcon">access_time</i>
                                                    </div>
                                                    <div class="col-10 sidebarText">
                                                        PENDING
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="navigation_item">
                                                    <div class="row">
                                                        <div class="col-2 icon-containerSidebar">
                                                            <i class="material-icons crsidebarIcon">done_all</i>
                                                        </div>
                                                        <div class="col-10 sidebarText">
                                                            GROWTH
                                                        </div>
                                                    </div>
                                                </li>
                                            <li class="navigation_item">
                                                    <div class="row">
                                                        <div class="col-2 icon-containerSidebar">
                                                            <i class="material-icons crsidebarIcon">trending_up</i>
                                                        </div>
                                                        <div class="col-10 sidebarText">
                                                            COMPLETED
                                                        </div>
                                                    </div>
                                                </li>
                    </ul>
                </div>
                <div class="last-list-item">
                        <ul class="navigation_section list-container">
                
                                <li class="navigation_item">
                                        <div class="row">
                                            <div class="col-2 icon-containerSidebar">
                                                <i class="material-icons crsidebarIcon">exit_to_app</i>
                                            </div>
                                            <div class="col-10 sidebarText">
                                                LOG OUT
                                            </div>
                                        </div>
                                    </li>
                                    
                    </ul>
                </div>
            

            <!-- <div class="sign-out-center">
                <a href="#"><h1 class="boxed_item boxed_item_smaller signup">
                    <i class="material-icons">exit_to_app</i>
                        SIGN OUT</h1>
                </a>
            </div> -->
        </div><!--End SIDE BAR-->

        <!--======================
        page Content
        ==========================-->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <!--Page Navigation Bar-->
                <div class="row">
                    <div class="col-sm-12 page-nav">
                        <div class="container">
                            <a href="#" id="tog_btn" onclick="openSlide()"><i class="material-icons crMenu">menu</i></a>
                            <ul>
                                <li><a href="contactus.html"><i class="material-icons top-nav-icon">search</i></a></li>
                                <li><a href="index.html"><i class="material-icons top-nav-icon">notifications_none</i></a></li>
                                <li><a href="signup.html">{{ Auth::user()->name }}<i class="material-icons top-nav-icon">account_circle</i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!--END-Page Navigation bar-->

                <!--All of Our Page Contents Goes Here!!
                ========================================-->
                <div class="page-content-body-wrapper">
                    <div class="row info-cards-wrapper"><!-- Info-Cards-Wrapper -->
                        <div class="col-xl-3 col-md-6  mb-2"><!-- Info-Card-Start -->
                            <div class="info-card-container">
                                <div class=" info-card-header row">
                                    <div class="col-3 info-card-icon">
                                        <i class="material-icons info-card-icon-customized">attach_money</i>
                                    </div>
                                    <div class="col-9 info-card-title">
                                        <h5>Revenue</h5>
                                        <h3>10,000</h3>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-10 info-card-footer">
                                        <i class="material-icons info-card-footer-icon">calendar_today</i>
                                        <span>This Month</span>    
                                    </div>
                                </div>
                            </div>
                        </div><!-- Info-card-End -->
                        <div class="col-xl-3 col-md-6  mb-2"><!-- Info-Card-Start -->
                            <div class="info-card-container">
                                <div class=" info-card-header row">
                                    <div class="col-3 info-card-icon">
                                        <i class="material-icons info-card-icon-customized">attach_money</i>
                                    </div>
                                    <div class="col-9 info-card-title">
                                        <h5>Revenue</h5>
                                        <h3>10,000</h3>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-10 info-card-footer">
                                        <i class="material-icons info-card-footer-icon">calendar_today</i>
                                        <span>This Month</span>    
                                    </div>
                                </div>
                            </div>
                        </div><!-- Info-card-End -->
                        <div class="col-xl-3 col-md-6  mb-2"><!-- Info-Card-Start -->
                            <div class="info-card-container">
                                <div class=" info-card-header row">
                                    <div class="col-3 info-card-icon">
                                        <i class="material-icons info-card-icon-customized">attach_money</i>
                                    </div>
                                    <div class="col-9 info-card-title">
                                        <h5>Revenue</h5>
                                        <h3>10,000</h3>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-10 info-card-footer">
                                        <i class="material-icons info-card-footer-icon">calendar_today</i>
                                        <span>This Month</span>    
                                    </div>
                                </div>
                            </div>
                        </div><!-- Info-card-End -->
                        <div class="col-xl-3 col-md-6  mb-2"><!-- Info-Card-Start -->
                            <div class="info-card-container">
                                <div class=" info-card-header row">
                                    <div class="col-3 info-card-icon">
                                        <i class="material-icons info-card-icon-customized">attach_money</i>
                                    </div>
                                    <div class="col-9 info-card-title">
                                        <h5>Revenue</h5>
                                        <h3>10,000</h3>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-10 info-card-footer">
                                        <i class="material-icons info-card-footer-icon">calendar_today</i>
                                        <span>This Month</span>    
                                    </div>
                                </div>
                            </div>
                        </div><!-- Info-card-End -->
                    </div>
                    <!--===================== 
                        Content
                    =========================== -->
                    <div class="row justify-content-center">
                        <!--Custom page content-->
                        <div class="main_content col-lg-11 col-md-12 col-sm-12 ">

                            @yield('content')
                            
                        </div><!--Main content end-->
                        <!--END-Custom page content-->
                    </div>
                </div>
            </div>
        </div><!--End PAGE CONTENT-->
    </div>
    <!--End NEW Structure-->
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
</body>
</html>