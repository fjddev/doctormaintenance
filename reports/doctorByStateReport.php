<?php include '../view/header.php'       ?>
<?php include('../model/database.php');   ?>
<?php include('../model/DoctorDB.php');   ?>
<?php
      
     
     

     
     $headings=Array('Name', 'State', 'Interest');
//     $doctor_list=Array();
//     $doctor_list[1]['name'] = 'Dr Paul Flores';
//     $doctor_list[1]['state'] = 'MA';
//     $doctor_list[1]['interest'] = array();
//     $doctor_list[1]['interest'][0]='CIP';
//     $doctor_list[1]['interest'][1]='CHRONS';
        $doctorDB = new DoctorDB(); 
        $state = filter_input(INPUT_POST, 'state_selected');

        $doctor_list = Array();
        $doctor_list=$doctorDB->getDoctorReportArray($state);
        

        

        

?>
<main>
    <table>
        <tr>
            <?php foreach($headings as $heading) : ?>
            <th> <?php echo $heading ?></th>
            <?php endforeach; ?>
            <th><?php echo "Select"  ?></th>
            
        </tr>
        <?php foreach($doctor_list as $id=>$doctor) : ?>
            <tr>
                 <?php    foreach($doctor as $key=>$doctor_results) : ?>
                

                
                       <?php 
                       if($key == 'interest'){

                           $doctor_interest = $doctor_results; ?>
                <td>
                           <select>
                           <?php foreach($doctor_interest as $interest): ?>
                                <option value="<?php echo $key; ?>" >  <?php echo $interest; ?> </option>
                           <?php endforeach; ?>
                           
                           </select>
                </td>   

                 
                              
                       <?php }else{ ?>
            <td>
                            <?php echo $doctor[$key];  ?>   
            </td>
                             
                       <?php }?>

               
                     <?php endforeach; ?>
            <td>
                  <form action="../doctor_manager/index.php" method="post" id="doctor_report_by_state_interest">
                        <input type="hidden" name="action" value="doctor_report_by_state_interest" />
                        <input type="hidden" name="doctor_id" value="<?php echo $id?>"/>
                        <input type="submit" value="Detail">
                  </form>      
            </td>            

            </tr>
        <?php endforeach; ?>
    </table>
</main>    
<?php include '../view/header.php'; ?>
        
    


