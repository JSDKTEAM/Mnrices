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
    require_once("connection_connect.php");
    $sql = "select * from district where districtID = '$districtID' ";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($con));
    $my_row = mysqli_fetch_array($result);
    $districtID= $my_row['districtID'];
    $districtName = $my_row['districtName'];
    $provinceID = $my_row['provinceID'];
    require_once("connection_close.php");
    return new District($districtID,$districtName,$provinceID);
    }
    public static function getAll()
    {
        require_once("connection_connect.php");
        $sql = "select * from district left join province on province.provinceID = district.provinceID ORDER BY provinceName";
        $result=mysqli_query($conn,$sql) or die(mysqli_error($con));
        while($my_row = mysqli_fetch_array($result))
        {
        $districtID= $my_row['districtID'];
        $districtName = $my_row['districtName'];
        $provinceID = $my_row['provinceID'];
        $provinceName = $my_row['provinceName'];
        $district_List[] = new District($districtID,$districtName,$provinceID,$provinceName);
        }
        require_once("connection_close.php");
        return $district_List;
    }
   
    public static function insert($provinceID,$districtName)
    {
        require_once("connection_connect.php");
    $sql = "INSERT INTO district (districtID,districtName,provinceID)VALUES ('','$districtName','$provinceID')";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($con));
        require_once("connection_close.php");
    }
    public static function update($districtID,$provinceID,$districtName)
    { require_once("connection_connect.php");
    $sql = "UPDATE district SET districtName = '$districtName',provinceID = '$provinceID' WHERE districtID = '$districtID' ";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($con));
    require_once("connection_close.php");
    return $result;
    }
    public static function delete ($districtID)
    { require_once("connection_connect.php");
    $sql = "DELETE FROM district WHERE districtID = '$districtID'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($con));
    require_once("connection_close.php");
    }
}
?>