<?php
include_once('../model/post.php');
// require_once dirname(__DIR__).'post.php';




class PostController extends Post{

    public function getPosts(){
        $result = $this -> getPostsDB();
        return $result;
    }
    public function getmyPosts(){
      $result = $this -> getmyPostsDB($_SESSION["id"]);
      return $result;
    }

    
    // public function getOnePost(){
    //     if(isset($_GET['id'])){
    //         $result = $this->getOnePostDB($_GET['id']);
    //         return $result;
    //     } 
    // }
 
    public function addPost(){



        if(isset($_POST['savePost'])){
          // echo "<pre>";
          // print_r($_FILES['my_image']);
          // echo "</pre>";
          for($i = 0 ; $i <count($_POST['title'])  ; $i++){
            
            $image=$this->uploadimage($_FILES['my_image'] , $i);

            $result=$this->addPostDB($_POST['title'][$i],$_POST['content'][$i],$_POST['categorie'][$i],$image, $_SESSION["id"]);
            if($result==1){
              header('location:../pages/post.php');
            }

            // $result=$this->addPostDB($title,$content,$categorie,$image,$_SESSION["id"]);

            }

           
        }

    }
    public function updatePost(){

      if(isset($_POST['updatePostForm'])){
        

        
        // extract();

        
        $i=0;
        if($_FILES['my_image']['name'][0]  ==""){
          
          
          $result=$this->updatePostwithoutpicDB($_POST['id'][$i],$_POST['title'][$i],$_POST['content'][$i],$_POST['categorie'][$i]);
          // $result=$this->addPostDB($_POST['title'][$i],$_POST['content'][$i],$_POST['categorie'][$i],$image, $_SESSION["id"]);

        }else{
          $image=$this->uploadimage($_FILES['my_image'] , 0);
        $result=$this->updatePostDB($_POST['id'][$i],$_POST['title'][$i],$_POST['content'][$i],$_POST['categorie'][$i],$image);
        // $result=$this->updatePostwithoutpicDB($_POST['id'][$i],$_POST['title'][$i],$_POST['content'],$_POST['categorie'][$i]);
      }
        if($result==1){
          // echo 'hii';
        }
      }
    }
    
    public function deletePost(){
    
      if(isset($_GET['ide'])){
        
        $result=$this->deletePostDB($_GET['ide']);
        
    
      }
    }


    public function uploadimage($image , $index)
    {
    //  if (isset($_FILES['my_image']))
    {
        // global $conn;

      $img_name = $image['name'][$index];
      $img_size = $image['size'][$index];
      $tmp_name = $image['tmp_name'][$index];// temporer folder
      $error = $image['error'][$index];
    if($img_name !=""){
            if ($error === 0)
            {
             
                if ($img_size > 30000000000) 
                {
                    $_SESSION['Error'] = "Sorry, your file is too large.";
                    //  header('location: .././pages/home.php');
                }
                else
                {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);// return extension of image
                    $img_ex_lc = strtolower($img_ex);

                    $allowed_exs = array("jpg", "jpeg", "png","jfif"); 

                        if (in_array($img_ex_lc, $allowed_exs)) 
                        {
                            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                            $img_upload_path = '../assets/uploads/'.$new_img_name;
                            move_uploaded_file($tmp_name, $img_upload_path);//temporer vers  folder
                        }
                        else {
                            $_SESSION['Error'] = "You can't upload files of this type";
                            // header('location: .././pages/home.php'); 
                        }
                }
                }
            else
            {
                $_SESSION['Error'] = 'unknown error occurred!';
                // header('location: .././pages/home.php'); 
                
            }
          } else $new_img_name ='';
    }
    
    return $new_img_name;
} 

      

}
