<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `po_list` where id = '{$_GET['id']}' ");
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
	
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
		}

		
		input[type=number] {
		-moz-appearance: textfield;
		}
		[name="tax_percentage"],[name="discount_percentage"]{
			width:5vw;
		}

</style>
<div class="card card-outline card-info">
	<div class="card-header">
		<h3 class="card-title"><b><u><?php echo isset($id) ? "Update FC Purchase Order / Letter Of Intent Details": "Add New FC Purchase Order" ?></u></b> </h3>
	</div>
	<div class="card-body">
		<form action="" id="po-form">
			<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
			<div class="row">

			<?php if($_settings->userdata('type') == 1): ?>
					


				<div class="col-md-6 form-group">
				<label for="client_id" class="control-label col-md-5">Client :<span class="po_err_msg text-danger">*</span></label>
			<select name="client_id" id="client_id" class="custom-select rounded-0 select2">
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
						<input type="date" name="startdate" id="po_startdate" class="form-control rounded-0" value="<?php echo isset($startdate) ? $startdate :"" ?>" required>
					</div>
					<div class="form-group">
						   <label for="enddate" class="control-label">End Date :</label>
						<input type="date" name="enddate" id="po_enddate" class="form-control rounded-0" value="<?php echo isset($enddate) ? $enddate :"" ?>" >
					   </div>
					</div>

				<div class=" col-md-6 form-group">
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
				<div class="form-group">
					<label for="po_no">PO # <span class="po_err_msg text-danger">*</span></label>
					<input type="text" class="form-control rounded-0" id="po_no" name="po_no" value="<?php echo isset($po_no) ? $po_no : '' ?>"  >
					<!-- <small><i>Leave this blank to Automatically Generate upon saving.</i></small> -->
				</div>
				<div class="form-group">
            		<label for="project_name" class="control-label">Project Name : <span class="po_err_msg text-danger">*</span></label>
            		<input type="text" name="project_name" id="project_name" class="form-control rounded-0" value="<?php echo isset($project_name) ? $project_name :"" ?>" required>
        		</div>
				
				</div>
				<?php endif; ?>



				<?php if($_settings->userdata('type') == 2): ?>
					


					<div class="col-md-6 form-group">
					<label for="client_id" class="control-label col-md-5">Client :<span class="po_err_msg text-danger">*</span></label>
				<select name="client_id" id="client_id" class="custom-select rounded-0 select2">
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
						<input type="date" name="startdate" id="po_startdate" class="form-control rounded-0" value="<?php echo isset($startdate) ? $startdate :"" ?>" required>
					</div>
					<div class="form-group">
						   <label for="enddate" class="control-label">End Date :</label>
						<input type="date" name="enddate" id="po_enddate" class="form-control rounded-0" value="<?php echo isset($enddate) ? $enddate :"" ?>" >
					   </div>
					</div>
	
					<div class=" col-md-6 form-group">
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
					<div class="form-group">
						<label for="po_no">PO # <span class="po_err_msg text-danger">*</span></label>
						<input type="text" class="form-control rounded-0" id="po_no" name="po_no" value="<?php echo isset($po_no) ? $po_no : '' ?>"  >
						<!-- <small><i>Leave this blank to Automatically Generate upon saving.</i></small> -->
					</div>
					<div class="form-group">
						<label for="project_name" class="control-label">Project Name : <span class="po_err_msg text-danger">*</span></label>
						<input type="text" name="project_name" id="project_name" class="form-control rounded-0" value="<?php echo isset($project_name) ? $project_name :"" ?>" required>
					</div>
					
					</div>
					<?php endif; ?>



					<?php if($_settings->userdata('type') == 3): ?>
					


					<div class="col-md-6 form-group">
					<label for="client_id" class="control-label col-md-5">Client :<span class="po_err_msg text-danger">*</span></label>
				<select name="client_id" id="client_id" class="custom-select rounded-0 select2">
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
						<input type="date" name="startdate" id="po_startdate" class="form-control rounded-0" value="<?php echo isset($startdate) ? $startdate :"" ?>" required>
					</div>
					<div class="form-group">
						   <label for="enddate" class="control-label">End Date :</label>
						<input type="date" name="enddate" id="po_enddate" class="form-control rounded-0" value="<?php echo isset($enddate) ? $enddate :"" ?>" >
					   </div>
					</div>
					<div class=" col-md-6 form-group">
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
					<div class="form-group">
						<label for="po_no">PO # <span class="po_err_msg text-danger">*</span></label>
						<input type="text" class="form-control rounded-0" id="po_no" name="po_no" value="<?php echo isset($po_no) ? $po_no : '' ?>"  >
						<!-- <small><i>Leave this blank to Automatically Generate upon saving.</i></small> -->
					</div>
					<div class="form-group">
						<label for="project_name" class="control-label">Project Name : <span class="po_err_msg text-danger">*</span></label>
						<input type="text" name="project_name" id="project_name" class="form-control rounded-0" value="<?php echo isset($project_name) ? $project_name :"" ?>" required>
					</div>
					
					</div>
					<?php endif; ?>


					<?php if($_settings->userdata('type') == 4): ?>
				<div class="col-md-6 form-group">
				
				<div class="form-group">
						<label for="startdate" class="control-label">Start Date :<span class="po_err_msg text-danger">*</span></label>
						<input type="date" name="startdate" id="po_startdate" class="form-control rounded-0" value="<?php echo isset($startdate) ? $startdate :"" ?>" required>
					</div>
					<div class="form-group">
						   <label for="enddate" class="control-label">End Date :</label>
						<input type="date" name="enddate" id="po_enddate" class="form-control rounded-0" value="<?php echo isset($enddate) ? $enddate :"" ?>" >
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
						<input type="date" name="startdate" id="po_startdate" class="form-control rounded-0" value="<?php echo isset($startdate) ? $startdate :"" ?>" required>
					</div>
					<div class="form-group">
						   <label for="enddate" class="control-label">End Date :</label>
						<input type="date" name="enddate" id="po_enddate" class="form-control rounded-0" value="<?php echo isset($enddate) ? $enddate :"" ?>" >
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
							<!-- <col width="8%"> -->
							<col width="8%">
							<col width="5%">
							<col width="15%">
							<col width="8%">
							<col width="8%">
							<!-- <col width="8%"> -->
							<col width="8%">
							<col width="8%">
							<col width="8%">
							<col width="8%">
						</colgroup>
						<thead>
							<tr class="bg-navy disabled">
								<th class="px-1 py-1 text-center"></th>
								<th class="px-1 py-1 text-center">Milestone No. </th>
								<!-- <th class="px-1 py-1 text-center">Resource Name</th> -->
								<th class="px-1 py-1 text-center">Milestone Name</th>
								<th class="px-1 py-1 text-center">Milestone %</th>
								<th class="px-1 py-1 text-center">Description</th>
								<th class="px-1 py-1 text-center">Start Date</th>
								<th class="px-1 py-1 text-center">End Date</th>
								<th class="px-1 py-1 text-center">Comments</th>
								<th class="px-1 py-1 text-center">Invoice</th>
								<th class="px-1 py-1 text-center">Billable</th>
								<!-- <th class="px-1 py-1 text-center">Status</th> -->
								<th class="px-1 py-1 text-center">PO Value</th>
								<th class="px-1 py-1 text-center">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if(isset($id)):
							$order_items_qry = $conn->query("SELECT * FROM `milestone_tablefc` mt  where mt.`po_id` = '$id'  ");
							echo $conn->error;
							while($row = $order_items_qry->fetch_assoc()):
							?>
							<tr class="po-item"  data-id="">
													<td class="align-middle p-1 text-center">
														<button class="btn btn-sm btn-danger py-0" type="button" onclick="rem_item($(this))"><i class="fa fa-times"></i></button>
													</td>
													<td class="align-middle p-0 text-center">
														<input type="number" class="text-center w-100 border-0 milestone_no" step="any" name="milestone_no[]"  id="milestone_no"     value="<?php echo  $row['milestone_no'] ?>"  required/>
													</td>

													<!-- milestone name -->
													<td class="align-middle p-1">
														<input type="text" class="text-center w-100 border-0" name="milestone_name[]"   id="milestone_name"  value="<?php echo isset($row['milestone_name']) ? $row['milestone_name'] :"" ?>"  required/>
													</td>
													<!-- milestone percentage -->

													<td class="align-middle p-1">
														<input type="number" class="text-center w-100 border-0" name="m_percent[]"  id="m_percent"   value="<?php echo isset($row['m_percent']) ? $row['m_percent'] :"" ?>" required/>
													</td>

													<td class="align-middle p-1">
														<input type="text" class="text-center w-100 border-0" name="m_description[]"   id="m_description"   value="<?php echo isset($row['m_description']) ? $row['m_description'] :"" ?>"  required/>
													</td>
													<!-- milestone start date -->
													<td class="align-middle p-1">
														<input type="date" class="text-center w-100 border-0" name="m_startdate[]" id="m_startdate"   value="<?php echo isset($row['m_startdate']) ? $row['m_startdate'] :"" ?>" required>
													</td>
													<!-- milestone end date -->
													<td class="align-middle p-1">
														<input type="date" class="text-center w-100 border-0" name="m_enddate[]"  id="m_enddate"  value="<?php echo isset($row['m_enddate']) ? $row['m_enddate'] :"" ?>"   required/>
													</td>



													<td class="align-middle p-1">
														<input type="text" class="text-center w-100 border-0" name="milestone_comments[]" id="milestone_comments"   value="<?php echo isset($row['milestone_comments']) ? $row['milestone_comments'] :"" ?>"   required/>
													</td>
													<td class="align-middle p-1">
														<input type="text" class="text-center w-100 border-0" name="m_invoice[]" id="m_invoice"    value="<?php echo isset($row['invoice']) ? $row['invoice'] :"" ?>"   required/>

													</td>

													<td class="align-middle p-1">
														<input type="number" class="text-center w-100 border-0" name="billable[]" id="billable"  data-action="sumDebit"   value="<?php echo isset($row['billable']) ? $row['billable'] :"" ?>"   required/>
													</td>


													<td class="align-middle p-1">
														<input type="number" step="any" class="text-right w-100 border-0 po_value"  name="po_value[]" id="po_value" data-action="sumOderValue" value="<?php echo isset($row['po_value']) ? $row['po_value'] :"" ?>" required/>
													</td>
													<td class="align-middle p-1 text-right total-price"><?php echo number_format($row['po_value']) ?></td>
												</tr>
							<?php endwhile;endif; ?>
						</tbody>
						<tfoot>
							<tr class="bg-lightblue">
								<tr>
									<th class="p-1 text-right" colspan="11"><span><button class="btn btn btn-sm btn-flat btn-primary py-0 mx-1" type="button" id="add_row">Add Row</button></span> Sub Total</th>
									<th class="p-1 text-right" id="sub_total">0</th>
								</tr>

								<tr>
									<th class="p-1 text-right" colspan="11">Tax Inclusive (%)
									<input type="number" step="any" name="tax_percentage" class="border-light text-right" value="<?php echo isset($tax_percentage) ? $tax_percentage : 0 ?>" id="tax_percentage">
									</th>
									<th class="p-1"><input type="text" class="w-100 border-0 text-right" readonly value="<?php echo isset($tax_amount) ? $tax_amount : 0 ?>" name="tax_amount"  id="tax_amount"></th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="11">Consumed</th>
									<th class="p-1"><input type="text"  class="w-100 border-0 text-right"   readonly value="<?php echo isset($consumed) ? $consumed : 0 ?>" name="consumed" id="consumed"></th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="11">Balance</th>
									<th class="p-1"><input type="text"   class="w-100 border-0 text-right" readonly value="<?php echo isset($balance) ? $balance : 0 ?>" name="balance" id="balance"></th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="11">Total</th>
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
							<!-- <col width="8%"> -->
							<col width="8%">
							<col width="5%">
							<col width="15%">
							<col width="8%">
							<col width="8%">
							<!-- <col width="8%"> -->
							<col width="8%">
							<col width="8%">
							<col width="8%">
							<col width="8%">
						</colgroup>
						<thead>
							<tr class="bg-navy disabled">
								<th class="px-1 py-1 text-center"></th>
								<th class="px-1 py-1 text-center">Milestone No. </th>
								<!-- <th class="px-1 py-1 text-center">Resource Name</th> -->
								<th class="px-1 py-1 text-center">Milestone Name</th>
								<th class="px-1 py-1 text-center">Milestone %</th>
								<th class="px-1 py-1 text-center">Description</th>
								<th class="px-1 py-1 text-center">Start Date</th>
								<th class="px-1 py-1 text-center">End Date</th>
								<th class="px-1 py-1 text-center">Comments</th>
								<th class="px-1 py-1 text-center">Invoice</th>
								<th class="px-1 py-1 text-center">Billable</th>
								<!-- <th class="px-1 py-1 text-center">Status</th> -->
								<th class="px-1 py-1 text-center">PO Value</th>
								<th class="px-1 py-1 text-center">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if(isset($id)):
							$order_items_qry = $conn->query("SELECT * FROM `milestone_tablefc` mt  where mt.`po_id` = '$id'  ");
							echo $conn->error;
							while($row = $order_items_qry->fetch_assoc()):
							?>
							<tr class="po-item"  data-id="">
													<td class="align-middle p-1 text-center">
														<button class="btn btn-sm btn-danger py-0" type="button" onclick="rem_item($(this))"><i class="fa fa-times"></i></button>
													</td>
													<td class="align-middle p-0 text-center">
														<input type="number" class="text-center w-100 border-0 milestone_no" step="any" name="milestone_no[]"  id="milestone_no"     value="<?php echo  $row['milestone_no'] ?>"  required/>
													</td>

													<!-- milestone name -->
													<td class="align-middle p-1">
														<input type="text" class="text-center w-100 border-0" name="milestone_name[]"   id="milestone_name"  value="<?php echo isset($row['milestone_name']) ? $row['milestone_name'] :"" ?>"  required/>
													</td>
													<!-- milestone percentage -->

													<td class="align-middle p-1">
														<input type="number" class="text-center w-100 border-0" name="m_percent[]"  id="m_percent"   value="<?php echo isset($row['m_percent']) ? $row['m_percent'] :"" ?>" required/>
													</td>

													<td class="align-middle p-1">
														<input type="text" class="text-center w-100 border-0" name="m_description[]"   id="m_description"   value="<?php echo isset($row['m_description']) ? $row['m_description'] :"" ?>"  required/>
													</td>
													<!-- milestone start date -->
													<td class="align-middle p-1">
														<input type="date" class="text-center w-100 border-0" name="m_startdate[]" id="m_startdate"   value="<?php echo isset($row['m_startdate']) ? $row['m_startdate'] :"" ?>" required>
													</td>
													<!-- milestone end date -->
													<td class="align-middle p-1">
														<input type="date" class="text-center w-100 border-0" name="m_enddate[]"  id="m_enddate"  value="<?php echo isset($row['m_enddate']) ? $row['m_enddate'] :"" ?>"   required/>
													</td>



													<td class="align-middle p-1">
														<input type="text" class="text-center w-100 border-0" name="milestone_comments[]" id="milestone_comments"   value="<?php echo isset($row['milestone_comments']) ? $row['milestone_comments'] :"" ?>"   required/>
													</td>
													<td class="align-middle p-1">
														<input type="text" class="text-center w-100 border-0" name="m_invoice[]" id="m_invoice"    value="<?php echo isset($row['invoice']) ? $row['invoice'] :"" ?>"   required/>

													</td>

													<td class="align-middle p-1">
														<input type="number" class="text-center w-100 border-0" name="billable[]" id="billable"  data-action="sumDebit"   value="<?php echo isset($row['billable']) ? $row['billable'] :"" ?>"   required/>
													</td>


													<td class="align-middle p-1">
														<input type="number" step="any" class="text-right w-100 border-0 po_value"  name="po_value[]" id="po_value" data-action="sumOderValue" value="<?php echo isset($row['po_value']) ? $row['po_value'] :"" ?>" required/>
													</td>
													<td class="align-middle p-1 text-right total-price"><?php echo number_format($row['po_value']) ?></td>
												</tr>
							<?php endwhile;endif; ?>
						</tbody>
						<tfoot>
							<tr class="bg-lightblue">
								<tr>
									<th class="p-1 text-right" colspan="11"><span><button class="btn btn btn-sm btn-flat btn-primary py-0 mx-1" type="button" id="add_row">Add Row</button></span> Sub Total</th>
									<th class="p-1 text-right" id="sub_total">0</th>
								</tr>

								<tr>
									<th class="p-1 text-right" colspan="11">Tax Inclusive (%)
									<input type="number" step="any" name="tax_percentage" class="border-light text-right" value="<?php echo isset($tax_percentage) ? $tax_percentage : 0 ?>" id="tax_percentage">
									</th>
									<th class="p-1"><input type="text" class="w-100 border-0 text-right" readonly value="<?php echo isset($tax_amount) ? $tax_amount : 0 ?>" name="tax_amount"  id="tax_amount"></th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="11">Consumed</th>
									<th class="p-1"><input type="text"  class="w-100 border-0 text-right"   readonly value="<?php echo isset($consumed) ? $consumed : 0 ?>" name="consumed" id="consumed"></th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="11">Balance</th>
									<th class="p-1"><input type="text"   class="w-100 border-0 text-right" readonly value="<?php echo isset($balance) ? $balance : 0 ?>" name="balance" id="balance"></th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="11">Total</th>
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
							<!-- <col width="8%"> -->
							<col width="8%">
							<col width="5%">
							<col width="15%">
							<col width="8%">
							<col width="8%">
							<!-- <col width="8%"> -->
							<col width="8%">
							<col width="8%">
							<col width="8%">
							<col width="8%">
						</colgroup>
						<thead>
							<tr class="bg-navy disabled">
								<th class="px-1 py-1 text-center"></th>
								<th class="px-1 py-1 text-center">Milestone No. </th>
								<!-- <th class="px-1 py-1 text-center">Resource Name</th> -->
								<th class="px-1 py-1 text-center">Milestone Name</th>
								<th class="px-1 py-1 text-center">Milestone %</th>
								<th class="px-1 py-1 text-center">Description</th>
								<th class="px-1 py-1 text-center">Start Date</th>
								<th class="px-1 py-1 text-center">End Date</th>
								<th class="px-1 py-1 text-center">Comments</th>
								<th class="px-1 py-1 text-center">Invoice</th>
								<th class="px-1 py-1 text-center">Billable</th>
								<!-- <th class="px-1 py-1 text-center">Status</th> -->
								<th class="px-1 py-1 text-center">PO Value</th>
								<th class="px-1 py-1 text-center">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if(isset($id)):
							$order_items_qry = $conn->query("SELECT * FROM `milestone_tablefc` mt  where mt.`po_id` = '$id'  ");
							echo $conn->error;
							while($row = $order_items_qry->fetch_assoc()):
							?>
							<tr class="po-item"  data-id="">
													<td class="align-middle p-1 text-center">
														<button class="btn btn-sm btn-danger py-0" type="button" onclick="rem_item($(this))"><i class="fa fa-times"></i></button>
													</td>
													<td class="align-middle p-0 text-center">
														<input type="number" class="text-center w-100 border-0 milestone_no" step="any" name="milestone_no[]"  id="milestone_no"     value="<?php echo  $row['milestone_no'] ?>"  required/>
													</td>

													<!-- milestone name -->
													<td class="align-middle p-1">
														<input type="text" class="text-center w-100 border-0" name="milestone_name[]"   id="milestone_name"  value="<?php echo isset($row['milestone_name']) ? $row['milestone_name'] :"" ?>"  required/>
													</td>
													<!-- milestone percentage -->

													<td class="align-middle p-1">
														<input type="number" class="text-center w-100 border-0" name="m_percent[]"  id="m_percent"   value="<?php echo isset($row['m_percent']) ? $row['m_percent'] :"" ?>" required/>
													</td>

													<td class="align-middle p-1">
														<input type="text" class="text-center w-100 border-0" name="m_description[]"   id="m_description"   value="<?php echo isset($row['m_description']) ? $row['m_description'] :"" ?>"  required/>
													</td>
													<!-- milestone start date -->
													<td class="align-middle p-1">
														<input type="date" class="text-center w-100 border-0" name="m_startdate[]" id="m_startdate"   value="<?php echo isset($row['m_startdate']) ? $row['m_startdate'] :"" ?>" required>
													</td>
													<!-- milestone end date -->
													<td class="align-middle p-1">
														<input type="date" class="text-center w-100 border-0" name="m_enddate[]"  id="m_enddate"  value="<?php echo isset($row['m_enddate']) ? $row['m_enddate'] :"" ?>"   required/>
													</td>



													<td class="align-middle p-1">
														<input type="text" class="text-center w-100 border-0" name="milestone_comments[]" id="milestone_comments"   value="<?php echo isset($row['milestone_comments']) ? $row['milestone_comments'] :"" ?>"   required/>
													</td>
													<td class="align-middle p-1">
														<input type="text" class="text-center w-100 border-0" name="m_invoice[]" id="m_invoice"    value="<?php echo isset($row['invoice']) ? $row['invoice'] :"" ?>"   required/>

													</td>

													<td class="align-middle p-1">
														<input type="number" class="text-center w-100 border-0" name="billable[]" id="billable"  data-action="sumDebit"   value="<?php echo isset($row['billable']) ? $row['billable'] :"" ?>"   required/>
													</td>


													<td class="align-middle p-1">
														<input type="number" step="any" class="text-right w-100 border-0 po_value"  name="po_value[]" id="po_value" data-action="sumOderValue" value="<?php echo isset($row['po_value']) ? $row['po_value'] :"" ?>" required/>
													</td>
													<td class="align-middle p-1 text-right total-price"><?php echo number_format($row['po_value']) ?></td>
												</tr>
							<?php endwhile;endif; ?>
						</tbody>
						<tfoot>
							<tr class="bg-lightblue">
								<tr>
									<th class="p-1 text-right" colspan="11"><span><button class="btn btn btn-sm btn-flat btn-primary py-0 mx-1" type="button" id="add_row">Add Row</button></span> Sub Total</th>
									<th class="p-1 text-right" id="sub_total">0</th>
								</tr>

								<tr>
									<th class="p-1 text-right" colspan="11">Tax Inclusive (%)
									<input type="number" step="any" name="tax_percentage" class="border-light text-right" value="<?php echo isset($tax_percentage) ? $tax_percentage : 0 ?>" id="tax_percentage">
									</th>
									<th class="p-1"><input type="text" class="w-100 border-0 text-right" readonly value="<?php echo isset($tax_amount) ? $tax_amount : 0 ?>" name="tax_amount"  id="tax_amount"></th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="11">Consumed</th>
									<th class="p-1"><input type="text"  class="w-100 border-0 text-right"   readonly value="<?php echo isset($consumed) ? $consumed : 0 ?>" name="consumed" id="consumed"></th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="11">Balance</th>
									<th class="p-1"><input type="text"   class="w-100 border-0 text-right" readonly value="<?php echo isset($balance) ? $balance : 0 ?>" name="balance" id="balance"></th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="11">Total</th>
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
						<input type="text" class="form-control form-control-sm rounded-0"  name="project_type" value="FC" readonly></input>
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
				</div>
			</div>
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" form="po-form" id="upload" name="upload" >Save</button>
		<a class="btn btn-flat btn-default" href="?page=purchase_orders">Cancel</a>
	</div>
