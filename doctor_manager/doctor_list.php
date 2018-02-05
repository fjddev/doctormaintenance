<?php include '../view/header.php'; ?>
<main>
    <!--<h1>Doctor List</h1>-->
    <aside>
        <!-- display a list of categories -->
        <h2>Doctors</h2>
        <nav>
        <ul>
        <?php foreach ($doctors as $doctor) : ?>
            <li>
            <a href="?doctor_id=<?php echo $doctor->getId(); ?>">
                <?php echo $doctor->getFullName(); ?>
            </a>
            </li>
        <?php endforeach; ?>
        </ul>
        </nav>
    </aside>
    
    <!-- Start HERE -->
    
    
    <section>

        <!--
             <h2><?php // echo "Selected:" .  $current_doctor->getFullName(); ?></h2>
        -->
        <a   href="?action=add_doctor_selection">Add Doctor</a><br>     
        <a   href="?action=view_doctor_report">Reports</a>             
        <table>
            <tr>
              
                <th id="th_width">Doctor</th>               
                <th class="right">Edit</th>  
            </tr>   
            <br>
            <tr>
                <td><?php echo $current_doctor->getFullName(); ?></td>

                
                
               <td><form action="." method="post"
                          id="edit_doctor_form">
                    <input type="hidden" name="action"
                           value="edit_doctor_selection">
                    <input type="hidden" name="doctor_id"
                           value="<?php  echo $current_doctor->getId(); ?>">
                    <input type="submit" value="Edit">
                </form></td>                
                            
            </tr>  
            
            <tr>
             <td><form action="." method="post" id="remove_doctor_form">
                    <input type="hidden" name="action"
                           value="remove_doctor_db">
                    <input type="hidden" name="doctor_id"
                           value="<?php  echo $current_doctor->getId(); ?>">
                    <input type="submit" value="Remove Doctor">
                </form></td>                    
            </tr>            
             
            <tr>&nbsp;</tr>   
            <tr>&nbsp;</tr>
            <br>
            <tr>
              
                <th id="th_width">Location</th>
                <th>City</th>
                <th>State</th>    
                <th>Status</th>                  
                <th class="right">Delete</th>
                <th class="right">Edit</th>                
                <!--<th>&nbsp;</th>-->
            </tr>
            <?php foreach ($facilities_us as $facility) : ?>
            <tr>
          
                <td><?php echo $facility->getAddress_name(); ?></td>
                <td><?php echo $facility->getCity(); ?></td>
                <td><?php echo $facility->getState(); ?></td>  
                 <td><?php echo $facility->getStatus(); ?></td>                      
             
                <td><form action="." method="post"
                          id="doctor_address">
                    <input type="hidden" name="action"
                           value="reset_doctor_address_db">
                    <input type="hidden" name="doctor_id"
                           value="<?php  echo $current_doctor->getId(); ?>">
                    <input type="hidden" name="address_id"
                           value="<?php  echo $facility->getAddress_id(); ?>">         
                    <input type="hidden" name="status"
                           value="<?php  echo $facility->getStatus(); ?>">                       
                    <input type="submit" value="Reset">
                </form></td>
                
               <td><form action="." method="post"
                          id="edit_doctor_form">
                    <input type="hidden" name="action"
                           value="edit_doctor_location_selection">
                    <input type="hidden" name="facility_id"
                           value="<?php  echo $facility->getAddress_id(); ?>">
                    <input type="hidden" name="doctor_id"
                           value="<?php  echo $current_doctor->getId(); ?>">
                    <input type="submit" value="Edit">
                </form></td>                
            </tr>
            
 
            <?php endforeach; ?>
            <tr>
             <td><form action="." method="post" id="add_doctor_form">
                    <input type="hidden" name="action"
                           value="add_doctor_location_selection">
                    <input type="hidden" name="doctor_id"
                           value="<?php  echo $current_doctor->getId(); ?>">
                    <input type="submit" value="Add Location">
                </form></td>                    
            </tr>            
             
            <tr></tr>
            <tr></tr>
            <tr></tr>            

            <tr>
                <th>phone</th>
                <th>Location</th>
                <th class="right">Delete</th>
                <th class="right">Edit</th>                

            </tr>   

            
                <?php foreach ($telephones as $telephone) : ?>
                    <tr>
                        <td><?php echo $telephone->getPhone(); ?></td>
                        <!--Match the Address name based on the telephone address_id-->
                        <td><?php echo $facilities_us[$telephone->getAddress_id()]->getAddress_name(); ?></td>

                <td><form action="." method="post"
                          id="delete_doctor_form">
                    <input type="hidden" name="action"
                           value="delete_doctor_telephone_db">

                    <input type="hidden" name="doctor_id"
                           value="<?php  echo $current_doctor->getId(); ?>">
                    <input type="hidden" name="telephone_id"
                           value="<?php  echo $telephone->getTelephoneId(); ?>">                    
                    <input type="submit" value="Delete">
                </form></td>
                
                    <td><form action="." method="post"
                               id="edit_phone_form">
                         <input type="hidden" name="action"
                                value="edit_doctor_telephone_selection">


                         <input type="hidden" name="telephone_id"
                                value="<?php  echo $telephone->getTelephoneId(); ?>">                            

                         <input type="hidden" name="doctor_id"
                                value="<?php  echo $telephone->getDoctor_id(); ?>">

                         <input type="hidden" name="address_id"
                                value="<?php  echo $telephone->getAddress_id(); ?>">                             
                         <input type="submit" value="Edit">
                     </form></td>                       
                </tr>          
                <?php endforeach; ?>             
            <tr>
               <td><form action="." method="post"
                          id="add_phone_form">
                    <input type="hidden" name="action"
                           value="add_doctor_telephone_selection">
                    <input type="hidden" name="doctor_id"
                           value="<?php  echo $current_doctor->getId(); ?>">
                    <input type="submit" value="Add Telephone">
                </form></td>                    
            </tr>         
            
