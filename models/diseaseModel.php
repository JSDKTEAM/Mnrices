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
     public static function getAll($start,$perpage)
     {
         require('connection_connect.php');
         if($start == "" && $perpage == "")
         {
            $sql = "SELECT * FROM disease order by name";
         }
         else
         {
            $sql = "SELECT * FROM disease order by name LIMIT $start,$perpage";
         }
         $result = DbHelp::query($sql,$conn);
         while($row = DbHelp::fetch($result))
         {
             $diseaseID = $row['diseaseID'];
             $name = $row['name'];
             $location = $row['location'];
             $symptom = $row['symptom'];
             $dispersed = $row['dispersed'];
             $prevention = $row['prevention'];
             $diseaseList[] = new Disease($diseaseID,$name,$location,$symptom,$dispersed,$prevention);
         }
         require('connection_close.php');
         return $diseaseList;
     }
     public static function get($diseaseID)
     {
        require('connection_connect.php');
        $sql = "SELECT * FROM disease WHERE diseaseID = $diseaseID";
        $result = DbHelp::query($sql,$conn);
        if($result)
        {
            $row = DbHelp::fetch($result);
            $diseaseID = $row['diseaseID'];
            $name = $row['name'];
            $location = $row['location'];
            $symptom = $row['symptom'];
            $dispersed = $row['dispersed'];
            $prevention = $row['prevention'];
        }
        require('connection_close.php');
        return new Disease($diseaseID,$name,$location,$symptom,$dispersed,$prevention);
     }
     public static function insert($name,$location,$symptom,$dispersed,$prevention)
     {
        require('connection_connect.php');
        $sql = "INSERT INTO disease(name,location,symptom,dispersed,prevention) VALUE('$name','$location','$symptom','$dispersed','$prevention')";
        $result = 0;
        $result = DbHelp::query($sql,$conn);
        require('connection_close.php');
        return $result;
     }
     public static function update($diseaseID,$name,$location,$symptom,$dispersed,$prevention)
     {
        require('connection_connect.php');
        $sql = "UPDATE disease SET name = '$name',location = '$location', symptom = '$symptom',dispersed = '$dispersed',prevention = '$prevention' WHERE diseaseID = $diseaseID";
        echo $sql;
        $result = 0;
        $result = DbHelp::query($sql,$conn);
        require('connection_close.php');
        return $result;
     }
     public static function deleteDisease($diseaseID)
     {
        require('connection_connect.php');
        $sql = "DELETE FROM disease WHERE diseaseID = $diseaseID";
        $result = DbHelp::query($sql,$conn);
        require('connection_close.php');
        return $result;
     }
     public static function search_dis($key,$start,$perpage)
     {
        require('connection_connect.php');

        $sql = "SELECT * FROM disease WHERE diseaseID LIKE '%$key%' 
        OR name LIKE '%$key%' 
        OR location LIKE '%$key%'
        OR symptom LIKE '%$key%'
        OR dispersed LIKE '%$key%'
        OR prevention LIKE '%$key%'
        order by name LIMIT $start,$perpage";
        
        $result = DbHelp::query($sql,$conn);
        while($row =DbHelp::fetch($result))
        {
            $diseaseID = $row['diseaseID'];
            $name = $row['name'];
            $location = $row['location'];
            $symptom = $row['symptom'];
            $dispersed = $row['dispersed'];
            $prevention = $row['prevention'];
            $diseaseList[] = new Disease($diseaseID,$name,$location,$symptom,$dispersed,$prevention);
        }
        

        if(DbHelp::countRow($result) < 1)
        {
            require('connection_close.php');
            return $diseaseList = null;
        }
        require('connection_close.php');
        return $diseaseList;
     }

     public static function countRow($key)
     {
         require("connection_connect.php");
         $sql = "SELECT * FROM disease WHERE diseaseID LIKE '%$key%' 
         OR name LIKE '%$key%' 
         OR location LIKE '%$key%'
         OR symptom LIKE '%$key%'
         OR dispersed LIKE '%$key%'
         OR prevention LIKE '%$key%'";
         $result = DbHelp::query($sql,$conn);
         $total = DbHelp::countRow($result);
         $total_page = ceil($total / 10);
         require("connection_close.php");
         return $total_page;
     }

     public static function countRowAll()
     {
         require("connection_connect.php");
         $sql = "SELECT * FROM disease";
         $result = DbHelp::query($sql,$conn);
         $total = DbHelp::countRow($result);
         $total_page = ceil($total / 10);
         require("connection_close.php");
         return $total_page;
     }

 } 
?>