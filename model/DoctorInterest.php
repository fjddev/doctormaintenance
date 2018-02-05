<?php
   class DoctorInterest{
       private $id;
       private $interest;
       private $doctor_id;
       
       
       function getId() {
           return $this->id;
       }

       function getInterest() {
           return $this->interest;
       }

       function getDoctor_id() {
           return $this->doctor_id;
       }

       function setId($id) {
           $this->id = $id;
       }

       function setInterest($interest) {
           $this->interest = $interest;
       }

       function setDoctor_id($doctor_id) {
           $this->doctor_id = $doctor_id;
       }


       
   }
?>

