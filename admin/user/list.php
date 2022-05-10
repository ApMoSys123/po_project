<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>


<style>
    .img-avatar{
        width:45px;
        height:45px;
        object-fit:cover;
        object-position:center center;
        border-radius:100%;
    }
</style>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title"><b><u>List of System Users</b></u></h3>
		<div class="card-tools">
			<a href="?page=user/manage_user" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Add New</a>
			<a href="http://192.168.12.24/purchase_order/admin/user/export.php" class="btn btn-flat btn-success"><span class="fas fa-paper-plane"></span> Export</a>
			<!-- <a href="http://192.168.12.24/purchase_order/admin/user/import.php" class="btn btn-flat btn-dark"><span class="fas fa-download"></span> Import</a> -->
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="2%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr class="bg-navy disabled">
				
						<th class="text-center">S.No.</th>
						
						<th class="text-center">Name</th>
						<th class="text-center">Username</th>
						<th class="text-center">Designation</th>
						<th class="text-center">Department</th>
						<th class="text-center">Login Type</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					
					<?php 
					
					$i = 1;
						$qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as name from `users` where id != '1' and id != '{$_settings->userdata('id')}' and `type` != 100 order by concat(firstname,' ',lastname) asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<!-- <td class="text-center"><img src="<?php echo validate_image($row['avatar']) ?>" class="img-avatar img-thumbnail p-0 border-2" alt="user_avatar"></td> -->
							<td class="text-center"><?php echo ucwords($row['name']) ?></td>
							<td class="text-center"><p class="m-0 truncate-1"><?php echo $row['username'] ?></p></td>
							<td class="text-center"><p class="m-0 truncate-1 text-center"><?php echo $row['designation'] ?></p></td>
							<td class="text-center"><p class="m-0 truncate-1 text-center"><?php echo $row['department'] ?></p></td>
							<td class="text-center">
							<?php 
									switch ($row['type']) {
										case '1':
											echo '<span class="badge badge-pill badge-success">Director</span>';
											break;
										case '2':
											echo '<span class="badge badge-pill badge-success">Business Team</span>';
											break;
										case '3':
												echo '<span class="badge badge-pill badge-success">Business Head</span>';
												break;
										case '4':
											    echo '<span class="badge badge-pill badge-primary">Accounts Team</span>';
											break;
										case '5':
												echo '<span class="badge badge-pill badge-primary">Accounts Head</span>';
												break;
										case '6':
											    echo '<span class="badge badge-pill badge-warning">Operation Team</span>';
											break;
										case '7':
												echo '<span class="badge badge-pill badge-info">RMG Team</span>';
												break;
										case '8':
												echo '<span class="badge badge-pill badge-info">Department Head</span>';
													break;
										default :
											echo '<span class="badge badge-pill badge-danger">Employee</span>';
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
				                    <a class="dropdown-item" href="?page=user/manage_user&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
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
			_conf("Are you sure to delete this User permanently?","delete_user",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	function delete_user($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Users.php?f=delete",
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
</script>