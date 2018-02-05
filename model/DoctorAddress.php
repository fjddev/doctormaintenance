<?php

     class DoctorAddress{
         private $address_id;
         private $address_name;
         private $status;
         private $address;
         private $address2;
         private $address3;
         private $address4;
         private $city;
         private $state;
         private $zip5;
         private $zip4;
         private $address_type;
         private $doctor_id;
         
         
         function getAddress_type() {
             return $this->address_type;
         }

         function setAddress_type($address_type) {
             $this->address_type = $address_type;
         }

                
   
         
         
         function getAddress_id() {
             return $this->address_id;
         }

         function getStatus() {
             return $this->status;
         }          
         function getAddress_name() {
             return $this->address_name;
         }         
         
         function getAddress() {
             return $this->address;
         }
         function getAddress2() {
             return $this->address2;
         }  
         function getAddress3() {
             return $this->address3;
         }      
         function getAddress4() {
             return $this->address4;
         }         

         function getCity() {
             return $this->city;
         }

         function getState() {
             return $this->state;
         }

         function getZip5() {
             return $this->zip5;
         }

         function getZip4() {
             return $this->zip4;
         }

         function getDoctor_id() {
             return $this->doctor_id;
         }

         function setAddress_id($address_id) {
             $this->address_id = $address_id;
         }

         function setAddress($address) {
             $this->address = $address;
         }
         function setAddress2($address2) {
             $this->address2 = $address2;
         } 
         function setAddress3($address3) {
             $this->address3 = $address3;
         }         
         function setAddress4($address4) {
             $this->address4 = $address4;
         }         

         function setStatus($status) {
             $this->status = $status;
         }          
         function setAddress_name($address_name) {
             $this->address_name = $address_name;
         }           
         function setCity($city) {
             $this->city = $city;
         }

         function setState($state) {
             $this->state = $state;
         }

         function setZip5($zip5) {
             $this->zip5 = $zip5;
         }

         function setZip4($zip4) {
             $this->zip4 = $zip4;
         }

         function setDoctor_id($doctor_id) {
             $this->doctor_id = $doctor_id;
         }

         
     }

?>

