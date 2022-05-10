 
 <?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title"><b><u>Mixed Purchase Order Details</b></u></h3>
		<div class="card-tools">
		<?php if($_settings->userdata('type') == 1): ?>
		<a href="?page=purchase_orders_mixed/manage_mixedpo" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Add New</a>
		<?php endif; ?>
		<?php if($_settings->userdata('type') == 2): ?>
		<a href="?page=purchase_orders_mixed/manage_mixedpo" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Add New</a>
		<?php endif; ?>
		<?php if($_settings->userdata('type') == 3): ?>
		<a href="?page=purchase_orders_mixed/manage_mixedpo" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Add New</a>
		<?php endif; ?>
		<a href="http://localhost/purchase_order/admin/purchase_orders_mixed/export.php" class="btn btn-flat btn-success"><span class="fas fa-paper-plane"></span> Export</a>
			
		</div>
	</div>
	<br /><br />  
<div class="row justify-content-center" >
  <div class="col-sm-2"> <input type="search" name="from_date" id="from_date" class="form-control" placeholder="From Date" /></div>
  <div class="col-sm-2"> <input type="search" name="to_date" id="to_date" class="form-control" placeholder="To Date" /></div>
  <div class="col-sm-2"> <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" /></div>
  
</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table id="purchaseprojectfc" class="table table-hover table-striped">
				<colgroup>
					<col width="5%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="15%">
					<col width="10%">
					<?php if($_settings->userdata('type') == 1): ?><col width="10%"><?php endif; ?>
						<?php if($_settings->userdata('type') == 4): ?><col width="10%"><?php endif; ?>
							<?php if($_settings->userdata('type') == 5): ?><col width="10%"><?php endif; ?>
					<col width="7%">
					<col width="7%">
				</colgroup>
				<thead>
					<tr class="bg-navy disabled">
						<th>SNo.</th>
						<th class="text-center">Start Date</th>
						<th class="text-center">End Date</th>
						<th class="text-center">Project Name</th>
						<th class="text-center">PO #</th>
						<th class="text-center">Client</th>
						<?php if($_settings->userdata('type') == 1): ?>
						<th class="text-center">Total Amount</th>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 4): ?>
						<th class="text-center">Total Amount</th>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 5): ?>
						<th class="text-center">Total Amount</th>
						<?php endif; ?>
						<th class="text-center">PO Status</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$i = 1;
						$qry = $conn->query("SELECT * FROM `mixed_po_list`");
						while($row = $qry->fetch_assoc()):
							$row['item_count'] = $conn->query("SELECT * FROM milestone_tablefc where id = '{$row['id']}'")->num_rows;
							$row['total_amount'] = $conn->query("SELECT unit_price as total FROM mixed_po_list where id = '{$row['id']}'")->fetch_array()['total'];
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td class="text-center"><?php echo $row['startdate'] ?></td>
							<td class="text-center"><?php echo $row['enddate'] ?></td>
							<td class="text-center"><?php echo $row['pname'] ?></td>
							<td class="text-center"><?php echo $row['po_no'] ?></td>
							<td class="text-center"><?php echo $row['client_id'] ?></td>
							<?php if($_settings->userdata('type') == 1): ?>
							<td class="text-center"><?php echo number_format($row['total_amount']) ?></td>
							<?php endif; ?>
							<?php if($_settings->userdata('type') == 4): ?>
							<td class="text-center"><?php echo number_format($row['total_amount']) ?></td>
							<?php endif; ?>
							<?php if($_settings->userdata('type') == 5): ?>
							<td class="text-center"><?php echo number_format($row['total_amount']) ?></td>
							<?php endif; ?>
							<td class="text-center">
							<?php
							switch ($row['status']) {
										
								case 'Inactive':
                                    echo "<span class='py-0 px-1 btn-flat btn-secondary'>Inactive</span>";
                                    break;  		
								case 'Active':
									echo '<span class="badge badge-success">Active</span>';
									break;

								}
							?>	
							</td>
							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
								  	<a class="dropdown-item" href="?page=purchase_orders_mixed/view_po&id=<?php echo $row['id'] ?>"><span class="fa fa-eye text-primary"></span> View</a>
				                    <div class="dropdown-divider"></div>
									
				                    <a class="dropdown-item" href="?page=purchase_orders_mixed/manage_mixedpo&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
									<?php if($_settings->userdata('type') == 1): ?>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
									<?php endif; ?>
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


			</table>
		</div>
		</div>
	</div>
</div>

<script>
	
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this PO permanently?","delete_mixedrent",[$(this).attr('data-id')])
		})
		$('.view_details').click(function(){
			uni_modal("Reservaton Details","purchase_orders_mixed/view_details.php?id="+$(this).attr('data-id'),'mid-large')
		})
		$('.renew_data').click(function(){
			_conf("Are you sure to renew this  data?","renew_pocrent",[$(this).attr('data-id')]);
		})
		$('.table th,.table td').addClass('px-1 py-0 align-middle')
		$('.table').dataTable();
	})
	function delete_mixedrent($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_mixedrent",
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
	function renew_mixedrent($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=renew_mixedrent",
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
                          url:"purchase_orders/filterfc.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#purchaseprojectfc').html(data);  
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