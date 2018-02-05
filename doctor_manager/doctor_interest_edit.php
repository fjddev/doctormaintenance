<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Doctor Interest</h1>
    
    <h3>Doctor: <?php echo $current_doctor->getFullName(); ?></h3>
    <form action="index.php" method="post" id="edit_doctor_address_form">
        <input type="hidden" name="action" value="update_doctor_interest_db" />
        
        <input type="hidden" name="interest_id" value="<?php echo $interest_id; ?>" />
        <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>" />

        <label>Interest:</label>
        <input type="text" name="dr_interest" value="<?php echo $doctor_interest;  ?>">
        <br>

        <br>        
 

        <label>&nbsp;</label>
        <input type="submit" value="submit">
        <br>
    </form>
    <p><a href="index.php?action=list_doctors">View Doctor List</a></p>
</main>
<?php include '../view/footer.php'; ?>