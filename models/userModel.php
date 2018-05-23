<?php
    class User{
        public $userName;
        public $password;
        public $firstName;
        public $lastname;
        public $phone;
        public $email;
        public $statusUser;
        public $request;
        public $dateRegis;
        public $typeMember;
        public $typeResearcher;
        public $typeResearcherIP;
        public $typeStaff;
        public $typeExpert;
        public $typeAdmin;
        public $depID;
        public $depName;
        public $depName_user;
        public function __construct($userName,$password,$firstName,$lastname,$phone,$email,$statusUser,$request,$dateRegis,$typeMember,$typeResearcher,$typeResearcherIP,$typeStaff,$typeExpert,$typeAdmin,$depID,$depName,$depName_user)
        {
            $this->userName = $userName;
            $this->password = $password;
            $this->firstName = $firstName;
            $this->lastname = $lastname;
            $this->phone = $phone;
            $this->email = $email;
            $this->statusUser = $statusUser;
            $this->request = $request;
            $this->dateRegis = $dateRegis;
            $this->typeMember = $typeMember;
            $this->typeResearcher = $typeResearcher;
            $this->typeResearcherIP = $typeResearcherIP;
            $this->typeStaff = $typeStaff;
            $this->typeExpert = $typeExpert;
            $this->typeAdmin = $typeAdmin;
            $this->depID = $depID;
            $this->depName = $depName;
            $this->depName_user = $depName_user;
        }
        public static function getAllUser()
        {
            require('connection_connect.php');
            $sql ="SELECT * FROM users 
                    LEFT JOIN department ON department.depID = users.depID";
            $result = DbHelp::query($sql,$conn);
            if(DbHelp::countRow($result) > 0)
            {
                while($row = DbHelp::fetch($result))
                {
                    $userName = $row['userName'];
                    $firstName = $row['firstName'];
                    $lastname = $row['lastName'];
                    $password = $row['passwordUser'];
                    $phone = $row['phone'];
                    $email = $row['email'];
                    $statusUser = $row['statusUser'];
                    $request = $row['request'];
                    $dateRegis = $row['dateRegis'];
                    $typeMember = $row['typeMember'];
                    $typeResearcher = $row['typeResearcher'];
                    $typeResearcherIP = $row['typeResearcherIP'];
                    $typeStaff = $row['typeStaff'];
                    $typeExpert = $row['typeExpert'];
                    $typeAdmin = $row['typeAdmin'];
                    $depID = $row['depID'];
                    $depName_user = $row['depName_user'];
                    $depName = $row['depName'];
                    $userList[] = new User($userName,$password,$firstName,$lastname,$phone,$email,$statusUser,$request,$dateRegis,$typeMember,$typeResearcher,$typeResearcherIP,$typeStaff,$typeExpert,$typeAdmin,$depID,$depName,$depName_user);
                }
                require('connection_close.php');
                return $userList;
            }
            require('connection_close.php');
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
        public static function addUserByAdmin($userName,$password,$firstName,$lastname,$phone,$email,$statusUser,$dep)
        {
            require('connection_connect.php');
            $typeStaff = 0;
            $typeExpert = 0;
            $typeAdmin = 0;
            $typeResearcher = 0;
            $typeResearcherIP = 0;
            $strPassword = password_hash($password,PASSWORD_DEFAULT);
            
            foreach($statusUser as $key=>$value)
            {
                if($value == 'Staff')
                {
                    $typeStaff = 1;
                }
                else if($value == 'Expert')
                {
                    $typeExpert = 1;
                }
                else if($value == 'researcher')
                {
                    $typeResearcher = 1;
                }
                else if($value == 'researcher IP')
                {
                    $typeResearcherIP = 1;
                }
                else if($value == 'Admin')
                {
                    $typeAdmin = 1;
                }
            }
            $sql = "SELECT * FROM department WHERE depName = '$dep'";
            $result = DbHelp::query($sql,$conn);
            if($result)
            {
                while($row = DbHelp::fetch($result))
                {
                    $dep = $row['depID'];
                }
                $sql = "INSERT INTO users(userName,passwordUser,firstname,lastname,phone,email,typeResearcher,typeResearcherIP,typeStaff,typeExpert,typeAdmin,depID,statusUser) 
                VALUES('$userName','$strPassword','$firstName','$lastname','$phone','$email',$typeResearcher,$typeResearcherIP,$typeStaff,$typeExpert,$typeAdmin,$dep,1)";
            }
            else
            {
                $sql ="INSERT INTO users(userName,passwordUser,firstname,lastname,phone,email,typeResearcher,typeResearcherIP,typeStaff,typeExpert,typeAdmin,depName_user,statusUser) 
                VALUES('$userName','$strPassword','$firstName','$lastname','$phone','$email',$typeResearcher,$typeResearcherIP,$typeStaff,$typeExpert,$typeAdmin,'$dep',1)";
            }
            echo $sql;
            $result = DbHelp::query($sql,$conn);
            require('connection_close.php');
        }
    }
?>