<?php
include_once('../controllers/postController.php');
include_once('../controllers/categorieController.php');
include_once('../controllers/userController.php');
session_start();

if(!isset($_SESSION['good'])){
    header("location: ../pages/login.php");
 }
// die(var_dump($_SESSION));
// require_once dirname(__DIR__).'postController.php';
$PostController = new PostController();


$PostController->addPost();
$PostController->updatePost();
$PostController->deletePost();
$AllPosts=$PostController->getPosts();

$CategorieController=new CategorieController();
$AllCategories=$CategorieController->getCategories();


$UserController=new UserController();
$UserController->logout();


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
    <title>Dashboard hind</title>
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
            <div class="row g-3 my-2">
                <!-- cards statistics -->
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?= count($PostController->getPosts()) ?></h3>
                                <p class="fs-5">Posts</p>
                            </div>
                            <!-- <i class="fas fa-paste fs-1 primary-text border rounded-full secondary-bg p-3"></i> -->
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?= count($CategorieController->getCategories()) ?></h3>
                                <p class="fs-5">Categories</p>
                            </div>
                            <!-- <i
                                class="fas fa-edit fs-1 primary-text border rounded-full secondary-bg p-3"></i> -->
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                            
                                <h3 class="fs-2"><?= count($PostController->getmyPosts()) ?></h3>
                                <p class="fs-5">My Posts</p>
                            </div>
                            <!-- <i class="fas fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i> -->
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?=count($UserController->getAdmins())?></h3>
                                <p class="fs-5">Admins</p>
                            </div>
                            <!-- <i class="fas fa-chalkboard-teacher fs-1 primary-text border rounded-full secondary-bg p-3"></i> -->
                        </div>
                    </div>
                </div>
                
               
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
                                        <th scope="col">Picture</th>
                                        <th scope="col">title</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Categorie</th>
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
                                                        if(empty($AllPosts))
                                                            echo '<tr class="align-middle"><th class="col-3">No result found.</th> </tr>';
                                                        else{foreach($AllPosts AS $post){?>
                                   
                                            <tr class="align-middle" id="">
                                                <td class="col-1"><?=$post['id']; ?></td>
                                                <td class="text-nowrap"> 
                                                 <!-- $post['picture']; -->
                                                    <img id="" src="../assets/uploads/'.<?= $post['picture']; ?>.'" style="width:3rem;"/>
                                                </td>
                                                <td id="PostTitle<?= $post['id']; ?>" class="text-nowrap"><?=$post['title']; ?></td>
                                                <td id="PostContent<?= $post['id']; ?>" class="text-nowrap"><?=$post['content']; ?></td>
                                                <td id="PostCategorie<?= $post['id']; ?>" class="text-nowrap"><?=$post['nameCategorie']; ?></td>
                                                
                                                
                                                <td class="text-end">
                                                <a onclick="Getpost('<?= $post['id']; ?>','<?= $post['idCategorie']; ?>')" class="btn btn-sm btn-warning" data-bs-toggle='modal' data-bs-target='#postModal'>Edit</a>

                                                <a href="post.php?ide=<?=$post['id']; ?>"><span class="btn btn-sm btn-danger">Delete</span></a>
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
                <h5 class="" id="TitleModal">Add Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 pb-1">
                <form  id="form"  method="POST"  enctype="multipart/form-data">
                <input type="hidden" id="IdInputhidden" name="id" value="" />

                <div class="mb-3">
                <label for="formFile" class="form-label">Picture</label>
                <input class="form-control" type="file" id="formFile" name="my_image">
                </div>
                  
                <div class="mb-3">
                        <label class="col-form-label">title</label>
                        <input type="text" class="form-control" id="TitleInput" name="title" />
                        <div id="ValidateTitle"></div>
                    </div>
                <div class="mb-3">
                    <label for="FormControlTextarea1">Example content</label>
                    <textarea class="form-control" id="tiny"  name="content" rows="3"></textarea>
                </div>
                <!-- <div class="mb-0">
                    <label class="form-label">content</label>
                    <input type="text" class="form-control" id="ContentInput" name="content"/>
                    <div id="ValidateContent" class="text-warning"></div>
                </div>  -->
                <div class="mb-3">
                    <label class="modal-title my-2" id="exampleModalLabel">Categorie</label>
                    <select class="form-select" id="CategorieInput" name="categorie" aria-label="Default select example">
                        <option selected>Please select </option>    
                        <?php foreach($AllCategories AS $categorie){
                        echo '<option value="'.$categorie['id'].'">'.$categorie['title'].'</option>';
                                    }?>
                        <!-- <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option> -->
                    </select>
                </div>
                    <div class="modal-footer">
                    <span id="savePosts" onclick="multiSave()" name="savePosts" class="btn btn-primary">Save Other</span>
                        <button type="reset" class="btn btn-outline-light text-black" data-bs-dismiss="modal">Cancel</button>
                        <button id="savePost" type="submit" name="savePost" class="btn btn-primary">Save</button>
                        <div id="editPosts" >
                            <button style="display: none" id="updatePost" type="submit" name="updatePostForm" class="btn btn-warning text-black">Update</button>
                        </div>
                    </div>
                </form>
            </div>


      <div id="anothetModel">
      
      </div>
    </div>
    
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script> -->


    <!-- Tiny Script -->
    <script src="/path/to/tinymce.min.js"></script>
      <script>
        tinymce.init({
          selector: 'textarea#tiny'
        });
      </script>
      <script>$(document).on('focusin', function(e) {
        if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
          e.stopImmediatePropagation();
        }
      });</script>
      <script>// Prevent Bootstrap dialog from blocking focusin
        document.addEventListener('focusin', (e) => {
          if (e.target.closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
            e.stopImmediatePropagation();
          }
        });</script>

    <script src="../assets/js/app.js"></script>
</body>

</html>