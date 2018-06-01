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
        public static function getAll()
        {
            $con = conDb::getInstance();
            $sql = "SELECT disease.diseaseID,disease.name,GROUP_CONCAT(pathogen.pathogenID) AS pathogenID,GROUP_CONCAT(pathogen.commonName) AS commonName FROM diseasepathogen
                    RIGHT JOIN disease ON disease.diseaseID = diseasepathogen.diseaseID
                    LEFT JOIN pathogen ON pathogen.pathogenID = diseasepathogen.pathogenID 
                    GROUP BY disease.diseaseID,disease.name
                    ORDER BY disease.name,pathogen.commonName";
            $stmt = $con->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $key=>$row)
            {
                $diseaseID = $row['diseaseID'];
                $name = $row['name'];
                $pathogenID = $row['pathogenID'];
                $commonName = $row['commonName'];
                $dpList[] = new Dp($diseaseID,$name,$pathogenID,$commonName);
            }
           
            return $dpList;
        }
        public static function insert($diseaseID,$pathogenID)
        {
            $con = conDb::getInstance();
            $sql = "INSERT INTO `diseasepathogen`(`diseaseID`, `pathogenID`) VALUES(?,?)";
            $stmt = $con->prepare($sql);
            $check = $stmt->execute([$diseaseID,$pathogenID]);   
            return $check;
        }
        public static function update($diseaseID,$pathogenID)
        {
            $con = conDb::getInstance();
            $sql = "UPDATE diseasepathogen SET diseaseID = ?,pathogenID = ?";
            $stmt = $con->prepare($sql);
            $check = $stmt->execute([$diseaseID,$pathogenID]);   
            return $check;
        }
        public static function delete($diseaseID,$pathogenID)
        {
            $con = conDb::getInstance();
            $sql = "DELETE FROM diseasepathogen WHERE diseaseID = ? AND pathogenID = ?";
            $stmt = $con->prepare($sql);
            $check = $stmt->execute([$diseaseID,$pathogenID]);   
            return $check;
        }
    }
?>