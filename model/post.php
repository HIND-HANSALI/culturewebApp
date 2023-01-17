<?php

require_once 'database.php';

class Post extends Database{
    
    protected function getPostsDB(){

        $sql = "SELECT * FROM posts ";
    $sql="SELECT posts.*,categories.title as nameCategorie FROM `posts` INNER JOIN categories on categories.id=posts.categorie_id";
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
    protected function addPostDB($title,$content,$categorie){

        $sql = "INSERT INTO posts (title,content,categorie_id) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title,$content,$categorie]);
        // $stmt->close();
        // $stmt=null;
        return 1;
    }

    protected function deletePostDB($id){

        $sql = "DELETE FROM posts WHERE id = ?";
        $stmt = $this->connect() ->prepare($sql);
        $stmt->execute([$id]);
        return 1;
    }


}

// if(isset($_GET['ide'])){
//     echo 'tfouuu';
//     $post=new Post();
//     $result=$post->deletePostDB($_GET['ide']);
    

//   }



?>