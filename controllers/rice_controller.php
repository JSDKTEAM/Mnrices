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
        public function index_riceSpecies()
        {
            require_once('views/riceMm/index_riceSpecies.php');
        }
<<<<<<< HEAD
        public function team()
=======
        public function ton()
>>>>>>> cb84ab8c82aba53d37187ae0288c79992dbfba30
        {
            
        }
    }
?>