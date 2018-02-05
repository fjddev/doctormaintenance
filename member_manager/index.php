<?php
require('../model/database.php');
require('../model/doctor.php');
require('../model/DoctorDB.php');
require('../model/product.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}  

if ($action == 'list_products') {
    $doctor_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($doctor_id == NULL || $doctor_id == FALSE) {
        $doctor_id = 1;
    }
    $doctorDB = new DoctorDB();
    $current_doctor = $doctorDB->getCategory($doctor_id);
    $doctors = $doctorDB->getDoctors();
    
    $productDB= new ProductDB();
    $products = $productDB->getProductsByCategory($doctor_id);

    include('product_list.php');
} else if ($action == 'view_product') {
    $doctorDB = new DoctorDB();
    $doctors = $doctorDB->getDoctors();

    $product_id = filter_input(INPUT_GET, 'product_id', 
            FILTER_VALIDATE_INT);   
    $productDB = new ProductDB();
    $product = $productDB->getProduct($product_id);

    include('product_view.php');
}
?>