<?php
    class RiceController{
        public function index_riceDisease()
        {
            $perpage = 10;
            if(isset($_GET['page']))
            {
                $page = $_GET['page'];
            } 
            else
            {
                $page = 1;
            }
            $start = ($page - 1) * $perpage;

            $total_page = Disease::countRowAll();

            $diseaseList = Disease::getAll($start,$perpage);
            require_once('views/riceMm/index_riceDisease.php');
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

        public function  updateDisease()
        {
            $diseaseID = $_REQUEST['diseaseID'];
            $name = $_REQUEST['name'];
            $location = $_REQUEST['location'];
            $symptom = $_REQUEST['symptom'];
            $dispersed = $_REQUEST['dispersed'];
            $prevention = $_REQUEST['prevention'];
            $check = Disease::update($diseaseID,$name,$location,$symptom,$dispersed,$prevention);
			header('location:index.php?controller=rice&action=index_riceDisease');
        }
        public function index_ricePathogen()
        {
            $total_page=0;
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
        public function searchPathogen()
        {
            
            $key=$_REQUEST['key'];
            $perpage = 10;
            if(isset($_GET['page']))
            {
                $page = $_GET['page'];
            } 
            else
            {
                $page = 1;
            }
            $start = ($page - 1) * $perpage;
            $pathogen_list = Pathogen::search($key,$start,$perpage);
            $total_page = Pathogen::countRow($key);
            require_once('views/riceMm/index_ricePathogen.php');
        }
        public function index_riceSpecies()
        {
            $perpage = 10;
            if(isset($_GET['page']))
            {
                $page = $_GET['page'];
            } 
            else
            {
                $page = 1;
            }
            $start = ($page - 1) * $perpage;

            $total_page = Species::countRowAll();

            $speciesList = Species::getAll($start,$perpage);

            require_once('views/riceMm/index_riceSpecies.php');
        }
        public function addSpecies()
        {
        $commonName = $_REQUEST['commonName'];
        $scientificName = $_REQUEST['scientificName'];
        $speciesName = $_REQUEST['speciesName'];
        $type = $_REQUEST['type'];
        $history = $_REQUEST['history'];
        $characteristic = $_REQUEST['characteristic'];
        $productRate = $_REQUEST['productRate'];
        $feature = $_REQUEST['feature'];
        $notice = $_REQUEST['notice'];
        $recommendArea = $_REQUEST['recommendArea'];
        $return = Species::insert($commonName,$scientificName,$speciesName,$type,$history,$characteristic,$productRate,$feature,$notice,$recommendArea);
		header('location:index.php?controller=rice&action=index_riceSpecies');
        }
        public function updateSpecies()
        {
            $speciesID = $_REQUEST['speciesID2'];
            $commonName = $_REQUEST['commonName2'];
            $scientificName = $_REQUEST['scientificName2'];
            $speciesName = $_REQUEST['speciesName2'];
            $type = $_REQUEST['type2'];
            $history = $_REQUEST['history2'];
            $characteristic = $_REQUEST['characteristic2'];
            $productRate = $_REQUEST['productRate2'];
            $feature = $_REQUEST['feature2'];
            $notice = $_REQUEST['notice2'];
            $recommendArea = $_REQUEST['recommendArea2'];
            $result = Species::update($speciesID,$commonName,$scientificName,$speciesName,$type,$history,$characteristic,$productRate,$feature,$notice,$recommendArea);

            if($result)
            {
				header('location:index.php?controller=rice&action=index_riceSpecies');
            }
        }

        public function search_spec()
        {   
            
            $perpage = 10;
            if(isset($_GET['page']))
            {
                $page = $_GET['page'];
            } 
            else
            {
                $page = 1;
            }
            $start = ($page - 1) * $perpage;

            $total_page = Species::countRow($_GET['key']);

                $speciesList = Species::search_spec($_GET['key'],$start,$perpage);
                require_once('views/riceMm/index_riceSpecies.php');     
        }

        public function search_dis()
        {   
            
            $perpage = 10;
            if(isset($_GET['page']))
            {
                $page = $_GET['page'];
            } 
            else
            {
                $page = 1;
            }
            $start = ($page - 1) * $perpage;

            $total_page = Disease::countRow($_GET['key1']);

                $diseaseList = Disease::search_dis($_GET['key1'],$start,$perpage);
                require_once('views/riceMm/index_riceDisease.php');     
        }

        public function index_riceDiseasePathogen()
        {
            $perpage = 10;
            if(isset($_GET['page']))
            {
                $page = $_GET['page'];
            } 
            else
            {
                $page = 1;
            }
            $start = ($page - 1) * $perpage;
            $pathogen_list = Pathogen::getAll($start,$perpage);
            $disease_list = Disease::getAll();
            $pathogen_list = Pathogen::getAll();
            $dp_list = Dp::getAll($start,$perpage);
            $total_page = Dp::countRow();
            require_once('views/riceMm/index_riceDiseasePathogen.php');
        }
        public function addDiseasePathogen()
        {
            $diseaseID = $_REQUEST['diseaseID'];
            $pathogenID = $_REQUEST['pathogenID'];
            $check = Dp::insert($diseaseID,$pathogenID);
            header('location:index.php?controller=rice&action=index_riceDiseasePathogen');
        }
        public function updateDiseasePathogen()
        {
            $diseaseID = $_REQUEST['diseaseID'];
            $pathogenID = $_REQUEST['pathogenID'];
            $check = Dp::update($diseaseID,$pathogenID);
			header('location:index.php?controller=rice&action=index_riceDiseasePathogen');
        }
    }
?>