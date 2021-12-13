<?php 

    // First we execute our common code to connection to the database and start the session 
    require("common.php"); 
     
    // At the top of the page we check to see whether the user is logged in or not 
    if(empty($_SESSION['user'])) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: login"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to login"); 
    } 
     
    // Everything below this point in the file is secured by the login system 
     
    // We can display the user's username to them by reading it from the session array.  Remember that because 
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img class="img-fluid" src="assets/images/logo.png" style="height:60px; width:60px;"/>
                    ASBCC
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



                       


                        <li class="sidebar-item ">
                            <a href="#" class='sidebar-link'>
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
                                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>New Order</h6>
                                            <p class='text-xs'>
                                                An order made by Ahmad Saugi for product Samsung Galaxy S69
                                            </p>
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
                                <div class="d-none d-md-block d-lg-inline-block">Lumela, <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                
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
                            <h3>Reports about themes</h3>
                            <p class="text-subtitle text-muted">Please download the reports of the themes 
                                 <a
                                    href="#">below</a>.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Reports</li>
                                   
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row text-center">
                      <div class="col-md-4">
                        
                        <button class="btn btn-primary" id="Rbutton" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="#multiCollapseExample1"><i data-feather="file-text" width="60"></i><br>Stunting</button>
                      
                      </div>
                      <div class="col-md-4">
                        <button class="btn btn-primary" id="Rbutton" data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="#multiCollapseExample2"><i data-feather="file-text" width="60"></i><br>IYCF</button>
                      </div>
                      <div class="col-md-4">
                        <button class="btn btn-primary" id="Rbutton" data-toggle="collapse" href="#multiCollapseExample3" role="button" aria-expanded="false" aria-controls="#multiCollapseExample3"><i data-feather="file-text" width="60"></i><br>Micronutrient</button>
                      </div>
                      <div class="col-md-4">
                        <button class="btn btn-primary" id="Rbutton" data-toggle="collapse" href="#multiCollapseExample4" role="button" aria-expanded="false" aria-controls="#multiCollapseExample4"><i data-feather="file-text" width="60"></i><br>School feeding</button>
                      </div>
                      <div class="col-md-4">
                        <button class="btn btn-primary" id="Rbutton" data-toggle="collapse" href="#multiCollapseExample5" role="button" aria-expanded="false" aria-controls="#multiCollapseExample5"><i data-feather="file-text" width="60"></i><br>Overweight and obesity</button>
                      </div>
                      <div class="col-md-4">
                        <button class="btn btn-primary" id="Rbutton" data-toggle="collapse" href="#multiCollapseExample6" role="button" aria-expanded="false" aria-controls="#multiCollapseExample6"><i data-feather="file-text" width="60"></i><br>Cash Based</button>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="collapse multi-collapse" id="multiCollapseExample1">
                <section class="section">
                    <div class="card">
                        
                        <div class="card-header">
                            Reports about the data<br>
                            <button class="btn btn-primary" id="download">download Pdf</button>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                            <div class="card" id="invoice">
                                <div class="card-header bg-transparent header-elements-inline">
                                    <h6 class="card-title text-primary text-center">Stunting Report
                                        <br><img class="img-fluid" src="assets/images/logo.png" style="height:60px; width:60px;"/>
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                      
                                      
                                    
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>District</th>
                                                <th>frequencies</th>
                                                <th>percentage</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody id="repo1">
                                         
                                              
                                           
                                        </tbody>
                                    </table>
                           <div class="text-center"><canvas id="myChart" style="width:100%;max-width:600px;"></canvas></div>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>Activity</th>
                                                <th>Mean</th>
                                                <th>Median</th>
                                                <th>Standard deviation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0">Nutrition_awareness_g_drama_social_media</h6> 
                                                </td>
                                                <td>120</td>
                                                <td>180</td>
                                                <td><span class="font-weight-semibold">300</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0">Nutrition_campaigns</h6>
                                                </td>
                                                <td>140</td>
                                                <td>100</td>
                                                <td><span class="font-weight-semibold">240</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0">Establishment_of_nutrition_clubs</h6> 
                                                </td>
                                                <td>250</td>
                                                <td>250</td>
                                                <td><span class="font-weight-semibold">500</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-body"></div>
                                <div class="card-footer"> <span class="text-muted">The Government of Lesotho is intensifying efforts towards improving implementation of nutrition policies and programmed through the Food and Nutrition Coordination Office (FNCO). The efforts are supported by Renewed Efforts Against Child Hunger and Undernutrition (REACH), including the World Food Programmed (WFP), and a number of other local and international development partners.</span> </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </section>
                  </div>

                  <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <section class="section">
                        <div class="card">
                            
                            <div class="card-header">
                                Reports about the data<br>
                                <button class="btn btn-primary" id="download2">download Pdf</button>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                <div class="card" id="invoice2">
                                    <div class="card-header bg-transparent header-elements-inline">
                                        <h6 class="card-title text-primary text-center">Infant and young child feeding Report
                                            <br><img class="img-fluid" src="assets/images/logo.png" style="height:60px; width:60px;"/>
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                          
                                          
                                        
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-lg">
                                            <thead>
                                                <tr>
                                                    <th>District</th>
                                                    <th>frequencies</th>
                                                    <th>percentage</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody id="repo">
                                            
                                                  
                                               
                                            </tbody>
                                        </table>
                                        <div class="text-center"><canvas id="myChart1" style="width:100%;max-width:600px;"></canvas></div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-lg">
                                            <thead>
                                                <tr>
                                                    <th>Activity</th>
                                                    <th>Mean</th>
                                                    <th>Median</th>
                                                    <th>Standard deviation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="mb-0">Nutrition_awareness_g_drama_social_media</h6> 
                                                    </td>
                                                    <td>120</td>
                                                    <td>180</td>
                                                    <td><span class="font-weight-semibold">300</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="mb-0">Nutrition_campaigns</h6>
                                                    </td>
                                                    <td>140</td>
                                                    <td>100</td>
                                                    <td><span class="font-weight-semibold">240</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="mb-0">Establishment_of_nutrition_clubs</h6> 
                                                    </td>
                                                    <td>250</td>
                                                    <td>250</td>
                                                    <td><span class="font-weight-semibold">500</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-body"></div>
                                    <div class="card-footer"> <span class="text-muted">The Government of Lesotho is intensifying efforts towards improving implementation of nutrition policies and programmed through the Food and Nutrition Coordination Office (FNCO). The efforts are supported by Renewed Efforts Against Child Hunger and Undernutrition (REACH), including the World Food Programmed (WFP), and a number of other local and international development partners.</span> </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </section>
                      </div>

                      <div class="collapse multi-collapse" id="multiCollapseExample3">
                        <section class="section">
                            <div class="card">
                                
                                <div class="card-header">
                                    Reports about the data<br>
                                    <button class="btn btn-primary" id="download3">download Pdf</button>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                    <div class="card" id="invoice3">
                                        <div class="card-header bg-transparent header-elements-inline">
                                            <h6 class="card-title text-primary text-center">Micronutrient Defeciencies Report
                                                <br><img class="img-fluid" src="assets/images/logo.png" style="height:60px; width:60px;"/>
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                              
                                              
                                            
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>District</th>
                                                        <th>frequencies</th>
                                                        <th>percentage</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody id="repo3">
                                                
                                                   
                                                </tbody>
                                            </table>
                                            <div class="text-center"><canvas id="myChart2" style="width:100%;max-width:600px;"></canvas></div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Activity</th>
                                                        <th>Mean</th>
                                                        <th>Median</th>
                                                        <th>Standard deviation</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h6 class="mb-0">Nutrition_awareness_g_drama_social_media</h6> 
                                                        </td>
                                                        <td>120</td>
                                                        <td>180</td>
                                                        <td><span class="font-weight-semibold">300</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6 class="mb-0">Nutrition_campaigns</h6>
                                                        </td>
                                                        <td>140</td>
                                                        <td>100</td>
                                                        <td><span class="font-weight-semibold">240</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6 class="mb-0">Establishment_of_nutrition_clubs</h6> 
                                                        </td>
                                                        <td>250</td>
                                                        <td>250</td>
                                                        <td><span class="font-weight-semibold">500</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-body"></div>
                                        <div class="card-footer"> <span class="text-muted">The Government of Lesotho is intensifying efforts towards improving implementation of nutrition policies and programmed through the Food and Nutrition Coordination Office (FNCO). The efforts are supported by Renewed Efforts Against Child Hunger and Undernutrition (REACH), including the World Food Programmed (WFP), and a number of other local and international development partners.</span> </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                          </div>

                          <div class="collapse multi-collapse" id="multiCollapseExample4">
                            <section class="section">
                                <div class="card">
                                    
                                    <div class="card-header">
                                        Reports about the data<br>
                                        <button class="btn btn-primary" id="download4">download Pdf</button>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                        <div class="card" id="invoice4">
                                            <div class="card-header bg-transparent header-elements-inline">
                                                <h6 class="card-title text-primary text-center">School Feeding Report
                                                    <br><img class="img-fluid" src="assets/images/logo.png" style="height:60px; width:60px;"/>
                                                </h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                  
                                                  
                                                
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>District</th>
                                                            <th>frequencies</th>
                                                            <th>percentage</th>
                                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody id="repo4">
                                                       
                                                       
                                                    </tbody>
                                                </table>
                                                <div class="text-center"><canvas id="myChart3" style="width:100%;max-width:600px;"></canvas></div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>Activity</th>
                                                            <th>Mean</th>
                                                            <th>Median</th>
                                                            <th>Standard deviation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h6 class="mb-0">Nutrition_awareness_g_drama_social_media</h6> 
                                                            </td>
                                                            <td>120</td>
                                                            <td>180</td>
                                                            <td><span class="font-weight-semibold">300</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="mb-0">Nutrition_campaigns</h6>
                                                            </td>
                                                            <td>140</td>
                                                            <td>100</td>
                                                            <td><span class="font-weight-semibold">240</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="mb-0">Establishment_of_nutrition_clubs</h6> 
                                                            </td>
                                                            <td>250</td>
                                                            <td>250</td>
                                                            <td><span class="font-weight-semibold">500</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-body"></div>
                                            <div class="card-footer"> <span class="text-muted">The Government of Lesotho is intensifying efforts towards improving implementation of nutrition policies and programmed through the Food and Nutrition Coordination Office (FNCO). The efforts are supported by Renewed Efforts Against Child Hunger and Undernutrition (REACH), including the World Food Programmed (WFP), and a number of other local and international development partners.</span> </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                              </div>

                              <div class="collapse multi-collapse" id="multiCollapseExample5">
                                <section class="section">
                                    <div class="card">
                                        
                                        <div class="card-header">
                                            Reports about the data<br>
                                            <button class="btn btn-primary" id="download5">download Pdf</button>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-md-12">
                                            <div class="card" id="invoice5">
                                                <div class="card-header bg-transparent header-elements-inline">
                                                    <h6 class="card-title text-primary text-center">OverWeight & Obesity Report
                                                        <br><img class="img-fluid" src="assets/images/logo.png" style="height:60px; width:60px;"/>
                                                    </h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                      
                                                      
                                                    
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>District</th>
                                                                <th>frequencies</th>
                                                                <th>percentage</th>
                                                              
                                                            </tr>
                                                        </thead>
                                                        <tbody id="repo5">
                                                            
                                                              
                                                           
                                                        </tbody>
                                                    </table>
                                                    <div class="text-center"><canvas id="myChart4" style="width:100%;max-width:600px;"></canvas></div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <thead>
                                                            <tr>
                                                                <th>Activity</th>
                                                                <th>Mean</th>
                                                                <th>Median</th>
                                                                <th>Standard deviation</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h6 class="mb-0">Nutrition_awareness_g_drama_social_media</h6> 
                                                                </td>
                                                                <td>120</td>
                                                                <td>180</td>
                                                                <td><span class="font-weight-semibold">300</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h6 class="mb-0">Nutrition_campaigns</h6>
                                                                </td>
                                                                <td>140</td>
                                                                <td>100</td>
                                                                <td><span class="font-weight-semibold">240</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h6 class="mb-0">Establishment_of_nutrition_clubs</h6> 
                                                                </td>
                                                                <td>250</td>
                                                                <td>250</td>
                                                                <td><span class="font-weight-semibold">500</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="card-body"></div>
                                                <div class="card-footer"> <span class="text-muted">The Government of Lesotho is intensifying efforts towards improving implementation of nutrition policies and programmed through the Food and Nutrition Coordination Office (FNCO). The efforts are supported by Renewed Efforts Against Child Hunger and Undernutrition (REACH), including the World Food Programmed (WFP), and a number of other local and international development partners.</span> </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                  </div>

                                  <div class="collapse multi-collapse" id="multiCollapseExample6">
                                    <section class="section">
                                        <div class="card">
                                            
                                            <div class="card-header">
                                                Reports about the data<br>
                                                <button class="btn btn-primary" id="download6">download Pdf</button>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-md-12">
                                                <div class="card" id="invoice6">
                                                    <div class="card-header bg-transparent header-elements-inline">
                                                        <h6 class="card-title text-primary text-center">Cashed Based Transfer Report
                                                            <br><img class="img-fluid" src="assets/images/logo.png" style="height:60px; width:60px;"/>
                                                        </h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                          
                                                          
                                                        
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-lg">
                                                            <thead>
                                                                <tr>
                                                                    <th>District</th>
                                                                    <th>frequencies</th>
                                                                    <th>percentage</th>
                                                                  
                                                                </tr>
                                                            </thead>
                                                            <tbody id="repo2">
                                                             
                                                               
                                                            </tbody>
                                                        </table>
                                                        <div class="text-center"><canvas id="myChart5" style="width:100%;max-width:600px;"></canvas></div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-lg">
                                                            <thead>
                                                                <tr>
                                                                    <th>Activity</th>
                                                                    <th>Mean</th>
                                                                    <th>Median</th>
                                                                    <th>Standard deviation</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <h6 class="mb-0">Nutrition_awareness_g_drama_social_media</h6> 
                                                                    </td>
                                                                    <td>120</td>
                                                                    <td>180</td>
                                                                    <td><span class="font-weight-semibold">300</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <h6 class="mb-0">Nutrition_campaigns</h6>
                                                                    </td>
                                                                    <td>140</td>
                                                                    <td>100</td>
                                                                    <td><span class="font-weight-semibold">240</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <h6 class="mb-0">Establishment_of_nutrition_clubs</h6> 
                                                                    </td>
                                                                    <td>250</td>
                                                                    <td>250</td>
                                                                    <td><span class="font-weight-semibold">500</span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="card-body"></div>
                                                    <div class="card-footer"> <span class="text-muted">The Government of Lesotho is intensifying efforts towards improving implementation of nutrition policies and programmed through the Food and Nutrition Coordination Office (FNCO). The efforts are supported by Renewed Efforts Against Child Hunger and Undernutrition (REACH), including the World Food Programmed (WFP), and a number of other local and international development partners.</span> </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                      </div>
            </div>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start"><!---->
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
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/me.js"></script>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="assets/js/app.js"></script>
    <!--<script src="assets/js/pages/dashboard.js"></script>-->
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/pdf.js"></script>

    <script>

