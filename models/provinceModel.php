<?php
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
        require('connection_connect.php');
        $sql = "SELECT * FROM district WHERE 	provinceID = $provinceID ORDER BY districtName";
        $result = mysqli_query($conn,$sql);
        if(!empty($result)){
            while($row = mysqli_fetch_array($result)) {
                $data[] = $row;
                //echo '<option value="' . $row['districtID'] . '">' . $row['districtName'] . '</option>';
            }
        }else{
            return false;
        }
        require('connection_close.php');
        ob_end_clean();
        print json_encode($data);
        
    }
    public static function getAll()
    {
        require('connection_connect.php');
        $sql = "SELECT * FROM province ORDER BY provinceName";
        $result = DbHelp::query($sql,$conn);
        while($row = DbHelp::fetch($result))
        {
            $provinceID = $row['provinceID'];
            $provinceName = $row['provinceName'];
            $provinceList[] = new Province($provinceID,$provinceName);
        }
        require('connection_close.php');
        return $provinceList;
    }
}
?>