</div>
<table class="d-none" id="item-clone">
	<tr class="po-item" data-id="">
		<td class="align-middle p-1 text-center">
			<button class="btn btn-sm btn-danger py-0" type="button" onclick="rem_item($(this))"><i class="fa fa-times"></i></button>
		</td>
		<td class="align-middle p-0 text-center">
			<input type="number" class="text-center w-100 border-0 milestone_no"  step="any" name="milestone_no[]" id="milestone_no"  />
		</td>

		<td class="align-middle p-1">
			<input type="text" class="text-center w-100 border-0"  name="milestone_name[]"  id="milestone_name"  />
		</td>

		<td class="align-middle p-1">
			<input type="number" class="text-center w-100 border-0" name="m_percent[]"  id="m_percent" />
		</td>
		<td class="align-middle p-1">
			<input type="text" class="text-center w-100 border-0" name="m_description[]" id="m_description"  />
		</td>
		
		<td class="align-middle p-1">
			<input type="date" class="text-center w-100 border-0" name="m_startdate[]" id="m_startdate"  />
		</td>
		<td class="align-middle p-1">
			<input type="date" class="text-center w-100 border-0" name="m_enddate[]" id="m_enddate"  />
		</td>

		<td class="align-middle p-1">
			<input type="text" class="text-center w-100 border-0" name="milestone_comments[]" id="milestone_comments"  />
		</td>
		<td class="align-middle p-1">
			<input type="text" class="text-center w-100 border-0" name="m_invoice[]"  id="m_invoice"  />

		</td>
		<td class="align-middle p-1">
			<input type="number" class="text-center w-100 border-0" data-action="sumDebit" name="billable[]" id="billable"  />
		</td>
		
		<td class="align-middle p-1">
			<input type="number" step="any" class="text-right w-100 border-0"  id="po_value" name="po_value[]" id="po_value"  />
		</td>
		
		<td class="align-middle p-1 text-right total-price"></td>
	</tr>

