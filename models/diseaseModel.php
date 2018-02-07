<?php
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
         require_once('connection_connect.php');
         $sql = "SELECT * FROM disease";
         $result = mysqli_query($conn,$sql);
         while($row = mysqli_fetch_array($result))
         {
             $diseaseID = $row['diseaseID'];
             $name = $row['name'];
             $location = $row['location'];
             $symptom = $row['symptom'];
             $dispersed = $row['dispersed'];
             $prevention = $row['prevention'];
             $diseaseList[] = new Disease($diseaseID,$name,$location,$symptom,$dispersed,$prevention);
         }
         require_once('connection_close.php');
         return $diseaseList;
     }
     public static function get($diseaseID)
     {
        require_once('connection_connect.php');
        $sql = "SELECT * FROM disease WHERE diseaseID = $diseaseID";
        $result - mysqli_query($conn,$sql);
        if($result)
        {
            $diseaseID = $row['diseaseID'];
            $name = $row['name'];
            $location = $row['location'];
            $symptom = $row['symptom'];
            $dispersed = $row['dispersed'];
            $prevention = $row['prevention'];
        }
        require_once('connection_close.php');
        return new Disease($diseaseID,$name,$location,$symptom,$dispersed,$prevention);
     }
     public static function insert($name,$location,$symptom,$dispersed,$prevention)
     {
        require_once('connection_connect.php');
        $sql = "INSERT INTO disease('name','location',symptom,dispersed,prevention) VALUE('$name','$location','$symptom','$dispersed','$prevention')";
        $result = 0;
        $result = mysqli_query($conn,$sql);
        require_once('connection_close.php');
        return $result;
     }
     public static function update($diseaseID,$name,$location,$symptom,$dispersed,$prevention)
     {
        require_once('connection_connect.php');
        $sql = "UPDATE disease SET name = '$name',location = '$location', symptom = '$symptom',dispersed = '$dispersed',prevention = '$prevention' WHERE diseaseID = $diseaseID";
        $result = 0;
        $result = mysqli_query($conn,$sql);
        require_once('connection_close.php');
        return $result;
     }
 } 
?>