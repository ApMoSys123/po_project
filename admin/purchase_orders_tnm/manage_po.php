<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `tnm_po_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>

<style>
    span.select2-selection.select2-selection--single {
        border-radius: 0;
        padding: 0.25rem 0.5rem;
        padding-top: 0.25rem;
        padding-right: 0.5rem;
        padding-bottom: 0.25rem;
        padding-left: 0.5rem;
        height: auto;
    }
	/* Chrome, Safari, Edge, Opera */
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
		}

		/* Firefox */
		input[type=number] {
		-moz-appearance: textfield;
		}
		[name="tax_percentage"],[name="discount_percentage"]{
			width:5vw;
		}

</style>

<div class="card card-outline card-info">
	<div class="card-header">
		<h3 class="card-title"><b><u><?php echo isset($id) ? "Update Purchase Order / Letter Of Intent Details": "Add New TNM Purchase Order" ?> </u></b></h3>
	</div>
	<div class="card-body">
		<form action="" id="po-form">
			<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
			<div class="row">
			<?php if($_settings->userdata('type') == 1): ?>
				<div class="col-md-6 form-group">
				<label for="client_id" class="control-label col-md-5">Client :<span class="po_err_msg text-danger">*</span></label>
			<select name="client_id" id="client_id" class="custom-select col-sm-3 rounded-0 select2 ml-2">
				<option value="" disabled <?php echo !isset($client_id) ? "selected" :'' ?>></option>
					<?php 
						$supplier_qry = $conn->query("SELECT * FROM `client_list` order by `name` asc");
						while($row = $supplier_qry->fetch_assoc()):
					?>
					<option value="<?php echo $row['name'] ?>" <?php echo isset($client_id) && $client_id == $row['name'] ? 'selected' : '' ?> <?php echo $row['status'] == 'Idle'? 'disabled' : '' ?>><?php echo $row['name'] ?></option>
					<?php endwhile; ?>
            </select>
				
				<div class="form-group">
            		<label for="startdate" class="control-label">Start Date :<span class="po_err_msg text-danger">*</span></label>
            		<input type="search" name="startdate" id="startdate" class="form-control rounded-0" value="<?php echo isset($startdate) ? $startdate :"" ?>" required>
        		</div>
        		<div class="form-group">
           			<label for="enddate" class="control-label">End Date :</label>
            		<input type="search" name="enddate" id="enddate" class="form-control rounded-0" value="<?php echo isset($enddate) ? $enddate :"" ?>" >
       			</div>
				   </div>
				<div class="col-md-6 form-group">
					<label for="po_no">PO # <span class="po_err_msg text-danger">*</span></label>
					<input type="text" class="form-control form-control-sm rounded-0" id="po_no" name="po_no" value="<?php echo isset($po_no) ? $po_no : '' ?>"  >
					<!-- <small><i>Leave this blank to Automatically Generate upon saving.</i></small> -->

					<div class="form-group">
            		<label for="project_name" class="control-label">Project Name : <span class="po_err_msg text-danger">*</span></label>
            		<input type="text" name="project_name" id="project_name" class="form-control rounded-0" value="<?php echo isset($project_name) ? $project_name :"" ?>" required>
        		</div>
				

				<div class="form-group">
			     <label for="rm_apmosys" class="control-label col-md-5">RM_APMOSYS :<span class="po_err_msg text-danger">*</span></label>
				 <select name="rm_apmosys" id="rm_apmosys" class="custom-select rounded-0 select2">
			    	<option value="" disabled <?php echo !isset($rm_apmosys) ? "selected" :'' ?>></option>
					    <?php 
					    	$supplier_qry = $conn->query("SELECT * FROM `employee` ");
					    	while($row = $supplier_qry->fetch_assoc()):
					    ?>
					<option value="<?php echo $row['emp_name'] ?>" <?php echo isset($rm_apmosys) && $rm_apmosys == $row['emp_name'] ? 'selected' : '' ?> ><?php echo $row['emp_name'] ?></option>
					<?php endwhile; ?>
                  </select>
                </div>
				</div>
				<?php endif; ?>
				<?php if($_settings->userdata('type') == 2): ?>
				<div class="col-md-6 form-group">
				<label for="client_id" class="control-label col-md-5">Client :<span class="po_err_msg text-danger">*</span></label>
			<select name="client_id" id="client_id" class="custom-select col-sm-3 rounded-0 select2 ml-2">
				<option value="" disabled <?php echo !isset($client_id) ? "selected" :'' ?>></option>
					<?php 
						$supplier_qry = $conn->query("SELECT * FROM `client_list` order by `name` asc");
						while($row = $supplier_qry->fetch_assoc()):
					?>
					<option value="<?php echo $row['name'] ?>" <?php echo isset($client_id) && $client_id == $row['name'] ? 'selected' : '' ?> <?php echo $row['status'] == 'Idle'? 'disabled' : '' ?>><?php echo $row['name'] ?></option>
					<?php endwhile; ?>
            </select>
				
				<div class="form-group">
            		<label for="startdate" class="control-label">Start Date :<span class="po_err_msg text-danger">*</span></label>
            		<input type="search" name="startdate" id="date_picker1" class="form-control rounded-0" value="<?php echo isset($startdate) ? $startdate :"" ?>" required>
        		</div>
        		<div class="form-group">
           			<label for="enddate" class="control-label">End Date :</label>
            		<input type="search" name="enddate" id="date_picker2" class="form-control rounded-0" value="<?php echo isset($enddate) ? $enddate :"" ?>" >
       			</div>
				   </div>
				<div class="col-md-6 form-group">
					<label for="po_no">PO # <span class="po_err_msg text-danger">*</span></label>
					<input type="text" class="form-control form-control-sm rounded-0" id="po_no" name="po_no" value="<?php echo isset($po_no) ? $po_no : '' ?>"  >
					<!-- <small><i>Leave this blank to Automatically Generate upon saving.</i></small> -->

					<div class="form-group">
            		<label for="project_name" class="control-label">Project Name : <span class="po_err_msg text-danger">*</span></label>
            		<input type="text" name="project_name" id="project_name" class="form-control rounded-0" value="<?php echo isset($project_name) ? $project_name :"" ?>" required>
        		</div>
				

				<div class="form-group">
			     <label for="rm_apmosys" class="control-label col-md-5">RM_APMOSYS :<span class="po_err_msg text-danger">*</span></label>
				 <select name="rm_apmosys" id="rm_apmosys" class="custom-select rounded-0 select2">
			    	<option value="" disabled <?php echo !isset($rm_apmosys) ? "selected" :'' ?>></option>
					    <?php 
					    	$supplier_qry = $conn->query("SELECT * FROM `employee` ");
					    	while($row = $supplier_qry->fetch_assoc()):
					    ?>
					<option value="<?php echo $row['emp_name'] ?>" <?php echo isset($rm_apmosys) && $rm_apmosys == $row['emp_name'] ? 'selected' : '' ?> ><?php echo $row['emp_name'] ?></option>
					<?php endwhile; ?>
                  </select>
                </div>
				</div>
				<?php endif; ?>
				<?php if($_settings->userdata('type') == 3): ?>
				<div class="col-md-6 form-group">
				<label for="client_id" class="control-label col-md-5">Client :<span class="po_err_msg text-danger">*</span></label>
			<select name="client_id" id="client_id" class="custom-select col-sm-3 rounded-0 select2 ml-2">
				<option value="" disabled <?php echo !isset($client_id) ? "selected" :'' ?>></option>
					<?php 
						$supplier_qry = $conn->query("SELECT * FROM `client_list` order by `name` asc");
						while($row = $supplier_qry->fetch_assoc()):
					?>
					<option value="<?php echo $row['name'] ?>" <?php echo isset($client_id) && $client_id == $row['name'] ? 'selected' : '' ?> <?php echo $row['status'] == 'Idle'? 'disabled' : '' ?>><?php echo $row['name'] ?></option>
					<?php endwhile; ?>
            </select>
				
				<div class="form-group">
            		<label for="startdate" class="control-label">Start Date :<span class="po_err_msg text-danger">*</span></label>
            		<input type="search" name="startdate" id="date_picker1" class="form-control rounded-0" value="<?php echo isset($startdate) ? $startdate :"" ?>" required>
        		</div>
        		<div class="form-group">
           			<label for="enddate" class="control-label">End Date :</label>
            		<input type="search" name="enddate" id="date_picker2" class="form-control rounded-0" value="<?php echo isset($enddate) ? $enddate :"" ?>" >
       			</div>
				   </div>
				<div class="col-md-6 form-group">
					<label for="po_no">PO # <span class="po_err_msg text-danger">*</span></label>
					<input type="text" class="form-control form-control-sm rounded-0" id="po_no" name="po_no" value="<?php echo isset($po_no) ? $po_no : '' ?>"  >
					<!-- <small><i>Leave this blank to Automatically Generate upon saving.</i></small> -->

					<div class="form-group">
            		<label for="project_name" class="control-label">Project Name : <span class="po_err_msg text-danger">*</span></label>
            		<input type="text" name="project_name" id="project_name" class="form-control rounded-0" value="<?php echo isset($project_name) ? $project_name :"" ?>" required>
        		</div>
				

				<div class="form-group">
			     <label for="rm_apmosys" class="control-label col-md-5">RM_APMOSYS :<span class="po_err_msg text-danger">*</span></label>
				 <select name="rm_apmosys" id="rm_apmosys" class="custom-select rounded-0 select2">
			    	<option value="" disabled <?php echo !isset($rm_apmosys) ? "selected" :'' ?>></option>
					    <?php 
					    	$supplier_qry = $conn->query("SELECT * FROM `employee` ");
					    	while($row = $supplier_qry->fetch_assoc()):
					    ?>
					<option value="<?php echo $row['emp_name'] ?>" <?php echo isset($rm_apmosys) && $rm_apmosys == $row['emp_name'] ? 'selected' : '' ?> ><?php echo $row['emp_name'] ?></option>
					<?php endwhile; ?>
                  </select>
                </div>
				</div>
				<?php endif; ?>
				<?php if($_settings->userdata('type') == 4): ?>
				<div class="col-md-6 form-group">
				
				<div class="form-group">
            		<label for="startdate" class="control-label">Start Date :<span class="po_err_msg text-danger">*</span></label>
            		<input type="search" name="startdate" id="date_picker1" class="form-control rounded-0" value="<?php echo isset($startdate) ? $startdate :"" ?>" disabled>
        		</div>
        		<div class="form-group">
           			<label for="enddate" class="control-label">End Date :</label>
            		<input type="search" name="enddate" id="date_picker2" class="form-control rounded-0" value="<?php echo isset($enddate) ? $enddate :"" ?>"disabled >
       			</div>
				   </div>
				<div class="col-md-6 form-group">
					<label for="po_no">PO # <span class="po_err_msg text-danger">*</span></label>
					<input type="text" class="form-control form-control-sm rounded-0" id="po_no" name="po_no" value="<?php echo isset($po_no) ? $po_no : '' ?>"  readonly>
					<!-- <small><i>Leave this blank to Automatically Generate upon saving.</i></small> -->
<br>
					<div class="form-group">
            		<label for="project_name" class="control-label">Project Name : <span class="po_err_msg text-danger">*</span></label>
            		<input type="text" name="project_name" id="project_name" class="form-control rounded-0" value="<?php echo isset($project_name) ? $project_name :"" ?>" readonly>
        		</div>
				

				
				</div>
				<?php endif; ?>
				<?php if($_settings->userdata('type') == 5): ?>
				<div class="col-md-6 form-group">
				
				<div class="form-group">
            		<label for="startdate" class="control-label">Start Date :<span class="po_err_msg text-danger">*</span></label>
            		<input type="search" name="startdate" id="date_picker1" class="form-control rounded-0" value="<?php echo isset($startdate) ? $startdate :"" ?>" disabled>
        		</div>
        		<div class="form-group">
           			<label for="enddate" class="control-label">End Date :</label>
            		<input type="search" name="enddate" id="date_picker2" class="form-control rounded-0" value="<?php echo isset($enddate) ? $enddate :"" ?>"disabled >
       			</div>
				   </div>
				<div class="col-md-6 form-group">
					<label for="po_no">PO # <span class="po_err_msg text-danger">*</span></label>
					<input type="text" class="form-control form-control-sm rounded-0" id="po_no" name="po_no" value="<?php echo isset($po_no) ? $po_no : '' ?>"  readonly>
					<!-- <small><i>Leave this blank to Automatically Generate upon saving.</i></small> -->
<br>
					<div class="form-group">
            		<label for="project_name" class="control-label">Project Name : <span class="po_err_msg text-danger">*</span></label>
            		<input type="text" name="project_name" id="project_name" class="form-control rounded-0" value="<?php echo isset($project_name) ? $project_name :"" ?>" readonly>
        		</div>
				

				
				</div>
				<?php endif; ?>
				
				</div>
			</div>
			<div class="row">

				<div class="col-md-12">

				<?php if($_settings->userdata('type') == 1): ?>
				<table class="table table-striped table-bordered" id="item-list">
						<colgroup>
							<col width="2%">
							<col width="5%">
							<col width="15%">
							<col width="15%">
							<col width="8%">
							<col width="8%">
							<!-- <col width="8%"> -->
							<col width="8%">
							<col width="8%">
							<col width="8%">
						</colgroup>
						<thead>
							<tr class="bg-navy disabled">
								<th class="px-1 py-1 text-center"></th>
								<th class="px-1 py-1 text-center">Resource Count</th>
								<th class="px-1 py-1 text-center">Resource Level</th>
								<th class="px-1 py-1 text-center">Resource Name</th>
								<th class="px-1 py-1 text-center">Start Date</th>
								<th class="px-1 py-1 text-center">End Date</th>
								<!-- <th class="px-1 py-1 text-center">Status</th> -->
								<th class="px-1 py-1 text-center">Monthly Billing</th>
								<th class="px-1 py-1 text-center">Per Resource Cost</th>
								<th class="px-1 py-1 text-center">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if(isset($id)):
								//echo "$id";die();
							$order_items_qry = $conn->query("SELECT * FROM resource_table rt where rt.`po_id` = $id  ");
							//echo "<pre>";print_r($order_items_qry1);die();
							echo $conn->error;
							while($row = $order_items_qry->fetch_assoc()):
								//echo "<pre>";print_r($row);die();
							?>
							
							<tr class="po-item" data-id="">
								<td class="align-middle p-1 text-center">
									<button class="btn btn-sm btn-danger py-0" type="button" onclick="rem_item($(this))"><i class="fa fa-times"></i></button>
								</td>
								<!-- resource count -->
								<td class="align-middle p-0 text-center">
									<input type="number" class="text-center w-100 border-0" step="any" name="resource_count" id="resource_count"  value="<?php echo $row['resource_count'] ?>"  required/>
								</td>
								<!-- resource level -->
								<td class="align-middle p-1">
									<input type="text" class="text-center w-100 border-0" name="resource_level" id="resource_level"  value="<?php echo isset($row['resource_level']) ? $row['resource_level']:"" ?>"  required/>
								</td>
								
								<td class="align-middle p-1">
									<input type="text" class="text-center w-100 border-0" name="resource_name" id="resource_name"  value="<?php echo isset($row['resource_name']) ? $row['resource_name']:"" ?>"  required/>
								</td>
								<!-- milestone start date -->
								<td class="align-middle p-1">
            		              <input type="date" class="text-center w-100 border-0" name="r_startdate" id="r_startdate"  value="<?php echo isset($row['r_startdate']) ? $row['r_startdate'] :"" ?>" required>
        										</td>
								<!-- milestone end date -->
								<td class="align-middle p-1">
									<input type="date" class="text-center w-100 border-0" name="r_enddate" id="r_enddate"  value="<?php echo isset($row['r_enddate']) ? $row['r_enddate'] :"" ?>"   required/>
								</td>
								
								
								<td class="align-middle p-1">
									<input type="number" step="any" class="text-right w-100 border-0" name="monthly_billing" id="monthly_billing" value="<?php echo isset($row['monthly_billing']) ? $row['monthly_billing'] :"" ?>"   required/>
								</td>
								<td class="align-middle p-1">
									<input type="number" step="any" class="text-right w-100 border-0" name="per_resourcecount"  id="per_resourcecount" value="<?php echo isset($row['per_resourcecount']) ? $row['per_resourcecount'] :"" ?>"   required/>
								</td>
								
								<td class="align-middle p-1 text-right total-price"><?php echo number_format($row['resource_count']*$row['per_resourcecount']) ?></td>
							</tr>
							<?php endwhile; endif; ?>
						</tbody>
						<?php// echo "here";die();?>
						<tfoot>
							<tr class="bg-lightblue">
								<tr>
									<th class="p-1 text-right" colspan="8"><span><button class="btn btn btn-sm btn-flat btn-primary py-0 mx-1" type="button" id="add_row">Add Row</button></span> Sub Total</th>
									<th class="p-1 text-right" id="sub_total">0</th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="8">Tax Inclusive (%)
									<input type="number"  name="tax_percentage" class="border-light text-right" value="<?php echo isset($tax_percentage) ? $tax_percentage : 0 ?>" id="tax_percentage">
									</th>
									<th class="p-1"><input type="text" class="w-100 border-0 text-right" readonly value="<?php echo isset($tax_amount) ? $tax_amount : 0 ?>" name="tax_amount" id="tax_amount"></th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="8">Total</th>
									<th class="p-1 text-right" id="total">0</th>
								</tr>
							</tr>
						</tfoot>
					</table>
					<?php endif; ?>



                <?php if($_settings->userdata('type') == 4): ?>
				<table class="table table-striped table-bordered" id="item-list">
						<colgroup>
							<col width="2%">
							<col width="5%">
							<col width="15%">
							<col width="15%">
							<col width="8%">
							<col width="8%">
							<!-- <col width="8%"> -->
							<col width="8%">
							<col width="8%">
							<col width="8%">
						</colgroup>
						<thead>
							<tr class="bg-navy disabled">
								<th class="px-1 py-1 text-center"></th>
								<th class="px-1 py-1 text-center">Resource Count</th>
								<th class="px-1 py-1 text-center">Resource Level</th>
								<th class="px-1 py-1 text-center">Resource Name</th>
								<th class="px-1 py-1 text-center">Start Date</th>
								<th class="px-1 py-1 text-center">End Date</th>
								<!-- <th class="px-1 py-1 text-center">Status</th> -->
								<th class="px-1 py-1 text-center">Monthly Billing</th>
								<th class="px-1 py-1 text-center">Per Resource Cost</th>
								<th class="px-1 py-1 text-center">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if(isset($id)):
								//echo "$id";die();
							$order_items_qry = $conn->query("SELECT * FROM resource_table rt where rt.`po_id` = $id  ");
							//echo "<pre>";print_r($order_items_qry1);die();
							echo $conn->error;
							while($row = $order_items_qry->fetch_assoc()):
								//echo "<pre>";print_r($row);die();
							?>
							
							<tr class="po-item" data-id="">
								<td class="align-middle p-1 text-center">
									<button class="btn btn-sm btn-danger py-0" type="button" onclick="rem_item($(this))"><i class="fa fa-times"></i></button>
								</td>
								<!-- resource count -->
								<td class="align-middle p-0 text-center">
									<input type="number" class="text-center w-100 border-0" step="any" name="resource_count" id="resource_count"  value="<?php echo $row['resource_count'] ?>"  required/>
								</td>
								<!-- resource level -->
								<td class="align-middle p-1">
									<input type="text" class="text-center w-100 border-0" name="resource_level" id="resource_level"  value="<?php echo isset($row['resource_level']) ? $row['resource_level']:"" ?>"  required/>
								</td>
								
								<td class="align-middle p-1">
									<input type="text" class="text-center w-100 border-0" name="resource_name" id="resource_name"  value="<?php echo isset($row['resource_name']) ? $row['resource_name']:"" ?>"  required/>
								</td>
								<!-- milestone start date -->
								<td class="align-middle p-1">
            		              <input type="date" class="text-center w-100 border-0" name="r_startdate" id="r_startdate"  value="<?php echo isset($row['r_startdate']) ? $row['r_startdate'] :"" ?>" required>
        										</td>
								<!-- milestone end date -->
								<td class="align-middle p-1">
									<input type="date" class="text-center w-100 border-0" name="r_enddate" id="r_enddate"  value="<?php echo isset($row['r_enddate']) ? $row['r_enddate'] :"" ?>"   required/>
								</td>
								
								
								<td class="align-middle p-1">
									<input type="number" step="any" class="text-right w-100 border-0" name="monthly_billing" id="monthly_billing" value="<?php echo isset($row['monthly_billing']) ? $row['monthly_billing'] :"" ?>"   required/>
								</td>
								<td class="align-middle p-1">
									<input type="number" step="any" class="text-right w-100 border-0" name="per_resourcecount"  id="per_resourcecount" value="<?php echo isset($row['per_resourcecount']) ? $row['per_resourcecount'] :"" ?>"   required/>
								</td>
								
								<td class="align-middle p-1 text-right total-price"><?php echo number_format($row['resource_count']*$row['per_resourcecount']) ?></td>
							</tr>
							<?php endwhile; endif; ?>
						</tbody>
						<?php// echo "here";die();?>
						<tfoot>
							<tr class="bg-lightblue">
								<tr>
									<th class="p-1 text-right" colspan="8"><span><button class="btn btn btn-sm btn-flat btn-primary py-0 mx-1" type="button" id="add_row">Add Row</button></span> Sub Total</th>
									<th class="p-1 text-right" id="sub_total">0</th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="8">Tax Inclusive (%)
									<input type="number"  name="tax_percentage" class="border-light text-right" value="<?php echo isset($tax_percentage) ? $tax_percentage : 0 ?>" id="tax_percentage">
									</th>
									<th class="p-1"><input type="text" class="w-100 border-0 text-right" readonly value="<?php echo isset($tax_amount) ? $tax_amount : 0 ?>" name="tax_amount" id="tax_amount"></th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="8">Total</th>
									<th class="p-1 text-right" id="total">0</th>
								</tr>
							</tr>
						</tfoot>
					</table>
					<?php endif; ?>




					<?php if($_settings->userdata('type') == 5): ?>
				<table class="table table-striped table-bordered" id="item-list">
						<colgroup>
							<col width="2%">
							<col width="5%">
							<col width="15%">
							<col width="15%">
							<col width="8%">
							<col width="8%">
							<!-- <col width="8%"> -->
							<col width="8%">
							<col width="8%">
							<col width="8%">
						</colgroup>
						<thead>
							<tr class="bg-navy disabled">
								<th class="px-1 py-1 text-center"></th>
								<th class="px-1 py-1 text-center">Resource Count</th>
								<th class="px-1 py-1 text-center">Resource Level</th>
								<th class="px-1 py-1 text-center">Resource Name</th>
								<th class="px-1 py-1 text-center">Start Date</th>
								<th class="px-1 py-1 text-center">End Date</th>
								<!-- <th class="px-1 py-1 text-center">Status</th> -->
								<th class="px-1 py-1 text-center">Monthly Billing</th>
								<th class="px-1 py-1 text-center">Per Resource Cost</th>
								<th class="px-1 py-1 text-center">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if(isset($id)):
								//echo "$id";die();
							$order_items_qry = $conn->query("SELECT * FROM resource_table rt where rt.`po_id` = $id  ");
							//echo "<pre>";print_r($order_items_qry1);die();
							echo $conn->error;
							while($row = $order_items_qry->fetch_assoc()):
								//echo "<pre>";print_r($row);die();
							?>
							
							<tr class="po-item" data-id="">
								<td class="align-middle p-1 text-center">
									<button class="btn btn-sm btn-danger py-0" type="button" onclick="rem_item($(this))"><i class="fa fa-times"></i></button>
								</td>
								<!-- resource count -->
								<td class="align-middle p-0 text-center">
									<input type="number" class="text-center w-100 border-0" step="any" name="resource_count" id="resource_count"  value="<?php echo $row['resource_count'] ?>"  required/>
								</td>
								<!-- resource level -->
								<td class="align-middle p-1">
									<input type="text" class="text-center w-100 border-0" name="resource_level" id="resource_level"  value="<?php echo isset($row['resource_level']) ? $row['resource_level']:"" ?>"  required/>
								</td>
								
								<td class="align-middle p-1">
									<input type="text" class="text-center w-100 border-0" name="resource_name" id="resource_name"  value="<?php echo isset($row['resource_name']) ? $row['resource_name']:"" ?>"  required/>
								</td>
								<!-- milestone start date -->
								<td class="align-middle p-1">
            		              <input type="date" class="text-center w-100 border-0" name="r_startdate" id="r_startdate"  value="<?php echo isset($row['r_startdate']) ? $row['r_startdate'] :"" ?>" required>
        										</td>
								<!-- milestone end date -->
								<td class="align-middle p-1">
									<input type="date" class="text-center w-100 border-0" name="r_enddate" id="r_enddate"  value="<?php echo isset($row['r_enddate']) ? $row['r_enddate'] :"" ?>"   required/>
								</td>
								
								
								<td class="align-middle p-1">
									<input type="number" step="any" class="text-right w-100 border-0" name="monthly_billing" id="monthly_billing" value="<?php echo isset($row['monthly_billing']) ? $row['monthly_billing'] :"" ?>"   required/>
								</td>
								<td class="align-middle p-1">
									<input type="number" step="any" class="text-right w-100 border-0" name="per_resourcecount"  id="per_resourcecount" value="<?php echo isset($row['per_resourcecount']) ? $row['per_resourcecount'] :"" ?>"   required/>
								</td>
								
								<td class="align-middle p-1 text-right total-price"><?php echo number_format($row['resource_count']*$row['per_resourcecount']) ?></td>
							</tr>
							<?php endwhile; endif; ?>
						</tbody>
						<?php// echo "here";die();?>
						<tfoot>
							<tr class="bg-lightblue">
								<tr>
									<th class="p-1 text-right" colspan="8"><span><button class="btn btn btn-sm btn-flat btn-primary py-0 mx-1" type="button" id="add_row">Add Row</button></span> Sub Total</th>
									<th class="p-1 text-right" id="sub_total">0</th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="8">Tax Inclusive (%)
									<input type="number"  name="tax_percentage" class="border-light text-right" value="<?php echo isset($tax_percentage) ? $tax_percentage : 0 ?>" id="tax_percentage">
									</th>
									<th class="p-1"><input type="text" class="w-100 border-0 text-right" readonly value="<?php echo isset($tax_amount) ? $tax_amount : 0 ?>" name="tax_amount" id="tax_amount"></th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="8">Total</th>
									<th class="p-1 text-right" id="total">0</th>
								</tr>
							</tr>
						</tfoot>
					</table>
					<?php endif; ?>


					<div class="row">
	
					<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6">
            				<label for="businesshead_name" class="control-label">Business Head Name :<span class="po_err_msg text-danger">*</span></label>
            				<input type="text" name="businesshead_name" id="businesshead_name" class="form-control rounded-0" value="<?php echo isset($businesshead_name) ? $businesshead_name :"" ?>" required>
        				</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 2): ?>
						<div class="col-md-6">
            				<label for="businesshead_name" class="control-label">Business Head Name :<span class="po_err_msg text-danger">*</span></label>
            				<input type="text" name="businesshead_name" id="businesshead_name" class="form-control rounded-0" value="<?php echo isset($businesshead_name) ? $businesshead_name :"" ?>" required>
        				</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 3): ?>
						<div class="col-md-6">
            				<label for="businesshead_name" class="control-label">Business Head Name :<span class="po_err_msg text-danger">*</span></label>
            				<input type="text" name="businesshead_name" id="businesshead_name" class="form-control rounded-0" value="<?php echo isset($businesshead_name) ? $businesshead_name :"" ?>" disabled>
        				</div>
						<?php endif; ?>
						
						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6">
            				<label for="accountshead_name" class="control-label">Accounts Head Name :<span class="po_err_msg text-danger">*</span></label>
            				<input type="text" name="accountshead_name" id="accountshead_name" class="form-control rounded-0" value="<?php echo isset($accountshead_name) ? $accountshead_name :"" ?>" required>
        				</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 4): ?>
						<div class="col-md-6">
            				<label for="accountshead_name" class="control-label">Accounts Head Name :<span class="po_err_msg text-danger">*</span></label>
            				<input type="text" name="accountshead_name" id="accountshead_name" class="form-control rounded-0" value="<?php echo isset($accountshead_name) ? $accountshead_name :"" ?>" required>
        				</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 5): ?>
						<div class="col-md-6">
            				<label for="accountshead_name" class="control-label">Accounts Head Name :<span class="po_err_msg text-danger">*</span></label>
            				<input type="text" name="accountshead_name" id="accountshead_name" class="form-control rounded-0" value="<?php echo isset($accountshead_name) ? $accountshead_name :"" ?>" disabled>
        				</div>
						<?php endif; ?>
						
						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6">
							<label for="businesshead_comments" class="control-label">Business Head Comments :</label>
							<textarea name="businesshead_comments" id="businesshead_comments" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($businesshead_comments) ? $businesshead_comments : '' ?></textarea>
						</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 3): ?>
						<div class="col-md-6">
							<label for="businesshead_comments" class="control-label">Business Head Comments :</label>
							<textarea name="businesshead_comments" id="businesshead_comments" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($businesshead_comments) ? $businesshead_comments : '' ?></textarea>
						</div>
						<?php endif; ?>

						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6">
							<label for="businessteam_comments" class="control-label">Business Team Comments :</label>
							<textarea name="businessteam_comments" id="businessteam_comments" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($businessteam_comments) ? $businessteam_comments : '' ?></textarea>
						</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 2): ?>
						<div class="col-md-6">
							<label for="businessteam_comments" class="control-label">Business Team Comments :</label>
							<textarea name="businessteam_comments" id="businessteam_comments" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($businessteam_comments) ? $businessteam_comments : '' ?></textarea>
						</div>
						<?php endif; ?>


						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6">
							<label for="accountshead_comments" class="control-label">Accounts Head Comments :</label>
							<textarea name="accountshead_comments" id="accountshead_comments" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($accountshead_comments) ? $accountshead_comments : '' ?></textarea>
						</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 5): ?>
						<div class="col-md-6">
							<label for="accountshead_comments" class="control-label">Accounts Head Comments :</label>
							<textarea name="accountshead_comments" id="accountshead_comments" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($accountshead_comments) ? $accountshead_comments : '' ?></textarea>
						</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6">
							<label for="accountsteam_comments" class="control-label">Accounts Team Comments :</label>
							<textarea name="accountsteam_comments" id="accountsteam_comments" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($accountsteam_comments) ? $accountsteam_comments : '' ?></textarea>
						</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 4): ?>
						<div class="col-md-6">
							<label for="accountsteam_comments" class="control-label">Accounts Team Comments :</label>
							<textarea name="accountsteam_comments" id="accountsteam_comments" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($accountsteam_comments) ? $accountsteam_comments : '' ?></textarea>
						</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6">
							<label for="director_comments" class="control-label">Director Comments :</label>
							<textarea name="director_comments" id="director_comments" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($director_comments) ? $director_comments : '' ?></textarea>
						</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 8): ?>
						<div class="col-md-6">
							<label for="director_comments" class="control-label">Director Comments :</label>
							<textarea name="director_comments" id="director_comments" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($director_comments) ? $director_comments : '' ?></textarea>
						</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6">
            			<label for="status" class="control-label">PO Status :</label>
						
						<select name="status" id="status" class="form-control form-control-sm rounded-0" required>
						<option value="Active" <?php echo isset($status) && $status =="Active" ? "selected": "Active" ?> >Active</option>
						<option value="Expired" <?php echo isset($status) && $status == "Expired" ? 'selected': 'Expired' ?>>Expired</option>	
           				</select>
       					</div>
						   <?php endif; ?>
						   <?php if($_settings->userdata('type') == 2): ?>
						<div class="col-md-6">
            			<label for="status" class="control-label">PO Status :</label>
						
						<select name="status" id="status" class="form-control form-control-sm rounded-0" required>
						<option value="Active" <?php echo isset($status) && $status =="Active" ? "selected": "Active" ?> >Active</option>
						<option value="Expired" <?php echo isset($status) && $status == "Expired" ? 'selected': 'Expired' ?>>Expired</option>	
           				</select>
       					</div>
						   <?php endif; ?>
						   <?php if($_settings->userdata('type') == 3): ?>
						<div class="col-md-6">
            			<label for="status" class="control-label">PO Status :</label>
						
						<select name="status" id="status" class="form-control form-control-sm rounded-0" required>
						<option value="Active" <?php echo isset($status) && $status =="Active" ? "selected": "Active" ?> >Active</option>
						<option value="Expired" <?php echo isset($status) && $status == "Expired" ? 'selected': 'Expired' ?>>Expired</option>	
           				</select>
       					</div>
						   <?php endif; ?>
						<div class="col-md-6">
            			<label for="project_type" class="control-label">Project Type : </label><br>
						<input type="text" class="form-control form-control-sm rounded-0"  name="project_type" value="TNM" readonly></input>
            			<!-- <select name="project_type" id="project_type" class="form-control form-control-sm rounded-0" disabled> -->
                			<!-- <option value="Not Selected" <?php echo isset($type) && $type =="" ? "selected": "Not Selected" ?> >Not Selected</option> -->
                			<!-- <option value="TNM" <?php echo isset($type) && $type =="" ? "selected": "TNM" ?> >TNM</option> -->
                			<!-- <option value="FC" <?php echo isset($project_type) && $project_type =="" ? "selected": "FC" ?>>FC</option> -->
            			<!-- </select> -->
            			<br/>
            			</div>
						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6" >
							<label for="bhead_approval" class="col-md-5">Business Head Approval : </label>
							<select name="bhead_approval" id="bhead_approval" class="form-control form-control-sm rounded-0" required>
                				<option value="Pending" <?php echo isset($bhead_approval) && $bhead_approval =="Pending" ? "selected": "Pending" ?> >Pending</option>
                				<option value="Approved" <?php echo isset($bhead_approval) && $bhead_approval =="Approved" ? "selected": "Approved" ?>>Approved</option>
            				</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 3): ?>
						<div class="col-md-6" >
							<label for="bhead_approval" class="col-md-5">Business Head Approval : </label>
							<select name="bhead_approval" id="bhead_approval" class="form-control form-control-sm rounded-0" required>
                				<option value="Pending" <?php echo isset($bhead_approval) && $bhead_approval =="Pending" ? "selected": "Pending" ?> >Pending</option>
                				<option value="Approved" <?php echo isset($bhead_approval) && $bhead_approval =="Approved" ? "selected": "Approved" ?>>Approved</option>
            				</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6">
            			<label for="invoice" class="control-label">Invoice Raised :</label>
            			<select name="invoice" id="invoice" class="form-control form-control-sm rounded-0" required>
                			<option value="Not Selected" <?php echo isset($invoice) && $invoice =="" ? "selected": "Not Selected" ?> >Not Selected</option>
                			<option value="Yes" <?php echo isset($invoice) && $invoice =="Yes" ? "selected": "Yes" ?> >Yes</option>
                			<option value="No" <?php echo isset($invoice) && $invoice =="No" ? "selected": "No" ?>>No</option>
            			</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 4): ?>
						<div class="col-md-6">
            			<label for="invoice" class="control-label">Invoice Raised :</label>
            			<select name="invoice" id="invoice" class="form-control form-control-sm rounded-0" required>
                			<option value="Not Selected" <?php echo isset($invoice) && $invoice =="Not Selected" ? "selected": "Not Selected" ?> >Not Selected</option>
                			<option value="Yes" <?php echo isset($invoice) && $invoice =="Yes" ? "selected": "Yes" ?> >Yes</option>
                			<option value="No" <?php echo isset($invoice) && $invoice =="No" ? "selected": "No" ?>>No</option>
            			</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 5): ?>
						<div class="col-md-6">
            			<label for="invoice" class="control-label">Invoice Raised :</label>
            			<select name="invoice" id="invoice" class="form-control form-control-sm rounded-0" required>
                			<option value="Not Selected" <?php echo isset($invoice) && $invoice =="Not Selected" ? "selected": "Not Selected" ?> >Not Selected</option>
                			<option value="Yes" <?php echo isset($invoice) && $invoice =="Yes" ? "selected": "Yes" ?> >Yes</option>
                			<option value="No" <?php echo isset($invoice) && $invoice =="No" ? "selected": "No" ?>>No</option>
            			</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 5): ?>
						<div class="col-md-6" >
							<label for="ahead_approval" class="col-md-5">Accounts Head Approval : </label>
							<select name="ahead_approval" id="ahead_approval" class="form-control form-control-sm rounded-0" required>
                				<option value="Pending" <?php echo isset($ahead_approval) && $ahead_approval =="Pending" ? "selected": "Pending" ?> >Pending</option>
                				<option value="Approved" <?php echo isset($ahead_approval) && $ahead_approval =="Approved" ? "selected": "Approved" ?>>Approved</option>
            				</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6" >
							<label for="ahead_approval" class="col-md-5">Accounts Head Approval : </label>
							<select name="ahead_approval" id="ahead_approval" class="form-control form-control-sm rounded-0" required>
                				<option value="Pending" <?php echo isset($ahead_approval) && $ahead_approval =="Pending" ? "selected": "Pending" ?> >Pending</option>
                				<option value="Approved" <?php echo isset($ahead_approval) && $ahead_approval =="Approved" ? "selected": "Approved" ?>>Approved</option>
            				</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 1): ?>
            			<div class="col-md-6 form-group">
            			<label for="payment" class="control-label">Payment Released :</label>
            			<select name="payment" id="payment" class="form-control form-control-sm rounded-0" required>
                
                			<option value="Pending" <?php echo isset($payment) && $payment =="Pending" ? "selected": "Pending" ?> >Pending</option>
                			<option value="Done" <?php echo isset($payment) && $payment =="Done" ? "selected": "Done" ?>>Done</option>
            			</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 4): ?>
            			<div class="col-md-6 form-group">
            			<label for="payment" class="control-label">Payment Released :</label>
            			<select name="payment" id="payment" class="form-control form-control-sm rounded-0" required>
                
                			<option value="Pending" <?php echo isset($payment) && $payment =="Pending" ? "selected": "Pending" ?> >Pending</option>
                			<option value="Done" <?php echo isset($payment) && $payment =="Done" ? "selected": "Done" ?>>Done</option>
            			</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 5): ?>
            			<div class="col-md-6">
            			<label for="payment" class="control-label">Payment Released :</label>
            			<select name="payment" id="payment" class="form-control form-control-sm rounded-0" required>
                
                			<option value="Pending" <?php echo isset($payment) && $payment =="Pending" ? "selected": "Pending" ?> >Pending</option>
                			<option value="Done" <?php echo isset($payment) && $payment =="Done" ? "selected": "Done" ?>>Done</option>
            			</select>
            			</div>
						<?php endif; ?>
					</div>
						<!-- tanmay start poc-->
					
						<!-- tanmay end poc-->
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" form="po-form" name="upload">Save</button>
		<a class="btn btn-flat btn-default" href="?page=purchase_orders_tnm">Cancel</a>
	</div>
</div>
<table class="d-none" id="item-clone">
	<tr class="po-item" data-id="">
								<td class="align-middle p-1 text-center">
									<button class="btn btn-sm btn-danger py-0" type="button" onclick="rem_item($(this))"><i class="fa fa-times"></i></button>
								</td>
								<!-- resource count -->
								<td class="align-middle p-0 text-center">
									<input type="number" class="text-center w-100 border-0" step="any" name="resource_count" id="resource_count"   required/>
								</td>
								<!-- resource level -->
								<td class="align-middle p-1">
									<input type="text" class="text-center w-100 border-0" name="resource_level" id="resource_level"    required/>
								</td>
								
								<td class="align-middle p-1">
									<input type="text" class="text-center w-100 border-0" name="resource_name" id="resource_name"    required/>
								</td>
								<!-- milestone start date -->
								<td class="align-middle p-1">
            		              <input type="date" class="text-center w-100 border-0" name="r_startdate" id="r_startdate"   required>
        										</td>
								<!-- milestone end date -->
								<td class="align-middle p-1">
									<input type="date" class="text-center w-100 border-0" name="r_enddate" id="r_enddate"     required/>
								</td>
								
								
								<td class="align-middle p-1">
									<input type="number" step="any" class="text-right w-100 border-0" name="monthly_billing" id="monthly_billing"    required/>
								</td>
								<td class="align-middle p-1">
									<input type="number" step="any" class="text-right w-100 border-0" name="per_resourcecount"  id="per_resourcecount"    required/>
								</td>
								<td class="align-middle p-1 text-right total-price"><?php echo number_format($row['resource_count']*$row['per_resourcecount']) ?></td>
							</tr>
	
</table>




<script>
//date start

$('#m_percent').keyup(function(){
  if ($(this).val() > 100){
    alert("No numbers above 100");
    $(this).val('100');
  }
});


    
$(document).ready(function(){
    $('#date_picker1').datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth:true,
        changeYear: true
       
    });
})
$(document).ready(function(){
    $('#date_picker2').datepicker({
      
        dateFormat: "yy-mm-dd",
        changeMonth:true,
        changeYear: true
    });
})
$(document).ready(function(){
    $('#date_picker3').datepicker({
      
        dateFormat: "yy-mm-dd",
        changeMonth:true,
        changeYear: true
    });
})
$(document).ready(function(){
    $('#date_picker4').datepicker({
      
        dateFormat: "yy-mm-dd",
        changeMonth:true,
        changeYear: true
    });
})
$("#date_picker2").change(function () {

var objFromDate = document.getElementById("date_picker1").value; 
var objToDate = document.getElementById("date_picker2").value;

var FromDate = new Date(objFromDate);
var ToDate = new Date(objToDate);

if(FromDate > ToDate )
{
	alert("End Date Should Be Greater Than Start Date");
	document.getElementById("date_picker2").value = "";
	return false; 
}

});
$("#date_picker4").change(function () {

var objFromDate = document.getElementById("date_picker3").value; 
var objToDate = document.getElementById("date_picker4").value;

var FromDate = new Date(objFromDate);
var ToDate = new Date(objToDate);

if(FromDate > ToDate )
{
	alert("Resource End Date Should Be Greater Than Resource Start Date");
	document.getElementById("date_picker4").value = "";
	return false; 
}

});
$("#date_picker3").change(function () {

var objFromDate = document.getElementById("date_picker1").value; 
var objToDate = document.getElementById("date_picker3").value;

var FromDate = new Date(objFromDate);
var ToDate = new Date(objToDate);

if(FromDate > ToDate )
{
	alert("Resource Start Date Should Be Greater Than PO Start Date");
	document.getElementById("date_picker3").value = "";
	return false; 
}

});


//date end


	function rem_item(_this){
		_this.closest('tr').remove()
	}
	function calculate(){
		var _total = 0
		$('.po-item').each(function(){
			var resource_count = $(this).find("[name='resource_count']").val()
			var per_resourcecount = $(this).find("[name='per_resourcecount']").val()
			var row_total = 0;
			if(resource_count > 0 && per_resourcecount > 0){
				row_total = parseFloat(resource_count)*parseFloat(per_resourcecount)
			}
			$(this).find('.total-price').text(parseFloat(row_total).toLocaleString('en-US'))
		})
		$('.total-price').each(function(){
			var _price = $(this).text()
				_price = _price.replace(/\,/gi,'')
				_total += parseFloat(_price)
		})
		var discount_perc = 0
		if($('[name="discount_percentage"]').val() > 0){
			discount_perc = $('[name="discount_percentage"]').val()
		}
		var discount_amount = _total * (discount_perc/100);
		$('[name="discount_amount"]').val(parseFloat(discount_amount).toLocaleString("en-US"))
		var tax_perc = 0
		if($('[name="tax_percentage"]').val() > 0){
			tax_perc = $('[name="tax_percentage"]').val()
		}
		var tax_amount = _total * (tax_perc/100);
		$('[name="tax_amount"]').val(parseFloat(tax_amount).toLocaleString("en-US"))
		$('#sub_total').text(parseFloat(_total).toLocaleString("en-US"))
		$('#total').text(parseFloat(_total-discount_amount).toLocaleString("en-US"))
	}

	function _autocomplete(_item){
		_item.find('.item_id').autocomplete({
			source:function(request, response){
				$.ajax({
					url:_base_url_+"classes/Master.php?f=search_tnmitems",
					method:'POST',
					data:{q:request.term},
					dataType:'json',
					error:err=>{
						console.log(err)
					},
					success:function(resp){
						response(resp)
					}
				})
			},
			select:function(event,ui){
				console.log(ui)
				_item.find('input[name="item_id[]"]').val(ui.item.id)
				_item.find('.item-description').text(ui.item.description)
			}
		})
	}
	// tanmay start poc
	
	// tanmay end poc

	$(document).ready(function(){
		$('#add_row').click(function(){
			var tr = $('#item-clone tr').clone()
			$('#item-list tbody').append(tr)
			//_autocomplete(tr)
			tr.find('[name="resource_count"],[name="per_resourcecount"]').on('input keypress',function(e){
				calculate()
			})
			$('#item-list tfoot').find('[name="discount_percentage"],[name="tax_percentage"]').on('input keypress',function(e){
				calculate()
			})
		})
		if($('#item-list .po-item').length > 0){
			$('#item-list .po-item').each(function(){
				var tr = $(this)
				//_autocomplete(tr)
				tr.find('[name="resource_count"],[name="per_resourcecount"]').on('input keypress',function(e){
					calculate()
				})
				$('#item-list tfoot').find('[name="discount_percentage"],[name="tax_percentage"]').on('input keypress',function(e){
					calculate()
				})
				tr.find('[name="resource_count"],[name="per_resourcecount"]').trigger('keypress')
			})
		}else{
		$('#add_row').trigger('click')
		}
        $('.select2').select2({placeholder:"Please Select here",width:"relative"})
		$('#po-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			$('.err-msg').remove();
			$('[name="po_no"]').removeClass('border-danger')
			if($('#item-list .po-item').length <= 0){
				alert_toast(" Please add atleast 1 item on the list.",'warning')
				return false;
			}
			start_loader();


			var resource_count = [];
			var resource_level =[];
			var resource_name =[];
			var r_startdate = [];
			var r_enddate = [];
			var monthly_billing = [];
			var per_resourcecount = [];
			
			$.each($("#item-list .po-item"),function(index,value){
			      let resource_count_temp = $(this).find("#resource_count").val();
			      let resource_level_temp = $(this).find("#resource_level").val();
			      let resource_name_temp = $(this).find("#resource_name").val();
			      let r_startdate_temp = $(this).find("#r_startdate").val();
			      let r_enddate_temp= $(this).find("#r_enddate").val();
			      let monthly_billing_temp= $(this).find("#monthly_billing").val();
			      let per_resourcecount_temp= $(this).find("#per_resourcecount").val();
			     
			      
			      resource_count.push(resource_count_temp);
			      resource_level.push(resource_level_temp);
			      resource_name.push(resource_name_temp);
			      r_startdate.push(r_startdate_temp);
			      r_enddate.push(r_enddate_temp);
			      monthly_billing.push(monthly_billing_temp);
			      per_resourcecount.push(per_resourcecount_temp);
			     
			   });



			 $.ajax({
                  url:_base_url_+"classes/Master.php?f=save_tnmpo",
                 type: "POST",
                
                  dataType: 'json',
                  data: {	resource_count:resource_count,
                  			resource_level:resource_level,
                  			resource_name:resource_name,
                  			r_startdate:r_startdate,
                  			r_enddate:r_enddate,
                  			monthly_billing:monthly_billing,
                  			per_resourcecount:per_resourcecount,
                  			

                  			id:$('input[name="id"]').val(),
                  			po_no:$('#po_no').val(),
                  			client_id:$('#client_id').val(),
                  			rm_apmosys:$('#rm_apmosys').val(),
                  			startdate:$('input[name="startdate"]').val(),
                  			enddate:$('input[name="enddate"]').val(),
                  			project_name:$('#project_name').val(),
                  			businesshead_name:$('#businesshead_name').val(),
                  			accountshead_name:$('#accountshead_name').val(),
                  			businesshead_comments:$('#businesshead_comments').val(),
                  			businessteam_comments:$('#businessteam_comments').val(),
                  			accountshead_comments:$('#accountshead_comments').val(),
                  			accountsteam_comments:$('#accountsteam_comments').val(),
                  			director_comments:$('#director_comments').val(),
                  			status:$('#status').val(),
                  			bhead_approval:$('#bhead_approval').val(),
                  			invoice:$('#invoice').val(),
                  			ahead_approval:$('#ahead_approval').val(),
                  			payment:$('#payment').val(),
                  			tax_amount:$('#tax_amount').val(),
							  tax_percentage:$('#tax_percentage').val(),



                  		},
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.href = "./?page=purchase_orders_tnm/view_po&id="+resp.id;
					}else if((resp.status == 'failed' || resp.status == 'po_failed') && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").animate({ scrollTop: 0 }, "fast");
                            end_loader()
							if(resp.status == 'po_failed'){
								$('[name="po_no"]').addClass('border-danger').focus()
							}
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})

        
	})
</script>
