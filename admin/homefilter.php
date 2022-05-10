
 
<div class="row">
          <div class="col-10 col-sm-5 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-navy elevation-1"><a href="http://localhost/purchase_order/admin/?page=clients"><i class="fas fa-desktop"></i></a></span>
              <div class="info-box-content">
                <span class="info-box-text"><b>Total Clients</b></span>
                <span class="info-box-number">
                  <?php 
                   if(isset($_POST["from_date"], $_POST["to_date"])) {
                    $conn = mysqli_connect("localhost", "root", "", "purchase_order_db");  
                    $client = $conn->query("SELECT * FROM client_list WHERE date_created BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'")->num_rows;
                    
                    echo number_format($client);
                   }
                  ?>
                  <?php ?>
                  
                </span>
              </div>         
            </div>
          
          </div>

          <div class="col-12 col-sm-5 col-md-6 ">
            <div class="info-box">
              <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-desktop"></i></a></span>
              <div class="info-box-content ">
                <span class="info-box-text"><b>Total Projects</b></span>
                <span class="info-box-number">
                  <?php 
                    $client = $conn->query("SELECT * FROM project_list WHERE pstartdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'")->num_rows;
                    $client1 = $conn->query("SELECT * FROM tnm_project_list  WHERE tpstartdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' ")->num_rows;
                    echo number_format($client + $client1);
                  ?>
                  <?php ?>
                  
                </span>
              </div>         
            </div>
          
          </div>
         
          <div class="col-10 col-sm-5 col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-navy elevation-1"><a href="http://localhost/purchase_order/admin/?page=projects"><i class="fas fa-bookmark"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Total Projects FC </b></span>
                <span class="info-box-number">
                  <?php 
                     if(isset($_POST["from_date"], $_POST["to_date"])) {
                     $conn = mysqli_connect("localhost", "root", "", "purchase_order_db");  
                     $project = $conn->query("SELECT * FROM project_list  WHERE pstartdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'")->num_rows;
                     echo number_format($project);
                   
                     }
                  ?>
                </span>
              </div>
             
            </div>
          
          </div>
     
    

           <div class="col-10 col-sm-5 col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-indigo elevation-1"><a href="http://localhost/purchase_order/admin/?page=projects_tnm"><i class="fas fa-bookmark"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Total Projects TNM</b></span>
                <span class="info-box-number">
                  <?php 
                     if(isset($_POST["from_date"], $_POST["to_date"])) {
                     $conn = mysqli_connect("localhost", "root", "", "purchase_order_db"); 
                     $project1 = $conn->query("SELECT * FROM tnm_project_list  WHERE tpstartdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'")->num_rows;
                     echo number_format($project1);
                     }
                  ?>
                </span>
              </div>
          
            </div>
       
          </div>
        
          <div class="col-10 col-sm-5 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-font"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Active PO-FC</b></span>
                <span class="info-box-number">
                  <?php 
                    if(isset($_POST["from_date"], $_POST["to_date"])) {
                    $con = mysqli_connect("localhost", "root", "", "purchase_order_db"); 
                     $active_po = $con->query("SELECT * FROM po_list where status ='Active'  AND   startdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' ")->num_rows;
                     echo number_format($active_po);
                    }
                  ?>
                </span>
              </div>
             
            </div>
      
          </div>

     
          <div class="col-10 col-sm-5 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-window-close"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Expired PO-FC</b></span>
                <span class="info-box-number">
                  <?php 
                   if(isset($_POST["from_date"], $_POST["to_date"])) {
                    $conn = mysqli_connect("localhost", "root", "", "purchase_order_db"); 
                     $po = $conn->query("SELECT * FROM po_list where status ='Expired'  AND   startdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' ")->num_rows;
                     echo number_format($po);
                   }
                     
                  ?>
                </span>
              </div>
         
            </div>
      
          </div>


          <div class="col-10 col-sm-5 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-font"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Active PO-TNM</b></span>
                <span class="info-box-number">
                  <?php 
                     if(isset($_POST["from_date"], $_POST["to_date"])) {
                      $co = mysqli_connect("localhost", "root", "", "purchase_order_db"); 
                     $active_po1 = $co->query("SELECT * FROM tnm_po_list where status ='Active' AND  startdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' ")->num_rows;
                     echo number_format($active_po1);
                     }
                  ?>
                </span>
              </div>
             
            </div>
            
          </div>

        


          <div class="col-10 col-sm-5 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-window-close"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Expired PO-TNM</b></span>
                <span class="info-box-number">
                  <?php 
                   if(isset($_POST["from_date"], $_POST["to_date"])) {
                    $conn = mysqli_connect("localhost", "root", "", "purchase_order_db"); 
                     $po1 = $conn->query("SELECT * FROM tnm_po_list where status ='Expired'   AND   startdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' ")->num_rows;
                     echo number_format($po1);
                     }
                  ?>
                </span>
              </div>
              
            </div>
         
          </div>
        
  
<div class="container">
  
</div>




<?php  
  if(isset($_POST["from_date"], $_POST["to_date"])) {
    $connect = mysqli_connect("localhost", "root", "", "purchase_order_db");  
    $query = "SELECT status, count(*) as number FROM po_list where startdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  GROUP BY status ";  
    $result = mysqli_query($connect, $query);  
    $query1 = "SELECT status, count(*) as number FROM tnm_po_list where startdate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' GROUP BY status ";  
    $result1 = mysqli_query($connect, $query1); 
  }
?> 

 <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']})
      google.charts.setOnLoadCallback(drawSarahChart);
      google.charts.setOnLoadCallback(drawAnthonyChart);
      function drawSarahChart() 
        {  
                var data = google.visualization.arrayToDataTable([  
                          ['status', 'number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["status"]."', ".$row["number"]."],";  
                          }  
                          ?> 
                     ]);  
                var options = {  
                   title: 'PO Status FC',  
                     is3D:true,   
                      pieHole: 0.0    
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
      function drawAnthonyChart() 

        {  
                var data = google.visualization.arrayToDataTable([  
                          ['status', 'number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result1))  
                          {  
                               echo "['".$row["status"]."', ".$row["number"]."],";  
                          }  
                          ?>
                     ]);  
                var options = {  
                   title: 'PO Status TNM',  
                     is3D:true,   
                      pieHole: 0.0    
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));  
                chart.draw(data, options);  
           } 
    </script>
  </head>
  <body>
    <div class="container col-sm-6 col-md-8">
    <table class="columns">
      <tr>
        <td><div id="piechart" style="border: 1px solid #ccc"></div></td>
        <td><div id="piechart1" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>
    </div>
  </body>
</html>
<br>


 

