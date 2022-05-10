<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `mixed_po_list` where id = '{$_GET['id']}' ");
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
		<h3 class="card-title"><?php echo isset($id) ? "Update Purchase Order / Letter Of Intent Details": "New Purchase Order" ?> </h3>
	</div>
	<div class="card-body">
		<form action="" id="po-form">
			<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
			<div class="row">
				
				<div class="col-md-6 form-group">
				<label for="client_id" class="control-label col-md-5">Client <span class="po_err_msg text-danger">*</span></label>
			<select name="client_id" id="client_id" class="custom-select col-sm-3 rounded-0 select2 ml-2">
				<option value="" disabled <?php echo !isset($client_id) ? "selected" :'' ?>></option>
					<?php 
						$supplier_qry = $conn->query("SELECT * FROM `client_list` order by `name` asc");
						while($row = $supplier_qry->fetch_assoc()):
					?>
					<option value="<?php echo $row['name'] ?>" <?php echo isset($client_id) && $client_id == $row['name'] ? 'selected' : '' ?> <?php echo $row['status'] == 0? 'disabled' : '' ?>><?php echo $row['name'] ?></option>
					<?php endwhile; ?>
            </select>
				
				<div class="form-group">
            		<label for="startdate" class="control-label">Start Date <span class="po_err_msg text-danger">*</span></label>
            		<input type="search" name="startdate" id="date_picker1" class="form-control rounded-0" value="<?php echo isset($startdate) ? $startdate :"" ?>" required>
        		</div>
        		<div class="form-group">
           			<label for="enddate" class="control-label">End Date</label>
            		<input type="search" name="enddate" id="date_picker2" class="form-control rounded-0" value="<?php echo isset($enddate) ? $enddate :"" ?>" >
       			</div>
				</div>

				<div class=" col-md-6 form-group">
			     <label for="rm_apmosys" class="control-label col-md-5">RM_APMOSYS <span class="po_err_msg text-danger">*</span></label>
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
            		<label for="pname" class="control-label">Project Name : <span class="po_err_msg text-danger">*</span></label>
            		<input type="text" name="pname" id="pname" class="form-control rounded-0" value="<?php echo isset($pname) ? $pname :"" ?>" required>
        		</div>
				
				</div>

				
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					
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
								<th class="px-1 py-1 text-center">Status</th>
								<th class="px-1 py-1 text-center">PO Value</th>
								<th class="px-1 py-1 text-center">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if(isset($id)):
							$order_items_qry = $conn->query("SELECT * FROM `mixed_po_list` o inner join mixed_po_list i on o.id = i.id where o.`id` = '$id'  ");
							echo $conn->error;
							while($row = $order_items_qry->fetch_assoc()):
							?>
							<tr class="po-item" data-id="">
								<td class="align-middle p-1 text-center">
									<button class="btn btn-sm btn-danger py-0" type="button" onclick="rem_item($(this))"><i class="fa fa-times"></i></button>
								</td>
								<td class="align-middle p-0 text-center">
									<input type="number" class="text-center w-100 border-0" step="any" name="quantity"  id="quantity"  value="<?php echo isset($quantity) ? $quantity :"" ?>"  required/>
								</td>
								<!-- resource name -->
								<!-- <td class="align-middle p-1">
									<input type="text" class="text-center w-100 border-0" name="r_name"   id="r_name"  value="<?php echo isset($r_name) ? $r_name :"" ?>" required/>
								</td> -->
								<!-- milestone name -->
								<td class="align-middle p-1">
									<input type="text" class="text-center w-100 border-0" name="unit"  id="unit"  value="<?php echo isset($unit) ? $unit :"" ?>"  required/>
								</td>
								<!-- milestone percentage -->
								<!-- <td class="align-middle p-1">
									<input type="hidden" name="item_id[]" value="<?php echo $row['item_id'] ?>">
									<input type="text" class="text-center w-100 border-0 item_id" value="<?php echo $row['name'] ?>" required/>
								</td> -->
								<td class="align-middle p-1">
									<input type="number" class="text-center w-100 border-0" name="m_percent"   id="m_percent"  value="<?php echo isset($m_percent) ? $m_percent :"" ?>" required/>
								</td>
								<!-- milestone description -->
								<!-- <td class="align-middle p-1 item-description"><?php echo $row['description'] ?></td> -->
								<td class="align-middle p-1">
									<input type="text" class="text-center w-100 border-0" name="m_description"  id="m_description"  value="<?php echo isset($m_description) ? $m_description :"" ?>"  required/>
								</td>
								<!-- milestone start date -->
								<td class="align-middle p-1">
            		              <input type="date" class="text-center w-100 border-0" name="m_startdate" id="m_startdate"  value="<?php echo isset($m_startdate) ? $m_startdate :"" ?>" required>
        										</td>
								<!-- milestone end date -->
								<td class="align-middle p-1">
									<input type="date" class="text-center w-100 border-0" name="m_enddate" id="m_enddate"  value="<?php echo isset($m_enddate) ? $m_enddate :"" ?>"   required/>
								</td>
								<td class="align-middle p-1">
									<select name="m_status" id="m_status" class="text-center w-100 border-0" required>
                						<option value="Approved" <?php echo isset($m_status) && $m_status =="" ? "selected": "Approved" ?>>Approved</option>
										<option value="Rejected" <?php echo isset($m_status) && $m_status =="" ? "selected": "Rejected" ?>>Rejected</option>
										<option value="Pending" <?php echo isset($m_status) && $m_status =="" ? "selected": "Pending" ?>>Pending</option>
            						</select>
								</td>
								<td class="align-middle p-1">
									<input type="number" step="any" class="text-right w-100 border-0 unit-price" name="unit_price"  value="<?php echo isset($unit_price) ? $unit_price :"" ?>" required/>
								</td>
								<td class="align-middle p-1 text-right total-price"><?php echo number_format($row['unit_price']) ?></td>
							</tr>
							<?php endwhile;endif; ?>
						</tbody>
						<tfoot>
							<tr class="bg-lightblue">
								<tr>
									<th class="p-1 text-right" colspan="9"><span><button class="btn btn btn-sm btn-flat btn-primary py-0 mx-1" type="button" id="add_row">Add Row</button></span> Sub Total</th>
									<th class="p-1 text-right" id="sub_total">0</th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="9">Tax Inclusive (%)
									<input type="number" step="any" name="tax_percentage" class="border-light text-right" value="<?php echo isset($tax_percentage) ? $tax_percentage : 0 ?>">
									</th>
									<th class="p-1"><input type="text" class="w-100 border-0 text-right" readonly value="<?php echo isset($tax_amount) ? $tax_amount : 0 ?>" name="tax_amount"></th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="9">Total</th>
									<th class="p-1 text-right" id="total">0</th>
								</tr>
							</tr>
						</tfoot>
					</table>


					<table class="table table-striped table-bordered" id="item-list">
						<colgroup>
							<col width="2%">
							<col width="5%">
							<col width="15%">
							<col width="15%">
							<col width="8%">
							<col width="8%">
							<col width="8%">
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
								<th class="px-1 py-1 text-center">Status</th>
								<th class="px-1 py-1 text-center">Monthly Billing</th>
								<th class="px-1 py-1 text-center">Per Resource Cost</th>
								<th class="px-1 py-1 text-center">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if(isset($id)):
							$order_items_qry = $conn->query("SELECT * FROM `tnm_po_list` o inner join tnm_po_list i on o.id = i.id where o.`id` = '$id'  ");
							echo $conn->error;
							while($row = $order_items_qry->fetch_assoc()):
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
									<input type="text" class="text-center w-100 border-0" name="resource_level" id="resource_level"  value="<?php echo isset($resource_level) ? $resource_level:"" ?>"  required/>
								</td>
								
								<td class="align-middle p-1">
									<input type="text" class="text-center w-100 border-0" name="resource_name" id="resource_name"  value="<?php echo isset($resource_name) ? $resource_name:"" ?>"  required/>
								</td>
								<!-- milestone start date -->
								<td class="align-middle p-1">
									<div>
									<input type="date"  class="text-center w-100 border-0" name="m_startdate" id="m_startdate"  value="<?php echo isset($m_startdate) ? $m_startdate:"" ?>"  required/>
									</div>
								</td>
								<!-- milestone end date -->
								<td class="align-middle p-1">
									<div>
									<input type="date"  class="text-center w-100 border-0" name="m_enddate" id="m_enddate"  value="<?php echo isset($m_enddate) ? $m_enddate:"" ?>"  required/>
									</div>
								</td>
								<td class="align-middle p-1">
									<select name="m_status" id="m_status" class="text-center w-100 border-0" required>
                						<option value="Approved" <?php echo isset($m_status) && $m_status =="" ? "selected": "Approved" ?>>Approved</option>
										<option value="Denied" <?php echo isset($m_status) && $m_status =="" ? "selected": "Denied" ?>>Denied</option>
										<option value="Pending" <?php echo isset($m_status) && $m_status =="" ? "selected": "Pending" ?>>Pending</option>
            						</select>
								</td>
								<td class="align-middle p-1">
									<input type="number" step="any" class="text-right w-100 border-0" name="monthly_billing"  value="<?php echo isset($monthly_billing) ? $monthly_billing :"" ?>"   required/>
								</td>
								<td class="align-middle p-1">
									<input type="number" step="any" class="text-right w-100 border-0" name="per_resourcecount"  value="<?php echo isset($per_resourcecount) ? $per_resourcecount :"" ?>"   required/>
								</td>
								<td class="align-middle p-1 text-right total-price"><?php echo number_format($row['per_resourcecount']) ?></td>
							</tr>
							<?php endwhile;endif; ?>
						</tbody>
						<tfoot>
							<tr class="bg-lightblue">
								<tr>
									<th class="p-1 text-right" colspan="9"><span><button class="btn btn btn-sm btn-flat btn-primary py-0 mx-1" type="button" id="add_row">Add Row</button></span> Sub Total</th>
									<th class="p-1 text-right" id="sub_total">0</th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="9">Tax Inclusive (%)
									<input type="number" step="any" name="tax_percentage" class="border-light text-right" value="<?php echo isset($tax_percentage) ? $tax_percentage : 0 ?>">
									</th>
									<th class="p-1"><input type="text" class="w-100 border-0 text-right" readonly value="<?php echo isset($tax_amount) ? $tax_amount : 0 ?>" name="tax_amount"></th>
								</tr>
								<tr>
									<th class="p-1 text-right" colspan="9">Total</th>
									<th class="p-1 text-right" id="total">0</th>
								</tr>
							</tr>
						</tfoot>
					</table>
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
						
						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6">
							<label for="notes2" class="control-label">Business Head Comments :</label>
							<textarea name="notes2" id="notes2" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($notes2) ? $notes2 : '' ?></textarea>
						</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 3): ?>
						<div class="col-md-6">
							<label for="notes2" class="control-label">Business Head Comments :</label>
							<textarea name="notes2" id="notes2" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($notes2) ? $notes2 : '' ?></textarea>
						</div>
						<?php endif; ?>

						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6">
							<label for="notes6" class="control-label">Business Team Comments :</label>
							<textarea name="notes6" id="notes6" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($notes6) ? $notes6 : '' ?></textarea>
						</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 2): ?>
						<div class="col-md-6">
							<label for="notes6" class="control-label">Business Team Comments :</label>
							<textarea name="notes6" id="notes6" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($notes6) ? $notes6 : '' ?></textarea>
						</div>
						<?php endif; ?>
						
						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6">
							<label for="notes3" class="control-label">Accounts Head Comments :</label>
							<textarea name="notes3" id="notes3" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($notes3) ? $notes3 : '' ?></textarea>
						</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 5): ?>
						<div class="col-md-6">
							<label for="notes3" class="control-label">Accounts Head Comments :</label>
							<textarea name="notes3" id="notes3" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($notes3) ? $notes3 : '' ?></textarea>
						</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6">
							<label for="notes4" class="control-label">Accounts Team Comments :</label>
							<textarea name="notes4" id="notes4" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($notes4) ? $notes4 : '' ?></textarea>
						</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 4): ?>
						<div class="col-md-6">
							<label for="notes4" class="control-label">Accounts Team Comments :</label>
							<textarea name="notes4" id="notes4" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($notes4) ? $notes4 : '' ?></textarea>
						</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6">
							<label for="notes5" class="control-label">Director Comments :</label>
							<textarea name="notes5" id="notes5" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($notes5) ? $notes5 : '' ?></textarea>
						</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 8): ?>
						<div class="col-md-6">
							<label for="notes5" class="control-label">Director Comments :</label>
							<textarea name="notes5" id="notes5" cols="10" rows="4" class="form-control rounded-0"><?php echo isset($notes5) ? $notes5 : '' ?></textarea>
						</div>
						<?php endif; ?>
						<div class="col-md-6">
            			<label for="status" class="control-label">PO Status :</label>
						<select name="status" id="status" class="form-control form-control-sm rounded-0" required>
						<option value="Active" <?php echo isset($status) && $status =="Active" ? "selected": "Active" ?> >Active</option>
							<option value="Inactive" <?php echo isset($status) && $status == "Inactive" ? 'selected': 'Inactive' ?>>Inactive</option>
                				
                				<!-- <option value="Expired" <?php echo isset($status) && $status =="Expired" ? "selected": "Expired" ?>>Expired</option>
								<option value="Rejected" <?php echo isset($status) && $status == "Rejected" ? 'selected': 'Rejected' ?>>Rejected</option> -->
           				</select>
       					</div>
						<div class="col-md-6">
            			<label for="project_type" class="control-label">Project Type : </label><br>
						<input type="text" class="form-control form-control-sm rounded-0"  name="project_type" value="Mixed" readonly></input>
            			
            			<br/>
            			</div>
						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6" >
							<label for="bhead_approval" class="col-md-5">Business Head Approval : </label>
							<select name="bhead_approval" id="bhead_approval" class="form-control form-control-sm rounded-0" required>
                				<option value="Pending" <?php echo isset($bhead_approval) && $bhead_approval =="" ? "selected": "Pending" ?> >Pending</option>
                				<option value="Approved" <?php echo isset($bhead_approval) && $bhead_approval =="" ? "selected": "Approved" ?>>Approved</option>
            				</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 3): ?>
						<div class="col-md-6" >
							<label for="bhead_approval" class="col-md-5">Business Head Approval : </label>
							<select name="bhead_approval" id="bhead_approval" class="form-control form-control-sm rounded-0" required>
                				<option value="Pending" <?php echo isset($bhead_approval) && $bhead_approval =="" ? "selected": "Pending" ?> >Pending</option>
                				<option value="Approved" <?php echo isset($bhead_approval) && $bhead_approval =="" ? "selected": "Approved" ?>>Approved</option>
            				</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6">
            			<label for="invoice" class="control-label">Invoice Raised :</label>
            			<select name="invoice" id="invoice" class="form-control form-control-sm rounded-0" required>
                			<option value="Not Selected" <?php echo isset($invoice) && $invoice =="" ? "selected": "Not Selected" ?> >Not Selected</option>
                			<option value="Yes" <?php echo isset($invoice) && $invoice =="" ? "selected": "Yes" ?> >Yes</option>
                			<option value="No" <?php echo isset($invoice) && $invoice =="" ? "selected": "No" ?>>No</option>
            			</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 4): ?>
						<div class="col-md-6">
            			<label for="invoice" class="control-label">Invoice Raised :</label>
            			<select name="invoice" id="invoice" class="form-control form-control-sm rounded-0" required>
                			<option value="Not Selected" <?php echo isset($invoice) && $invoice =="" ? "selected": "Not Selected" ?> >Not Selected</option>
                			<option value="Yes" <?php echo isset($invoice) && $invoice =="" ? "selected": "Yes" ?> >Yes</option>
                			<option value="No" <?php echo isset($invoice) && $invoice =="" ? "selected": "No" ?>>No</option>
            			</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 5): ?>
						<div class="col-md-6">
            			<label for="invoice" class="control-label">Invoice Raised :</label>
            			<select name="invoice" id="invoice" class="form-control form-control-sm rounded-0" required>
                			<option value="Not Selected" <?php echo isset($invoice) && $invoice =="" ? "selected": "Not Selected" ?> >Not Selected</option>
                			<option value="Yes" <?php echo isset($invoice) && $invoice =="" ? "selected": "Yes" ?> >Yes</option>
                			<option value="No" <?php echo isset($invoice) && $invoice =="" ? "selected": "No" ?>>No</option>
            			</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 5): ?>
						<div class="col-md-6" >
							<label for="ahead_approval" class="col-md-5">Accounts Head Approval : </label>
							<select name="ahead_approval" id="ahead_approval" class="form-control form-control-sm rounded-0" required>
                				<option value="Pending" <?php echo isset($ahead_approval) && $ahead_approval =="" ? "selected": "Pending" ?> >Pending</option>
                				<option value="Approved" <?php echo isset($ahead_approval) && $ahead_approval =="" ? "selected": "Approved" ?>>Approved</option>
            				</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 1): ?>
						<div class="col-md-6" >
							<label for="ahead_approval" class="col-md-5">Accounts Head Approval : </label>
							<select name="ahead_approval" id="ahead_approval" class="form-control form-control-sm rounded-0" required>
                				<option value="Pending" <?php echo isset($ahead_approval) && $ahead_approval =="" ? "selected": "Pending" ?> >Pending</option>
                				<option value="Approved" <?php echo isset($ahead_approval) && $ahead_approval =="" ? "selected": "Approved" ?>>Approved</option>
            				</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 1): ?>
            			<div class="col-md-6">
            			<label for="payment" class="control-label">Payment Released :</label>
            			<select name="payment" id="payment" class="form-control form-control-sm rounded-0" required>
                
                			<option value="Pending" <?php echo isset($payment) && $payment =="" ? "selected": "Pending" ?> >Pending</option>
                			<option value="Done" <?php echo isset($payment) && $payment =="" ? "selected": "Done" ?>>Done</option>
            			</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 4): ?>
            			<div class="col-md-6">
            			<label for="payment" class="control-label">Payment Released :</label>
            			<select name="payment" id="payment" class="form-control form-control-sm rounded-0" required>
                
                			<option value="Pending" <?php echo isset($payment) && $payment =="" ? "selected": "Pending" ?> >Pending</option>
                			<option value="Done" <?php echo isset($payment) && $payment =="" ? "selected": "Done" ?>>Done</option>
            			</select>
            			</div>
						<?php endif; ?>
						<?php if($_settings->userdata('type') == 5): ?>
            			<div class="col-md-6">
            			<label for="payment" class="control-label">Payment Released :</label>
            			<select name="payment" id="payment" class="form-control form-control-sm rounded-0" required>
                
                			<option value="Pending" <?php echo isset($payment) && $payment =="" ? "selected": "Pending" ?> >Pending</option>
                			<option value="Done" <?php echo isset($payment) && $payment =="" ? "selected": "Done" ?>>Done</option>
            			</select>
            			</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" form="po-form" id="upload" name="upload">Save</button>
		<a class="btn btn-flat btn-default" href="?page=purchase_orders_mixed">Cancel</a>
	</div>
