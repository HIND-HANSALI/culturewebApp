<?php 
include_once('../controllers/userController.php');
session_start();
$UserController=new UserController();
$AllUsers=$UserController->getAdmins();
$UserController->logout();
$UserController->deleteAdmin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../pages/stylee.css" />
    <title>DashboardHIND</title>
    <!-- DataTables -->
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">


</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
      <!--  include ('../include/sidebar.php')  -->
       
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- navbar -->
           <?php include ('../include/navbardash.php')?>
           
            <div class="container-fluid px-4">
                
               
                <div class="row my-5">
                    <!-- search bar -->
                    
                    <div class="d-flex justify-content-end m-2">
                    <div class="input-group rounded w-50 ">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                          <i class="fas fa-search"></i>
                        </span>
                      </div>
                    </div>
                
    
                    
                    <!-- <h3 class="fs-4 mb-3">Recent Orders</h3> -->
                  <div class="card-header border-bottom">
                        
                        
                    <div class=" d-flex justify-content-between">
                        <div class="col-auto align-self-center">
                            <h5 class="mb-0" >All Admins</h5>
                        </div>
                        <!-- <div class="justify-content-end">
                            <a class="btn rounded-pill btn-success px-lg-3" onclick="" data-bs-toggle="modal" data-bs-target="#categorieModal">
                                <i class="fas fa-plus mr-2"></i>
                                <b>Add Categorie</b>
                            </a>
                        </div> -->
                    </div>
                  </div>
                  
                    <div class="mt-4">
                        <table id="usersTable" class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Email</th>

                                        <th class="text-end" scope="col"></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- <tr class="align-middle" id="">
                                                <td class="col-1">HI</td>
                                                
                                                <td id="" class="text-nowrap">HH</td>
                                                <td id="" class="text-nowrap">NOO</td>
                                                <td id="" class="text-nowrap">JIII</td>
                                                <td class="text-end">
                                                <a onclick="" class="btn btn-sm btn-warning">Edit</a>
                                                <a href=""><span class="btn btn-sm btn-danger">Delete</span></a>
                                                </td>
                                                
                                            </tr> -->

                                            <?php 
                                                        if(empty($AllUsers))
                                                            echo '<tr class="align-middle"><th class="col-3">No result found.</th> </tr>';
                                                        else{foreach($AllUsers AS $Users){?>
                                   
                                            <tr class="align-middle" id="">
                                                <td class="col-1"><?=$Users['id']; ?></td>
                                                
                                                <td id="" class="text-nowrap"><?=$Users['username']; ?></td>
                                                <td id="" class="text-nowrap"><?=$Users['email']; ?></td>
                                               
                                               
                                                
                                                
                                                <td class="text-end">
                                              

                                                <a href="users.php?idu=<?=$Users['id']; ?>"><span class="btn btn-sm btn-danger">Delete</span></a>
                                                </td>
                                                
                                            </tr>
                                            <?php  }
                                                     } ?>
                                </tbody>
                            
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>