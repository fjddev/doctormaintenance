<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Doctor Email</h1>
    
    <h3>Doctor: <?php echo $current_doctor->getFullName(); ?></h3>
    <form action="index.php" method="post" id="edit_doctor_address_form">
        <input type="hidden" name="action" value="update_doctor_email_db" />
        
        <input type="hidden" name="email_id" value="<?php echo $email_key; ?>" />
        <input type="hidden" name="doctor_id" value="<?php echo $doctor_key; ?>" />

        <label>Email:</label>
        <input type="text" name="dr_email" value="<?php echo $doctor_email;  ?>">
        <br>

        <br>        
 

        <label>&nbsp;</label>
        <input type="submit" value="submit">
        <br>
    </form>
    <p><a href="index.php?action=list_doctors">View Doctor List</a></p>
</main>
<?php include '../view/footer.php'; ?>