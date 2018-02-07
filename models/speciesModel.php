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
     public static function getAll()
     {
         require_once('connection_connect.php');
         $sql = "SELECT * FROM species";
         $result = mysqli_query($conn,$sql);
         while($row = mysqli_fetch_array($result))
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
         require_once('connection_close.php');
         return $speciesList;
     }
     public static function get($speciesID)
     {
        require_once('connection_connect.php');
        $sql = "SELECT * FROM species WHERE speciesID = $speciesID";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            $row = mysqli_fetch_array($result);
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
        require_once('connection_close.php');
        return new Species($speciesID,$commonName,$scientificName,$scientificName,$type,$history,$characteristic,$productRate,$feature,$notice,$recommendArea);
     }
     public static function insert($commonName,$scientificName,$speciesName,$type,$history,$characteristic,$productRate,$feature,$notice,$recommendArea)
     {
        require_once('connection_connect.php');
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
        $result = mysqli_query($conn,$sql);
        require_once('connection_close.php');
        return $result;
     }
     public static function update($speciesID,$commonName,$scientificName,$speciesName,$type,$history,$characteristic,$productRate,$feature,$notice,$recommendArea)
     {
        require_once('connection_connect.php');
        $sql = "UPDATE species SET
                commonName = '$commonName',
                scientificName = '$scientificName',
                type = '$type'
                history = '$history',
                characteristic = '$characteristic',
                productRate = '$productRate',
                feature = '$feature',
                notice = '$notice',
                recommendArea = '$recommendArea' WHERE speciesID = $speciesID";
        $result = 0;
        $result = mysqli_query($conn,$sql);
        require_once('connection_close.php');
        return $result;
     }
 } 
?>