</table>
<script>


$('body').on('keyup', '[data-action="sumDebit"]', function() {
    var total = 0;
    $('[data-action="sumDebit"]').each(function(_i, e) {
        var val = parseFloat(e.value);
        if (!isNaN(val)) 
            total += val;
    });
    $('#consumed').val(total);
});


$(document).ready(function(){
                
                $("#po_value,#billable").keyup(function(){
                    var balance = 0;
                    var x = Number($("#po_value").val());
                    var y = Number($("#billable").val());
					
                    var balance = x-y;
                    $("#balance").val(balance);
                });
            });



			  //This is my subtraction code
			  



//date start 


$('#m_percent').keyup(function(){
  if ($(this).val() > 100){
    alert("No numbers above 100");
    $(this).val('100');
  }
});


    

$("#po_enddate").change(function () {

var objFromDate = document.getElementById("po_startdate").value; 
var objToDate = document.getElementById("po_enddate").value;

var FromDate = new Date(objFromDate);
var ToDate = new Date(objToDate);

if(FromDate > ToDate )
{
	alert("PO End Date Should Be Greater Than PO Start Date");
	document.getElementById("po_enddate").value = "";
	return false; 
}

});
$("#m_enddate").change(function () {

var objFromDate = document.getElementById("m_startdate").value; 
var objToDate = document.getElementById("m_enddate").value;

var FromDate = new Date(objFromDate);
var ToDate = new Date(objToDate);

if(FromDate > ToDate )
{
	alert("Milestone End Date Should Be Greater Than Milestone Start Date");
	document.getElementById("m_enddate").value = "";
	return false; 
}

});
$("#m_startdate").change(function () {

var objFromDate = document.getElementById("po_startdate").value; 
var objToDate = document.getElementById("m_startdate").value;

var FromDate = new Date(objFromDate);
var ToDate = new Date(objToDate);

if(FromDate > ToDate )
{
	alert("Milestone Start Date Should Be Greater Than PO Start Date");
	document.getElementById("m_startdate").value = "";
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
			var milestone_no = $(this).find("[name='milestone_no[]']").val()
			var po_value = $(this).find("[name='po_value[]']").val()
			var row_total = 0;
			if(milestone_no > 0 && po_value > 0){
				row_total = parseFloat(po_value)
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
					url:_base_url_+"classes/Master.php?f=search_items",
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
			_autocomplete(tr)
			tr.find('[name="milestone_no[]"],[name="po_value[]"]','[name="m_startdate[]"]','[name="m_enddate[]"]').on('input keypress',function(e){
				calculate()
			})
			$('#item-list tfoot').find('[name="discount_percentage"],[name="tax_percentage"]').on('input keypress',function(e){
				calculate()
			})
		})
		if($('#item-list .po-item').length > 0){
			$('#item-list .po-item').each(function(){
				var tr = $(this)
				_autocomplete(tr)
				tr.find('[name="milestone_no[]"],[name="po_value[]"],[name="m_startdate[]"],[name="m_enddate[]"]').on('input keypress',function(e){
					calculate()
				})
				$('#item-list tfoot').find('[name="discount_percentage"],[name="tax_percentage"]').on('input keypress',function(e){
					calculate()
				})
				tr.find('[name="milestone_no[]"],[name="po_value[]"],[name="m_startdate[]"],[name="m_enddate[]"]').trigger('keypress')
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
				return true;
			}
			start_loader();

		
         
			var milestone_no = [];
			var milestone_name =[];
			var m_percent =[];
			var m_description = [];
			var m_startdate = [];
			var m_enddate = [];
			var milestone_comments = [];
			var m_invoice = [];
			var billable = [];
			var po_value = [];
			$.each($("#item-list .po-item"),function(index,value){
			      let milestone_no_temp = $(this).find("#milestone_no").val();
			      let milestone_name_temp = $(this).find("#milestone_name").val();
			      let m_percent_temp = $(this).find("#m_percent").val();
			      let m_description_temp = $(this).find("#m_description").val();
			      let m_startdate_temp= $(this).find("#m_startdate").val();
			      let m_enddate_temp= $(this).find("#m_enddate").val();
			      let milestone_comments_temp= $(this).find("#milestone_comments").val();
			      let m_invoice_temp= $(this).find("#m_invoice").val();
			      let billable_temp= $(this).find("#billable").val();
			      let po_value_temp= $(this).find("#po_value").val();

			      
			      milestone_no.push(milestone_no_temp);
			      milestone_name.push(milestone_name_temp);
			      m_percent.push(m_percent_temp);
			      m_description.push(m_description_temp);
			      m_startdate.push(m_startdate_temp);
			      m_enddate.push(m_enddate_temp);
			      milestone_comments.push(milestone_comments_temp);
			      m_invoice.push(m_invoice_temp);
			      billable.push(billable_temp);
			      po_value.push(po_value_temp);

			   });
				
				

		      // console.log(milestone_no)
		 	
             $.ajax({
                  url:_base_url_+"classes/Master.php?f=save_po",
                 type: "POST",
                
                  dataType: 'json',
                  data: {	milestone_no:milestone_no,
                  			milestone_name:milestone_name,
                  			m_percent:m_percent,
                  			m_description:m_description,
                  			m_startdate:m_startdate,
                  			m_enddate:m_enddate,
                  			milestone_comments:milestone_comments,
                  			m_invoice:m_invoice,
                  			billable:billable,
                  			po_value:po_value,

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
							  tax_percentage:$('#tax_percentage').val(),
							  tax_amount:$('#tax_amount').val(),
							  consumed:$('#consumed').val(),
							  balance:$('#balance').val(),
							  
							  



                  		},
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.href = "./?page=purchase_orders/view_po&id="+resp.id;
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

