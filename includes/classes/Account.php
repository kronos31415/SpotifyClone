<?php
    class Account {
        
        private $con;
        private $errorArray; //("title" => array(), "type" => array());

        public function __construct($con) {
            $this->con = $con;
            $this->errorArray = array();
        }

        public function register($un, $fn, $ln, $em, $em2, $pass, $pass2) {
            $this->validateUserName($un);
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateEmails($em, $em2);
            $this->validatePasswords($pass, $pass2);

            if(empty($this->errorArray) == true) {
                return $this->insertUserDetails($un, $fn, $ln, $em, $pass);
            } else {
                return false;
            }
        }

        public function getError($error) {
            if(!in_array($error, $this->errorArray)) {
                $error = "";
            }
            return "<span class = 'errorMessage'>$error</span>";
        }

        private function insertUserDetails($un, $fn, $ln, $em, $pw) {
            $encryptedPw = md5($pw);
            $profilePic = "assets/images/profile-pics/head-emerald.png";
            $date = date("Y-m-d");
            $result = mysqli_query($this->con, "INSERT INTO users VALUES('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");
            return $result;
        }

        private function validateUserName($us) {
            if(strlen($us) > 25 || strlen($us) < 5) {
                array_push($this->errorArray, Constants::$userNameCharacters);
                return;
            }
        }
        
        private function validateFirstName($fn) {
            if(strlen($fn) > 25 || strlen($fn) < 2) {
                array_push($this->errorArray, Constants::$firstNameCharacters);
                return;
            }
            
        }
        
        private function validateLastName($ln) {
            if(strlen($ln) > 25 || strlen($ln) < 2) {
                array_push($this->errorArray, Constants::$lastNameCharacters);
                return;
            }
        }
        
        private function validateEmails($em1, $em2) {
            if($em1 != $em2) {
                array_push($this->errorArray, Constants::$emailsDoNotMatch);
                return;
            }

            if(!filter_var($em1, FILTER_VALIDATE_EMAIL)) {
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }
        }
        
        private function validatePasswords($pass1, $pass2) {
            if($pass1 != $pass2) {
                array_push($this->errorArray, Constants::$passwordsDoNotMAtch);
                return;
            }

            if(preg_match('/[^A-Za-z0-9]/', $pass1)) {
                array_push($this->errorArray, Constants::$passwordNotAlphaNumeric);
                return;
            }

            if(strlen($pass1) > 25 || strlen($pass1) < 5) {
                array_push($this->errorArray, Constants::$passwordCharacters);
                return;
            }
            
        }
        
    }

?>