</div>
<table class="d-none" id="item-clone">
	<tr class="po-item" data-id="">
		<td class="align-middle p-1 text-center">
			<button class="btn btn-sm btn-danger py-0" type="button" onclick="rem_item($(this))"><i class="fa fa-times"></i></button>
		</td>
		<td class="align-middle p-0 text-center">
			<input type="number" class="text-center w-100 border-0" step="any" name="quantity" required/>
		</td>
	
		<td class="align-middle p-1">
			<input type="text" class="text-center w-100 border-0" name="unit"  id="unit"  required/>
		</td>
	
		<td class="align-middle p-1">
			<input type="number" class="text-center w-100 border-0" name="m_percent"  required/>
		</td>
		<td class="align-middle p-1">
			<input type="text" class="text-center w-100 border-0" name="m_description"  required/>
		</td>
		
		<td class="align-middle p-1">
			<input type="date" class="text-center w-100 border-0" name="m_startdate" id="m_startdate" required/>
		</td>
		<td class="align-middle p-1">
			<input type="date" class="text-center w-100 border-0" name="m_enddate" id="m_enddate" required/>
		</td>
		<td class="align-middle p-1">
									<select name="m_status" id="m_status" class="text-center w-100 border-0" required>
									<option value="Pending" <?php echo isset($m_status) && $m_status =="" ? "selected": "Pending" ?>>Pending</option>
                						<option value="Approved" <?php echo isset($m_status) && $m_status =="" ? "selected": "Approved" ?>>Approved</option>
										<option value="Denied" <?php echo isset($m_status) && $m_status =="" ? "selected": "Denied" ?>>Denied</option>
										
            						</select>
								</td>
		<td class="align-middle p-1">
			<input type="number" step="any" class="text-right w-100 border-0" name="unit_price" value=""/>
		</td>
		<!-- <td class="align-middle p-1 text-right unit-price"></td> -->
		<td class="align-middle p-1 text-right total-price"></td>
	</tr>
