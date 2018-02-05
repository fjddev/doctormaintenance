<?php include '../view/header.php'; ?>
<?php     
     $titles = [];
  function addAnotherTitle(){
      $t = $_POST["title"];
      echo "php " . $t;
  }
?> 


<main>
    <h1>Add A Doctor</h1>
    

    <form action="index.php" method="post" id="edit_doctor_address_form">
        <input type="hidden" name="action" value="add_doctor_db" />

        
        <label>Credentials:</label>
        <input type="text" name="credentials" value="">
        <br>

        
        <label>First Name:</label>
        <input type="text" name="dr_fname" value="">
        <br>       
        
        <label>Last Name:</label>
        <input type="text" name="dr_lname" value="">
        <br>   
        <label>Title(s)</label><br>
        <div class="title_group">  
            <input class="title" type="text" name="title[]" value=""><br>
            <input class="title" type="text" name="title[]" value=""><br>
            <input class="title" type="text" name="title[]" value=""><br>
            <input class="title" type="text" name="title[]" value=""><br>
            <input class="title" type="text" name="title[]" value="">
        </div>

        <br>
        <label>Care Level:</label>
      
          <select id="care_level" name="dr_care_level">   
            <?php foreach($careLevelArray as $key=>$value){ ?>
                      <option value="<?php echo $key; ?>"> <?php echo $value; ?> </option>
            <?php } ?>
        </select><br>
        <br>             
        <label>Country Code:</label>
      
          <select id="country_code" name="dr_country_code">   
            <?php foreach($countryArray as $value){ ?>
                      <option value="<?php echo $value['code']; ?>"> <?php echo $value['name']; ?> </option>
            <?php } ?>
        </select><br>
        <br>        
        
        <label>&nbsp;</label>
        <input type="submit" value="Add Doctor">
        <br>
    </form>
    <p><a href="index.php?action=list_doctors">View Doctor List</a></p>
</main>
<?php include '../view/footer.php'; ?>