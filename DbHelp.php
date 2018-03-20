<?php
    class DbHelp
    {
        private function __construct(){}
        public static function query($sql,$con)
        {
            $result = mysqli_query($con,$sql);
            return $result;
        }
        public static function fetch($result)
        {
            $result = mysqli_fetch_array($result);
            return $result;
        }
        public static function countRow($result)
        {
            $row = mysqli_num_rows($result);
            return $row;
        }
    }
?>