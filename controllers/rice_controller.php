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
        public function deleteDisease()
        {
            $check = Disease::deleteDisease($_POST['diseaseID']);
            header('location:index.php?controller=rice&action=index_riceDisease');
        }
        public function index_ricePathogen()
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
            $total_page=Pathogen::countRowAll();
            $pathogen_list = Pathogen::getAll($start,$perpage);
            require_once('views/riceMm/index_ricePathogen.php');
        }
        public function addPathogen()
        {
            $commonName = $_REQUEST['commonName'];
            $scientificName = $_REQUEST['scientificName'];
            $description = $_REQUEST['description'];
            $check = Pathogen::insert($commonName,$scientificName,$description);
            header('location:index.php?controller=rice&action=index_ricePathogen');
        }
        public function updatePathogen()
        {
            $pathogenID = $_REQUEST['pathogenID'];
            $commonName = $_REQUEST['commonName'];
            $scientificName = $_REQUEST['scientificName'];
            $description = $_REQUEST['description'];
            $check = Pathogen::update($pathogenID,$commonName,$scientificName,$description);
			header('location:index.php?controller=rice&action=index_ricePathogen');
        }
        public function deletePathogen()
        {
            $check = Pathogen::deletePathogen($_POST['pathogenID']);
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
        public function index_riceVariety()
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
            $total_page = Variety::countRowAll();
            $VarietyList = Variety::getAll($start,$perpage);

            require_once('views/riceMm/index_riceVariety.php');
        }
        public function addVariety()
        {
        $commonName = $_REQUEST['commonName'];
        $scientificName = $_REQUEST['scientificName'];   
        $varietyName = $_REQUEST['varietyName'];
        $history = $_REQUEST['history'];
        $characteristic = $_REQUEST['characteristic'];
        $productRate = $_REQUEST['productRate'];
        $feature = $_REQUEST['feature'];
        $notice = $_REQUEST['notice'];
        $recommendArea = $_REQUEST['recommendArea'];
        $return = Variety::insert($commonName,$scientificName,$varietyName,$history,$characteristic,$productRate,$feature,$notice,$recommendArea);
		header('location:index.php?controller=rice&action=index_riceVariety');
        }
        public function updateVariety()
        {
            $VarietyID = $_REQUEST['VarietyID2'];
            $commonName = $_REQUEST['commonName2'];
            $scientificName = $_REQUEST['scientificName2'];          
            $varietyName = $_REQUEST['varietyName2'];
            $history = $_REQUEST['history2'];
            $characteristic = $_REQUEST['characteristic2'];
            $productRate = $_REQUEST['productRate2'];
            $feature = $_REQUEST['feature2'];
            $notice = $_REQUEST['notice2'];
            $recommendArea = $_REQUEST['recommendArea2'];
            $result = Variety::update($VarietyID,$commonName,$scientificName,$varietyName,$history,$characteristic,$productRate,$feature,$notice,$recommendArea);

            if($result)
            {
				header('location:index.php?controller=rice&action=index_riceVariety');
            }
        }
        public function deleteVariety()
        {
            $result = Variety::delete($_REQUEST['varietyID']);
            if($result)
            {
				header('location:index.php?controller=rice&action=index_riceVariety');
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

            $total_page = Variety::countRow($_GET['key']);

                $VarietyList = Variety::search_spec($_GET['key'],$start,$perpage);
                require_once('views/riceMm/index_riceVarietyW.php');     
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
            $disease_list = Disease::getAll("","");
            $pathogen_list = Pathogen::getAll("","");
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

        public function getAjaxProvince()
        {
            Province::getAjaxProvince($_GET['provinceID']);
        }
    }
?>