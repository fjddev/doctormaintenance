<?php include '../view/header.php'; ?>
<main>
    <h1>Add Doctor Telephone</h1>
    
    <h3>Doctor: <?php echo $current_doctor->getFullName(); ?></h3>
    <form action="index.php" method="post" id="edit_doctor_address_form">
        <input type="hidden" name="action" value="add_doctor_telephone_db" />
        <input type="hidden" name="doctor_id" value="<?php echo $doctor_key; ?>" />

        
        
         <label>Telephone Type:</label>       
          <select id="telephone_type" name="telephone_type">
           
            <?php foreach($telephone_types as $key => $type){ ?>
                      <option value="<?php echo $key; ?>"    > <?php echo $type; ?> </option>
            <?php } ?>
        </select><br>        

        <label>Phone:</label>
        <input type="text" name="dr_telephone" value="">
        <br>
 
         <label>Locations:</label>       
          <select id="address_list" name="address_list">
           
            <?php foreach($address_list as $key => $address){ ?>

                      <option value="<?php echo $key; ?>"    > <?php echo $address; ?> </option>
            <?php } ?>
        </select><br> 
        <label>&nbsp;</label>
        <input type="submit" value="submit">
        <br>
    </form>
    <p><a href="index.php?action=list_doctors">View Doctor List</a></p>
</main>
<?php include '../view/footer.php'; ?>