<?php
class Department{
    public $depID;
    public $depName;
    public function __construct($depID,$depName)
    {
        $this->depID = $depID;
        $this->depName = $depName;
    }
    public static function get($depID)
    {
        require("connection_connect.php");
        $sql = "select * from department where depID = '$depID' ";
        $result = DbHelp::query($sql,$conn);
        $my_row = DbHelp::fetch($result);
        //$result=mysqli_query($conn,$sql) or die(mysqli_error($con));
        //$my_row = mysqli_fetch_array($result);
        $depID= $my_row['depID'];
        $depName = $my_row['depName'];
        require("connection_close.php");
        return new Department($depID,$depName);
    }
    public static function getAll()
    {
        require("connection_connect.php");
        $sql = "select * from department ORDER BY depName";
        $result = DbHelp::query($sql,$conn);
        //$result=mysqli_query($conn,$sql) or die(mysqli_error($con));
        while($my_row =  DbHelp::fetch($result))
        {
            $depID= $my_row['depID'];
            $depName = $my_row['depName'];
            $departmentList[]= new Department($depID,$depName);
        }
        require("connection_close.php");
        return $departmentList;
    }
    public static function insert($depName)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO department (depID,depName)VALUES ('','$depName')";
        $result = DbHelp::query($sql,$conn);
        //$result=mysqli_query($conn,$sql) or die(mysqli_error($con));
        require("connection_close.php");
        return $result;
    }
    public static function update($depID,$depName)
    { 
        require("connection_connect.php");
        $sql = "UPDATE department SET depName = '$depName' WHERE depID = '$depID' ";
        //$result=mysqli_query($conn,$sql) or die(mysqli_error($con));
        $result = DbHelp::query($sql,$conn);
        require("connection_close.php");
        return $result;
    }
    public static function delete ($depID)
    { 
        require("connection_connect.php");
        $sql = "DELETE FROM department WHERE depID = '$depID'";
        //$result=mysqli_query($conn,$sql) or die(mysqli_error($con));
        $result = DbHelp::query($sql,$conn);
        return $result;
        require("connection_close.php");
    }
}
?>