</table>
<table class="d-none" id="item-clone">
	<tr class="po-item" data-id="">
		<td class="align-middle p-1 text-center">
			<button class="btn btn-sm btn-danger py-0" type="button" onclick="rem_item($(this))"><i class="fa fa-times"></i></button>
		</td>
		<td class="align-middle p-0 text-center">
			<input type="number" class="text-center w-100 border-0" step="any" name="resource_count" id="resource_count"   required/>
		</td>
	
		<td class="align-middle p-1">
			<input type="text" class="text-center w-100 border-0" name="resorce_name"  required/>
		</td>
		<!-- <td class="align-middle p-1">
			<input type="hidden" name="item_id[]">
			<input type="text" class="text-center w-100 border-0 item_id" required/>
		</td> -->
		<!-- <td class="align-middle p-1">
			<input type="number" class="text-center w-100 border-0" id="m_percent" name="m_percent"  required/>
		</td> -->
		<td class="align-middle p-1">
			<input type="text" class="text-center w-100 border-0" name="resource_level" required/>
		</td>
		<!-- <td class="align-middle p-1 item-description"></td> -->
		<td class="align-middle p-1">
			<div>
			<input type="date"  class="text-center w-100 border-0" name="m_startdate" id="m_startdate"  required/>
			</div>
		</td>
		<td class="align-middle p-1">
			<div>
			<input type="date"  class="text-center w-100 border-0" name="m_enddate" id="m_enddate"  required/>
			</div>
		</td>
		<td class="align-middle p-1">
									<select name="m_status" id="m_status" class="text-center w-100 border-0" required>
									<option value="Pending" <?php echo isset($m_status) && $m_status =="" ? "selected": "Pending" ?>>Pending</option>
                						<option value="Approved" <?php echo isset($m_status) && $m_status =="" ? "selected": "Approved" ?>>Approved</option>
										<option value="Denied" <?php echo isset($m_status) && $m_status =="" ? "selected": "Denied" ?>>Denied</option>
										
            						</select>
								</td>
		<td class="align-middle p-1">
			<input type="number" step="any" class="text-right w-100 border-0" name="monthly_billing" value="0"/>
		</td>
		<td class="align-middle p-1">
			<input type="number" step="any" class="text-right w-100 border-0" name="per_resourcecount" value="0"/>
		</td>
		<td class="align-middle p-1 text-right total-price"></td>
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

