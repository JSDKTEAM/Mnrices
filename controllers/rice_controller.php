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
            RiceController::index_ricePathogen();
        }
        public function updatePathogen()
        {
            $pathogenID = $_REQUEST['pathogenID'];
            $commonName = $_REQUEST['commonName'];
            $scientificName = $_REQUEST['scientificName'];
            $type = $_REQUEST['type'];
            $description = $_REQUEST['description'];
            $check = Pathogen::update($pathogenID,$commonName,$scientificName,$type,$description);
            RiceController::index_ricePathogen();
        }
        public function index_riceSpecies()
        {
            $speciesList = Species::getAll();
            require_once('views/riceMm/index_riceSpecies.php');
        }

        public function insert()
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
        public function update()
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
        
    }
?>