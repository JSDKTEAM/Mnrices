<?php
 class Variety
 {
     public $varietyID;
     public $commonName;
     public $scientificName;
     public $varietyName;
     public $history;
     public $characteristic;
     public $productRate;
     public $feature;
     public $notice;
     public $recommendArea;
     public function __construct($varietyID,$commonName,$scientificName,$varietyName,$history,$characteristic,$productRate,$feature,$notice,$recommendArea)
     {
         $this->varietyID = $varietyID;
         $this->commonName = $commonName;
         $this->scientificName = $scientificName;        
         $this->varietyName = $varietyName;
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
         $sql = "SELECT * FROM variety LIMIT $start,$perpage";
         $result = DbHelp::query($sql,$conn);
         while($row = DbHelp::fetch($result))
         {
            $varietyID = $row['varietyID'];
            $commonName = $row['commonName'];
            $scientificName = $row['scientificName'];
            $varietyName = $row['varietyName'];
            $history = $row['history'];
            $characteristic = $row['characteristic'];
            $productRate = $row['productRate'];
            $feature = $row['feature'];
            $notice = $row['notice'];
            $recommendArea = $row['recommendArea'];
            $varietyList[] = new Variety($varietyID,$commonName,$scientificName,$varietyName,$history,$characteristic,$productRate,$feature,$notice,$recommendArea);
         }
         require('connection_close.php');
         return $varietyList;
     }
     public static function get($varietyID)
     {
        require('connection_connect.php');
        $sql = "SELECT * FROM variety WHERE varietyID = $varietyID";
        $result = DbHelp::query($sql,$conn);
        if($result)
        {
            $row = DbHelp::fetch($result);
            $varietyID = $row['varietyID'];
            $commonName = $row['commonName'];
            $scientificName = $row['scientificName'];
            $varietyName = $row['varietyName'];
            $history = $row['history'];
            $characteristic = $row['characteristic'];
            $productRate = $row['productRate'];
            $feature = $row['feature'];
            $notice = $row['notice'];
            $recommendArea = $row['recommendArea'];
        }
        require('connection_close.php');
        return new Variety($varietyID,$commonName,$scientificName,$scientificName,$varietyName,$history,$characteristic,$productRate,$feature,$notice,$recommendArea);
     }
     public static function insert($commonName,$scientificName,$varietyName,$history,$characteristic,$productRate,$feature,$notice,$recommendArea)
     {
        require('connection_connect.php');
        $sql = "INSERT INTO variety(commonName,
                scientificName,               
                varietyName,
                history,
                characteristic,
                productRate,
                feature,
                notice,
                recommendArea) VALUES('$commonName','$scientificName','$varietyName','$history','$characteristic','$productRate','$feature','$notice','$recommendArea')";
        $result = 0;
        $result = DbHelp::query($sql,$conn);
        require('connection_close.php');
        return $result;
     }
     public static function update($varietyID,$commonName,$scientificName,$varietyName,$history,$characteristic,$productRate,$feature,$notice,$recommendArea)
     {
        require('connection_connect.php');
        $sql = "UPDATE variety SET
                commonName = '$commonName',
                scientificName = '$scientificName',
                varietyName = '$varietyName',
                history = '$history',
                characteristic = '$characteristic',
                productRate = '$productRate',
                feature = '$feature',
                notice = '$notice',
                recommendArea = '$recommendArea' WHERE varietyID = $varietyID";
        $result = 0;
        $result = DbHelp::query($sql,$conn);
        require('connection_close.php');
        return $result;
     }
     public static function search_spec($key,$start,$perpage)
     {
        require('connection_connect.php');

        $sql = "SELECT * FROM variety WHERE varietyID LIKE '%$key%' 
        OR commonName LIKE '%$key%' 
        OR scientificName LIKE '%$key%'
        OR varietyName LIKE '%$key%'
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
           $varietyID = $row['varietyID'];
           $commonName = $row['commonName'];
           $scientificName = $row['scientificName'];
           $varietyName = $row['varietyName'];
           $history = $row['history'];
           $characteristic = $row['characteristic'];
           $productRate = $row['productRate'];
           $feature = $row['feature'];
           $notice = $row['notice'];
           $recommendArea = $row['recommendArea'];
           $varietyList[] = new Variety($varietyID,$commonName,$scientificName,$scientificName,$varietyName,$history,$characteristic,$productRate,$feature,$notice,$recommendArea);
        }
        require('connection_close.php');

        if(DbHelp::countRow($result) < 1)
        {
            return $varietyList = null;
        }
        return $varietyList;
     }

     public static function countRow($key)
     {
         require("connection_connect.php");
         $sql = "SELECT * FROM variety WHERE varietyID LIKE '%$key%' 
         OR commonName LIKE '%$key%' 
         OR scientificName LIKE '%$key%'
         OR varietyName LIKE '%$key%'
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
         $sql = "SELECT * FROM variety ";
         $result = DbHelp::query($sql,$conn);
         $total = DbHelp::countRow($result);
         $total_page = ceil($total / 10);
         require("connection_close.php");
         return $total_page;
     }
     public static function delete($varietyID)
     {
        require("connection_connect.php");
        $sql = "DELETE FROM variety WHERE varietyID = $varietyID";
        $result = DbHelp::query($sql,$conn);
        require("connection_close.php");
        return $result;
     }

 } 
?>