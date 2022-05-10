<?php  
 //tnmfilter.php 
 $i = 1;
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("192.168.12.24", "po_user", "Apmosys@123", "purchase_order_db");  
      $output = '';  





      $query = "  
      SELECT po.* FROM `tnm_po_list` po 
           WHERE startdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  order by unix_timestamp(po.date_updated)
      ";
      $result = mysqli_query($connect, $query);  


      $output .= '  
           <table class="table table-bordered">  
                <tr class="bg-navy disabled">  
                     <th width="5%" class="text-center">SL.NO</th>  
                     <th width="15%" class="text-center">Start Date</th>  
                     <th width="15%" class="text-center">End Date</th>  
                     <th width="15%" class="text-center">Project Name</th> 
                     <th width="15%" class="text-center">PO #</th>  
                     <th width="10%" class="text-center">Client</th>  
                    
                     <th width="15%" class="text-center">Total Amount</th> 
                     
                     <th width="15%" class="text-center">PO Status</th> 
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))
          
         

           {  

               $row['total_amount'] = $connect->query("SELECT sum(unit_price) as total FROM tnm_po_list where id = '{$row['id']}'")->fetch_array()['total'];

                $output .= '  
                     <tr>  
                         <td class="text-center">'. $i++ .'</td> 
                          <td class="text-center">'. $row["startdate"] .'</td>  
                          <td class="text-center">'. $row["enddate"] .'</td> 
                          <td class="text-center">'. $row["pname"] .'</td> 
                          <td class="text-center">'. $row["po_no"] .'</td>   
                          <td class="text-center">'. $row["client_id"] .'</td>                          
                          <td class="text-center">'. number_format($row["total_amount"]) .'</td> 
                         
                          <td class="text-center">'. $row["status"] .'</td> 
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
