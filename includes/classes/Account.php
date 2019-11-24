<?php
    class Account {

        private $errorArray;

        public function __constructor() {
            $this->errorArray = array();
        }

        public function register($un, $fn, $ln, $em, $em2, $pass,$pass2) {
            $this->validateUserName($un);
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateEmails($em, $em2);
            $this->validatePasswords($pass, $pass2);
        }

        private function validateUserName($us) {
            if(strlen($us) > 25 || strlen($us) < 5) {
                array_push($this->errorArray, "Your userName must be between 5 and 25 character");
                return;
            }
        }
        
        private function validateFirstName($fn) {
            
        }
        
        private function validateLastName($ln) {
            
        }
        
        private function validateEmails($em1, $em2) {
            
        }
        
        private function validatePasswords($pass1, $pass2) {
            
        }
        
    }

?>