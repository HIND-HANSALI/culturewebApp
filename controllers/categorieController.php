<?php
include_once('../model/categorie.php');




class CategorieController extends Categorie{
    public function getCategories(){
        $result = $this -> getCategoriesDB();
        return $result;

    }
    public function addCategories(){
        if(isset($_POST['saveCategorie'])){
            extract($_POST);
        $result = $this -> addCategorieDB($title);
        if($result==1){
            header('location:../pages/categorie.php');
          }

    }
    }
    public function updateCategorie(){
        if (isset($_POST['updateCategorieForm'])){
            extract($_POST);
            $result=$this->updateCategorieDB($id,$title);
            if($result==1){
                header('location:../pages/categorie.php');
              }
        }
    }
    public function deleteCategories(){
        if(isset($_GET['idc'])){
        
            $result=$this->deleteCategorieDB($_GET['idc']);
            if($result==1){
                header('location:../pages/categorie.php');
            }
        }

    }

}