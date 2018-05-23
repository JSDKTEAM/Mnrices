<?php
    class UserController
    {
        public function index_userMm()
        {
            $department_list = Department::getAll();
            $user_list = User::getAllUser();
            require_once('views/userMm/index_userMm.php');
        }
        public function addUserByAdmin()
        {
            $username = $_POST['userName'];
            $password = $_POST['pass'];
            $firstName = $_POST['fname'];
            $lastname = $_POST['lname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $dep = $_POST['dep'];
            $status = $_POST['status'];
            $check = User::addUserByAdmin($username,$password,$firstName,$lastname,$phone,$email,$status,$dep);
            echo $check;
        }
    }
?>