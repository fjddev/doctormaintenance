<?php
class DoctorDB {
    public function getDoctors() {
        $db = Database::getDB();
        $query = 'SELECT * FROM doctor
                  ORDER BY last_name, first_name';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $doctors = array();
        foreach ($statement as $row) {

            $doctor = new Doctor();
            $doctor->setID($row['doctor_id']);
            $doctor->setCredentials($row['credentials']);
            $doctor->setFirst_name($row['first_name']);   
            $doctor->setLast_name($row['last_name']);       
            $doctor->setCountry_code($row['country_code']);            
            

            $doctors[] = $doctor;
        }
        return $doctors;
    }
    public function getDoctorTitles($doctor_id){
         $db = Database::getDB();
        $query = 'SELECT * FROM doctor_titles
                  WHERE doctor_id = :doctor_id';    
        $statement = $db->prepare($query);
        $statement->bindValue(':doctor_id', $doctor_id);
        $statement->execute();    

        
        $titles = Array();
  
        foreach ($statement as $row) {
          if(isset($row['title'])){
              $titles[] = $row['title'];
              //array_push($titles,$row['title']);
          }  
        }      
        $statement->closeCursor();  

        return $titles;
    }
    public  function getDoctor($doctor_id) {
        $db = Database::getDB();
        $query = 'SELECT * FROM doctor
                  WHERE doctor_id = :doctor_id';    
        $statement = $db->prepare($query);
        $statement->bindValue(':doctor_id', $doctor_id);
        $statement->execute();    
        $row = $statement->fetch();
        $statement->closeCursor();    

        $doctor = new Doctor();
        $doctor->setID($row['doctor_id']);
        $doctor->setCredentials($row['credentials']);
        $doctor->setFirst_name($row['first_name']);   
        $doctor->setLast_name($row['last_name']); 
        $doctor->setCare_level($row['care_level']);
        $doctor->setCountry_code($row['country_code']);       
        
        $titles = $this->getDoctorTitles($doctor_id);    //from db

        $doctor->setTitles($titles);
     
        return $doctor;
    }
    
    public function getDoctorAddress_us($doctor_id){
        $db = Database::getDB();
        $query = 'SELECT * FROM address_us
                  WHERE doctor_id = :doctor_id';    
        $statement = $db->prepare($query);
        $statement->bindValue(':doctor_id', $doctor_id);
        $statement->execute();    

        $doctor_facilities = array();
        foreach ($statement as $row) {
          if(isset($row['address_id'])){
            $facility = new DoctorAddress();
        
            
            $facility->setAddress_type($row['address_type']);
            $facility->setAddress_id($row['address_id']);
            $facility->setDoctor_id($row['doctor_id']);
            $facility->setStatus($row['status']);       

            $facility->setAddress_name($row['address_name']);           
            
            $facility->setAddress($row['address']);
            $facility->setCity($row['city']);
            $facility->setState($row['state']);    
            $facility->setZip5($row['zip5']);   
            $facility->setZip4($row['zip4']);            
            

            $doctor_facilities[$row['address_id']] = $facility;
          }  
        }     

        return $doctor_facilities;
        

        
    }
    
    
    public function getOneDoctorAddress_us($doctor_id, $address_id){
        $db = Database::getDB();
        $query = 'SELECT * FROM address_us
                  WHERE doctor_id = :doctor_id and address_id = :address_id';    
        $statement = $db->prepare($query);
        $statement->bindValue(':doctor_id', $doctor_id);
        $statement->bindValue(':address_id', $address_id);        
        $statement->execute();    
        $row = $statement->fetch();
        $statement->closeCursor();
        
        
        $doctor_facility = new DoctorAddress();
        
        $doctor_facility->setDoctor_id($row['doctor_id']);
        $doctor_facility->setAddress_id($row['address_id']);
        $doctor_facility->setStatus($row['status']);           
        $doctor_facility->setAddress_name($row['address_name']);        
        $doctor_facility->setAddress($row['address']);   
        $doctor_facility->setAddress2($row['address2']); 
        $doctor_facility->setAddress3($row['address3']);  
        $doctor_facility->setAddress4($row['address4']);        
        $doctor_facility->setCity($row['city']);     
        $doctor_facility->setState($row['state']);    
        $doctor_facility->setZip5($row['zip5']);   
        $doctor_facility->setAddress_type($row['address_type']);
        $doctor_facility->setZip4($row['zip4']);       
        
       
        
        
         
        
        return $doctor_facility;
        

        
    }    
    
    
   public function getOneDoctorTelephone_us($telephone_id, $doctor_id, $address_id){
        $db = Database::getDB();
        $query = 'SELECT * FROM doctor_telephone
                  WHERE id = :telephone_id AND doctor_id = :doctor_id and address_id = :address_id';    
        $statement = $db->prepare($query);
        
        $statement->bindValue(':telephone_id', $telephone_id);        
        $statement->bindValue(':doctor_id', $doctor_id);
        $statement->bindValue(':address_id', $address_id);        
        $statement->execute();    
        $row = $statement->fetch();
        $statement->closeCursor();
        
        
        $doctor_Telephone = new DoctorTelephone();
        
        $doctor_Telephone->setTelephoneId($row['id']);
        
        $doctor_Telephone->setDoctor_id($row['doctor_id']);
        $doctor_Telephone->setAddress_id($row['address_id']);
        $doctor_Telephone->setPhone($row['phone']);
        $doctor_Telephone->setType($row['type']);
        return $doctor_Telephone;
        

        
    }        
    