$("#date_picker2").change(function () {

var objFromDate = document.getElementById("date_picker1").value; 
var objToDate = document.getElementById("date_picker2").value;

var FromDate = new Date(objFromDate);
var ToDate = new Date(objToDate);

if(FromDate > ToDate )
{
	alert("Due Date Should Be Greater Than Start Date");
	document.getElementById("date_picker2").value = "";
	return false; 
}

});

    
// $(document).ready(function(){
//     $('#m_startdate').datepicker({
//         dateFormat: "dd-mm-yy",
//         changeMonth:true,
//         changeYear: true
//         // $('#date_picker2').datepicker('option','minDate','startdate');
//     });
// })
// $(document).ready(function(){
//     $('#m_enddate').datepicker({
      
//         dateFormat: "dd-mm-yy",
//         changeMonth:true,
//         changeYear: true
//     });
// })

// $("#m_enddate").change(function () {

// var objFromDate1 = document.getElementById("m_startdate").value; 
// var objToDate1 = document.getElementById("m_enddate").value;

// var FromDate1 = new Date(objFromDate1);
// var ToDate1 = new Date(objToDate1);

// if(FromDate1 > ToDate1 )
// {
// 	alert("Due Date Should Be Greater Than Start Date");
// 	document.getElementById("m_enddate").value = "";
// 	return false; 
// }

