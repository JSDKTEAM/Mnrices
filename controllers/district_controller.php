<?php
    class DistrictController{
        public function index_district()
        {
            $province_list = Province::getAll();
            $district_list = District::getAll();
            require_once('views/district/index_district.php');
        }
        public function addDistrict()
        {
            $districtName = $_REQUEST['districtName'];
            $provinceID = $_REQUEST['provinceID'];
            $check = District::insert($provinceID,$districtName);
            header('location:index.php?controller=district&action=index_district');
        }
        public function updateDistrict()
        {
            $districtID = $_REQUEST['districtID'];
            $districtName = $_REQUEST['districtName'];
            $provinceID = $_REQUEST['provinceID'];
            $check = District::update($districtID,$provinceID,$districtName);
            header('location:index.php?controller=district&action=index_district');
        }
    }
?>