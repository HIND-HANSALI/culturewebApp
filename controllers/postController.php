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
      // ,$_SESSION["id"]
        
        if(isset($_POST['savePost'])){
          $image=$this->uploadimage();
            extract($_POST);
            $result=$this->addPostDB($title,$content,$categorie,$image,$_SESSION["id"]);
            if($result==1){
              header('location:../pages/post.php');
            }

           
        }

    }
    public function updatePost(){

      if(isset($_POST['updatePostForm'])){
        
        extract($_POST);
        $image=$this->uploadimage();
        $result=$this->updatePostDB($id,$title,$content,$categorie,$image);
        if($result==1){
          // echo 'tfou hii';
        }
      }
    }
    
    public function deletePost(){
    
      if(isset($_GET['ide'])){
        
        $result=$this->deletePostDB($_GET['ide']);
        
    
      }
    }


    public function uploadimage()
    {
     if (isset($_FILES['my_image']))
    {
    
        // global $conn;

        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];// temporer folder
        $error = $_FILES['my_image']['error'];

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
    }
    
    return $new_img_name;
} 

      

}

?>