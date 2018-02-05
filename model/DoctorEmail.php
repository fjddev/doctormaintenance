<?php

   class DoctorEmail{
       private $id;    //email  id 
       private $email; //
       private $doctor_id;
       
       public function __construct(){
           
       }
       function getId() {
           return $this->id;
       }

       function getEmail() {
           return $this->email;
       }

       function getDoctor_id() {
           return $this->doctor_id;
       }

       function setId($id) {
           $this->id = $id;
       }

       function setEmail($email) {
           $this->email = $email;
       }

       function setDoctor_id($doctor_id) {
           $this->doctor_id = $doctor_id;
       }


       
   }



?>