var xValues = [];
var yValues = [];

var xValues1 = [];
var yValues1 = [];

var xValues2 = [];
var yValues2 = [];

var xValues3 = [];
var yValues3 = [];

var xValues4 = [];
var yValues4 = [];

var xValues5 = [];
var yValues5 = [];

 $.ajax({
      url: "assets/js/getstuntreports.php",
      contentType: "application/json",
      dataType: 'json',
      async: 'false',
      success: function(result){
         console.log(result);
          var arr = Object.values(result);
          
          console.log(arr);
         console.log(arr[2][3].data.responses);
         console.log(arr[2][3].data.percentages);
         //console.log(arr[2][3].responses);
         //var are=arr.length ;
        var d = arr[2][3].data.responses;
         console.log(d.length);
         var districts= [];
         var percentage = [];
         var frequencies =[];
         
         for(var i=0;i<d.length;i++){
         districts= arr[2][3].data.responses[i];
         percentage = arr[2][3].data.percentages[i];
         frequencies = arr[2][3].data.frequencies[i];
         $('#repo1').append('<tr><td><h6 class="mb-0">'+districts+'</h6></td><td>'+frequencies+'</td><td>'+percentage+'</td></tr><tr>');
         console.log(districts);    
         xValues.push(districts);
         yValues.push(percentage);
          graph(); 
         }
         
      }

  })

  $.ajax({
      url: "assets/js/pages/getInfantReport.php",
      contentType: "application/json",
      dataType: 'json',
      async: 'false',
      success: function(result){
         console.log(result);
          var arr = Object.values(result);
          
          console.log(arr);
         console.log(arr[2][3].data.responses);
         console.log(arr[2][3].data.percentages);
         //console.log(arr[2][3].responses);
         //var are=arr.length ;
        var d = arr[2][3].data.responses;
         console.log(d.length);
         var districts= [];
         var percentage = [];
         var frequencies =[];
         
         for(var i=0;i<d.length;i++){
         districts= arr[2][3].data.responses[i];
         percentage = arr[2][3].data.percentages[i];
         frequencies = arr[2][3].data.frequencies[i];
         $('#repo').append('<tr><td><h6 class="mb-0">'+districts+'</h6></td><td>'+frequencies+'</td><td>'+percentage+'</td></tr><tr>');
         console.log(districts);    
         xValues1.push(districts);
         yValues1.push(percentage);
          graph1(); 
         }
         
      }
    })

    $.ajax({
      url: "assets/js/pages/getMicroNutritionReport.php",
      contentType: "application/json",
      dataType: 'json',
      async: 'false',
      success: function(result){
         console.log(result);
          var arr = Object.values(result);
          
          console.log(arr);
         console.log(arr[2][2].data.responses);
         console.log(arr[2][2].data.percentages);
         //console.log(arr[2][3].responses);
         //var are=arr.length ;
        var d = arr[2][2].data.responses;
         console.log(d.length);
         var districts= [];
         var percentage = [];
         var frequencies =[];
         
         for(var i=0;i<d.length;i++){
         districts= arr[2][2].data.responses[i];
         percentage = arr[2][2].data.percentages[i];
         frequencies = arr[2][2].data.frequencies[i];
         $('#repo3').append('<tr><td><h6 class="mb-0">'+districts+'</h6></td><td>'+frequencies+'</td><td>'+percentage+'</td></tr><tr>');
         console.log(districts);    
         xValues2.push(districts);
         yValues2.push(percentage);
          graph2(); 
         }
         
      }

  })

  $.ajax({
      url: "assets/js/pages/getSchoolReport.php",
      contentType: "application/json",
      dataType: 'json',
      async: 'false',
      success: function(result){
         console.log(result);
          var arr = Object.values(result);
          
          console.log(arr);
         console.log(arr[2][2].data.responses);
         console.log(arr[2][2].data.percentages);
         //console.log(arr[2][3].responses);
         //var are=arr.length ;
        var d = arr[2][2].data.responses;
         console.log(d.length);
         var districts= [];
         var percentage = [];
         var frequencies =[];
         
         for(var i=0;i<d.length;i++){
         districts= arr[2][2].data.responses[i];
         percentage = arr[2][2].data.percentages[i];
         frequencies = arr[2][2].data.frequencies[i];
         $('#repo4').append('<tr><td><h6 class="mb-0">'+districts+'</h6></td><td>'+frequencies+'</td><td>'+percentage+'</td></tr><tr>');
         console.log(districts);    
         xValues3.push(districts);
         yValues3.push(percentage);
          graph3(); 
         }
         
      }

  })

  $.ajax({
      url: "assets/js/pages/getObesityReport.php",
      contentType: "application/json",
      dataType: 'json',
      async: 'false',
      success: function(result){
         console.log(result);
          var arr = Object.values(result);
          
          console.log(arr);
         console.log(arr[2][2].data.responses);
         console.log(arr[2][2].data.percentages);
         //console.log(arr[2][3].responses);
         //var are=arr.length ;
        var d = arr[2][2].data.responses;
         console.log(d.length);
         var districts= [];
         var percentage = [];
         var frequencies =[];
         
         for(var i=0;i<d.length;i++){
         districts= arr[2][2].data.responses[i];
         percentage = arr[2][2].data.percentages[i];
         frequencies = arr[2][2].data.frequencies[i];
         $('#repo5').append('<tr><td><h6 class="mb-0">'+districts+'</h6></td><td>'+frequencies+'</td><td>'+percentage+'</td></tr><tr>');
         console.log(districts);    
         xValues4.push(districts);
         yValues4.push(percentage);
          graph4(); 
         }
         
      }

  })

  $.ajax({
      url: "assets/js/pages/getCashBasedReport.php",
      contentType: "application/json",
      dataType: 'json',
      async: 'false',
      success: function(result){
         console.log(result);
          var arr = Object.values(result);
          
          console.log(arr);
         console.log(arr[2][2].data.responses);
         console.log(arr[2][2].data.percentages);
         //console.log(arr[2][3].responses);
         //var are=arr.length ;
        var d = arr[2][2].data.responses;
         console.log(d.length);
         var districts= [];
         var percentage = [];
         var frequencies =[];
         
         for(var i=0;i<d.length;i++){
         districts= arr[2][2].data.responses[i];
         percentage = arr[2][2].data.percentages[i];
         frequencies = arr[2][2].data.frequencies[i];
         $('#repo2').append('<tr><td><h6 class="mb-0">'+districts+'</h6></td><td>'+frequencies+'</td><td>'+percentage+'</td></tr><tr>');
         console.log(districts);    
         xValues5.push(districts);
         yValues5.push(percentage);
          graph5(); 
         }
         
      }

  })


  function graph(){

var barColors = [
"#b91d47",
"#00aba9",
"#2b5797",
"#e8c3b9",
"#1e7145"
];

new Chart("myChart", {
type: "pie",
data: {
labels: xValues,
datasets: [{
  backgroundColor: barColors,
  data: yValues
}]
},
options: {
title: {
  display: true,
  text: "ASBCC District Performance"
}
}
});

}

