<?php
// require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `tnm_project_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=stripslashes($v);
        }
    }
}
?>
<style>
    #uni_modal .modal-footer{
        display:none
    }
</style>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title"><b><u>TNM Project Details</u></b> </h3>
    </div>
<div class="container fluid">
    <callout class="callout-primary">
        <dl class="row">
            <dt class="col-md-4">Project Name</dt>
            <dd class="col-md-8">: 
            <?php 
                $client_qry = $conn->query("SELECT * FROM tnm_po_list where id = '{$name}'");
                $row = $client_qry->fetch_assoc();
            ?>
            <?php echo $row['project_name'] ?>
            <!-- <?php echo $name ?> -->
            </dd>

            <dt class="col-md-4">PO Number </dt>
            <dd class="col-md-8">: 
                <?php 
                        $qry = $conn->query("SELECT po_no FROM tnm_po_list where id = $name ");
                        $row = $qry->fetch_assoc();
                ?>
                    <?php echo $row['po_no'] ?>
            </dd>

            <dt class="col-md-4">Client</dt>
            <dd class="col-md-8">:
            <?php 
                $client_qry = $conn->query("SELECT client_id FROM tnm_po_list where id = $name ");
                $row = $client_qry->fetch_assoc();
            ?>
            <?php echo $row['client_id'] ?>
            </dd>


            <dt class="col-md-4">Start Date</dt>
            <dd class="col-md-8">: <?php echo $tpstartdate ?></dd>
            <dt class="col-md-4">End Date</dt>
            <dd class="col-md-8">: <?php echo $tpenddate ?></dd>
            <!-- <dt class="col-md-4">Project Type</dt>
            <dd class="col-md-8">: <?php echo $type ?></dd> -->
            <dt class="col-md-4">RM ApMoSys</dt>
            <dd class="col-md-8">: 
                <?php 
                        $qry = $conn->query("SELECT rm_apmosys FROM tnm_po_list where id = $name ");
                        $row = $qry->fetch_assoc();
                ?>
                    <?php echo $row['rm_apmosys'] ?>
            </dd>
            <dt class="col-md-4">RM Client</dt>
            <dd class="col-md-8">: <?php echo $rm_client ?></dd>
            <dt class="col-md-4">Department</dt>
            <dd class="col-md-8">: <?php echo $department ?></dd>
            <dt class="col-md-4">Team Lead</dt>
            <dd class="col-md-8">: <?php echo $teamlead ?></dd>
            <dt class="col-md-4">Department Head</dt>
            <dd class="col-md-8">: <?php echo $department_head ?></dd>
            <dt class="col-md-4">RM Client_Contact</dt>
            <dd class="col-md-8">: <?php echo $rmclient_contact ?></dd>
            <dt class="col-md-4">RM Client_Email</dt>
            <dd class="col-md-8">: <?php echo $rmclient_email ?></dd>
            <dt class="col-md-4">RM Client_Location</dt>
            <dd class="col-md-8">: <?php echo $rmclient_location ?></dd>
            <!-- <dt class="col-md-4">Resource Count</dt>
            <dd class="col-md-8">: <?php echo $resourcecount ?></dd>
            <dt class="col-md-4">Resource Names</dt>
            <dd class="col-md-8">: <?php echo $resourcename ?></dd> -->
            <dt class="col-md-4">Billable/Non-Billable</dt>
            <dd class="col-md-8">:&nbsp;
            <?php
							switch ($bill) {
								case 'Not Selected':
									echo '<span class="badge badge-secondary">Not Selected</span>';
									break;		
								case 'Billable':
									echo '<span class="badge badge-success">Billable</span>';
									break;
								case 'Non Billable':
									echo '<span class="badge badge-secondary">Non Billable</span>';
									break;
								}
							?>
            </dd>
            <dt class="col-md-4">Project Type</dt>
            <dd class="col-md-8">:&nbsp;
            <?php 
                        $qry = $conn->query("SELECT project_type FROM tnm_po_list where id = $name ");
                        $row = $qry->fetch_assoc();
                ?>
              
              <span class="badge badge-success"> <?php echo $row['project_type'] ?></span>
            </dd>
            <dt class="col-md-4">Status</dt>
            <dd class="col-md-8">:&nbsp;
            <?php 
									switch ($tp_status) {
                                        case 'Not Selected':
											echo '<span class="badge badge-secondary">Not Selected</span>';
											break;
										case 'Started':
											echo '<span class="badge badge-success">Started</span>';
											break;
										case 'Issue':
											echo '<span class="badge badge-danger">Issue</span>';
											break;
										case 'In Progress':
											echo '<span class="badge badge-secondary">In Progress</span>';
											break;
										case 'On hold':
												echo '<span class="badge badge-secondary">On hold</span>';
											break;
                                            case 'Completed':
											echo '<span class="badge badge-success">Completed</span>';
											break;

												
									}
								?>
            </dd>

            <dt class="col-md-4">Business Head</dt>
            <dd class="col-md-8">: 
                
               <?php 
                        $qry = $conn->query("SELECT businesshead_name FROM tnm_po_list where id = $name ");
                        $row = $qry->fetch_assoc();
                ?>
                 <?php echo $row['businesshead_name'] ?>
        
            </dd>

            <dt class="col-md-4">Business Head Comments</dt>
            <dd class="col-md-8">: <?php echo $businesshead_comment ?></dd>

            <dt class="col-md-4">Business Team Comments</dt>
            <dd class="col-md-8">: <?php echo $businessteam_comment ?></dd>

            <dt class="col-md-4">Accounts Head</dt>
            <dd class="col-md-8">: 
                <?php 
                 $qry = $conn->query("SELECT accountshead_name FROM tnm_po_list where id = $name ");
                 $row = $qry->fetch_assoc();
                ?>
                  <?php echo $row['accountshead_name'] ?>
                </dd>

           
            <dt class="col-md-4">RMG Team Comments</dt>
            <dd class="col-md-8">: <?php echo $rmgteam_comment ?></dd>

            <dt class="col-md-4">Operation Team Comments</dt>
            <dd class="col-md-8">: <?php echo $otteam_comment ?></dd>

            <dt class="col-md-4">Director Comments</dt>
            <dd class="col-md-8">: <?php echo $director_comment ?></dd>

            <dt class="col-md-4">Business Head Approval</dt>
            <dd class="col-md-8">:&nbsp;
            <?php 

              $qry = $conn->query("SELECT bhead_approval FROM tnm_po_list where id = $name ");
              $row = $qry->fetch_assoc();

			?>
               <?php echo $row['bhead_approval'] ?>

            </dd>
	    <dt class="col-md-4">Accounts Head Approval</dt>
            <dd class="col-md-8">:&nbsp;
            <?php 
                        $qry = $conn->query("SELECT ahead_approval FROM tnm_po_list where id = $name ");
                        $row = $qry->fetch_assoc();
                ?>
                 <?php echo $row['ahead_approval'] ?>
            </dd>
            <dt class="col-md-4">RMG Head Verified</dt>
            <dd class="col-md-8">:&nbsp;
            <?php 
				switch ($rmg_verified) {				
						case 'Verified':
							echo '<span>Verified</span>';
							break;
						case 'Pending':
							echo '<span>Pending</span>';
							break;	
				}
			?>
            </dd>
            <dt class="col-md-4">Department Head Verified</dt>
            <dd class="col-md-8">:&nbsp;
            <?php 
				switch ($dept_verified) {				
						case 'Verified':
							echo '<span>Verified</span>';
							break;
						case 'Pending':
							echo '<span>Pending</span>';
							break;	
				}
			?>
            </dd>
            

            <!-- <dt class="col-md-4">Invoice Raised </dt>
            <dd class="col-md-8">:&nbsp;
            <?php 
				switch ($invoice) {				
                    case 'Not Selected':
                        echo '<span class="badge badge-secondary">Not Selected</span>';
                        break;		
                    case 'Yes':
                        echo '<span class="badge badge-success">Yes</span>';
                        break;
                    case 'No':
                        echo '<span class="badge badge-secondary">No</span>';
                        break;	
				}
			?>
            </dd> -->

            <!-- <dt class="col-md-4">Payment Released </dt>
            <dd class="col-md-8">:&nbsp;
            <?php 
				switch ($payment) {				
						case 'Done':
							echo '<span>Done</span>';
							break;
						case 'Pending':
							echo '<span>Pending</span>';
							break;	
				}
			?>
            </dd> -->

            
            

        </dl>
    </callout>

    <table class="table table-striped table-bordered" id="item-list">
						<colgroup>
							<col width="2%">
							<col width="5%">
							<col width="15%">
							<col width="15%">
							<col width="8%">
							<col width="8%">
                            <col width="8%">
							
						
						</colgroup>
						<thead>
							<tr class="bg-navy disabled" style="">
								
								<th class="bg-navy disabled text-light px-1 py-1 text-center">Resource Count</th>
								<th class="bg-navy disabled text-light px-1 py-1 text-center">Resource Level</th>
								<th class="bg-navy disabled text-light px-1 py-1 text-center">Resource Name</th>
								<th class="bg-navy disabled text-light px-1 py-1 text-center">Start Date</th>
								<th class="bg-navy disabled text-light px-1 py-1 text-center">End Date</th>
								<th class="bg-navy disabled text-light px-1 py-1 text-center">Status</th>
                                <th class="bg-navy disabled text-light px-1 py-1 text-center">Resource Comments</th>
						
							</tr>
						</thead>
						<tbody>
                        <?php 
                        
                        $order_items_qry = $conn->query("SELECT resource_count,resource_level,resource_name,r_startdate,r_enddate
                        FROM tnm_po_list where id = $name ");
                        
                        while($row = $order_items_qry->fetch_assoc()):
                             
                        ?>
							
							<tr class="po-item" data-id="">
                            <td class="align-middle p-0 text-center"><?php echo $row['resource_count'] ?></td>
                            <td class="align-middle p-1 text-center"><?php echo $row['resource_level'] ?></td>
                            <td class="align-middle p-1 text-center"><?php echo $row['resource_name'] ?></td>
                            <td class="align-middle p-1 text-center"><?php echo $row['r_startdate'] ?></td>
                            <td class="align-middle p-1 text-center"><?php echo $row['r_enddate'] ?></td>
								
                            <td class="align-middle p-1 text-center">
                            <?php 
                            $qry = $conn->query("SELECT * FROM `tnm_project_list` o inner join tnm_project_list i on o.id = i.id where o.`id` = '$id'  ");
                            $row = $qry->fetch_assoc();
                            ?>   
                            <?php echo $row['r_status'] ?>
                            </td>
                            <td class="align-middle p-1 text-center"><?php echo $row['r_comments'] ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
						
					</table>

    <div class="row px-2 justify-content-end">
        <div class="col-1">
            <!-- <button class="btn btn-dark btn-flat btn-sm" type="button" data-dismiss="modal">Close</button> -->
            <a class="btn btn-dark btn-flat btn-sm" type="button" data-dismiss="modal"  href="?page=projects_tnm">Close</a>
        </div>
    </div>
</div>
<br>