<?php
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
    public static function countRow()
    {
        require("connection_connect.php");
        $sql = "select * from subdistrict 
                left join district on subdistrict.districtID = district.districtID
                left join province on province.provinceID = district.provinceID";
        $result = mysqli_query($conn,$sql);
        $total = mysqli_num_rows($result);
        $total_page = ($total / 200);
        require("connection_close.php");
        return $total_page;
    }
    public static function get($subdistrictID)
    {
        require("connection_connect.php");
    $sql = "select * from subdistrict where subdistrictID = '$subdistrictID' ";
    $result=mysqli_query($conn,$sql);
    $my_row = mysqli_fetch_array($result);
    $subdistrictID= $my_row['subdistrictID'];
    $subdistrictName = $my_row['subdistrictName'];
    $districtID = $my_row['districtID'];
    require("connection_close.php");
    return new Subdistrict($subdistrictID,$subdistrictName,$districtID);
    }
    public static function getAll($start,$perpage)
    {
    require("connection_connect.php");
    $sql = "select * from subdistrict 
            left join district on subdistrict.districtID = district.districtID
            left join province on province.provinceID = district.provinceID order by provinceName LIMIT $start,$perpage";
    $result=mysqli_query($conn,$sql);
    while($my_row = mysqli_fetch_array($result))
    {
    $subdistrictID= $my_row['subdistrictID'];
    $subdistrictName = $my_row['subdistrictName'];
    $districtID = $my_row['districtID'];
    $districtName = $my_row['districtName'];
    $provinceID = $my_row['provinceID'];
    $provinceName = $my_row['provinceName'];
    $subdistrict_List[]= new Subdistrict($subdistrictID,$subdistrictName,$districtID,$districtName,$provinceID,$provinceName);
    }
    require("connection_close.php");
    return $subdistrict_List;
    }
    public static function insert($districtID,$subdistrictName)
    {
    require("connection_connect.php");
    $sql = "INSERT INTO subdistrict  (subdistrictID,subdistrictName,districtID)VALUES ('','$subdistrictName','$districtID')";
    $result=mysqli_query($conn,$sql);
    require("connection_close.php");
    }
    public static function update($subdistrictID,$subdistrictName,$districtID)
    { require("connection_connect.php");
    $sql = "UPDATE subdistrict  SET subdistrictName = '$subdistrictName',districtID = '$districtID' WHERE subdistrictID = '$subdistrictID' ";
    $result=mysqli_query($conn,$sql);
    require("connection_close.php");
    }
    public static function delete ($subdistrictID)
    { require("connection_connect.php");
    $sql = "DELETE FROM subdistrict  WHERE subdistrictID = '$subdistrictID'";
    $result=mysqli_query($conn,$sql);
    require("connection_close.php");
    }
}
?>