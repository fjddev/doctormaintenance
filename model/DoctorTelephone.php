<?php

    class DoctorTelephone
    {
	private $telephone_id;      
	private $phone; 
	private $type; 
	private $doctor_id;
        private $address_id;
        
        public function __construct(){
            
        }
        function getTelephoneId() {
            return $this->telephone_id;
        }

        function getPhone() {
            return $this->phone;
        }

        function getType() {
            return $this->type;
        }

        function getDoctor_id() {
            return $this->doctor_id;
        }
        
        function getAddress_id() {
            return $this->address_id;
        }        

        function setTelephoneId($id) {
            $this->telephone_id = $id;
        }

        function setPhone($phone) {
            $this->phone = $phone;
        }

        function setType($type) {
            $this->type = $type;
        }

        function setDoctor_id($doctor_id) {
            $this->doctor_id = $doctor_id;
        }
        
        function setAddress_id($address_id) {
            $this->address_id = $address_id;
        }        


    }

?>

