<?php
require_once("connection_connect.php");
class Subdistrict {
    public $subdistrictID;
    public $subdistrictName;
    public $districtID;
    public $districtName;
    public $provinceID;
    public $provinceName;
    public function __construct($subdistrictID,$subdistrictName,$districtID,$districtName,$provinceID,$provinceName)
    {
        $this->subdistrictID = $subdistrictID;
        $this->subdistrictName = $subdistrictName;
        $this->districtID = $districtID;
        $this->districtName = $districtName;
        $this->provinceID = $provinceID;
        $this->provinceName = $provinceName;
    }
    public static function get($subdistrictID)
    {
        $con = conDb::getInstance();
        $sql = "select * from subdistrict where subdistrictID = '$subdistrictID' ";
        $stmt = $con->query($sql);
        $my_row = $stmt->fetch();
        $subdistrictID= $my_row['subdistrictID'];
        $subdistrictName = $my_row['subdistrictName'];
        $districtID = $my_row['districtID'];
      
        return new Subdistrict($subdistrictID,$subdistrictName,$districtID);
    }
    public static function getAll()
    {
        $con = conDb::getInstance();
        $sql = "select * from subdistrict 
                left join district on subdistrict.districtID = district.districtID
                left join province on province.provinceID = district.provinceID order by provinceName";
        $stmt = $con->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $key=>$my_row)
        {
            $subdistrictID= $my_row['subdistrictID'];
            $subdistrictName = $my_row['subdistrictName'];
            $districtID = $my_row['districtID'];
            $districtName = $my_row['districtName'];
            $provinceID = $my_row['provinceID'];
            $provinceName = $my_row['provinceName'];
            $subdistrict_List[]= new Subdistrict($subdistrictID,$subdistrictName,$districtID,$districtName,$provinceID,$provinceName);
        }
        
        return $subdistrict_List;
    }
    public static function insert($districtID,$subdistrictName)
    {
        $con = conDb::getInstance();
        $sql = "INSERT INTO subdistrict  (subdistrictName,districtID)VALUES (?,?)";
        $stmt = $con->prepare($sql);
        $check = $stmt->execute([$subdistrictName,$districtID]);    
        return $check;
      
    }
    public static function update($subdistrictID,$subdistrictName,$districtID)
    { 
        $con = conDb::getInstance();
        $sql = "UPDATE subdistrict  SET subdistrictName = ?,districtID = ? WHERE subdistrictID = ? ";
        $stmt = $con->prepare($sql);
        $check = $stmt->execute([$subdistrictName,$districtID,$subdistrictID]);    
        return $check;
 
    }
    public static function delete ($subdistrictID)
    { 
        $con = conDb::getInstance();
        $sql = "DELETE FROM subdistrict  WHERE subdistrictID = ?";
        $stmt = $con->prepare($sql);
        $check = $stmt->execute([$districtID]);    
        return $check;
      
    }
}
?>