<?php include '../view/header.php'; ?>
<main>
    <h1>Add Doctor Email</h1>
    
    <h3>Doctor: <?php echo $current_doctor->getFullName(); ?></h3>
    <form action="index.php" method="post" id="edit_doctor_address_form">
        <input type="hidden" name="action" value="add_doctor_email_db" />
        <input type="hidden" name="doctor_id" value="<?php echo $doctor_key; ?>" />
        
        <label>Email:</label>
        <input type="text" name="dr_email" value="">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="submit">
        <br>
    </form>
    <p><a href="index.php?action=list_doctors">View Doctor List</a></p>
</main>
<?php include '../view/footer.php'; ?>