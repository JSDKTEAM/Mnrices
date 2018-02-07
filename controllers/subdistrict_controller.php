<?php
    class SubdistrictController{
        public function index_subdistrict()
        {
            $perpage = 200;
            if(isset($_GET['page']))
            {
                $page = $_GET['page'];
            } 
            else
            {
                $page = 1;
            }
            $start = ($page - 1) * $perpage;
            $province_list = Province::getAll(); 
            $subdistrict_list = Subdistrict::getAll($start,$perpage);
            $total_page = Subdistrict::countRow();
            require_once('views/subdistrict/index_subdistrict.php');
        }
    }
?>