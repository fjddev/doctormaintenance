<?php include '../view/header.php'; ?>

<main>
    <h1>Edit Doctor</h1>
    
    <h3>Doctor: <?php echo $current_doctor->getFullName(); ?></h3>
    <form action="index.php" method="post" id="edit_doctor_form">
        <input type="hidden" name="action" value="update_doctor_db" />
        

        <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>" />

        <label>Credentials:</label>
        <input type="text" name="credentials" value="<?php echo $current_doctor->getCredentials();  ?>">
        <br>
        
        <label>First Name:</label>
        <input type="text" name="dr_fname" value="<?php echo $current_doctor->getFirst_name();  ?>">
        <br>        

        <label>Last Name:</label>
        <input type="text" name="dr_lname" value="<?php echo $current_doctor->getLast_name();  ?>">
        <br>  
        <label>Title(s)</label><br>
        <!--
             The code below uses a hard-coded number for each
             of the calls to getTitle()       
        -->
        <div class="title_group">  
            <input class="title" type="text" name="title0" value="<?php echo $current_doctor->getTitle(0); ?>"><br>
            <input class="title" type="text" name="title1" value="<?php echo $current_doctor->getTitle(1); ?>"><br>
            <input class="title" type="text" name="title2" value="<?php echo $current_doctor->getTitle(2); ?>"><br>
            <input class="title" type="text" name="title3" value="<?php echo $current_doctor->getTitle(3); ?>"><br>
            <input class="title" type="text" name="title4" value="<?php echo $current_doctor->getTitle(4); ?>">
        </div>

        <br>        
        
        <label>Care Level:</label>
      
          <select id="care_level" name="doctor_care_level">   
            <?php foreach($careLevelArray as $key=>$value){ ?>
                      <option value="<?php echo $key; ?>" <?php if ($selected_care == $key) echo ' selected="selected"'; ?> > <?php echo $value; ?> </option>
            <?php } ?>
        </select><br>
 
            
        <label>Country:</label>
      
          <select id="country_code" name="dr_country_code">   
            <?php foreach($countryArray as $value){ ?>
                      <option value="<?php echo $value['code']; ?>" <?php if ($selected_country == $value['code']) echo ' selected="selected"'; ?> > <?php echo $value['name']; ?> </option>
            <?php } ?>
        </select><br>        
        
     
        <br>        
 

        <label>&nbsp;</label>
        <input type="submit" value="submit">
        <br>
    </form>
    <p><a href="index.php?action=list_doctors">View Doctor List</a></p>
</main>
<?php include '../view/footer.php'; ?>