<?php

namespace App\classes;

require_once 'Database.php';

use App\classes\Database;

class Login
{
    public function adminLoginCheck($data)
    {
        $email = $data['email'];
        $password = md5($data['password']);
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            $user = mysqli_fetch_assoc($queryResult);
            if ($user) {
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];

                header('Location: dashboard.php');
            } else {
                $message = "Please use valid email & password";
                return $message;
            }
        } else {
            die('Query Problem' . mysqli_error(Database::dbConnection()));
        }
    }

    public function adminLogout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['name']);

        header('Location: index.php');
    }

    public function saveCategoryInfo($data)
    {

        $category_name = $data['category_name'];
        $category_description = $data['category_description'];
        $publication_status = $data['publication_status'];

        $insertCategory = "INSERT INTO catagories(category_name,category_description,publication_status) 
                            VALUES ('$category_name', '$category_description','$publication_status')";

        if ($QueryCategoryError = mysqli_query(Database::dbConnection(), $insertCategory)) {
            $succesData =  'Success data Inserted';
            return $succesData;
        } else {
            die('Query Error' . mysqli_error($QueryCategoryError));
        }
    }

    public function saveBlogInfo($data)
    {
        $categoryBlog = $data['category_name'];
        $blog_title = $data['blog_title'];
        $short_description = $data['short_description'];
        $long_description = $data['long_description'];
        $publication_status = $data['publication_status'];


        $insertBlogInfo = "INSERT INTO blogs (category_name, blog_title, short_description, long_description, publication_status)
                            VALUES ('$categoryBlog', '$blog_title', '$short_description', '$long_description', '$publication_status')";

        $QueryCategoryError = mysqli_query(Database::dbConnection(), $insertBlogInfo);

        if ($QueryCategoryError) {
            $succesData =  'Success data Inserted';
            return $succesData;
        }else{
            die('Query Error' . mysqli_error($QueryCategoryError));
        }
    }

    public function getCategoryInfo(){

        $getCategoryQuery = "SELECT * FROM catagories";
        if ($getResult = mysqli_query(Database::dbConnection(),$getCategoryQuery)){
            return $getResult;
        }else{
            die('Query Error' . mysqli_error($getResult));
        }
    }

    public function getBlogInfo(){

        $getBlogsQuery = "SELECT * FROM blogs";
        if ($getResult = mysqli_query(Database::dbConnection(),$getBlogsQuery)){
            return $getResult;
        }else{
            die('Query Error' . mysqli_error($getResult));
        }
    }

    public function getEditCategoryData($id){

        $getEditCategoryQuery = "SELECT * FROM catagories WHERE id=$id";
        if ($getResult = mysqli_query(Database::dbConnection(),$getEditCategoryQuery)){
            return $getResult;
        }else{
            die('Query Error' . mysqli_error($getResult));
        }
    }
    public function updateCategoryInfo($data, $id){
        $category_name = $data['category_name'];
        $category_description = $data['category_description'];
        $publication_status = $data['publication_status'];

        $updateCategoryQuery = "UPDATE catagories SET category_name='$category_name',category_description='$category_description',publication_status='$publication_status' WHERE id=$id";
        if ($updateResult = mysqli_query(Database::dbConnection(),$updateCategoryQuery)){
            header('Location:manage-category.php');
        }else{
            die('Query Error' . mysqli_error($updateResult));
        }
    }

    public function deleteCategoryInfo($id){
        $updateCategoryQuery = "DELETE FROM catagories WHERE id=$id";
        if ($updateResult = mysqli_query(Database::dbConnection(),$updateCategoryQuery)){
            header('Location:manage-category.php');
        }else{
            die('Query Error' . mysqli_error($updateResult));
        }
    }

    public function getEditBlogData($id){

        $getEditBlogQuery = "SELECT * FROM blogs WHERE id=$id";
        if ($getResult = mysqli_query(Database::dbConnection(),$getEditBlogQuery)){
            return $getResult;
        }else{
            die('Query Error' . mysqli_error($getResult));
        }
    }

    public function updateBlogInfo($data, $id){
        $category_name = $data['category_name'];
        $blog_title = $data['blog_title'];
        $short_description = $data['short_description'];
        $long_description = $data['long_description'];
        $publication_status = $data['publication_status'];

        $updateCategoryQuery = "UPDATE blogs SET category_name='$category_name', blog_title='$blog_title',short_description='$short_description',long_description='$long_description',publication_status='$publication_status' WHERE id=$id";
        if ($updateResult = mysqli_query(Database::dbConnection(),$updateCategoryQuery)){
            header('Location:manage-blog.php');
        }else{
            die('Query Error' . mysqli_error($updateResult));
        }
    }

    public function deleteBlogInfo($id){
        $deletBlogQuery = "DELETE FROM blogs WHERE id=$id";
        if ($updateResult = mysqli_query(Database::dbConnection(),$deletBlogQuery)){
            header('Location:manage-blog.php');
        }else{
            die('Query Error' . mysqli_error($updateResult));
        }
    }


}