    public function getEmailAddresses($doctor_id){
        $db = Database::getDB();
        $query = 'SELECT * FROM doctor_email
                  WHERE doctor_id = :doctor_id';    
        $statement = $db->prepare($query);
        $statement->bindValue(':doctor_id', $doctor_id);
        $statement->execute();          
        
        
        $doctor_email_addresses = array();
        foreach ($statement as $row) {

            $doctorEmail = new DoctorEmail();
        
            $doctorEmail->setId($row['id']);
            $doctorEmail->setDoctor_id($row['doctor_id']);      
            $doctorEmail->setEmail($row['email']);            
            
            
            

            $doctor_email_addresses[$row['id']] = $doctorEmail;
        }     
        
        return $doctor_email_addresses;
                
    }
   
    
    public function getTelephoneNumbers($doctor_id){
        $db = Database::getDB();
        $query = 'SELECT * FROM doctor_telephone
                  WHERE doctor_id = :doctor_id';    
        $statement = $db->prepare($query);
        $statement->bindValue(':doctor_id', $doctor_id);
        $statement->execute();          
        
        
        $doctor_telephones = array();
        foreach ($statement as $row) {

            $doctorTelephone = new DoctorTelephone();
            
            
            $doctorTelephone->setAddress_id($row['address_id']);
            $doctorTelephone->setTelephoneId($row['id']);
            $doctorTelephone->setDoctor_id($row['doctor_id']);      
            $doctorTelephone->setPhone($row['phone']);            
            
            
            

            $doctor_telephones[] = $doctorTelephone;
        }     
        
        return $doctor_telephones;
                
    }    
    
    public function getDoctorInterests($doctor_id){
        $db = Database::getDB();
        $query = 'SELECT * FROM doctor_interest
                  WHERE doctor_id = :doctor_id';    
        $statement = $db->prepare($query);
        $statement->bindValue(':doctor_id', $doctor_id);
        $statement->execute();          
        
        
        $doctor_interests = array();
        foreach ($statement as $row) {

            $doctorInterest = new DoctorInterest();
            
            
            $doctorInterest->setId($row['id']);
            $doctorInterest->setDoctor_id($row['doctor_id']);      
            $doctorInterest->setInterest($row['interest']);            
            
            
            

            $doctor_interests[] = $doctorInterest;
        }     
        
        return $doctor_interests;
                
    } 
    /********************************************************************************
     * LOOKUPS
     *******************************************************************************/
   

    public function getDoctorReportArray($state ){
        $db = Database::getDB();
        $query='SELECT d.doctor_id, concat_ws(" ",credentials, first_name, + last_name) as name, state 
                FROM doctor d join address_us a on (d.doctor_id = a.doctor_id)
                and a.state=:state';    
        $statement = $db->prepare($query);     
        $statement->bindValue(':state', $state);   
        $statement->execute();   

        $doctor_list=Array();     
        foreach ($statement as $row) {
            $id = $row['doctor_id'];
            $doctor_list[$row['doctor_id']]['name']=$row['name'];
            $doctor_list[$row['doctor_id']]['state']=$row['state']; 
            $doctor_list[$row['doctor_id']]['interest']=Array();
            $doctor_list[$row['doctor_id']]['interest']=$this->getDoctorInterestArray($id);
 

        }

        return $doctor_list;
    }
    
