<?php
    class Pathogen
    {
        public $pathogenID;
        public $commonName;
        public $scientificName;
        public $type;
        public $description;
        public function __construct($pathogenID,$commonName,$scientificName,$type,$description)
        {
            $this->pathogenID = $pathogenID;
            $this->commonName = $commonName;
            $this->scientificName = $scientificName;
            $this->type = $type;
            $this->description = $description;
        }
        public static function getAll()
        {
            require('connection_connect.php');
            $sql = "SELECT * FROM pathogen";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result))
            {
                $pathogenID = $row['pathogenID'];
                $commonName = $row['commonName'];
                $scientificName = $row['scientificName'];
                $type  = $row['type'];
                $description = $row['description'];
                $pathogenList[] = new Pathogen($pathogenID,$commonName,$scientificName,$type,$description);
            }
            require('connection_close.php');
            return $pathogenList;
        }
        public static function get($pathogenID)
        {
            require('connection_connect.php');
            $sql = "SELECT * FROM pathogen WHERE pathogenID = $pathogenID";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            $pathogenID = $row['pathogenID'];
            $commonName = $row['commonName'];
            $scientificName = $row['scientificName'];
            $type  = $row['type'];
            $description = $row['description'];
            require('connection_close.php');
            return new Pathogen($pathogenID,$commonName,$scientificName,$type,$description);;
        }
        public static function insert($commonName,$scientificName,$type,$description)
        {
            require('connection_connect.php');
            $sql = "INSERT INTO pathogen(commonName,scientificName,`type`,`description`) VALUES('$commonName','$scientificName','$type','$description')";
            $result = 0;
            $result = mysqli_query($conn,$sql);
            require('connection_close.php');
            return $result;
        }
        public static function update($pathogenID,$commonName,$scientificName,$type,$description)
        {
            require('connection_connect.php');
            $sql = "UPDATE pathogen 
                    SET pathogenID = $pathogenID , 
                    commonName = '$commonName' ,
                    scientificName = '$scientificName' ,
                    `type` = '$type',
                    `description` = '$description' 
                    WHERE pathogenID = $pathogenID";
            $result = 0;
            $result = mysqli_query($conn,$sql);
            require('connection_close.php');
            return $result;
        }
        public static function countRow($key)
        {
            require("connection_connect.php");
            $sql = "SELECT * FROM pathogen WHERE commonName LIKE '%$key%' OR scientificName LIKE '%$key%' OR type LIKE '%$key%'";
            $result = mysqli_query($conn,$sql);
            $total = mysqli_num_rows($result);
            $total_page = ceil(($total / 10));
            require("connection_close.php");
            return $total_page;
        }
        public static function search($key,$start,$perpage)
        {
            require('connection_connect.php');
            $sql = "SELECT * FROM pathogen WHERE commonName LIKE '%$key%' OR scientificName LIKE '%$key%' OR type LIKE '%$key%'
            ORDER BY commonName LIMIT $start,$perpage ";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0)
            {
            while($row = mysqli_fetch_array($result))
            {
                $pathogenID = $row['pathogenID'];
                $commonName = $row['commonName'];
                $scientificName = $row['scientificName'];
                $type  = $row['type'];
                $description = $row['description'];
                $pathogenList[] = new Pathogen($pathogenID,$commonName,$scientificName,$type,$description);
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