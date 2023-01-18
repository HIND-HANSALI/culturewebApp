<?php 
include_once('../controllers/categorieController.php');
$CategorieController=new CategorieController();
$AllCategories=$CategorieController->getCategories(); 
$CategorieController->addCategories();
$CategorieController->deleteCategories();
$CategorieController->updateCategorie();
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
                            <h5 class="mb-0" >All Categories</h5>
                        </div>
                        <div class="justify-content-end">
                            <a class="btn rounded-pill btn-success px-lg-3" onclick="" data-bs-toggle="modal" data-bs-target="#categorieModal">
                                <i class="fas fa-plus mr-2"></i>
                                <b>Add Categorie</b>
                            </a>
                        </div>
                    </div>
                  </div>
                  
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        
                                        <th scope="col">title</th>
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
                                                        if(empty($AllCategories))
                                                            echo '<tr class="align-middle"><th class="col-3">No result found.</th> </tr>';
                                                        else{foreach($AllCategories AS $categories){?>
                                   
                                            <tr class="align-middle" id="">
                                                <td class="col-1"><?=$categories['id']; ?></td>
                                                
                                                <td id="CategorieTitle<?= $categories['id']; ?>" class="text-nowrap"><?=$categories['title']; ?></td>
                                               
                                                
                                                
                                                <td class="text-end">
                                                <a onclick="GetCategorie('<?= $categories['id']; ?>')" class="btn btn-sm btn-warning" data-bs-toggle='modal' data-bs-target='#categorieModal'>Edit</a>

                                                <a href="categorie.php?idc=<?=$categories['id']; ?>"><span class="btn btn-sm btn-danger">Delete</span></a>
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

 <!-- Categorie MODAL -->
 <div class="modal fade" id="categorieModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mt-3 mb-1">
        <div class="modal-content background ">
            <div class="modal-header">
                <h5 class="" id="TitleModal">Add Categorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 pb-1">
                <form  id="form"  method="POST"  enctype="multipart/form-data">
                <input type="hidden" id="IdInputhidden" name="id" value="" />

               
                  
                    <div class="mb-0">
                        <label class="col-form-label">title</label>
                        <input type="text" class="form-control" id="TitleInput" name="title" />
                        <div id="ValidateTitle"></div>
                    </div>
                    
               
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-outline-light text-black" data-bs-dismiss="modal">Cancel</button>
                        <button id="saveCategorie" type="submit" name="saveCategorie" class="btn btn-primary">Save</button>
                        <div id="editPosts" >
                            <button style="display: none" id="updateCategorie" type="submit" name="updateCategorieForm" class="btn btn-warning text-black">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/app.js"></script>
</body>
</html>