    public function getDoctorInterestArray($doctor_id ){
        $db = Database::getDB();
        $query='SELECT interest from doctor_interest
            WHERE doctor_id = :doctor_id'; 
  
        $statement = $db->prepare($query);     
        $statement->bindValue(':doctor_id', $doctor_id);   
        $statement->execute();
        $doctor_interest=Array();    
        $counter=0;
        foreach ($statement as $row) {

            $doctor_interest[$counter]=$row['interest'];
            ++$counter;

        }

        return $doctor_interest;        
    }    
    public function getCountryArray(){
        $db = Database::getDB();
        $query = 'SELECT * FROM country_lookup order by countryname';
   
        $statement = $db->prepare($query);
        $statement->execute();     
        
        
        //create an associative array of address types
        $country_list = array();
        foreach ($statement as $row) {

               $country_list[$row['countrycode']]['name'] = $row['countryname'] ;
               $country_list[$row['countrycode']]['code']  = $row['code'] ;               
  
        }

       
       return $country_list;
        
        
    }    
    
    
    public function getCareLevelArray(){
        $db = Database::getDB();
        $query = 'SELECT * FROM doctor_care_level_types order by care_type_value';
   
        $statement = $db->prepare($query);
        $statement->execute();     
        
        
        //create an associative array of address types
        $care_list = array();
        foreach ($statement as $row) {

               $care_list[$row['care_level_key']] = $row['care_type_value'] ;            
  
        }
       
       return $care_list;
        
        
    }       
    public function getDoctorAddressTypes(){
        $db = Database::getDB();
        $query = 'SELECT * FROM doctor_address_types';
   
        $statement = $db->prepare($query);
        $statement->execute();     
        
        
        //create an associative array of address types
        $address_types = array();
        
       foreach ($statement as $row) {
           $address_types[$row['type_code']]  = $row['type_value'] ;
       }
       
       return $address_types;
        
        
    }
    
    public function getDoctorTelephoneTypes(){
        $db = Database::getDB();
        $query = 'SELECT * FROM doctor_telephone_types';
   
        $statement = $db->prepare($query);
        $statement->execute();     
        
        
        //create an associative array of address types
        $telephone_types = array();
        
       foreach ($statement as $row) {
           $telephone_types[$row['type_code']]  = $row['type_value'] ;
       }
       
       return $telephone_types;
        
        
    }    
    
