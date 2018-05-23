<?php
    class Pathogen
    {
        public $pathogenID;
        public $commonName;
        public $scientificName;
        public $description;
        public function __construct($pathogenID,$commonName,$scientificName,$description)
        {
            $this->pathogenID = $pathogenID;
            $this->commonName = $commonName;
            $this->scientificName = $scientificName;
            $this->description = $description;
        }
        public static function getAll($start,$perpage)
        {
            require('connection_connect.php');
            if($start == "" && $perpage == "")
            {
                $sql = "SELECT * FROM pathogen ORDER BY commonName";
            }
            else
            {
                $sql = "SELECT * FROM pathogen ORDER BY commonName LIMIT $start,$perpage";
            }
            $result = DbHelp::query($sql,$conn);
            while($row = DbHelp::fetch($result))
            {
                $pathogenID = $row['pathogenID'];
                $commonName = $row['commonName'];
                $scientificName = $row['scientificName'];                
                $description = $row['description'];
                $pathogenList[] = new Pathogen($pathogenID,$commonName,$scientificName,$description);
            }
            require('connection_close.php');
            return $pathogenList;
        }
        public static function get($pathogenID)
        {
            require('connection_connect.php');
            $sql = "SELECT * FROM pathogen WHERE pathogenID = $pathogenID";
            $result = DbHelp::query($sql,$conn);
            $row = DbHelp::fetch($result);
            $pathogenID = $row['pathogenID'];
            $commonName = $row['commonName'];
            $scientificName = $row['scientificName'];            
            $description = $row['description'];
            require('connection_close.php');
            return new Pathogen($pathogenID,$commonName,$scientificName,$description);;
        }
        public static function insert($commonName,$scientificName,$description)
        {
            require('connection_connect.php');
            $sql = "INSERT INTO pathogen(commonName,scientificName,`description`) VALUES('$commonName','$scientificName',,'$description')";
            $result = 0;
            $result = DbHelp::query($sql,$conn);
            require('connection_close.php');
            return $result;
        }
        public static function update($pathogenID,$commonName,$scientificName,$description)
        {
            require('connection_connect.php');
            $sql = "UPDATE pathogen 
                    SET pathogenID = $pathogenID , 
                    commonName = '$commonName' ,
                    scientificName = '$scientificName' ,  
                    `description` = '$description' 
                    WHERE pathogenID = $pathogenID";
            $result = 0;
            $result = DbHelp::query($sql,$conn);
            require('connection_close.php');
            return $result;
        }
        public static function countRow($key)
        {
            require("connection_connect.php");
            $sql = "SELECT * FROM pathogen WHERE commonName LIKE '%$key%' OR scientificName LIKE '%$key%'  ";
            $result = DbHelp::query($sql,$conn);
            $total = DbHelp::countRow($result);
            $total_page = ceil(($total / 10));
            require("connection_close.php");
            return $total_page;
        }
        public static function countRowAll()
        {
            require("connection_connect.php");
            $sql = "SELECT * FROM pathogen WHERE commonName";
            $result = DbHelp::query($sql,$conn);
            $total = DbHelp::countRow($result);
            $total_page = ceil(($total / 10));
            require("connection_close.php");
            return $total_page;
        }
        public static function search($key,$start,$perpage)
        {
            require('connection_connect.php');
            $sql = "SELECT * FROM pathogen WHERE commonName LIKE '%$key%' OR scientificName LIKE '%$key%' 
            ORDER BY commonName LIMIT $start,$perpage ";
            $result = DbHelp::query($sql,$conn);
            if(DbHelp::countRow($result)>0)
            {
                while($row = DbHelp::fetch($result))
                {
                    $pathogenID = $row['pathogenID'];
                    $commonName = $row['commonName'];
                    $scientificName = $row['scientificName'];                    
                    $description = $row['description'];
                    $pathogenList[] = new Pathogen($pathogenID,$commonName,$scientificName,$description);
                }
                require('connection_close.php');
                return $pathogenList;
            }
            else
            {
                return $pathogenList=null;
            }
        
           
        }
    } 
?>