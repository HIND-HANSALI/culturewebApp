<?php
require_once 'database.php';

class Post extends Database{
    
    protected function getPostsDB(){

        // $sql = "SELECT * FROM posts ";
    $sql="SELECT posts.*,categories.title as nameCategorie,categories.id as idCategorie FROM `posts` INNER JOIN categories on categories.id=posts.categorie_id";
        $stmt = $this ->connect()->prepare($sql);//sql injection
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    protected function getmyPostsDB($idProfile){
        $sql="SELECT posts.*,categories.title as nameCategorie,categories.id as idCategorie FROM `posts` 
        INNER JOIN categories on categories.id=posts.categorie_id where posts.admin_id=$idProfile";
        $stmt = $this ->connect()->prepare($sql);//sql injection
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;   
    }
    

    // protected function getOnePostDB($id){

    //     $sql = "SELECT posts.*,categories.title as nameCategorie FROM `posts` INNER JOIN categories on categories.id=posts.categorie_id WHERE posts.id = ?";
    //     $stmt = $this ->connect() -> prepare($sql);
    //     $stmt->execute([$id]);
    //     $result = $stmt->fetch();
    //     return $result;
    // }
    protected function addPostDB($title,$content,$categorie,$picture,$admin){
        
        $sql = "INSERT INTO posts (title,content,categorie_id,picture,admin_id) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["$title","$content",$categorie,"$picture",$admin]);
        return 1;
    }

    protected function deletePostDB($id){

        $sql = "DELETE FROM posts WHERE id = ?";
        $stmt = $this->connect() ->prepare($sql);
        $stmt->execute([$id]);
        return 1;
    }
    protected function updatePostwithoutpicDB($id,$title,$content,$categorie){
        $sql ="UPDATE posts SET title=?,content=?,categorie_id=? WHERE id='$id'";  
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title,$content,$categorie]); 
    }

    protected function updatePostDB($id,$title,$content,$categorie,$picture){
        // if($picture==''){
        //     $sql ="UPDATE posts SET title=?,content=?,categorie_id=? WHERE id='$id'";  
        //     $stmt = $this->connect()->prepare($sql);
        //     $stmt->execute([$title,$content,$categorie]); 
        // }else{
        $sql ="UPDATE posts SET title=?,content=?,categorie_id=?,picture=? WHERE id='$id'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title,$content,$categorie,$picture]);
        return 1;}
    // }


}

// if(isset($_GET['ide'])){
//     echo 'tfouuu';
//     $post=new Post();
//     $result=$post->deletePostDB($_GET['ide']);
    

//   }



?>