<!-- Email -->
           <tr>
                <th>Email</th>      
                <th>&nbsp;</th>
                <th class="right">Delete</th>
                <th class="right">Edit</th>                

            </tr>   

            
                <?php foreach ($email_addresses as $key=>$email) : ?>
                    <tr>
                        <td><?php echo $email->getEmail(); ?></td>
                       
                        <td></td>
                    <td>
                      <!-- Delete Form -->  
                      <form action="." method="post"
                          id="delete_doctor_email_form">
                           <input type="hidden" name="action"
                           value="delete_doctor_email_db">                      
                            <input type="hidden" name="email_id"
                                   accept="" value="<?php echo $email->getId(); ?>">  
                    
                            <input type="hidden" name="doctor_email"
                               value="<?php echo $email->getEmail(); ?>">                      

                            <input type="hidden" name="doctor_id"
                                  value="<?php  echo $current_doctor->getId(); ?>">
                            <input type="submit" value="Delete Email">
                      </form>
                    </td>
                
                    <td>
                      <!-- Edit Form -->  
                      <form action="." method="post"
                                   id="update_doctor_email_db">
                             <input type="hidden" name="action"
                                    value="edit_doctor_email_selection">

                             <input type="hidden" name="doctor_id"
                                    value="<?php  echo $current_doctor->getId(); ?>">
                             <input type="hidden" name="email_id"
                                  value="<?php echo $email->getId(); ?>">    
                             
                             <input type="hidden" name="doctor_email"
                                   value="<?php echo $email->getEmail(); ?>">                                
                             <input type="submit" value="Edit">
                       </form>
                    </td>                       
                    </tr>          
                <?php endforeach; ?>             
            <tr>
               <td><form action="." method="post"
                          id="">
                    <input type="hidden" name="action"
                           value="add_doctor_email_selection">
                    <input type="hidden" name="doctor_id"
                           value="<?php  echo $current_doctor->getId(); ?>">
                    <input type="submit" value="Add Email">
                </form></td>                    
            </tr>        
            
            <!--Interests-->
 
           <tr>
                <th>Interests</th>
                <th class="right">Delete</th>
                <th class="right">Edit</th>                

            </tr>   

            
                <?php foreach ($interests as $interest) : ?>
                    <tr>
                        <td><?php echo $interest->getInterest(); ?></td>

                <td><form action="." method="post"
                          id="interest_selection">
                    <input type="hidden" name="action"
                           value="delete_doctor_interest_db">
                    <input type="hidden" name="doctor_id"
                           value="<?php  echo $current_doctor->getId(); ?>">
                    <input type="hidden" name="interest_id"
                                    value="<?php  echo $interest->getId(); ?>">                    
                    <input type="submit" value="Delete">
                </form></td>
                
                <td><form action="." method="post"
                                   id="edit_doctor_selection">
                             <input type="hidden" name="action"
                                    value="edit_doctor_interest_selection">

                             <input type="hidden" name="doctor_id"
                                    value="<?php  echo $current_doctor->getId(); ?>">
                             
                             <input type="hidden" name="interest_id"
                                    value="<?php  echo $interest->getId(); ?>">  
                             
                             <input type="hidden" name="dr_interest"
                                    value="<?php  echo $interest->getInterest(); ?>">                               
                             <input type="submit" value="Edit">
                         </form></td>                       
                    </tr>          
                <?php endforeach; ?>             
            <tr>
               <td><form action="." method="post"
                          id="add_phone_form">
                    <input type="hidden" name="action"
                           value="add_doctor_interest_selection">
                    <input type="hidden" name="doctor_id"
                           value="<?php  echo $current_doctor->getId(); ?>">
                    <input type="submit" value="Add Interest">
                </form></td>                    
            </tr>                  
            
            
        </table>
        <p><a  href="?action=add_doctor_selection">Add Doctor</a></p>
    </section>
    
</main>
<?php include '../view/footer.php'; ?>