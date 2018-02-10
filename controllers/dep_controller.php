<?php 
    class DepartmentController
    {
        public function index_dep()
        {
            $dep_list = Department::getAll();
            require_once('views/department/index_dep.php');
        }
        public function addDep()
        {
            $depName = $_REQUEST['depName'];
            $depWMLabel = $_REQUEST['depWMLabel'];
            $check = Department::insert($depName,$depWMLabel);
            header("Location: index.php?controller=dep&action=index_dep&check=$check");
        }
        public function updateDep()
        {
            $depID = $_REQUEST['depID'];
            $depName = $_REQUEST['depName'];
            $depWMLabel = $_REQUEST['depWMLabel'];
            $check = Department::update($depID,$depName,$depWMLabel);
            if($check)
            {
				header("Location: index.php?controller=dep&action=index_dep&check=$check");
            }
        }
    }
?>