<?php
require_once("connection_connect.php");
class District{
    public $districtID;
    public $districtName;
    public $provinceID;
    public $provinceName;
    public function __construct($districtID,$districtName,$provinceID,$provinceName)
    {
    $this->districtID = $districtID;
    $this->districtName = $districtName;
    $this->provinceID = $provinceID;
    $this->provinceName = $provinceName;
    }
  
   public static function get($districtID)
    {
        $con = conDb::getInstance();
        $sql = "select * from district where districtID = '$districtID' ";
        $stmt = $con->query($sql);
        $my_row = $stmt->fetch();
        $districtID= $my_row['districtID'];
        $districtName = $my_row['districtName'];
        $provinceID = $my_row['provinceID'];
        
        return new District($districtID,$districtName,$provinceID);
    }
    public static function getAll()
    {
        $con = conDb::getInstance();
        $sql = "select * from district left join province on province.provinceID = district.provinceID ORDER BY provinceName";
        $stmt = $con->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       foreach($result as $key=>$my_row)
        {
            $districtID= $my_row['districtID'];
            $districtName = $my_row['districtName'];
            $provinceID = $my_row['provinceID'];
            $provinceName = $my_row['provinceName'];
            $district_List[] = new District($districtID,$districtName,$provinceID,$provinceName);
        }
       
        return $district_List;
    }
   
    public static function insert($provinceID,$districtName)
    {
        $con = conDb::getInstance();
        $sql = "INSERT INTO district (districtName,provinceID)VALUES (?,?)";
        $stmt = $con->prepare($sql);
        $check = $stmt->execute([$districtName,$provinceID]);    
       return $check;
    }
    public static function update($districtID,$provinceID,$districtName)
    { 
        $con = conDb::getInstance();
        $sql = "UPDATE district SET districtName = ?,provinceID = ? WHERE districtID = ? ";
        $stmt = $con->prepare($sql);
        $check = $stmt->execute([$districtName,$provinceID,$districtID]);    
        return $check;
    }
    public static function delete ($districtID)
    { 
        $con = conDb::getInstance();
        $sql = "DELETE FROM district WHERE districtID = ?";
        $check = $stmt->execute([$districtID]);    
        return $check;
        
    }
}
?>