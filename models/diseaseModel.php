<?php
require_once("connection_connect.php");
 class Disease{
     public $diseaseID;
     public $name;
     public $location;
     public $symptom;
     public $dispersed;
     public $prevention;
     public function __construct($diseaseID,$name,$location,$symptom,$dispersed,$prevention)
     {
         $this->diseaseID = $diseaseID;
         $this->name = $name;
         $this->location = $location;
         $this->symptom = $symptom;
         $this->dispersed = $dispersed;
         $this->prevention = $prevention;
     }
     public static function getAll()
     {
        $con = conDb::getInstance();
        $sql = "SELECT * FROM disease order by name";
        $stmt = $con->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $key=>$row)
        {
            $diseaseID = $row['diseaseID'];
            $name = $row['name'];
            $location = $row['location'];
            $symptom = $row['symptom'];
            $dispersed = $row['dispersed'];
            $prevention = $row['prevention'];
            $diseaseList[] = new Disease($diseaseID,$name,$location,$symptom,$dispersed,$prevention);
        }
  
         return $diseaseList;
     }
     public static function get($diseaseID)
     {
        $con = conDb::getInstance();
        $sql = "SELECT * FROM disease WHERE diseaseID = $diseaseID";
        $stmt = $con->query($sql);
        $row = $stmt->fetch();
        if($stmt->rowCount() > 0)
        {
            $diseaseID = $row['diseaseID'];
            $name = $row['name'];
            $location = $row['location'];
            $symptom = $row['symptom'];
            $dispersed = $row['dispersed'];
            $prevention = $row['prevention'];
        }
        return new Disease($diseaseID,$name,$location,$symptom,$dispersed,$prevention);
     }
     public static function insert($name,$location,$symptom,$dispersed,$prevention)
     {
        $con = conDb::getInstance();
        $sql = "INSERT INTO disease(name,location,symptom,dispersed,prevention) VALUE('$name','$location','$symptom','$dispersed','$prevention')";
        $stmt = $con->query($sql);
        return $stmt;
     }
     public static function update($diseaseID,$name,$location,$symptom,$dispersed,$prevention)
     {
        $con = conDb::getInstance();
        $sql = "UPDATE disease SET name = '$name',location = '$location', symptom = '$symptom',dispersed = '$dispersed',prevention = '$prevention' WHERE diseaseID = $diseaseID";
        $stmt = $con->query($sql);
        return $stmt;
     }
     public static function deleteDisease($diseaseID)
     {
        $con = conDb::getInstance();
        $sql = "DELETE FROM disease WHERE diseaseID = $diseaseID";
        $stmt = $con->query($sql);
        return $stmt;
     }

 } 
?>