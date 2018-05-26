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
     public static function getAll()
     { 
        $con = conDb::getInstance();
        $sql = "SELECT * FROM variety";
        $stmt = $con->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result  as $key=>$row)
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
        
        return $varietyList;
     }
     public static function get($varietyID)
     {
        $con = conDb::getInstance();
        $sql = "SELECT * FROM variety WHERE varietyID = $varietyID";
        $stmt = $con->query($sql);
        $row = $stmt->fetch();
        if($stmt->rowCount() > 0)
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
        }
  
        return new Variety($varietyID,$commonName,$scientificName,$scientificName,$varietyName,$history,$characteristic,$productRate,$feature,$notice,$recommendArea);
     }
     public static function insert($commonName,$scientificName,$varietyName,$history,$characteristic,$productRate,$feature,$notice,$recommendArea)
     {
        $con = conDb::getInstance();
        $sql = "INSERT INTO variety(commonName,
                scientificName,               
                varietyName,
                history,
                characteristic,
                productRate,
                feature,
                notice,
                recommendArea) 
                VALUES(?,?,?,?,?,?,?,?,?)";
        $stmt = $con->prepare($sql);
        $check = $stmt->execute([$commonName,$scientificName,$varietyName,$history,$characteristic,$productRate,$feature,$notice,$recommendArea]);   
        return $check;
     }
     public static function update($varietyID,$commonName,$scientificName,$varietyName,$history,$characteristic,$productRate,$feature,$notice,$recommendArea)
     {
        $con = conDb::getInstance();
        $sql = "UPDATE variety SET
                commonName = ?,
                scientificName = ?,
                varietyName = ?,
                history = ?,
                characteristic = ?,
                productRate = ?,
                feature = ?,
                notice = ?,
                recommendArea = ? WHERE varietyID = ?";
        $stmt = $con->prepare($sql);
        $check = $stmt->execute([$commonName,$scientificName,$varietyName,$history,$characteristic,$productRate,$feature,$notice,$recommendArea,$varietyID]);   
        return $check;
     }
     public static function search_spec($key,$start,$perpage)
     {
        
        $con = conDb::getInstance();
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
        

        if(DbHelp::countRow($result) < 1)
        {
            return $varietyList = null;
        }
        return $varietyList;
     }
     public static function delete($varietyID)
     {
        $con = conDb::getInstance();
        $sql = "DELETE FROM variety WHERE varietyID = $varietyID";
        $stmt = $con->prepare($sql);
        $check = $stmt->execute([$varietyID]);   
        return $check;
     }

 } 
?>