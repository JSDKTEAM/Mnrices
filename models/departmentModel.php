<?php
require_once("connection_connect.php");
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
        $con = conDb::getInstance();
        $sql = "select * from department where depID = '$depID' ";
        $stmt = $con->query($sql);
        $result = $stmt->fetch();
        if($stmt->rowCount() > 0)
        {
            $depID= $my_row['depID'];
            $depName = $my_row['depName'];
            return new Department($depID,$depName);
        }
        else
        {
            return false;
        }
       
    }
    public static function getAll()
    {
        $con = conDb::getInstance();
        $sql = "select * from department ORDER BY depName";
        $stmt = $con->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$result=mysqli_query($conn,$sql) or die(mysqli_error($con));
        foreach($result as $key=>$my_row)
        {
            $depID= $my_row['depID'];
            $depName = $my_row['depName'];
            $departmentList[]= new Department($depID,$depName);
        }

        return $departmentList;
    }
    public static function insert($depName)
    {
        $con = conDb::getInstance();
        $sql = 'INSERT INTO department (depID,depName) VALUES (?,?)';
        $stmt = $con->prepare($sql);
        $check = $stmt->execute(['',$depName]);   
        return $check;
    }
    public static function update($depID,$depName)
    { 
        $con = conDb::getInstance();
        $sql = "UPDATE department SET depName = ? WHERE depID = ? ";
        $stmt = $con->prepare($sql);
        $check = $stmt->execute([$depName,$depID]);   
        return $check;
    }
    public static function delete ($depID)
    { 
        $con = conDb::getInstance();
        $sql = "DELETE FROM department WHERE depID = ?";
        $stmt = $con->prepare($sql);
        $check = $stmt->execute([$depID]);   
        return $check;
    }
}
?>