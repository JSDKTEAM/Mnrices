<?php
    class Province{
        public $provinceID;
        public $provinceName;
    
    public function __construct($provinceID,$provinceName)
    {
        $this->provinceID = $provinceID;
        $this->provinceName = $provinceName;
    }
    public static function getAll()
    {
        require('connection_connect.php');
        $sql = "SELECT * FROM province ORDER BY provinceName";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result))
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