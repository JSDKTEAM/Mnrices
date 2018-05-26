<?php
    class SubdistrictController{
        public function index_subdistrict()
        {
            $province_list = Province::getAll(); 
            $subdistrict_list = Subdistrict::getAll();
            require_once('views/subdistrict/index_subdistrict.php');
        }
    }
?>