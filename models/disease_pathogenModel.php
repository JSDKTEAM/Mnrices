<?php
    class Dp
    {
        public $diseaseID;
        public $name;
        public $pathogenID;
        public $commonName;
        public function __construct($diseaseID,$name,$pathogenID,$commonName)
        {
            $this->diseaseID = $diseaseID;
            $this->name = $name;
            $this->pathogenID = $pathogenID;
            $this->commonName = $commonName;
        }
        public static function countRow()
        {
            require('connection_connect.php');
            $sql = "SELECT disease.diseaseID,disease.name,pathogen.pathogenID,pathogen.commonName FROM diseasepathogen
                    RIGHT JOIN disease ON disease.diseaseID = diseasepathogen.diseaseID
                    INNER JOIN pathogen ON pathogen.pathogenID = diseasepathogen.pathogenID ORDER BY disease.name,pathogen.commonName";
            //$result = mysqli_query($conn,$sql);
            //$total = mysqli_num_rows($result);
            $result = DbHelp::query($sql,$conn);
            $total = DbHelp::countRow($result);
            $total_page = ($total / 10);
            require('connection_close.php');
            return $total_page;
        }
        public static function getAll($start,$perpage)
        {
            require('connection_connect.php');
            $sql = "SELECT disease.diseaseID,disease.name,GROUP_CONCAT(pathogen.pathogenID) AS pathogenID,GROUP_CONCAT(pathogen.commonName) AS commonName FROM diseasepathogen
                    RIGHT JOIN disease ON disease.diseaseID = diseasepathogen.diseaseID
                    INNER JOIN pathogen ON pathogen.pathogenID = diseasepathogen.pathogenID 
                    GROUP BY disease.diseaseID,disease.name
                    ORDER BY disease.name,pathogen.commonName LIMIT $start,$perpage";
            $result = DbHelp::query($sql,$conn);
            while($row = DbHelp::fetch($result))
            {
                $diseaseID = $row['diseaseID'];
                $name = $row['name'];
                $pathogenID = $row['pathogenID'];
                $commonName = $row['commonName'];
                $dpList[] = new Dp($diseaseID,$name,$pathogenID,$commonName);
            }
            require('connection_close.php');
            return $dpList;
        }
        public static function insert($diseaseID,$pathogenID)
        {
            require('connection_connect.php');
            $sql = "INSERT INTO `diseasepathogen`(`diseaseID`, `pathogenID`) VALUES($diseaseID,$pathogenID)";
            //$result = mysqli_query($conn,$sql);
            $result = DbHelp::query($sql,$conn);
            echo $sql;
            require('connection_close.php');
            return $result;
        }
        public static function update($diseaseID,$pathogenID)
        {
            require('connection_connect.php');
            $sql = "UPDATE diseasepathogen SET diseaseID = $diseaseID,pathogenID = $pathogenID";
            //$result = mysqli_query($conn,$sql);
            $result = DbHelp::query($sql,$conn);
            require('connection_close.php');
            return $result;
        }
        public static function delete($diseaseID,$pathogenID)
        {
            require('connection_connect.php');
            $sql = "DELETE FROM diseasepathogen WHERE diseaseID = $diseaseID AND pathogenID = $pathogenID";
            //$result = mysqli_query($conn,$sql);
            $result = DbHelp::query($sql,$conn);
            require('connection_close.php');
            return $result;
        }
    }
?>