<?php
 class Species
 {
     public $speciesID;
     public $commonName;
     public $scientificName;
     public $speciesName;
     public $type;
     public $history;
     public $characteristic;
     public $productRate;
     public $feature;
     public $notice;
     public $recommendArea;
     public function __construct($speciesID,$commonName,$scientificName,$speciesName,$type,$history,$characteristic,$productRate,$feature,$notice,$recommendArea)
     {
         $this->speciesID = $speciesID;
         $this->commonName = $commonName;
         $this->scientificName = $scientificName;
         $this->speciesName = $speciesName;
         $this->type = $type;
         $this->history = $history;
         $this->characteristic = $characteristic;
         $this->productRate = $productRate;
         $this->feature = $feature;
         $this->notice = $notice;
         $this->recommendArea = $recommendArea;
     }
     public static function getAll($start,$perpage)
     { 
        require('connection_connect.php');
         $sql = "SELECT * FROM species LIMIT $start,$perpage";
         $result = DbHelp::query($sql,$conn);
         while($row = DbHelp::fetch($result))
         {
            $speciesID = $row['speciesID'];
            $commonName = $row['commonName'];
            $scientificName = $row['scientificName'];
            $type = $row['type'];
            $history = $row['history'];
            $characteristic = $row['characteristic'];
            $productRate = $row['productRate'];
            $feature = $row['feature'];
            $notice = $row['notice'];
            $recommendArea = $row['recommendArea'];
            $speciesList[] = new Species($speciesID,$commonName,$scientificName,$scientificName,$type,$history,$characteristic,$productRate,$feature,$notice,$recommendArea);
         }
         require('connection_close.php');
         return $speciesList;
     }
     public static function get($speciesID)
     {
        require('connection_connect.php');
        $sql = "SELECT * FROM species WHERE speciesID = $speciesID";
        $result = DbHelp::query($sql,$conn);
        if($result)
        {
            $row = DbHelp::fetch($result);
            $speciesID = $row['speciesID'];
            $commonName = $row['commonName'];
            $scientificName = $row['scientificName'];
            $type = $row['type'];
            $history = $row['history'];
            $characteristic = $row['characteristic'];
            $productRate = $row['productRate'];
            $feature = $row['feature'];
            $notice = $row['notice'];
            $recommendArea = $row['recommendArea'];
        }
        require('connection_close.php');
        return new Species($speciesID,$commonName,$scientificName,$scientificName,$type,$history,$characteristic,$productRate,$feature,$notice,$recommendArea);
     }
     public static function insert($commonName,$scientificName,$speciesName,$type,$history,$characteristic,$productRate,$feature,$notice,$recommendArea)
     {
        require('connection_connect.php');
        $sql = "INSERT INTO species(commonName,
                scientificName,
                speciesName,
                type,
                history,
                characteristic,
                productRate,
                feature,
                notice,
                recommendArea) VALUES('$commonName','$scientificName','$speciesName','$type','$history','$characteristic','$productRate','$feature','$notice','$recommendArea')";
        $result = 0;
        $result = DbHelp::query($sql,$conn);
        require('connection_close.php');
        return $result;
     }
     public static function update($speciesID,$commonName,$scientificName,$speciesName,$type,$history,$characteristic,$productRate,$feature,$notice,$recommendArea)
     {
        require('connection_connect.php');
        $sql = "UPDATE species SET
                commonName = '$commonName',
                scientificName = '$scientificName',
                type = '$type',
                history = '$history',
                characteristic = '$characteristic',
                productRate = '$productRate',
                feature = '$feature',
                notice = '$notice',
                recommendArea = '$recommendArea' WHERE speciesID = $speciesID";
        $result = 0;
        $result = DbHelp::query($sql,$conn);
        require('connection_close.php');
        return $result;
     }
     public static function search_spec($key,$start,$perpage)
     {
        require('connection_connect.php');

        $sql = "SELECT * FROM species WHERE speciesID LIKE '%$key%' 
        OR commonName LIKE '%$key%' 
        OR scientificName LIKE '%$key%'
        OR type LIKE '%$key%'
        OR history LIKE '%$key%' 
        OR characteristic LIKE '%$key%' 
        OR productRate LIKE '%$key%' 
        OR feature LIKE '%$key%' 
        OR notice LIKE '%$key%' 
        OR recommendArea LIKE '%$key%'
        order by commonName LIMIT $start,$perpage";
        
        $result = DbHelp::query($sql,$conn);

        while($row = DbHelp::fetch($result))
        {
           $speciesID = $row['speciesID'];
           $commonName = $row['commonName'];
           $scientificName = $row['scientificName'];
           $type = $row['type'];
           $history = $row['history'];
           $characteristic = $row['characteristic'];
           $productRate = $row['productRate'];
           $feature = $row['feature'];
           $notice = $row['notice'];
           $recommendArea = $row['recommendArea'];
           $speciesList[] = new Species($speciesID,$commonName,$scientificName,$scientificName,$type,$history,$characteristic,$productRate,$feature,$notice,$recommendArea);
        }
        require('connection_close.php');

        if(DbHelp::countRow($result) < 1)
        {
            return $speciesList = null;
        }
        return $speciesList;
     }

     public static function countRow($key)
     {
         require("connection_connect.php");
         $sql = "SELECT * FROM species WHERE speciesID LIKE '%$key%' 
         OR commonName LIKE '%$key%' 
         OR scientificName LIKE '%$key%'
         OR type LIKE '%$key%'
         OR history LIKE '%$key%' 
         OR characteristic LIKE '%$key%' 
         OR productRate LIKE '%$key%' 
         OR feature LIKE '%$key%' 
         OR notice LIKE '%$key%' 
         OR recommendArea LIKE '%$key%' ";
         $result = DbHelp::query($sql,$conn);
         $total = DbHelp::countRow($result);
         $total_page = ceil($total / 10);
         require("connection_close.php");
         return $total_page;
     }

     public static function countRowAll()
     {
         require("connection_connect.php");
         $sql = "SELECT * FROM species ";
         $result = DbHelp::query($sql,$conn);
         $total = DbHelp::countRow($result);
         $total_page = ceil($total / 10);
         require("connection_close.php");
         return $total_page;
     }

 } 
?>