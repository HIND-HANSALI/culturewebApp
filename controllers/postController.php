<?php
include_once('../model/post.php');
// require_once dirname(__DIR__).'post.php';



class PostController extends Post{

    public function getPosts(){
        $result = $this -> getPostsDB();
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
           
            extract($_POST);
            $result=$this->addPostDB($title,$content,$categorie);
            if($result==1){
              header('location:../pages/post.php');
            }
           
        }

    }
    public function updatePost(){

      if(isset($_POST['updatePostForm'])){
        // echo   'hii';
        extract($_POST);
        echo($id);
        $result=$this->updatePostDB($id,$title,$content,$categorie);
        if($result==1){
          echo 'tfou hii';
        }
      }
    }
    
    public function deletePost(){
    
      if(isset($_GET['ide'])){
        
        $result=$this->deletePostDB($_GET['ide']);
        
    
      }
    }
}

?>