// });

$(document).ready(function(){
    // $('#m_startdate').datepicker({
    //     dateFormat: "dd-mm-yy",
    //     changeMonth:true,
    //     changeYear: true
    //     // $('#date_picker2').datepicker('option','minDate','startdate');
    // });
})
$(document).ready(function(){
    // $('#m_enddate').datepicker({
      
    //     dateFormat: "dd-mm-yy",
    //     changeMonth:true,
    //     changeYear: true
    // });
})

$("#m_enddate").change(function () {

var objFromDate1 = document.getElementById("m_startdate").value; 
var objToDate1 = document.getElementById("m_enddate").value;

var FromDate1 = new Date(objFromDate1);
var ToDate1 = new Date(objToDate1);

if(FromDate1 > ToDate1 )
{
	alert("Due Date Should Be Greater Than Start Date");
	document.getElementById("m_enddate").value = "";
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
			var qty = $(this).find("[name='quantity']").val()
			var unit_price = $(this).find("[name='unit_price']").val()
			var row_total = 0;
			if(qty > 0 && unit_price > 0){
				row_total = parseFloat(unit_price)
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
					url:_base_url_+"classes/Master.php?f=search_mixeditems",
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
			tr.find('[name="quantity"],[name="unit_price"]','[name="m_startdate"]','[name="m_enddate"]').on('input keypress',function(e){
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
				tr.find('[name="quantity"],[name="unit_price"],[name="m_startdate"],[name="m_enddate"]').on('input keypress',function(e){
					calculate()
				})
				$('#item-list tfoot').find('[name="discount_percentage"],[name="tax_percentage"]').on('input keypress',function(e){
					calculate()
				})
				tr.find('[name="quantity"],[name="unit_price"],[name="m_startdate"],[name="m_enddate"]').trigger('keypress')
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
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_mixedpo",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.href = "./?page=purchase_orders_mixed/view_po&id="+resp.id;
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

