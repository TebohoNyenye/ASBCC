<?php 



    // First we execute our common code to connection to the database and start the session 

    require("common.php"); 

     

    // At the top of the page we check to see whether the user is logged in or not 

    if(empty($_SESSION['admin'])) 

    { 

        // If they are not, we redirect them to the login page. 

        header("Location: login"); 

         

        // Remember that this die statement is absolutely critical.  Without it, 

        // people can view your members-only content without logging in. 

        die("Redirecting to login.php"); 

    } 

     

    // Everything below this point in the file is secured by the login system 

     

    // We can display the user's username to them by reading it from the session array.  Remember that because 

    // a username is user submitted content we must use htmlentities on it before displaying it to the user. 

?> 

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ASBCC Dashboard</title>



    <link rel="stylesheet" href="assets/css/bootstrap.css">



    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">



    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">

    <link rel="stylesheet" href="assets/css/app.css">

    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">

</head>



<body>

    <div id="app">

        <div id="sidebar" class='active'>

            <div class="sidebar-wrapper active">

                <div class="sidebar-header">

                    <img class="img-fluid" src="assets/images/logo.png" style="height:60px; width:60px;"/> ASBCC

                </div>

                <div class="sidebar-menu">

                    <ul class="menu">





                        <li class='sidebar-title'>Main Menu</li>







                        <li class="sidebar-item active ">

                            <a href="dashboard" class='sidebar-link'>

                                <i data-feather="home" width="20"></i>

                                <span>Dashboard</span>

                            </a>



                        </li>









                        <li class="sidebar-item  has-sub">

                            <a href="#" class='sidebar-link'>

                                <i data-feather="file-plus" width="20"></i>

                                <span>Themes</span>

                            </a>



                            <ul class="submenu ">



                                <li>

                                    <a href="stunting">Stunting</a>

                                </li>



                                <li>

                                    <a href="micronutrient">Micronutrient deficiencies</a>

                                </li>



                                <li>

                                    <a href="infant">Infant and Young Child Feeding</a>

                                </li>



                                <li>

                                    <a href="obesity">Overweight and obesity</a>

                                </li>



                                <li>

                                    <a href="school">School Feeding</a>

                                </li>



                                <li>

                                    <a href="cash-based">Cash based transfers</a>

                                </li>



                           



                            </ul>



                        </li>







                        <li class="sidebar-item  ">

                            <a href="users" class='sidebar-link'>

                                <i data-feather="user" width="20"></i>

                                <span>Users</span>

                            </a>



                        </li>





                        <li class="sidebar-item ">

                            <a href="reports" class='sidebar-link'>

                                <i data-feather="file-text" width="20"></i>

                                <span>Reports</span>

                            </a>

                            </li>





                    </ul>

                </div>

                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>

            </div>

        </div>

        <div id="main">

            <nav class="navbar navbar-header navbar-expand navbar-light">

                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>

                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"

                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"

                    aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>

                </button>

                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
  

                        <li class="dropdown nav-icon">
   

                            <a href="#" data-bs-toggle="dropdown"

                                class="nav-link  dropdown-toggle nav-link-lg nav-link-user">

                                <div class="d-lg-inline-block">

                                <i id="niti">1</i>

                                    <i data-feather="bell"></i>

                                </div>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">

                                <h6 class='py-2 px-4'>Notifications</h6>

                                <ul class="list-group rounded-none">

                                    <li class="list-group-item border-0 align-items-start">

                                        <div class="avatar bg-success me-3">

                                            <span class="avatar-content"><i data-feather="bell"></i></span>

                                        </div>

                                        <div id ="noti">

                                            <h6 class='text-bold'>New Notifications</h6>

                                            

                                        </div>

                                    </li>

                                </ul>

                            </div>

                        </li>

                        <li class="dropdown nav-icon me-2">

                            <a href="#" data-bs-toggle="dropdown"

                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                                <div class="d-lg-inline-block">

                                    <i data-feather="mail"></i>

                                </div>
                              

                            </a>

                            <div class="dropdown-menu dropdown-menu-end">

                           

                            </div>

                        </li>

                        <li class="dropdown">

                            <a href="#" data-bs-toggle="dropdown"

                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                                <div class="avatar me-1">

                                    <img src="assets/images/avatar/avatar-s-1.jpg" alt="" srcset="">

                                </div>

                                <div class="d-none d-md-block d-lg-inline-block">Lumela, <?php echo htmlentities($_SESSION['admin']['username'], ENT_QUOTES, 'UTF-8'); ?></div>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end">

                                <a class="dropdown-item" href="register"><i data-feather="user"></i> Register user</a>

                               

                                <a class="dropdown-item" href="account"><i data-feather="settings"></i> Settings</a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="logout"><i data-feather="log-out"></i> Logout</a>

                            </div>

                        </li>

                    </ul>

                </div>

            </nav>



            <div class="main-content container-fluid">

                <div class="page-title">

                    <h3>Dashboard</h3>
                    
                    
                    <div class="d-lg-inline-block" id="ge"></div>
                </div>

                <section class="section">

                    <div class="row mb-2">

                        <div class="col-12 col-md-3">

                            <div class="card card-statistic">

                                <div class="card-body p-0">

                                    <div class="d-flex flex-column">

                                        <div class='px-3 py-3 d-flex justify-content-between' id="stu">

                                            <h3 class='card-title'>Stunting</h3>

                                            <div class="card-right d-flex align-items-center">

                                                <p id="sabu">0(s)</p>

                                            </div>

                                        </div>

                                        <div class="text-center" id="load">

                                        <img src="assets/images/white.gif" style="width:50px; "> 

                                          <p style="color:white;">loading</p>

                                        </div>



                                        <div class="chart-wrapper" id="stshow">

                                            <canvas id="canvas1" style="height:100px !important"></canvas>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-md-3">

                            <div class="card card-statistic">

                                <div class="card-body p-0">

                                    <div class="d-flex flex-column">

                                        <div class='px-3 py-3 d-flex justify-content-between'>

                                            <h3 class='card-title'>S-feeding</h3>

                                            <div class="card-right d-flex align-items-center">

                                                <p id="se">0(s) </p>

                                            </div>

                                        </div>

                                       <div class="text-center" id="load1">

                                        <img src="assets/images/white.gif" style="width:50px;"> 

                                       

                                          <p style="color:white;">loading</p>

                                        

                                        </div>



                                        <div class="chart-wrapper">

                                            <canvas id="canvas2" style="height:100px !important"></canvas>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-md-3">

                            <div class="card card-statistic">

                                <div class="card-body p-0">

                                    <div class="d-flex flex-column">

                                        <div class='px-3 py-3 d-flex justify-content-between'>

                                            <h3 class='card-title'>IYCF</h3>

                                            <div class="card-right d-flex align-items-center">

                                                <p id="inf">0(s)</p>

                                            </div>

                                        </div>

                                        <div class="text-center" id="load2">

                                        <img src="assets/images/white.gif" style="width:50px;"> 

                                          <p style="color:white;">loading</p>

                                        </div>

                                        

                                        <div class="chart-wrapper">

                                           

                                            <canvas id="canvas3" style="height:100px !important"></canvas>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-md-3">

                            <div class="card card-statistic">

                                <div class="card-body p-0">

                                    <div class="d-flex flex-column">

                                        <div class='px-3 py-3 d-flex justify-content-between'>

                                            <h3 class='card-title'>Micronutri</h3>

                                            <div class="card-right d-flex align-items-center">

                                                

												<p id="me">0(s)</p>

                                            </div>

                                        </div>

                                       <div class="text-center" id="load3">

                                        <img src="assets/images/white.gif" style="width:50px;"> 

                                          <p style="color:white;">loading</p>

                                        </div>



                                        <div class="chart-wrapper">

                                            <canvas id="canvas4" style="height:100px !important"></canvas>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <div class="col-12 col-md-3">

                            <div class="card card-statistic">

                                <div class="card-body p-0">

                                    <div class="d-flex flex-column">

                                        <div class='px-3 py-3 d-flex justify-content-between'>

                                            <h3 class='card-title'>Obesity</h3>

                                            <div class="card-right d-flex align-items-center">

                                                

												<p id="met">0(s)</p>

                                            </div>

                                        </div>

                                        <div class="text-center" id="load4">

                                        <img src="assets/images/white.gif" style="width:50px;"> 

                                        <p style="color:white;">loading</p>

                                        </div>



                                        <div class="chart-wrapper">

                                            <canvas id="canvas5" style="height:100px !important"></canvas>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        

                        <div class="col-12 col-md-3">

                            <div class="card card-statistic">

                                <div class="card-body p-0">

                                    <div class="d-flex flex-column">

                                        <div class='px-3 py-3 d-flex justify-content-between'>

                                            <h3 class='card-title'>Cash-Based</h3>

                                            <div class="card-right d-flex align-items-center">

                                                

												<p id="metad">0(s)</p>

                                            </div>

                                        </div>

                                        <div class="text-center" id="load5">

                                        <img src="assets/images/white.gif" style="width:50px;"> 

                                        <p style="color:white;">loading</p>

                                        </div>



                                        <div class="chart-wrapper">

                                            <canvas id="canvas6" style="height:100px !important"></canvas>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        

                        <div class="col-12 col-md-3">

                            <div class="card card-statistic">

                                <div class="card-body p-0">

                                    <div class="d-flex flex-column">

                                        <div class='px-3 py-3 d-flex justify-content-between'>

                                            <h3 class='card-title'>Meeting</h3>

                                            <div class="card-right d-flex align-items-center">

                                                

												<p id="me">0(s)</p>

                                            </div>

                                        </div>

                                        <div class="chart-wrapper">

                                            <canvas id="canvas7" style="height:100px !important"></canvas>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        

                        <div class="col-12 col-md-3">

                            <div class="card card-statistic">

                                <div class="card-body p-0">

                                    <div class="d-flex flex-column">

                                        <div class='px-3 py-3 d-flex justify-content-between'>

                                            <h3 class='card-title'>Total</h3>

                                            <div class="card-right d-flex align-items-center">

                                                

												<p id="me">0(s)</p>

                                            </div>

                                        </div>

                                        <div class="chart-wrapper">

                                            <canvas id="canvas8" style="height:100px !important"></canvas>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row mb-4">

                        <div class="col-md-8">

                            <div class="card">

                                <div class="card-header">

                                    <h3 class='card-heading p-1 pl-3'>district collection</h3>

                                </div>

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-4 col-12">

                                            <div class="pl-3">

                                                <h1 class='mt-5'>21,102</h1>

                                                <p class='text-xs'><span class="text-green"><i data-feather="bar-chart"

                                                            width="15"></i> +19%</span> than last month</p>

                                                <div class="legends">

                                                    <div class="legend d-flex flex-row align-items-center">

                                                        <div class='w-3 h-3 rounded-full bg-info me-2'></div><span

                                                            class='text-xs'>Last Month</span>

                                                    </div>

                                                    <div class="legend d-flex flex-row align-items-center">

                                                        <div class='w-3 h-3 rounded-full bg-blue me-2'></div><span

                                                            class='text-xs'>Current Month</span>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-8 col-12">

                                            <canvas id="bar"></canvas>

                                        </div>

                                    </div>

                                </div>

                            </div>

                           <!-- <div class="card">

                                <div class="card-header d-flex justify-content-between align-items-center">

                                    <h4 class="card-title">ASBCC Users</h4>

                                    <div class="d-flex ">

                                        <i data-feather="download"></i>

                                    </div>

                                </div>

                                <div class="card-body px-0 pb-0">

                                    <div class="table-responsive">

                                        <table class='table mb-0' id="table1">

                                            <thead>

                                                <tr>

                                                    <th>Name</th>

                                                    <th>Email</th>

                                                    <th>Phone</th>

                                                    <th>City</th>

                                                    <th>Status</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <tr>

                                                    <td>Graiden</td>

                                                    <td>vehicula.aliquet@semconsequat.co.uk</td>

                                                    <td>076 4820 8838</td>

                                                    <td>Offenburg</td>

                                                    <td>

                                                        <span class="badge bg-success">Active</span>

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Dale</td>

                                                    <td>fringilla.euismod.enim@quam.ca</td>

                                                    <td>0500 527693</td>

                                                    <td>New Quay</td>

                                                    <td>

                                                        <span class="badge bg-success">Active</span>

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Nathaniel</td>

                                                    <td>mi.Duis@diam.edu</td>

                                                    <td>(012165) 76278</td>

                                                    <td>Grumo Appula</td>

                                                    <td>

                                                        <span class="badge bg-danger">Inactive</span>

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Darius</td>

                                                    <td>velit@nec.com</td>

                                                    <td>0309 690 7871</td>

                                                    <td>Ways</td>

                                                    <td>

                                                        <span class="badge bg-success">Active</span>

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Ganteng</td>

                                                    <td>velit@nec.com</td>

                                                    <td>0309 690 7871</td>

                                                    <td>Ways</td>

                                                    <td>

                                                        <span class="badge bg-success">Active</span>

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Oleg</td>

                                                    <td>rhoncus.id@Aliquamauctorvelit.net</td>

                                                    <td>0500 441046</td>

                                                    <td>Rossignol</td>

                                                    <td>

                                                        <span class="badge bg-success">Active</span>

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Kermit</td>

                                                    <td>diam.Sed.diam@anteVivamusnon.org</td>

                                                    <td>(01653) 27844</td>

                                                    <td>Patna</td>

                                                    <td>

                                                        <span class="badge bg-success">Active</span>

                                                    </td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="card ">

                                <div class="card-header">

                                    <h4>Your collections</h4>

                                </div>

                                <div class="card-body">

                                    <div id="radialBars"></div>

                                    <div class="text-center mb-5">

                                        <h6>From last month</h6>

                                        <h1 class='text-green'>+50 collections</h1>

                                    </div>

                                </div>

                            </div>

                            <div class="card widget-todo">

                                <div

                                    class="card-header border-bottom d-flex justify-content-between align-items-center">

                                    <h4 class="card-title d-flex">

                                        <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Progress

                                    </h4>



                                </div>

                                <div class="card-body px-0 py-1">

                                    <table class='table table-borderless'>

                                        <tr>

                                            <td class='col-3'>User 1</td>

                                            <td class='col-6'>

                                                <div class="progress progress-info">

                                                    <div class="progress-bar" role="progressbar" style="width: 60%"

                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>

                                                </div>

                                            </td>

                                            <td class='col-3 text-center'>60%</td>

                                        </tr>

                                        <tr>

                                            <td class='col-3'>User 2</td>

                                            <td class='col-6'>

                                                <div class="progress progress-success">

                                                    <div class="progress-bar" role="progressbar" style="width: 35%"

                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>

                                                </div>

                                            </td>

                                            <td class='col-3 text-center'>30%</td>

                                        </tr>

                                        <tr>

                                            <td class='col-3'>User 3</td>

                                            <td class='col-6'>

                                                <div class="progress progress-danger">

                                                    <div class="progress-bar" role="progressbar" style="width: 50%"

                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>

                                                </div>

                                            </td>

                                            <td class='col-3 text-center'>50%</td>

                                        </tr>

                                        <tr>

                                            <td class='col-3'>User 4</td>

                                            <td class='col-6'>

                                                <div class="progress progress-primary">

                                                    <div class="progress-bar" role="progressbar" style="width: 80%"

                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>

                                                </div>

                                            </td>

                                            <td class='col-3 text-center'>80%</td>

                                        </tr>

                                        <tr>

                                            <td class='col-3'>User 5</td>

                                            <td class='col-6'>

                                                <div class="progress progress-secondary">

                                                    <div class="progress-bar" role="progressbar" style="width: 65%"

                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>

                                                </div>

                                            </td>

                                            <td class='col-3 text-center'>65%</td>

                                        </tr>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>-->

            </div>



            <footer>

                <div class="footer clearfix mb-0 text-muted">

                    <div class="float-start">

                        <p>2021 &copy; Asbcc</p>

                    </div>

                    <div class="float-end">

                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a

                                href="https://techforall.co.ls/">Tech4All</a></p>

                    </div>

                </div>

            </footer>

        </div>

    </div>

    <script src="assets/js/feather-icons/feather.min.js"></script>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="assets/js/app.js"></script>
    <script src="assets/vendors/dayjs/dayjs.min.js"></script>
    <script src="assets/vendors/chartjs/Chart.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>

    <script src="assets/js/jquery-3.4.1.min.js"></script>

 <script src="assets/js/main.js"></script>

  <script src="assets/js/pages/dashboard.js"></script>

 



</body>



</html>