<?php
require_once("connection_connect.php");
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
        public static function getAll()
        {
            $con = conDb::getInstance();
            $sql = "SELECT * FROM pathogen ORDER BY commonName";
            $stmt = $con->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $key=>$row)
            {
                $pathogenID = $row['pathogenID'];
                $commonName = $row['commonName'];
                $scientificName = $row['scientificName'];                
                $description = $row['description'];
                $pathogenList[] = new Pathogen($pathogenID,$commonName,$scientificName,$description);
            }
           
            return $pathogenList;
        }
        public static function get($pathogenID)
        {
            $con = conDb::getInstance();
            $sql = "SELECT * FROM pathogen WHERE pathogenID = $pathogenID";
            $stmt = $con->query($sql);
            $row = $stmt->fetch();
            $pathogenID = $row['pathogenID'];
            $commonName = $row['commonName'];
            $scientificName = $row['scientificName'];            
            $description = $row['description'];
           
            return new Pathogen($pathogenID,$commonName,$scientificName,$description);
        }
        public static function insert($commonName,$scientificName,$description)
        {
            $con = conDb::getInstance();
            $sql = "INSERT INTO pathogen(commonName,scientificName,`description`) VALUES(?,?,?)";
            $stmt = $con->prepare($sql);
            $check = $stmt->execute([$commonName,$scientificName,$description]);   
            return $check;
        }
        public static function update($pathogenID,$commonName,$scientificName,$description)
        {
            $con = conDb::getInstance();
            $sql = "UPDATE pathogen 
                    SET
                    commonName = ?,
                    scientificName = ?,  
                    `description` = ? 
                    WHERE pathogenID = ?";
            $stmt = $con->prepare($sql);
            $check = $stmt->execute([$commonName,$scientificName,$description,$pathogenID]);    
            return $check;
        }
        public static function deletePathogen($pathogenID)
        {
            $con = conDb::getInstance();
            $sql = "DELETE FROM pathogen WHERE pathogenID = ?";
            $stmt = $con->prepare($sql);
            $check = $stmt->execute([$pathogenID]);    
            return $check;
            
        }
    } 
?>