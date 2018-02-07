<?php
    class UserController
    {
        public function index_userMm()
        {
            $department_list = Department::getAll();
            require_once('views/userMm/index_userMm.php');
        }
    }
?>