<?php
    class User{
        public $userName;
        public $password;
        public $firstName;
        public $lastname;
        public $phone;
        public $email;
        public $userWMLabel;
        public $statusUser;
        public $request;
        public $dateRegis;
        public $typePhoto;
        public $typeStaff;
        public $typeExpert;
        public $typeDep;
        public $typeAdmin;
        public $depID;
        public $depName;
        public $depWMLabel;
        public function __construct($userName,$password,$firstName,$lastname,$phone,$email,$userWMLabel,$statusUser,$request,$dateRegis,$typePhoto,$typeStaff,$typeExpert,$typeDep,$typeAdmin,$depID,$depName,$depWMLabel)
        {
            $this->userName = $userName;
            $this->password = $password;
            $this->firstname = $firstName;
            $this->lastname = $lastname;
            $this->phone = $phone;
            $this->email = $email;
            $this->userWMLabel = $userWMLabel;
            $this->statusUser = $statusUser;
            $this->request = $request;
            $this->dateRegis = $dateRegis;
            $this->typePhoto = $typePhoto;
            $this->typeStaff = $typeStaff;
            $this->typeExpert = $typeExpert;
            $this->typeDep = $typeDep;
            $this->typeAdmin = $typeAdmin;
            $this->depID = $depID;
            $this->depName = $depName;
            $this->depWMLabel = $depWMLabel; 
        }
        public static function getAllUser()
        {
            require('connection_connect');
            $sql ="SELECT * FROM users 
                    LEFT JOIN department ON department.depID = users.depID";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $userName = $row['userName'];
                    $firstName = $row['firstname'];
                    $lastname = $row['lastname'];
                    $phone = $row['phone'];
                    $email = $row['email'];
                    $userWMLabel = $row['userWMLabel'];
                    $statusUser = $row['statusUser'];
                    $request = $row['request'];
                    $dateRegis = $row['dateRegis'];
                    $typePhoto = $row['typePhoto'];
                    $typeExpert = $row['typeExpert'];
                    $typeDep = $row['typeDep'];
                    $typeAdmin = $row['typeAdmin'];
                    $depID = $row['depID'];
                    $depName = $row['depName'];
                    $depWMLabel  = $row['depWMLabel'];
                    $userList[] = new User($userName,$password,$firstName,$lastname,$phone,$email,$userWMLabel,$statusUser,$request,$dateRegis,$typePhoto,$typeStaff,$typeExpert,$typeDep,$typeAdmin,$depID,$depName,$depWMLabel);
                }
                require('connection_close');
                return userList;
            }
            require('connection_close');
        }
        public static function addUser($userName,$password,$firstName,$lastname,$phone,$email,$userWMLabel,$depID)        
        {
            require('connection_connect');
            $password = mysqli_real_escape_string($con,md5(md5(md5($password))));
            $result = 0;
            $sql = "INSERT INTO users 
            VALUES('$userName','$password','$firstName','$lastname','$phone','$email','$userWMLabel',0,false,'$dateRegis','$typePhoto','$typeExpert','$typeDep','$typeAdmin',$depID)";
            if (mysqli_query($conn, $sql)) {
                $strTo = $email;
                $strSubject = "Activate Member Account";
                $strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
                $strHeader .= "From: webmaster@thaicreate.com\nReply-To: webmaster@thaicreate.com";
                $strMessage = "";
                $strMessage .= "Welcome : ".$firstName." ".$lastname."<br>";
                $strMessage .= "=================================<br>";
                $strMessage .= "Activate account click here.<br>";
                $strMessage .= "http://www.thaicreate.com/activate.php?sid=".session_id()."&userName=".$userName."<br>";
                $strMessage .= "=================================<br>";
                $strMessage .= "ThaiCreate.Com<br>";
                $flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 
                $result = 1;
            } else {
                $result = 0;
            }
            require('connection_close');
            return $result;
        }
    }
?>