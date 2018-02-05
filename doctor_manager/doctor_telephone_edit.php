<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Doctor Telephone</h1>
    
    <h3>Doctor: <?php echo $current_doctor->getFullName(); ?></h3>
    <form action="index.php" method="post" id="edit_doctor_address_form">
        <input type="hidden" name="action" value="update_doctor_telephone_db" />
        
        <input type="hidden" name="telephone_id" value="<?php echo $telephone_key; ?>" />
        <input type="hidden" name="doctor_id" value="<?php echo $doctor_key; ?>" />

        
        
         <label>Telephone Type:</label>       
          <select id="telephone_type" name="telephone_type">   
            <?php foreach($telephone_types as $key => $type){ ?>
                      <option value="<?php echo $key; ?>"  <?php if ($selected == $key) echo ' selected="selected"'; ?> > <?php echo $type; ?> </option>
            <?php } ?>
        </select><br>        

        <label>Phone:</label>
        <input type="text" name="dr_telephone" value="<?php echo $doctor_phone->getPhone();  ?>">
        <br>
         <label>Locations:</label>       
          <select id="address_id" name="address_id">
           
            <?php foreach($address_list as $key => $address){ ?>

                      <option value="<?php echo $key; ?>" 
                          <?php if ($address_key == $key) echo ' selected="selected"'; ?>    > <?php echo $address; ?> </option>
            <?php } ?>
        </select><br>         
       <!-- <label>Name:</label>
        <input type="text" name="dr_address_name" value="<?php echo $current_address;  ?>">-->
        <br>        
 

        <label>&nbsp;</label>
        <input type="submit" value="submit">
        <br>
    </form>
    <p><a href="index.php?action=list_doctors">View Doctor List</a></p>
</main>
<?php include '../view/footer.php'; ?>