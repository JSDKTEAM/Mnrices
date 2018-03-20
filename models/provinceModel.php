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