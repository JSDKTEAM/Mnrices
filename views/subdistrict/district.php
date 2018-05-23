<?php
    require_once('../../connection_connect.php');
    if(!empty($_POST['province'])){
        
        $province = $_POST['province'];
        $sql = "SELECT * FROM district WHERE 	provinceID = $province ORDER BY districtName";
        $result = mysqli_query($conn,$sql);
        if(!empty($result)){
            while($row = mysqli_fetch_array($result)) {
                echo '<option value="' . $row['districtID'] . '">' . $row['districtName'] . '</option>';
            }
        }else{
            return false;
        }
    }
    require_once('../../connection_close.php');
    exit();
?>