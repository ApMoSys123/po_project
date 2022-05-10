
<?php  
 //fcfilter.php  
 $i = 1;
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("127.0.0.1", "po_user", "Apmosys@123", "purchase_order_db");  
      $output = '';  
      $query = "  
      SELECT pl.*,po.project_name as pname, po.client_id as client_id  FROM `project_list` pl inner join `po_list` po on po.id = pl.name
      WHERE  pstartdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  order by (`name`) asc
      ";
      $result = mysqli_query($connect, $query);  
      $output .= '  

     
           <table class="table table-bordered table-hover table-striped">  
                <tr class="bg-navy disabled">  
                     <th width="5%" class="text-center">SNo</th>  
                     <th width="10%" class="text-center">Project Name</th>  
                     <th width="8%" class="text-center">Client</th>  
                     <th width="8%" class="text-center">Start Date</th>  
                     <th width="8%" class="text-center">End Date</th>  
                     <th width="7%" class="text-center">RM Client</th>  
                     <th width="7%" class="text-center">Department</th>  
                     <th width="7%" class="text-center">Status</th> 
                     <th width="10%" class="text-center">Billable/NonBillable</th> 
                     <th width="10%" class="text-center">RMG Verified</th> 
                     <th width="10%" class="text-center">Dept Verified</th> 
                      
                     
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td class="text-center">'. $i++ .'</td>  
                          <td class="text-center">'. $row["pname"] .'</td>  
                          <td class="text-center">'. $row["client_id"] .'</td>  
                          <td class="text-center">' .$row["pstartdate"] .'</td>  
                          <td class="text-center">'. $row["penddate"] .'</td>
                          <td class="text-center">'. $row["rm_client"] .'</td>
                          <td class="text-center">'. $row["department"] .'</td>
                          <td class="text-center">'. $row["pstatus"] .'</td>
                          <td class="text-center">'. $row["bill"] .'</td>
                          <td class="text-center">'. $row["rmg_verified"] .'</td>
                          <td class="text-center">'. $row["dept_verified"] .'</td>
                          
                          
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  

      
      $output .= '</table>';  

      echo $output;  
 }  
 ?>

 

