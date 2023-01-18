<?php

require_once 'database.php';

class Categorie extends Database{
    
    protected function getCategoriesDB(){
        $sql="SELECT * FROM categories";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;

    }
    protected function addCategorieDB($title){
        $sql="INSERT INTO categories (title) VALUES (?)";
        $stmt = $this ->connect()->prepare($sql);
        $stmt->execute([$title]);
        return 1;
    }
    protected function updateCategorieDB($id,$title){
        $sql="UPDATE categories SET title='$title' WHERE id= ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return 1;
    }
    protected function deleteCategorieDB($id){
        
        $sql="DELETE FROM categories WHERE id= ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return 1;
    }
}