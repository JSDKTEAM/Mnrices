<?php
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
        require("connection_connect.php");
        $sql = "select * from district where districtID = '$districtID' ";
        $result = DbHelp::query($sql,$conn);
        $my_row = DbHelp::fetch($result);
        $districtID= $my_row['districtID'];
        $districtName = $my_row['districtName'];
        $provinceID = $my_row['provinceID'];
        require("connection_close.php");
    return new District($districtID,$districtName,$provinceID);
    }
    public static function getAll()
    {
        require("connection_connect.php");
        $sql = "select * from district left join province on province.provinceID = district.provinceID ORDER BY provinceName";
        $result = DbHelp::query($sql,$conn);
        while($my_row = DbHelp::fetch($result))
        {
        $districtID= $my_row['districtID'];
        $districtName = $my_row['districtName'];
        $provinceID = $my_row['provinceID'];
        $provinceName = $my_row['provinceName'];
        $district_List[] = new District($districtID,$districtName,$provinceID,$provinceName);
        }
        require("connection_close.php");
        return $district_List;
    }
   
    public static function insert($provinceID,$districtName)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO district (districtID,districtName,provinceID)VALUES ('','$districtName','$provinceID')";
        $result = DbHelp::query($sql,$conn);
        require("connection_close.php");
    }
    public static function update($districtID,$provinceID,$districtName)
    { 
        require("connection_connect.php");
        $sql = "UPDATE district SET districtName = '$districtName',provinceID = '$provinceID' WHERE districtID = '$districtID' ";
        $result = DbHelp::query($sql,$conn);
        require("connection_close.php");
        return $result;
    }
    public static function delete ($districtID)
    { 
        require("connection_connect.php");
        $sql = "DELETE FROM district WHERE districtID = '$districtID'";
        $result = DbHelp::query($sql,$conn);
        require("connection_close.php");
    }
}
?>