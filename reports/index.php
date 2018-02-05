

<?php include '../view/header.php'; ?>
<?php
             $us_states=Array(
                    'AL' => 'Alabama',
                    'AK' => 'Alaska',
                    'AZ' => 'Arizona',
                    'AR' => 'Arkansas',
                    'CA' => 'California',
                    'CO' => 'Colorado',
                    'CT' => 'Connecticut',
                    'DE' => 'Delaware',
                    'DC' => 'District Of Columbia',
                    'FL' => 'Florida',
                    'GA' => 'Georgia',
                    'HI' => 'Hawaii',
                    'ID' => 'Idaho',
                    'IL' => 'Illinois',
                    'IN' => 'Indiana',
                    'IA' => 'Iowa',
                    'KS' => 'Kansas',
                    'KY' => 'Kentucky',
                    'LA' => 'Louisiana',
                    'ME' => 'Maine',
                    'MD' => 'Maryland',
                    'MA' => 'Massachusetts',
                    'MI' => 'Michigan',
                    'MN' => 'Minnesota',
                    'MS' => 'Mississippi',
                    'MO' => 'Missouri',
                    'MT' => 'Montana',
                    'NE' => 'Nebraska',
                    'NV' => 'Nevada',
                    'NH' => 'New Hampshire',
                    'NJ' => 'New Jersey',
                    'NM' => 'New Mexico',
                    'NY' => 'New York',
                    'NC' => 'North Carolina',
                    'ND' => 'North Dakota',
                    'OH' => 'Ohio',
                    'OK' => 'Oklahoma',
                    'OR' => 'Oregon',
                    'PA' => 'Pennsylvania',
                    'RI' => 'Rhode Island',
                    'SC' => 'South Carolina',
                    'SD' => 'South Dakota',
                    'TN' => 'Tennessee',
                    'TX' => 'Texas',
                    'UT' => 'Utah',
                    'VT' => 'Vermont',
                    'VA' => 'Virginia',
                    'WA' => 'Washington',
                    'WV' => 'West Virginia',
                    'WI' => 'Wisconsin',
                    'WY' => 'Wyoming',
                  );  
   ?>   
    <table>


            <th> <?php echo "Report" ?></th>
            <th><?php echo "Filter" ?></th>      
            <th><?php echo "Select" ?></th>   
        <tr>
          <form  method="post" action="../reports/doctorByStateReport.php" >
            <td>Report by doctor interest and us state </td>
            <td>  
                <select name="state_selected" id="state_selected" >
                        <?php foreach($us_states as $key=>$state): ?>
                              <option value="<?php echo $key; ?>" >  <?php echo $state; ?> </option>
                        <?php endforeach; ?>

                </select>
            </td>
            <td>
                 <input type="submit" value="Report"> 
            </td>                 
           </form>

 
        </tr>
    </table>

<?php include '../view/footer.php'; ?>