function graph1(){

var barColors = [
"#b91d47",
"#00aba9",
"#2b5797",
"#e8c3b9",
"#1e7145"
];

new Chart("myChart1", {
type: "pie",
data: {
labels: xValues1,
datasets: [{
  backgroundColor: barColors,
  data: yValues1
}]
},
options: {
title: {
  display: true,
  text: "ASBCC District Performance"
}
}
});

}


function graph2(){

var barColors = [
"#b91d47",
"#00aba9",
"#2b5797",
"#e8c3b9",
"#1e7145"
];

new Chart("myChart2", {
type: "pie",
data: {
labels: xValues2,
datasets: [{
  backgroundColor: barColors,
  data: yValues2
}]
},
options: {
title: {
  display: true,
  text: "ASBCC District Performance"
}
}
});

}

function graph3(){

var barColors = [
"#b91d47",
"#00aba9",
"#2b5797",
"#e8c3b9",
"#1e7145"
];

new Chart("myChart3", {
type: "pie",
data: {
labels: xValues3,
datasets: [{
  backgroundColor: barColors,
  data: yValues3
}]
},
options: {
title: {
  display: true,
  text: "ASBCC District Performance"
}
}
});

}

function graph4(){

var barColors = [
"#b91d47",
"#00aba9",
"#2b5797",
"#e8c3b9",
"#1e7145"
];

new Chart("myChart4", {
type: "pie",
data: {
labels: xValues4,
datasets: [{
  backgroundColor: barColors,
  data: yValues4
}]
},
options: {
title: {
  display: true,
  text: "ASBCC District Performance"
}
}
});

}


function graph5(){

var barColors = [
"#b91d47",
"#00aba9",
"#2b5797",
"#e8c3b9",
"#1e7145"
];

new Chart("myChart5", {
type: "pie",
data: {
labels: xValues5,
datasets: [{
  backgroundColor: barColors,
  data: yValues5
}]
},
options: {
title: {
  display: true,
  text: "ASBCC District Performance"
}
}
});

}
    
    </script>
    
    
</body>

</html>