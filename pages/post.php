<?php
include_once('../controllers/postController.php');
// require_once dirname(__DIR__).'postController.php';
$PostController = new PostController();
$PostController->addPost();
// $PostController->deletePost();

$AllPosts=$PostController->getPosts();
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
        <!-- <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-book me-2"></i>CultureWeb</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-edit me-2"></i>Posts</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paste me-2"></i>Categories</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-users me-2"></i>Users</a>
                
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div> -->
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <!-- <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i> -->
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Hind
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

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
                            <h5 class="mb-0" >All Posts</h5>
                        </div>
                        <div class="justify-content-end">
                            <a class="btn rounded-pill btn-success px-lg-3" onclick="" data-bs-toggle="modal" data-bs-target="#postModal">
                                <i class="fas fa-plus mr-2"></i>
                                <b>Add Post</b>
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
                                        <th scope="col">Content</th>
                                        <th scope="col">Categorie</th>
                                        <th class="text-end" scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr class="align-middle" id="">
                                                <td class="col-1">HI</td>
                                                <!-- <th scope="col">Picture</th> -->
                                                <td id="" class="text-nowrap">HH</td>
                                                <td id="" class="text-nowrap">NOO</td>
                                                <td id="" class="text-nowrap">JIII</td>
                                                <td class="text-end">
                                                <a onclick="" class="btn btn-sm btn-warning">Edit</a>
                                                <a href=""><span class="btn btn-sm btn-danger">Delete</span></a>
                                                </td>
                                                
                                            </tr>

                                            <?php 
                                                        if(empty($AllPosts))
                                                            echo '<tr class="align-middle"><th class="col-3">No result found.</th> </tr>';
                                                        else{foreach($AllPosts AS $post){?>
                                   
                                            <tr class="align-middle" id="">
                                                <td class="col-1"><?=$post['id']; ?></td>
                                                <!-- <td class="text-nowrap">
                                                    <img id="" src="" style="width:3rem;"/>
                                                </td> -->
                                                <td id="" class="text-nowrap"><?=$post['title']; ?></td>
                                                <td id="" class="text-nowrap"><?=$post['content']; ?></td>
                                                <td id="" class="text-nowrap"><?=$post['nameCategorie']; ?></td>
                                                
                                                
                                                <td class="text-end">
                                                <a onclick="" class="btn btn-sm btn-warning">Edit</a>

                                                <a href="../controllers/postController.php?ide=<?=$post['id']; ?>"><span class="btn btn-sm btn-danger">Delete</span></a>
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

    <!-- Post MODAL -->
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mt-3 mb-1">
        <div class="modal-content background ">
            <div class="modal-header">
                <h5 class="" id="exampleModalLabel">Add Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 pb-1">
                <form  id="form"  method="POST"  enctype="multipart/form-data">
                <input type="hidden" id="IdInput" name="id" />

                <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" type="file" id="formFile" name="my_image">
                </div>
                <!-- <div class="mb-0">
                                <label class="col-form-label">Picture</label>
                                <input id="PictureInput" class="dropify" data-max-file-size-preview="10M" data-height="100" type="file"  name="my_image"/>
                                <div id="ValidatePicture" class="text-success"></div>
                                
                            </div> -->
                  
                    <div class="mb-0">
                        <label class="col-form-label">title</label>
                        <input type="text" class="form-control" id="TitleInput" name="title" />
                        <div id="ValidateTitle"></div>
                    </div>
                    <div class="mb-0">
                    <label class="form-label">content</label>
                    <input type="text" class="form-control" id="GroupeInput" name="content"/>
                    <div id="ValidateContent" class="text-warning"></div>
                </div> 
                <div class="mb-3">
                    <label class="modal-title my-2" id="exampleModalLabel">Categorie</label>
                    <select class="form-select" id="selectstatus" name="categorie" aria-label="Default select example">
                        <option selected>Please select </option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-outline-light text-black" data-bs-dismiss="modal">Cancel</button>
                        <button id="savePost" type="submit" name="save" class="btn btn-primary">Save</button>
                        <div id="editPosts" style="display: none">
                            <button id="updatePost" type="submit" name="updatePostForm" class="btn btn-warning text-black">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>