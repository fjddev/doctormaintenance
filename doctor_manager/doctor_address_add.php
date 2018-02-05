<?php include '../view/header.php'; ?>
<main>
    <h1>Add Doctor Address</h1>
    
    <h3>Doctor: <?php echo $current_doctor->getFullName(); ?></h3>
    <form action="index.php" method="post" id="edit_doctor_address_form">
        <input type="hidden" name="action" value="add_doctor_location_db" />
        <input type="hidden" name="doctor_id" value="<?php echo $doctor_key; ?>" />
         <label>Type:</label>       
          <select id="address_type" name="address_type">
           
            <?php foreach($address_types as $key => $type){ ?>

                      <option value="<?php echo $key; ?>"    > <?php echo $type; ?> </option>
            <?php } ?>
        </select><br>
        <label>Status:</label>          
        <select id="address_status" name="address_status"> 
            <option value="Active" >Active</option>
            <option value="InActive">Inactive</option>
        </select><br>            
        
          

        <label>Name:</label>
        <input type="text" name="dr_address_name" value="">
        <br>
        <label>Address 1:</label>
        <input type="text" name="dr_address" value="">
        <br>
        <label>Address 2:</label>
        <input type="text" name="dr_address2" value="">
        <br>        
        <label>Address 3:</label>
        <input type="text" name="dr_address3" value="">
        <br>   
        <label>Address 4:</label>
        <input type="text" name="dr_address4" value="">
        <br>        
        <label>City:</label>
        <input type="text" name="dr_city" value="">
        <br>
        <label>State:</label>
        <input type="text" name="dr_state" value="">
        <br>        
        <label>Zip:</label>
        <input type="text" name="dr_zip5" value="">
        <br>    
        
        <label>Zip Extended:</label>
        <input type="text" name="dr_zip4" value="">
        <br>        


        <label>&nbsp;</label>
        <input type="submit" value="submit">
        <br>
    </form>
    <p><a href="index.php?action=list_doctors">View Doctor List</a></p>
</main>
<?php include '../view/footer.php'; ?>