<?php if($_settings->chk_flashdata('success')): 
	
	?>
	
	<!-- <link rel ="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <script src="src/cascadingLists.js"></script>
  <script src="selectFilter.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper-utils.js"></script>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title"><b><u>Mixed Project Details</b></u></h3>
	<div class="card-tools">
	<?php if($_settings->userdata('type') ==  1): ?>
			<a href="?page=projects_mixed/manage_mixedprojects" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Add New </a>
			<?php endif; ?>
			<?php if($_settings->userdata('type') ==  2): ?>
                <a href="?page=projects_mixed/manage_mixedprojects" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Add New </a>
			<?php endif; ?>
			<?php if($_settings->userdata('type') ==  3): ?>
                <a href="?page=projects_mixed/manage_mixedprojects" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Add New </a>
			<?php endif; ?>
			<a href="http://localhost/purchase_order/admin/projects/export.php" id="create_new" class="btn btn-flat btn-success"><span class="fas fa-paper-plane"></span> Export </a>
			
		</div>
	
	</div>
	<br /><br />  
<div class="row justify-content-center" >
  <div class="col-sm-2"> <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" /></div>
  <div class="col-sm-2"> <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" /></div>
  <div class="col-sm-2"> <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" /></div>
</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
		
			<table id="fcproject" class="table table-hover table-striped">
				<colgroup>
					<col width="5%">
					<col width="8%">
					<col width="8%">
					<col width="8%">
					<col width="8%">
				
					<col width="8%">
					<col width="8%">
					
					<col width="8%">
					<col width="8%">
					
					<col width="8%">
					<col width="8%">
			
					<col width="8%">
				</colgroup>
				<thead>
				
					<tr class="bg-navy disabled">
						<th class="text-center">SNo.</th>
						<th class="text-center">Project Name</th>
						<th class="text-center">Client</th>
						<th class="text-center">Start Date</th>
						<th class="text-center">End Date</th>
						<th class="text-center">RM Client</th>
						<th class="text-center">Department</th>
						<th class="text-center">Status</th>
						<th class="text-center">Bill</th>
						<th class="text-center">RMG Verified</th>
						<th class="text-center">Dept Verified</th>
					
						<th class="text-center">Action</th>
					</tr>
					
				</thead>
				<tbody>
					<?php 
					$i = 1;
					// $qry = $conn->query("SELECT po.*, s.name as sname FROM `po_list` po inner join `client_list` s on po.client_id = s.id order by unix_timestamp(po.date_updated) ");
					$qry = $conn->query("SELECT pl.*, po.pname as proname , po.client_id as client_id FROM `mixed_project_list` pl inner join `mixed_po_list` po on pl.name = po.id order by (`name`) asc ");
					while($row = $qry->fetch_assoc()):
						// $row['description'] = html_entity_decode($row['description']);
						$row['rm_client'] = html_entity_decode($row['rm_client']);
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
						
							<td class="text-center"><?php echo $row['proname'] ?></td>
							<td class="text-center"><?php echo $row['client_id'] ?></td>
							<td class="text-center"><?php echo $row['pstartdate'] ?></td>
							<td class="text-center"><?php echo $row['penddate'] ?></td>
							
							<td class="text-center" title="<?php echo $row['rm_client'] ?>"><?php echo $row['rm_client'] ?></td>
							<td class="text-center"><?php echo $row['department'] ?></td>
	
							<td class="text-center">
							<?php 
									switch ($row['pstatus']) {
											case 'Not Selected':
												echo '<span class="badge badge-primary">Not Selected</span>';
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
							</td>
							<td class="text-center">
							<?php
							switch ($row['bill']) {
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
							</td>



							<td class="text-center">
							<?php 
									switch ($row['rmg_verified']) {
										
											case 'Verified':
												echo '<span>Verified</span>';
												break;
											case 'Pending':
													echo '<span>Pending</span>';
												break;	
									}
								?>
							</td>
							<td class="text-center">
							<?php 
									switch ($row['dept_verified']) {
										
											case 'Verified':
												echo '<span>Verified</span>';
												break;
											case 'Pending':
													echo '<span>Pending</span>';
												break;	
									}
								?>
							</td>
							
							
							
						
							
							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon py-0" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view_data" href="?page=projects_mixed/view_details&id=<?php echo $row['id'] ?>" data-id = "<?php echo $row['id'] ?>"><span class="fa fa-info text-primary"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit_data" href="?page=projects_mixed/manage_projectsmixed&id=<?php echo $row['id'] ?>" data-id = "<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this Project permanently?","delete_mixedproject",[$(this).attr('data-id')])
		})
		$('#create_new').click(function(){
			uni_modal("<i class='fa fa-plus'></i> Create New Project","projects_mixed/manage_mixedprojects.php")
		})
		$('.view_data').click(function(){
			uni_modal("<i class='fa fa-info-circle'></i> Project Details","projects_mixed/view_details.php?id="+$(this).attr('data-id'),"")
		})
		$('.edit_data').click(function(){
			uni_modal("<i class='fa fa-edit'></i> Edit Project Details","projects_mixed/manage_mixedprojects.php?id="+$(this).attr('data-id'))
		})
		$('.table th,.table td').addClass('px-1 py-0 align-middle')
		$('.table').dataTable();
	})
	function delete_mixedproject($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_mixedproject",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}

	$(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  

		   $("#to_date").change(function () {

var objFromDate = document.getElementById("from_date").value; 
var objToDate = document.getElementById("to_date").value;

var FromDate = new Date(objFromDate);
var ToDate = new Date(objToDate);

if(FromDate > ToDate )
{
	alert("Due Date Should Be Greater Than Start Date");
	document.getElementById("to_date").value = "";
	return false; 
}

});


           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"projects/fcfilter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#mixedproject').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      }); 
	
	
</script>
