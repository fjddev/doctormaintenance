<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Doctor Address</h1>
    
    <h3>Doctor: <?php echo $current_doctor->getFullName(); ?></h3>
    <form action="index.php" method="post" id="edit_doctor_address_form">
        <input type="hidden" name="action" value="update_doctor_location_db" />
        <input type="hidden" name="facility_id" value="<?php echo $facility_key; ?>" />
        <input type="hidden" name="doctor_id" value="<?php echo $doctor_key; ?>" />
         <label>Type:</label>       
          <select id="address_type" name="address_type">
           
            <?php foreach($address_types as $key => $type){ ?>
                      <option value="<?php echo $key; ?>"  <?php if ($selected == $key) echo ' selected="selected"'; ?> > <?php echo $type; ?> </option>
            <?php } ?>
        </select><br>

        <label>Status:</label>
        <input type="text" name="address_status" id="address_status" value="<?php echo $doctor_facility->getStatus();?>" >
        <br>              
        <label>Name:</label>
        <input type="text" name="dr_address_name" id="noedt" value="<?php echo $doctor_facility->getAddress_name();  ?>" readonly>
        <br>        

        <label>Address:</label>
        <input type="text" name="dr_address" value="<?php echo $doctor_facility->getAddress();  ?>">
        <br>
        <label>Address 2:</label>
        <input type="text" name="dr_address2" value="<?php echo $doctor_facility->getAddress2();  ?>">
        <br>        
        <label>Address 3:</label>
        <input type="text" name="dr_address3" value="<?php echo $doctor_facility->getAddress3();  ?>">
        <br>        
        <label>Address 4:</label>
        <input type="text" name="dr_address4" value="<?php echo $doctor_facility->getAddress4();  ?>">
        <br>        
        <label>City:</label>
        <input type="text" name="dr_city" value="<?php echo $doctor_facility->getCity();  ?>">
        <br>
        <label>State:</label>
        <input type="text" name="dr_state" value="<?php echo $doctor_facility->getState();  ?>">
        <br>        
        <label>Zip:</label>
        <input type="text" name="dr_zip5" value="<?php echo $doctor_facility->getZip5();  ?>">
        <br>    
        
        <label>Zip Extended:</label>
        <input type="text" name="dr_zip4" value="<?php echo $doctor_facility->getZip4();  ?>">
        <br>        


        <label>&nbsp;</label>
        <input type="submit" value="submit">
        <br>
    </form>
    <p><a href="index.php?action=list_doctors">View Doctor List</a></p>
</main>
<?php include '../view/footer.php'; ?>