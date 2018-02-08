<?php
    class RiceController{
        public function index_riceDisease()
        {
            require_once('views/riceMm/index_riceDisease.php');
        }
        public function index_ricePathogen()
        {
            $pathogen_list = Pathogen::getAll();
            require_once('views/riceMm/index_ricePathogen.php');
        }
        public function addPathogen()
        {
            $commonName = $_REQUEST['commonName'];
            $scientificName = $_REQUEST['scientificName'];
            $type = $_REQUEST['type'];
            $description = $_REQUEST['description'];
            $check = Pathogen::insert($commonName,$scientificName,$type,$description);
            header('location:index.php?controller=rice&action=index_ricePathogen');
        }
        public function updatePathogen()
        {
            $pathogenID = $_REQUEST['pathogenID'];
            $commonName = $_REQUEST['commonName'];
            $scientificName = $_REQUEST['scientificName'];
            $type = $_REQUEST['type'];
            $description = $_REQUEST['description'];
            $check = Pathogen::update($pathogenID,$commonName,$scientificName,$type,$description);
            header('location:index.php?controller=rice&action=index_ricePathogen');
        }
        public function index_riceSpecies()
        {
            require_once('views/riceMm/index_riceSpecies.php');
        }
        public function addDisease()
        {
            $name = $_REQUEST['name'];
            $location = $_REQUEST['location'];
            $symptom = $_REQUEST['symptom'];
            $dispersed = $_REQUEST['dispersed'];
            $prevention = $_REQUEST['prevention'];
            $check = Disease::insert($name,$location,$symptom,$dispersed,$prevention);
            header('location:index.php?controller=rice&action=index_riceDisease');
        }
    }
?>