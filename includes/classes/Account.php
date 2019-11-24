<?php
    class Account {

        private $errorArray = array("title" => array(), "type" => array());

        public function __constructor() {
            $this->errorArray = array();
        }

        public function register($un, $fn, $ln, $em, $em2, $pass,$pass2) {
            $this->validateUserName($un);
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateEmails($em, $em2);
            $this->validatePasswords($pass, $pass2);

            if(empty($this->errorArray)) {
                //Insert into DB
                return true;
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

        private function validateUserName($us) {
            if(strlen($us) > 25 || strlen($us) < 5) {
                array_push($this->errorArray, "Your userName must be between 5 and 25 character");
                return;
            }
        }
        
        private function validateFirstName($fn) {
            if(strlen($fn) > 25 || strlen($fn) < 2) {
                array_push($this->errorArray, "Your first name must be between 2 and 25 character");
                return;
            }
            
        }
        
        private function validateLastName($ln) {
            if(strlen($ln) > 25 || strlen($ln) < 2) {
                array_push($this->errorArray, "Your last name must be between 2 and 25 character");
                return;
            }
        }
        
        private function validateEmails($em1, $em2) {
            if($em1 != $em2) {
                array_push($this->errorArray, "Your emails don't match");
                return;
            }

            if(!filter_var($em1, FILTER_VALIDATE_EMAIL)) {
                array_push($this->errorArray, "Email is invalid");
                return;
            }

            //TODO: check that user name hasn't been already use
        }
        
        private function validatePasswords($pass1, $pass2) {
            if($pass1 != $pass2) {
                array_push($this->errorArray, "Your passwords don't matchr");
                return;
            }

            if(preg_match('/[^A-Za-z0-9]/', $pass1)) {
                array_push($this->errorArray, "Your passwords can contain only numbers and leters");
                return;
            }

            if(strlen($pass1) > 25 || strlen($pass1) < 5) {
                array_push($this->errorArray, "Your password must be between 5 and 25 character");
                return;
            }
            
        }
        
    }

?>