    public function getDoctorDisplayAddresses($doctor_id){
        
        $db = Database::getDB();
        $query = 'SELECT * FROM address_us where doctor_id = :doctor_id';
   
        $statement = $db->prepare($query);
        $statement->bindValue(':doctor_id', $doctor_id);       
        $statement->execute();     
        
        $address_for_doctor = array();
        
       foreach ($statement as $row) {
           $address_for_doctor[$row['address_id']]  = 
                      $row['address_name'] . ' | ' .                    
                      $row['address'] . ' | ' . 
                      $row['city'] .    ' | ' . 
                      $row['state'] .   ' | ' .
                      $row['zip5']  . '-' . $row['zip4'];
       }
       
       return $address_for_doctor;        
    }
    /**************************************************************************
     * 
     *                            Adds and Updates
     * 
     * ********************************************************************
     */
    public function updateDoctor($doctor_id, $credentials,$fname, $lname, $country_code, $care_level, $titles){
        $db = Database::getDB();

        $query = 'UPDATE doctor
                    SET credentials = :credentials,
                        first_name = :first_name,
                        last_name = :last_name,
                        care_level = :care_level,
                        country_code = :country_code
                  WHERE doctor_id = :doctor_id';    

        $statement = $db->prepare($query);   
        $statement->bindValue(':credentials', $credentials);
        $statement->bindValue(':first_name', $fname);        
        $statement->bindValue(':last_name', $lname);
        $statement->bindValue(':care_level', $care_level);        
        $statement->bindValue(':country_code', $country_code);

        $statement->bindValue(':doctor_id', $doctor_id);        
    
        $statement->execute();  
        $statement->closeCursor();       
        /*
         * -Remove all doctor titles
         * -Add the new Doctor Titles ...From Update
         */
        if(count(titles) > 0) {
            $this->deleteDoctorTitles($doctor_id);
            foreach($titles as $key => $title){
               $this->addDoctorTitles($doctor_id, $title);
            }            
        }
    }      
    public function updateDoctorFacilityUS($address_id,$doctor_id, $address_type, $address,$address2,$address3,$address4, $city, $state, $zip5, $zip4){

        $db = Database::getDB();
        $query = 'UPDATE address_us
                    SET address = :address,
                        address2 = :address2,
                        address3 = :address3,
                        address4 = :address4,
                        address_type = :address_type,
                        city = :city,
                        state = :state,
                        zip5 = :zip5,
                        zip4 = :zip4
                  WHERE address_id = :address_id
                   AND doctor_id = :doctor_id';    
  
        $statement = $db->prepare($query);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':address2', $address2);
        $statement->bindValue(':address3', $address3);
        $statement->bindValue(':address4', $address4);        
        $statement->bindValue(':address_type', $address_type);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':zip5', $zip5);
        $statement->bindValue(':zip4', $zip4);
        $statement->bindValue(':address_id', $address_id);
        $statement->bindValue(':doctor_id', $doctor_id);        
        $statement->execute();  
        $statement->closeCursor();
    }
    
    public function updateDoctorPhone($telephone_id, $address_id, $doctor_id, $phone, $telephone_type){
        $db = Database::getDB();

        $query = 'UPDATE doctor_telephone
                    SET phone = :phone,
                        type = :telephone_type,
                        address_id = :address_id
                  WHERE id = :telephone_id 
                   AND  doctor_id = :doctor_id';    

        $statement = $db->prepare($query);   
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':telephone_type', $telephone_type); 
        $statement->bindValue(':address_id', $address_id);
        $statement->bindValue(':telephone_id', $telephone_id);        

        $statement->bindValue(':doctor_id', $doctor_id);        
        $statement->execute();  
        $statement->closeCursor();        
    }
    public function clearDoctorAddressPhone($address_id){
        $db = Database::getDB();

        $query = 'UPDATE doctor_telephone
                    SET address_id = NULL

                  WHERE address_id = :address_id ';    

        $statement = $db->prepare($query);   

        $statement->bindValue(':address_id', $address_id);
    
    
        $statement->execute();  
        $statement->closeCursor();         
    }
    
    public function updateDoctorEmail($email_id,$doctor_id, $email){
        $db = Database::getDB();

        $query = 'UPDATE doctor_email
                    SET email = :email

                  WHERE id = :id 
                   AND  doctor_id = :doctor_id';    

        $statement = $db->prepare($query);   
        $statement->bindValue(':email', $email);

        $statement->bindValue(':id', $email_id);
        $statement->bindValue(':doctor_id', $doctor_id);        
    
        $statement->execute();  
        $statement->closeCursor();        
    }    
    
    
   public function updateDoctorInterest($interest_id,$doctor_id, $interest){
        $db = Database::getDB();

        $query = 'UPDATE doctor_interest
                    SET interest = :interest

                  WHERE id = :id 
                   AND  doctor_id = :doctor_id';    

        $statement = $db->prepare($query);   
        $statement->bindValue(':interest', $interest);

        $statement->bindValue(':id', $interest_id);
        $statement->bindValue(':doctor_id', $doctor_id);        
    
        $statement->execute();  
        $statement->closeCursor();        
    }    
    public function deleteDoctorTitles($doctor_id){
       $db = Database::getDB();
       $query = "DELETE FROM doctor_titles "
                . "WHERE doctor_id = :doctor_id"; 
       $statement = $db->prepare($query);   
       $statement->bindValue(':doctor_id', $doctor_id);          
       $statement->execute(); 
       $statement->closeCursor();     
    }
  public function addDoctorTitles($doctor_id, $title){
       $db = Database::getDB();
       $query = "INSERT INTO doctor_titles(title, doctor_id)"
                . "VALUES(:title, :doctor_id)";    
       $statement = $db->prepare($query);   
       $statement->bindValue(':title', $title);
       $statement->bindValue(':doctor_id', $doctor_id);          
       $statement->execute(); 
       $statement->closeCursor();         
  }   
    
  public function addDoctor($credentials, $first_name, $last_name, $country_code, $care_level,$titles){
        $db = Database::getDB();
        
        $query = "INSERT INTO doctor(credentials, first_name, last_name,care_level, country_code )"
                . "VALUES(:credentials, :first_name, :last_name,:care_level, :country_code)";

        $statement = $db->prepare($query);   
        $statement->bindValue(':credentials', $credentials);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name); 
        $statement->bindValue(':care_level', $care_level);         
        $statement->bindValue(':country_code', $country_code);        
        $statement->execute(); 
        
        $last_doctor_id = $db->lastInsertId();
        
