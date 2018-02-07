<?php
    if(!empty($_POST['district'])){
        require_once('../../connection_connect.php');
        $district = $_POST['district'];
        $sql = "SELECT * FROM subdistrict WHERE districtID = $district ORDER BY subdistrictName";
        $result = mysqli_query($conn,$sql);
        if(!empty($result)){
            while($row = mysqli_fetch_array($result)) {
                echo '<option value="' . $row['subdistrictID'] . '">' . $row['subdistrictName'] . '</option>';
            }
        }else{
            return false;
        }
    }
    require_once('../../connection_close.php');
    exit();
?>