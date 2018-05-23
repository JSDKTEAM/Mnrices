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
            $check = Department::insert($depName);
            header("Location: index.php?controller=dep&action=index_dep&check=$check");
        }
        public function updateDep()
        {
            $depID = $_REQUEST['depID'];
            $depName = $_REQUEST['depName'];
            $check = Department::update($depID,$depName);
            if($check)
            {
				header("Location: index.php?controller=dep&action=index_dep&check=$check");
            }
        }
        public function deletedep()
        {
            $depID = $_REQUEST['depID'];
            $check = Department::delete($depID);
            if($check)
            {
                header("Location: index.php?controller=dep&action=index_dep&check=$check");
            }
            else
            {
                header("Location: index.php?controller=dep&action=index_dep");
            }
        }
    }
?>