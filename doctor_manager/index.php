<?php
require('../model/database.php');
require('../model/doctor.php');
require('../model/DoctorDB.php');
require('../model/DoctorAddress.php');
require('../model/DoctorEmail.php');
require('../model/DoctorTelephone.php');
require('../model/DoctorInterest.php');
require('../model/AGMDTypes.php');
require('../model/product.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_doctors';
    }
}  

if ($action == 'list_doctors') {
    $doctor_id = filter_input(INPUT_GET, 'doctor_id', 
            FILTER_VALIDATE_INT);
    if ($doctor_id == NULL || $doctor_id == FALSE) {
        $doctor_id = 1;
    }


    $doctorDB = new DoctorDB();
    $current_doctor = $doctorDB->getDoctor($doctor_id);
    

    $doctors = $doctorDB->getDoctors();
    
    $facilities_us = $doctorDB->getDoctorAddress_us($doctor_id);
    
    $email_addresses = $doctorDB->getEmailAddresses($doctor_id);
    
    $telephones=$doctorDB->getTelephoneNumbers($doctor_id);
    
    
    $interests=$doctorDB->getDoctorInterests($doctor_id);
    
    include('doctor_list.php');
}else if($action=="remove_doctor_db"){
    $doctor_id = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT); 
    

       
    // Get product and category data
    $doctorDB = new DoctorDB();
    $current_doctor = $doctorDB->getDoctor($doctor_id);       
    
    $doctorDB->deleteADoctor($doctor_id);
    
    header("Location: .?doctor_id=1");  
    
} else if ($action == 'delete_product') {
    // Get the IDs
    $product_id = filter_input(INPUT_POST, 'product_id', 
            FILTER_VALIDATE_INT);
    $doctor_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);

    // Delete the product
    $productDB = new ProductDB();
    $productDB->deleteProduct($product_id);

    // Display the Product List page for the current category
    header("Location: .?category_id=$doctor_id");
} else if($action == 'edit_doctor_location_form'){

    $doctor_key = filter_input(INPUT_POST, 'doctor_id');
    $facility_key = filter_input(INPUT_POST, 'facility_id');
    
    $doctorDB = new DoctorDB();
    $doctor_facility = $doctorDB->getOneDoctorAddress_us($doctor_key, $facility_key);  
    
    $selected = $doctor_facility->getAddress_type();
    
    $current_doctor = $doctorDB->getDoctor($doctor_key);
    
    $address_types = $doctorDB->getDoctorAddressTypes();
    


    include('doctor_address_edit.php');
    
} else if($action == 'edit_doctor_location_selection'){

    $doctor_key = filter_input(INPUT_POST, 'doctor_id');
    $facility_key = filter_input(INPUT_POST, 'facility_id');
    
    $doctorDB = new DoctorDB();
    $doctor_facility = $doctorDB->getOneDoctorAddress_us($doctor_key, $facility_key);  

    
    
    $selected = $doctor_facility->getAddress_type();
    
    $current_doctor = $doctorDB->getDoctor($doctor_key);
    
    $address_types = $doctorDB->getDoctorAddressTypes();
    


    include('doctor_address_edit.php');    
}else if ($action == 'edit_doctor_telephone_selection'){   //Process Add Telephone Form
    $telephone_key = filter_input(INPUT_POST, 'telephone_id');
    $doctor_key = filter_input(INPUT_POST, 'doctor_id');
    $address_key = filter_input(INPUT_POST, 'address_id'); 
    
    $doctorDB = new DoctorDB();
    //Create an Instance: DoctorAddress
    $doctorAddress = $doctorDB->getOneDoctorAddress_us($doctor_key, $address_key);
    //$selected_addr_id = $doctorAddress->getAddress_id();
    
    $current_address=$doctorAddress->getAddress_name();
    $doctor_phone = $doctorDB->getOneDoctorTelephone_us($telephone_key, $doctor_key, $address_key);  
    $current_doctor = $doctorDB->getDoctor($doctor_key);    
    $telephone_types = $doctorDB->getDoctorTelephoneTypes(); 
    
    $selected = $doctor_phone->getType();
    $address_list = $doctorDB->getDoctorDisplayAddresses($doctor_key);
    
    include('doctor_telephone_edit.php');    
    
} else if($action =="add_doctor_location_selection"){
    $doctor_key = filter_input(INPUT_POST, 'doctor_id');
    
    $doctorDB = new DoctorDB();

    $address_types = $doctorDB->getDoctorAddressTypes();
    $current_doctor = $doctorDB->getDoctor($doctor_key);    
    include('doctor_address_add.php');
} else if($action == "edit_doctor_email_selection"){
    $doctor_key = filter_input(INPUT_POST, 'doctor_id');
    $email_key = filter_input(INPUT_POST, 'email_id');
    $doctor_email = filter_input(INPUT_POST, 'doctor_email');

    $doctorDB = new DoctorDB();

    $current_doctor = $doctorDB->getDoctor($doctor_key);  

      
    include('doctor_email_edit.php');  
    
}else if($action == "edit_doctor_interest_selection") {

    $doctor_id = filter_input(INPUT_POST, 'doctor_id');
    $interest_id = filter_input(INPUT_POST, 'interest_id');
    $doctor_interest = filter_input(INPUT_POST, 'dr_interest'); 
    
    $doctorDB = new DoctorDB();    
    $current_doctor = $doctorDB->getDoctor($doctor_id); 
    include('doctor_interest_edit.php');  
}else if($action =="add_doctor_interest_selection"){
    echo "add_doctor_interest_selection";
    $doctor_id = filter_input(INPUT_POST, 'doctor_id');


    $doctorDB = new DoctorDB();

    $current_doctor = $doctorDB->getDoctor($doctor_id);     
    include('doctor_interest_add.php');    
    
}else if($action =="update_doctor_interest_db"){
    echo "update_doctor_interest_db";
    $doctor_id = filter_input(INPUT_POST, 'doctor_id');
    $interest_id = filter_input(INPUT_POST, 'interest_id');
    $doctor_interest = filter_input(INPUT_POST, 'dr_interest');    
    $doctorDB = new DoctorDB();
    
    $doctorDB->updateDoctorInterest($interest_id, $doctor_id, $doctor_interest);
   // Display the doctor list(index.php)
    header("Location: .?doctor_id=$doctor_id");    
    
}if($action == "add_doctor_interest_db"){
   $doctorDB = new DoctorDB();
   $interest = filter_input(INPUT_POST, 'dr_interest');

   

   $doctor_id = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT);   
   $doctorDB->addDoctorInterest($doctor_id, $interest);    
   
   header("Location: .?doctor_id=$doctor_id");     
}else if($action == "update_doctor_email_db"){
    $doctor_key = filter_input(INPUT_POST, 'doctor_id');
    $email_key = filter_input(INPUT_POST, 'email_id');
    $doctor_email = filter_input(INPUT_POST, 'dr_email');    
    $doctorDB = new DoctorDB();
    
    $doctorDB->updateDoctorEmail($email_key, $doctor_key, $doctor_email);
   // Display the doctor list(index.php)
    header("Location: .?doctor_id=$doctor_id");  
}else if($action == "add_doctor_email_selection"){
    
    $doctor_key = filter_input(INPUT_POST, 'doctor_id');


    $doctorDB = new DoctorDB();

    $current_doctor = $doctorDB->getDoctor($doctor_key);     
    include('doctor_email_add.php');
}else if($action == "add_doctor_email_db"){
    $doctor_id = filter_input(INPUT_POST, 'doctor_id', 
            FILTER_VALIDATE_INT);
    $email = filter_input(INPUT_POST, 'dr_email');
    
    $doctorDB = new DoctorDB();
    $doctorDB->addDoctorEmail($doctor_id, $email);
   // Display the doctor list(index.php)
    header("Location: .?doctor_id=$doctor_id");       
}else if ($action == 'add_doctor_location_db'){   //update the doctor address db table 
   $doctorDB = new DoctorDB();
   $address_type = filter_input(INPUT_POST, 'address_type');
   
   $status  = filter_input(INPUT_POST, 'address_status');      
   $address_name = filter_input(INPUT_POST, 'dr_address_name');      
   $address = filter_input(INPUT_POST, 'dr_address');   
   $address2 = filter_input(INPUT_POST, 'dr_address2');     
   $address3 = filter_input(INPUT_POST, 'dr_address3');   
   $address4 = filter_input(INPUT_POST, 'dr_address4');      
   $city = filter_input(INPUT_POST, 'dr_city');
   $state = filter_input(INPUT_POST, 'dr_state');   
   $zip5 = filter_input(INPUT_POST, 'dr_zip5');
   $zip4 = filter_input(INPUT_POST, 'dr_zip4');   
   

   $doctor_id = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT);   
   $doctorDB->addDoctorFacilityUS($doctor_id, $address_type,$address_name, $address,$address2, $address3, $address4, $city, $state, $zip5, $zip4, $status);
   // Display the doctor list(index.php)
    header("Location: .?doctor_id=$doctor_id");     
}else if($action == 'add_doctor_telephone_selection'){
    $doctor_key = filter_input(INPUT_POST, 'doctor_id');
    
    $doctorDB = new DoctorDB();

    $current_doctor = $doctorDB->getDoctor($doctor_key);   
    $telephone_types = $doctorDB->getDoctorTelephoneTypes();
    //
    //   $doctor_id = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT);
 
    $address_list = $doctorDB->getDoctorDisplayAddresses($doctor_key);
     
    include('doctor_telephone_add.php');
    
    
}else if($action == "add_doctor_selection"){

    $doctorDB = new DoctorDB();   
    
    $countryArray = $doctorDB->getCountryArray();

    
    $careLevelArray = $doctorDB->getCareLevelArray();


    
    include('doctor_add.php');
}else if($action == "add_doctor_db"){
    $credentials = filter_input(INPUT_POST, 'credentials');
    $first_name = filter_input(INPUT_POST, 'dr_fname'); 
    $last_name = filter_input(INPUT_POST, 'dr_lname');  
    $country_code = filter_input(INPUT_POST, 'dr_country_code');
    $care_value = filter_input(INPUT_POST, 'dr_care_level');  
    
    $titles = array();
if(isset($_POST["title"]) && is_array($_POST["title"])){ 
    foreach($_POST["title"] as $key => $text_field){
        if(!empty($text_field)){
          $titles[] = $text_field;
        }  
    }

}

    $doctorDB = new DoctorDB();
    $doctor_id = $doctorDB->addDoctor($credentials, $first_name, $last_name, $country_code, $care_value, $titles);

    header("Location: .?doctor_id=$doctor_id");
    
}else if($action == "edit_doctor_selection"){

    $doctor_id = filter_input(INPUT_POST, 'doctor_id');
    

    $doctorDB = new DoctorDB();
    $current_doctor = $doctorDB->getDoctor($doctor_id);
    
    $selected_care = $current_doctor->getCare_level();
    
    $countryArray = $doctorDB->getCountryArray();
    

    
    $selected_country = $current_doctor->getCountry_code();
    
    $careLevelArray = $doctorDB->getCareLevelArray();
    
    include('doctor_edit.php');
    
}else if($action == "update_doctor_db") {
    $doctor_id = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT); 
    $credentials = filter_input(INPUT_POST, 'credentials');
    $fname = filter_input(INPUT_POST, 'dr_fname');
    $lname = filter_input(INPUT_POST, 'dr_lname');
    $care_level = filter_input(INPUT_POST, 'doctor_care_level');    
    $country_code = filter_input(INPUT_POST, 'dr_country_code');
    //Collect only filled in text fields
    $titles = Array();
    for ( $i=0; $i<5; $i++) {
        $title = filter_input(INPUT_POST, 'title' . $i);
        if(!empty($title)){
             $titles[$i] = $title;
        }     
    }

    
    $doctorDB = new DoctorDB();

    $doctorDB->updateDoctor($doctor_id, $credentials, $fname, $lname, $country_code, $care_level, $titles);
    
    header("Location: .?doctor_id=$doctor_id"); 
    
}else if($action == 'delete_doctor_telephone_db'){
    $doctor_id = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT);
    $telephone_id = filter_input(INPUT_POST, 'telephone_id', FILTER_VALIDATE_INT);
    
    $doctorDB = new DoctorDB();

  
    $doctorDB->deleteDoctorTelephone($telephone_id);
    
    header("Location: .?doctor_id=$doctor_id");  
    //
}else if($action == 'delete_doctor_email_db'){
    $doctor_id = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT);
    $email_id = filter_input(INPUT_POST, 'email_id', FILTER_VALIDATE_INT);
    
    $doctorDB = new DoctorDB();

  
    $doctorDB->deleteDoctorEmail($email_id);
    
    header("Location: .?doctor_id=$doctor_id");  
    //
        
}else if($action == 'delete_doctor_interest_db'){
    $doctor_id = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT);
    $interest_id = filter_input(INPUT_POST, 'interest_id', FILTER_VALIDATE_INT);
    
    $doctorDB = new DoctorDB();


    $doctorDB->deleteDoctorInterest($interest_id);
    
    header("Location: .?doctor_id=$doctor_id");  
    //
            
} else if($action == 'update_doctor_location_db'){
   $doctorDB = new DoctorDB(); 
   $doctor_id = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT);  
   $address_id =filter_input(INPUT_POST, 'facility_id', FILTER_VALIDATE_INT);
   $address_type = filter_input(INPUT_POST, 'address_type');
   $address = filter_input(INPUT_POST, 'dr_address');
   $address2 = filter_input(INPUT_POST, 'dr_address2');   
   $address3 = filter_input(INPUT_POST, 'dr_address3');  
   $address4 = filter_input(INPUT_POST, 'dr_address4');   
   $city = filter_input(INPUT_POST, 'dr_city');
   $state = filter_input(INPUT_POST, 'dr_state');
   $zip5 = filter_input(INPUT_POST, 'dr_zip5');
   $zip4 = filter_input(INPUT_POST, 'dr_zip4');
   $doctorDB->updateDoctorFacilityUS($address_id,$doctor_id, $address_type, $address,$address2,$address3,$address4, $city, $state, $zip5, $zip4);
   // Display the doctor list(index.php)
   header("Location: .?doctor_id=$doctor_id");    
}else if($action == 'update_doctor_telephone_db')  {
   $doctorDB = new DoctorDB(); 
   $doctor_id = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT);  
   $address_id = filter_input(INPUT_POST, 'address_id', FILTER_VALIDATE_INT); 
   
   $telephone_id =filter_input(INPUT_POST, 'telephone_id', FILTER_VALIDATE_INT);
   $telephone_type = filter_input(INPUT_POST, 'telephone_type');
   $phone = filter_input(INPUT_POST, 'dr_telephone');
   $doctorDB->updateDoctorPhone($telephone_id, $address_id, $doctor_id, $phone, $telephone_type);
   // Display the doctor list(index.php)
   header("Location: .?doctor_id=$doctor_id");       
}else if($action == 'add_doctor_telephone_db'){
       echo 'add_doctor_telephone_db';
       
   $doctorDB = new DoctorDB();
   $telephone_type = filter_input(INPUT_POST, 'telephone_type');
   $phone = filter_input(INPUT_POST, 'dr_telephone');      
   $address = filter_input(INPUT_POST, 'dr_address');   
   $address_id = filter_input(INPUT_POST, 'address_list', FILTER_VALIDATE_INT);
 
   

   $doctor_id = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT);   
   $doctorDB->addDoctorPhone($address_id, $doctor_id, $phone, $telephone_type);  
   header("Location: .?doctor_id=$doctor_id");  

} else if($action == "reset_doctor_address_db"){
   $doctor_id = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT);  
   $address_id = filter_input(INPUT_POST, 'address_id', FILTER_VALIDATE_INT); 
   $status = filter_input(INPUT_POST, 'status');    
   $doctorDB = new DoctorDB(); 
   
   $doctorDB->resetDoctorAddress($address_id, $status);
   $facilities_us = $doctorDB->getDoctorAddress_us($doctor_id);
   $telephones=$doctorDB->getTelephoneNumbers($doctor_id);
   header("Location: .?doctor_id=$doctor_id"); 
   
} else if($action == "view_doctor_report"){
    
        include('../reports/index.php');
} else if($action == "doctor_report_by_state_interest"){
      echo "doctor_report_by_state_interest";
      $doctor_id = filter_input(INPUT_POST, 'doctor_id', FILTER_VALIDATE_INT); 
      header("Location: .?doctor_id=$doctor_id");
    
} else {

        $doctor_id = 1;

    }

?>