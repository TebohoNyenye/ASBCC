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
        die("Redirecting to login"); 
    } 
     
    // Everything below this point in the file is secured by the login system 
     
    // We can retrieve a list of members from the database using a SELECT query. 
    // In this case we do not have a WHERE clause because we want to select all 
    // of the rows from the database table. 
    $query = " 
        SELECT 
            id, 
            username, 
            email 
        FROM users 
    "; 
     
    try 
    { 
        // These two statements run the query against your database table. 
        $stmt = $db->prepare($query); 
        $stmt->execute(); 
    } 
    catch(PDOException $ex) 
    { 
        // Note: On a production website, you should not output $ex->getMessage(). 
        // It may provide an attacker with helpful information about your code.  
        die("Failed to run query: " . $ex->getMessage()); 
    } 
         
    // Finally, we can retrieve all of the found rows into an array using fetchAll 
    $rows = $stmt->fetchAll(); 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASBCC Dashboard</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.2/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.js"></script>
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
                                        <div>
                                            <div id ="noti">
                                            <h6 class='text-bold'>New Notifications</h6>
                                            
                                        </div>
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
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Users details</h3>
                        
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Themes</li>
                                    <li class="breadcrumb-item active" aria-current="page" onclick="">stunting </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                          ASBCC Users<br>
                        </div>
                        <div class="card-body">
                            <table class='table table-striped' id="table1">
                            <tr> 
        <th>ID</th> 
        <th>Username</th> 
        <th>E-Mail Address</th> 
        <th>Delete</th> 
    </tr> 
    <?php foreach($rows as $row): ?> 
        <tr> 
            <td><?php echo $row['id']; ?></td> <!-- htmlentities is not needed here because $row['id'] is always an integer --> 
            <td><?php echo htmlentities($row['username'], ENT_QUOTES, 'UTF-8'); ?></td> 
            <td><?php echo htmlentities($row['email'], ENT_QUOTES, 'UTF-8'); ?></td> 
            <td><a href="delete.php?id=<?php echo $row['id']; ?>"><i data-feather="trash"></i></a></td> 
        </tr> 
    <?php endforeach; ?> 
                            </table>
                        </div>
                    </div>

                </section>
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
   

    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/me.js"></script>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/jquery-3.4.1.min.js"></script>

    <script>
    
    
    </script>
    
    
</body>

</html>