//        $last_doctor_id = last_insert_id();
        $statement->closeCursor();        
        foreach($titles as $key => $title){
           $this->addDoctorTitles($last_doctor_id, $title);
        }
        return $last_doctor_id;
    }      
    
    public function addDoctorFacilityUS($doctor_id, $address_type,$address_name, $address, $address2, $address3, $address4, $city, $state, $zip5, $zip4, $status){
        

        $db = Database::getDB();
        
        $query = "INSERT INTO address_us (status, address_name,address,address2,address3,address4, address_type, city, state, zip5, zip4, doctor_id) "
                . " VALUES(:status,:address_name,:address,:address2,:address3,:address4, :address_type, :city, :state, :zip5, :zip4, :doctor_id )";
        
             
        try{
            $statement = $db->prepare($query);
            $statement->bindValue(':address', $address);
            $statement->bindValue(':address2', $address2); 
            $statement->bindValue(':address3', $address3);    
            $statement->bindValue(':address4', $address4);            
            $statement->bindValue(':status', $status);             
            $statement->bindValue(':address_name', $address_name);            
            $statement->bindValue(':address_type', $address_type);
            $statement->bindValue(':city', $city);
            $statement->bindValue(':state', $state);
            $statement->bindValue(':zip5', $zip5);
            $statement->bindValue(':zip4', $zip4);
            $statement->bindValue(':doctor_id', $doctor_id);
            $statement->execute();  
            $statement->closeCursor();
        }catch(Exception $e){
            $error_message = $e->getMessage();
            echo $error_message;
        }
    }    
    
    public function addDoctorPhone($address_id, $doctor_id, $phone, $telephone_type){
        $db = Database::getDB();
        
        $query = "INSERT INTO doctor_telephone (phone, type, address_id, doctor_id )"
                . "VALUES(:phone, :type, :address_id, :doctor_id)";

        $statement = $db->prepare($query);   
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':type', $telephone_type);       
        $statement->bindValue(':address_id', $address_id);
        $statement->bindValue(':doctor_id', $doctor_id);        
        $statement->execute();  
        $statement->closeCursor();        
    }    
    
   public function addDoctorInterest($doctor_id, $interest){
        $db = Database::getDB();
        
        $query = "INSERT INTO doctor_interest (interest,doctor_id )"
                . "VALUES(:interest,:doctor_id)";

        $statement = $db->prepare($query);   
        $statement->bindValue(':interest', $interest);
        $statement->bindValue(':doctor_id', $doctor_id);        
        $statement->execute();  
        $statement->closeCursor();        
    }  
    
   public function addDoctorEmail($doctor_id, $email){
        $db = Database::getDB();
        
        $query = "INSERT INTO doctor_email (email,doctor_id )"
                . "VALUES(:email,:doctor_id)";

        $statement = $db->prepare($query);   
        $statement->bindValue(':email', $email);
        $statement->bindValue(':doctor_id', $doctor_id);        
        $statement->execute();  
        $statement->closeCursor();        
    }     

    /*
     * Usage: Deletes a Doctor
     * Referenced Tables:
     *                   interest
     *                   email
     *                   telephone
     *                   address_us
     */
   public function deleteADoctor($doctor_id){
        $db = Database::getDB();
        
        $this->deleteAllDoctorInterest($doctor_id);
        $this->deleteAllDoctorEmail($doctor_id);
        $this->deleteAllDoctorTelephone($doctor_id);
        $this->deleteAllDoctorAddress($doctor_id);
        
        
        
        
        $query = "DELETE FROM doctor where doctor_id = :doctor_id ";   
        
        $statement = $db->prepare($query);   
        $statement->bindValue(':doctor_id', $doctor_id);        
        $statement->execute();  
        $statement->closeCursor();            
    }       
    /*
     * USAGE: DELETES ALL nDoctor interest(s) for a doctor
     * 
     */
    public function deleteAllDoctorInterest($doctor_id){
        $db = Database::getDB();
        
        $query = "DELETE FROM doctor_interest where doctor_id = :doctor_id ";   
        
        $statement = $db->prepare($query);   
        $statement->bindValue(':doctor_id', $doctor_id);        
        $statement->execute();  
        $statement->closeCursor();          
    }
    /*
     * USAGE: DELETES All doctor emails 
     */
    public function deleteAllDoctorEmail($doctor_id){
        $db = Database::getDB();
        
        $query = "DELETE FROM doctor_email where doctor_id = :doctor_id ";   
        
        $statement = $db->prepare($query);   
        $statement->bindValue(':doctor_id', $doctor_id);        
        $statement->execute();  
        $statement->closeCursor();          
    }   
    
    /*
     * USAGE: DELETES ALL nDoctor Telephones(s) for a doctor
     * 
     */    
    public function deleteAllDoctorTelephone($doctor_id){
        $db = Database::getDB();
        
        $query = "DELETE FROM doctor_telephone where doctor_id = :doctor_id ";   
        
        $statement = $db->prepare($query);   
        $statement->bindValue(':doctor_id', $doctor_id);        
        $statement->execute();  
        $statement->closeCursor();          
    }    
    /*
     * USAGE: DELETE a Doctor Telephone
     * 
     */    
    public function deleteDoctorTelephone($telephone_id){
        $db = Database::getDB();
        
        $query = "DELETE FROM doctor_telephone where id = :telephone_id ";   
        
        $statement = $db->prepare($query);   
        $statement->bindValue(':telephone_id', $telephone_id);        
        $statement->execute();  
        $statement->closeCursor();          
    } 
    
    /*
     * USAGE: DELETE a Doctor Email
     * 
     */    
    public function deleteDoctorEmail($email_id){
        $db = Database::getDB();
        
        $query = "DELETE FROM doctor_email where id = :email_id ";   
        
        $statement = $db->prepare($query);   
        $statement->bindValue(':email_id', $email_id);        
        $statement->execute();  
        $statement->closeCursor();          
    }     
    
    /*
     * USAGE: DELETE a Doctor Email
     * 
     */    
    public function deleteDoctorInterest($interest_id){
        $db = Database::getDB();
        
        $query = "DELETE FROM doctor_interest where id = :interest_id ";   
        
        $statement = $db->prepare($query);   
        $statement->bindValue(':interest_id', $interest_id);        
        $statement->execute();  
        $statement->closeCursor();          
    }     
        
    
    /*
     * USAGE: DELETES ALL Doctor interest(s) for a doctor
     * 
     */  
    public function deleteAllDoctorAddress($doctor_id){
        $db = Database::getDB();
        
        $query = "DELETE FROM address_us where doctor_id = :doctor_id ";   
        
        $statement = $db->prepare($query);   
        $statement->bindValue(':doctor_id', $doctor_id);        
        $statement->execute();  
        

        $statement->closeCursor();      
        
        
    }     
    
    
    public function resetDoctorAddress($address_id, $status){
        $db = Database::getDB();
        
        $statusReset="";

        if($status == "Active"){
            $statusReset="InActive";
        } else{
            $statusReset = "Active";
        }
 
        
        $query = "UPDATE address_us"
                . " SET status = :resetStatus "
                . " where address_id = :address_id ";   
        
        $statement = $db->prepare($query);   
        $statement->bindValue(':address_id', $address_id);  
        $statement->bindValue(':resetStatus', $statusReset);        
        $statement->execute();  
        

        $statement->closeCursor();      
        
        $this->clearDoctorAddressPhone($address_id);
    }     
}
?>