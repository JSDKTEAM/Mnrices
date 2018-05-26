<?php
require_once("connection_connect.php");
    class Province{
        public $provinceID;
        public $provinceName;
    
    public function __construct($provinceID,$provinceName)
    {
        $this->provinceID = $provinceID;
        $this->provinceName = $provinceName;
    }
    public static function getAjaxProvince($provinceID)
    {
        header('Content-type: application/json');
        $con = conDb::getInstance();
        $sql = "SELECT * FROM district WHERE 	provinceID = $provinceID ORDER BY districtName";
        $stmt = $con->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0){
            foreach($result as $key=>$row){
                $data[] = $row;
                //echo '<option value="' . $row['districtID'] . '">' . $row['districtName'] . '</option>';
            }
        }else{
            return false;
        }

        ob_end_clean();
        print json_encode($data);
        
    }
    public static function getAll()
    {
        $con = conDb::getInstance();
        $sql = "SELECT * FROM province ORDER BY provinceName";
        $stmt = $con->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $key=>$row)
        {
            $provinceID = $row['provinceID'];
            $provinceName = $row['provinceName'];
            $provinceList[] = new Province($provinceID,$provinceName);
        }

        return $provinceList;
    }
}
?>