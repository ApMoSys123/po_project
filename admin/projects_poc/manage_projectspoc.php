<?php
// require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `poc_project_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=stripslashes($v);
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
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title"><u><b>Update New PO Project Details</b></u> </h3>
	</div>
    <br>

<form action="" id="project-form">
    
     <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">

    <div class="row">

                            
   
            <div class="col-md-6 form-group">
                <label for="name" class="control-label col-md-5">Project Name : <span class="po_err_msg text-danger">*</span></label>
             
                <select name="name" id="name" class="custom-select col-sm-3 rounded-0 select2 ml-2"  required>
						<option value="" disabled <?php echo !isset($name) ? "selected" :'' ?>></option>
						<?php 
							$supplier_qry = $conn->query("SELECT * FROM `poc_po_list` order by `pname` asc");
							while($row = $supplier_qry->fetch_assoc()):
						?>
						<option value="<?php echo $row['id'] ?>" <?php echo isset($name) && $name == $row['id'] ? 'selected' : '' ?> <?php echo $row['status'] == 0? 'disabled' : '' ?>><?php echo $row['pname'] ?></option>
						<?php endwhile; ?>
				</select>
            </div>
         
            
            <div  class="col-md-6 form-group">
            <label for="pstartdate" class="control-label col-md-5 mt-2">Start Date : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="pstartdate" id="date_picker1" class="ml-2" value="<?php echo isset($pstartdate) ? $pstartdate :"" ?>" required>
            </div>
            <div  class="col-md-6 form-group">
            <label for="penddate" class="control-label col-md-5">End Date : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="penddate" id="date_picker2" class="ml-2" value="<?php echo isset($penddate) ? $penddate :"" ?>" required>
            </div>
            <?php if($_settings->userdata('type') ==  1): ?>
             <div class="col-md-6 form-group">
            <label for="department_id" class="control-label col-md-5">Department : <span class="po_err_msg text-danger">*</span></label>
				<select name="department" id="department" class="custom-select col-sm-3 rounded-0 select2 ml-2"  required>
						<option value="" disabled <?php echo !isset($department_id) ? "selected" :'' ?>></option>
						<?php 
							$supplier_qry = $conn->query("SELECT * FROM `department` order by `name` asc");
							while($row = $supplier_qry->fetch_assoc()):
						?>
						<option value="<?php echo $row['name'] ?>" <?php echo isset($department) && $department == $row['name'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
						<?php endwhile; ?>
				</select>
                
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  7): ?>
             <div class="col-md-6 form-group">
            <label for="department_id" class="control-label col-md-5">Department : <span class="po_err_msg text-danger">*</span></label>
				<select name="department" id="department" class="custom-select col-sm-3 rounded-0 select2 ml-2"  required>
						<option value="" disabled <?php echo !isset($department_id) ? "selected" :'' ?>></option>
						<?php 
							$supplier_qry = $conn->query("SELECT * FROM `department` order by `name` asc");
							while($row = $supplier_qry->fetch_assoc()):
						?>
						<option value="<?php echo $row['name'] ?>" <?php echo isset($department) && $department == $row['name'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
						<?php endwhile; ?>
				</select>
                
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  1): ?>
                <div class="col-md-6 form-group">
            <label for="department_head" class="control-label col-md-5">Department Head : <span class="po_err_msg text-danger">*</span></label>
				<select name="department_head" id="department_head" class="custom-select col-sm-3 rounded-0 select2 ml-2"  required>
						<option value="" disabled <?php echo !isset($department_head) ? "selected" :'' ?>></option>
						<?php 
							$supplier_qry = $conn->query("SELECT * FROM `head` order by `department_head` asc");
							while($row = $supplier_qry->fetch_assoc()):
						?>
						<option value="<?php echo $row['department_head'] ?>" <?php echo isset($department_head) && $department_head == $row['department_head'] ? 'selected' : '' ?>><?php echo $row['department_head'] ?></option>
						<?php endwhile; ?>
				</select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  7): ?>
                <div class="col-md-6 form-group">
            <label for="department_head" class="control-label col-md-5">Department Head : <span class="po_err_msg text-danger">*</span></label>
				<select name="department_head" id="department_head" class="custom-select col-sm-3 rounded-0 select2 ml-2"  required>
						<option value="" disabled <?php echo !isset($department_head) ? "selected" :'' ?>></option>
						<?php 
							$supplier_qry = $conn->query("SELECT * FROM `head` order by `department_head` asc");
							while($row = $supplier_qry->fetch_assoc()):
						?>
						<option value="<?php echo $row['department_head'] ?>" <?php echo isset($department_head) && $department_head == $row['department_head'] ? 'selected' : '' ?>><?php echo $row['department_head'] ?></option>
						<?php endwhile; ?>
				</select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  8): ?>
                <div class="col-md-6 form-group">
            <label for="department_head" class="control-label col-md-5">Department Head : <span class="po_err_msg text-danger">*</span></label>
				<select name="department_head" id="department_head" class="custom-select col-sm-3 rounded-0 select2 ml-2"  required>
						<option value="" disabled <?php echo !isset($department_head) ? "selected" :'' ?>></option>
						<?php 
							$supplier_qry = $conn->query("SELECT * FROM `head` order by `department_head` asc");
							while($row = $supplier_qry->fetch_assoc()):
						?>
						<option value="<?php echo $row['department_head'] ?>" <?php echo isset($department_head) && $department_head == $row['department_head'] ? 'selected' : '' ?>><?php echo $row['department_head'] ?></option>
						<?php endwhile; ?>
				</select>
            </div>
            <?php endif; ?>
            <div class="col-md-6 form-group">
            <label for="rm_client" class="control-label col-md-5">RM Client : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="rm_client" id="rm_client" class="ml-2" value="<?php echo isset($rm_client) ? $rm_client :"" ?>" required>
            </div>
           
            <div class="col-md-6 form-group">
            <label for="email" class="control-label col-md-5">RM Client_Email : <span class="po_err_msg text-danger">*</span></label>
            <input type="rmclient_email" name="rmclient_email" id="rmclient_email" class="ml-2" value="<?php echo isset($rmclient_email) ? $rmclient_email :"" ?>" required>
            </div>
            <div class="col-md-6 form-group">
            <label for="rmclient_contact" class="control-label col-md-5">RM Client_Contact No. : <span class="po_err_msg text-danger">*</span></label>
            <input type="rmclient_contact" name="rmclient_contact" id="rmclient_contact" class="ml-2" value="<?php echo isset($rmclient_contact) ? $rmclient_contact :"" ?>" required>
            </div>
            <div class="col-md-6 form-group">
            <label for="rmclient_location" class="control-label col-md-5">RM Client_Location : <span class="po_err_msg text-danger">*</span></label>
            <input type="rmclient_location" name="rmclient_location" id="rmclient_location" class="ml-2" value="<?php echo isset($rmclient_location) ? $rmclient_location :"" ?>" required>
            </div>
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group">
            <label for="resourcecount" class="control-label col-md-5">Resource Count : <span class="po_err_msg text-danger">*</span></label>
            <input type="resourcecount" name="resourcecount" id="resourcecount" class="ml-2" value="<?php echo isset($resourcecount) ? $resourcecount :"" ?>" required>
            </div>
            <div class="col-md-6 form-group">
            <label for="resourcename" class="control-label col-md-5">Resource Names : <span class="po_err_msg text-danger">*</span></label>
            <input type="resourcename" name="resourcename" id="resourcename" class="ml-2" value="<?php echo isset($resourcename) ? $resourcename :"" ?>" required>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  7): ?>
            <div class="col-md-6 form-group">
            <label for="resourcecount" class="control-label col-md-5">Resource Count : <span class="po_err_msg text-danger">*</span></label>
            <input type="resourcecount" name="resourcecount" id="resourcecount" class="ml-2" value="<?php echo isset($resourcecount) ? $resourcecount :"" ?>" required>
            </div>
            <div class="col-md-6 form-group">
            <label for="resourcename" class="control-label col-md-5">Resource Names : <span class="po_err_msg text-danger">*</span></label>
            <input type="resourcename" name="resourcename" id="resourcename" class="ml-2" value="<?php echo isset($resourcename) ? $resourcename :"" ?>" required>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group">
            <label for="businesshead_comment" class="control-label col-md-5">Business Head Comments : </label>
            <textarea rows="3" cols="22" name="businesshead_comment" id="businesshead_comment" class="ml-2"><?php echo isset($businesshead_comment) ? $businesshead_comment :"" ?> </textarea>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  3): ?>
            <div class="col-md-6 form-group">
            <label for="businesshead_comment" class="control-label col-md-5">Business Head Comments : </label>
            <textarea rows="3" cols="22" name="businesshead_comment" id="businesshead_comment" class="ml-2"><?php echo isset($businesshead_comment) ? $businesshead_comment :"" ?> </textarea>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group">
            <label for="businessteam_comment" class="control-label col-md-5">Business Team Comments : </label>
            <textarea rows="3" cols="22" name="businessteam_comment" id="businessteam_comment" class="ml-2"><?php echo isset($businessteam_comment) ? $businessteam_comment :"" ?> </textarea>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  2): ?>
            <div class="col-md-6 form-group">
            <label for="businessteam_comment" class="control-label col-md-5">Business Team Comments : </label>
            <textarea rows="3" cols="22" name="businessteam_comment" id="businessteam_comment" class="ml-2"><?php echo isset($businessteam_comment) ? $businessteam_comment :"" ?> </textarea>
            </div>
            <?php endif; ?>
           
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group">
            <label for="rmgteam_comment" class="control-label col-md-5">RMG Team Comments : </label>
            <textarea rows="3" cols="22" name="rmgteam_comment" id="rmgteam_comment" class="ml-2"><?php echo isset($rmgteam_comment) ? $rmgteam_comment :"" ?> </textarea>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  7): ?>
            <div class="col-md-6 form-group">
            <label for="rmgteam_comment" class="control-label col-md-5">RMG Team Comments : </label>
            <textarea rows="3" cols="22" name="rmgteam_comment" id="rmgteam_comment" class="ml-2"><?php echo isset($rmgteam_comment) ? $rmgteam_comment :"" ?> </textarea>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group">
            <label for="otteam_comment" class="control-label col-md-5">Operation Team Comments : </label>
            <textarea rows="3" cols="22" name="otteam_comment" id="otteam_comment" class="ml-2"><?php echo isset($otteam_comment) ? $otteam_comment :"" ?> </textarea>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  6): ?>
            <div class="col-md-6 form-group">
            <label for="otteam_comment" class="control-label col-md-5">Operation Team Comments : </label>
            <textarea rows="3" cols="22" name="otteam_comment" id="otteam_comment" class="ml-2"><?php echo isset($otteam_comment) ? $otteam_comment :"" ?> </textarea>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group">
            <label for="director_comment" class="control-label col-md-5">Director Comments : </label>
            <textarea rows="3" cols="22" name="director_comment" id="director_comment" class="ml-2"><?php echo isset($director_comment) ? $director_comment:"" ?> </textarea>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group">
            <label for="bill" class="control-label col-md-5">Billable/Non-Billable :</label>
            <select name="bill" id="bill" class="ml-2" required>
                <option value="Not Selected" <?php echo isset($bill) && $bill =="" ? "selected": "Not Selected" ?> >Not Selected</option>
                <option value="Billable" <?php echo isset($bill) && $bill =="" ? "selected": "Billable" ?> >Billable</option>
                <option value="Non Billable" <?php echo isset($bill) && $bill =="" ? "selected": "Non Billable" ?>>Non Billable</option>
            </select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  8): ?>
            <div class="col-md-6 form-group">
            <label for="bill" class="control-label col-md-5">Billable/Non-Billable :</label>
            <select name="bill" id="bill" class="ml-2" required>
                <option value="Not Selected" <?php echo isset($bill) && $bill =="" ? "selected": "Not Selected" ?> >Not Selected</option>
                <option value="Billable" <?php echo isset($bill) && $bill =="" ? "selected": "Billable" ?> >Billable</option>
                <option value="Non Billable" <?php echo isset($bill) && $bill =="" ? "selected": "Non Billable" ?>>Non Billable</option>
            </select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group">
            <label for="pstatus" class="control-label col-md-5">Status :</label>
            <select name="pstatus" id="pstatus" class="ml-2" required>
                <option value="Not Selected" <?php echo isset($pstatus) && $pstatus =="" ? "selected": "Not Selected" ?> >Not Selected</option>
                <option value="Started" <?php echo isset($pstatus) && $pstatus =="" ? "selected": "Started" ?> >Started</option>
                <option value="Issue" <?php echo isset($pstatus) && $pstatus =="" ? "selected": "Issue" ?>>Issue</option>
                <option value="In Progress" <?php echo isset($pstatus) && $pstatus =="" ? "selected": "In Progress" ?>>In Progress</option>
                <option value="On hold" <?php echo isset($pstatus) && $pstatus =="" ? "selected": "3" ?>>On hold</option>
                <option value="Completed" <?php echo isset($pstatus) && $pstatus =="" ? "selected": "4" ?>>Completed</option>
            </select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  8): ?>
            <div class="col-md-6 form-group">
            <label for="pstatus" class="control-label col-md-5">Status :</label>
            <select name="pstatus" id="pstatus" class="ml-2" required>
                <option value="Not Selected" <?php echo isset($pstatus) && $pstatus =="" ? "selected": "Not Selected" ?> >Not Selected</option>
                <option value="Started" <?php echo isset($pstatus) && $pstatus =="" ? "selected": "Started" ?> >Started</option>
                <option value="Issue" <?php echo isset($pstatus) && $pstatus =="" ? "selected": "Issue" ?>>Issue</option>
                <option value="In Progress" <?php echo isset($pstatus) && $pstatus =="" ? "selected": "In Progress" ?>>In Progress</option>
                <option value="On hold" <?php echo isset($pstatus) && $pstatus =="" ? "selected": "3" ?>>On hold</option>
                <option value="Completed" <?php echo isset($pstatus) && $pstatus =="" ? "selected": "4" ?>>Completed</option>
            </select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group" >
			<label for="rmg_verified" class="col-md-5">RMG Head Verified : </label>
			<select name="rmg_verified" id="rmg_verified" class="ml-2" required>
                <option value="Pending" <?php echo isset($rmg_verified) && $rmg_verified =="" ? "selected": "Pending" ?> >Pending</option>
                <option value="Verified" <?php echo isset($rmg_verified) && $rmg_verified =="" ? "selected": "Verified" ?>>Verified</option>
            </select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  7): ?>
            <div class="col-md-6 form-group" >
			<label for="rmg_verified" class="col-md-5">RMG Head Verified : </label>
			<select name="rmg_verified" id="rmg_verified" class="ml-2" required>
                <option value="Pending" <?php echo isset($rmg_verified) && $rmg_verified =="" ? "selected": "Pending" ?> >Pending</option>
                <option value="Verified" <?php echo isset($rmg_verified) && $rmg_verified =="" ? "selected": "Verified" ?>>Verified</option>
            </select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group">
			<label for="dept_verified"class="col-md-5">DEPARTMENT Head Verified : </label>
			<select name="dept_verified" id="dept_verified" class="ml-2" required>
                <option value="Pending" <?php echo isset($dept_verified) && $dept_verified =="" ? "selected": "Pending" ?> >Pending</option>
                <option value="Verified" <?php echo isset($dept_verified) && $dept_verified =="" ? "selected": "Verified" ?>>Verified</option>
            </select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  8): ?>
            <div class="col-md-6 form-group">
			<label for="dept_verified"class="col-md-5">DEPARTMENT Head Verified : </label>
			<select name="dept_verified" id="dept_verified" class="ml-2" required>
                <option value="Pending" <?php echo isset($dept_verified) && $dept_verified =="" ? "selected": "Pending" ?> >Pending</option>
                <option value="Verified" <?php echo isset($dept_verified) && $dept_verified =="" ? "selected": "Verified" ?>>Verified</option>
            </select>
            </div>
            <?php endif; ?>
            

        </div>
    
<!-- milestone view with fetch -->







		
   

    <table class="table table-striped table-bordered" id="item-list">
                    <colgroup>
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <!-- <col width="10%"> -->
						<col width="10%">
                        <col width="10%">
                    </colgroup>
                    <thead>
                        <tr class="bg-navy disabled" style="">
                            <th class="bg-navy disabled text-light px-1 py-1 text-center">Milestone Name</th>
                            <th class="bg-navy disabled text-light px-1 py-1 text-center">Percent</th>
                            <th class="bg-navy disabled text-light px-1 py-1 text-center">Description</th>
                            <th class="bg-navy disabled text-light px-1 py-1 text-center">StartDate</th>
                            <th class="bg-navy disabled text-light px-1 py-1 text-center">Enddate</th>
                            <!-- <th class="bg-navy disabled text-light px-1 py-1 text-center">Status</th> -->
							<th class="bg-navy disabled text-light px-1 py-1 text-center">OT Status</th>
							<th class="bg-navy disabled text-light px-1 py-1 text-center">Milestone Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        $order_items_qry = $conn->query("SELECT unit,m_percent,m_description,m_startdate,m_enddate
                        FROM poc_po_list where id = $name ");
                        
                        while($row = $order_items_qry->fetch_assoc()):
                             
                        ?>
                        <tr class="po-item" data-id="">
                            <td class="align-middle p-0 text-center"><?php echo $row['unit'] ?></td>
                            <td class="align-middle p-1 text-center"><?php echo $row['m_percent'] ?></td>
                            <td class="align-middle p-1 text-center"><?php echo $row['m_description'] ?></td>
                            <td class="align-middle p-1 text-center"><?php echo $row['m_startdate'] ?></td>
                            <td class="align-middle p-1 text-center"><?php echo $row['m_enddate'] ?></td>
                            <!-- <td class="align-middle p-1 text-center"><?php echo $row['m_status'] ?></td> -->
							<td class="align-middle p-1">
									<select name="m_otstatus" id="m_otstatus" class="text-center w-100 border-0" required>
                					<option value="Not Started" <?php echo isset($m_otstatus) && $m_otstatus =="" ? "selected": "Not Started" ?>>Not Started</option>
                                        <option value="Pending" <?php echo isset($m_otstatus) && $m_otstatus =="" ? "selected": "Pending" ?>>Pending</option>
                                        <option value="In Progress" <?php echo isset($m_otstatus) && $m_otstatus =="" ? "selected": "In Progress" ?>>In Progress</option>
                                        <option value="Completed" <?php echo isset($m_otstatus) && $m_otstatus =="" ? "selected": "Completed" ?>>Completed</option>	
										
										
                                        
            						</select>
								</td>
								<!-- milestone name -->
								<td class="align-middle p-1">
									<input type="text" class="text-center w-100 border-0" name="m_comments"  id="m_comments"  value="<?php echo isset($m_comments) ? $m_comments :"" ?>"  required/>
								</td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <!-- <tfoot>
							<tr class="bg-lightblue">
								<tr>
									<th class="p-1 text-right" colspan="8"><span><button class="btn btn btn-sm btn-flat btn-primary py-0 mx-1" type="button" id="add_row">Add Row</button></span></th>
								</tr>
								
							</tr>
						</tfoot> -->
                </table>



                </div>
    
    </form>
    
    
    <div class="project_form">
            <button class="btn btn-flat btn-primary" form="project-form" name="save_project">Save</button>
            <a class="btn btn-flat btn-default" href="?page=projects_mixed">Cancel</a>
        </div>
    



<script>



    //date start
            
$(document).ready(function(){
    $('#date_picker1').datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth:true,
        changeYear: true
        // $('#date_picker2').datepicker('option','minDate','startdate');
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

    //date end

    $(function(){
        $('#project-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_pocproject",
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
						location.reload();
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").animate({ scrollTop: 0 }, "fast");
                    }else{
						alert_toast("An error occured",'error');
                        console.log(resp)
					}
                    end_loader()
				}
			})
		})
	})




// po milestone table script

// function calculate(){
// 		var _total = 0
// 		$('.po-item').each(function(){
// 			var qty = $(this).find("[name='quantity']").val()
// 			var unit_price = $(this).find("[name='unit_price']").val()
// 			var row_total = 0;
// 			if(qty > 0 && unit_price > 0){
// 				row_total = parseFloat(unit_price)
// 			}
// 			$(this).find('.total-price').text(parseFloat(row_total).toLocaleString('en-US'))
// 		})
// 		$('.total-price').each(function(){
// 			var _price = $(this).text()
// 				_price = _price.replace(/\,/gi,'')
// 				_total += parseFloat(_price)
// 		})
// 		var discount_perc = 0
// 		if($('[name="discount_percentage"]').val() > 0){
// 			discount_perc = $('[name="discount_percentage"]').val()
// 		}
// 		var discount_amount = _total * (discount_perc/100);
// 		$('[name="discount_amount"]').val(parseFloat(discount_amount).toLocaleString("en-US"))
// 		var tax_perc = 0
// 		if($('[name="tax_percentage"]').val() > 0){
// 			tax_perc = $('[name="tax_percentage"]').val()
// 		}
// 		var tax_amount = _total * (tax_perc/100);
// 		$('[name="tax_amount"]').val(parseFloat(tax_amount).toLocaleString("en-US"))
// 		$('#sub_total').text(parseFloat(_total).toLocaleString("en-US"))
// 		$('#total').text(parseFloat(_total-discount_amount).toLocaleString("en-US"))
// 	}

// 	function _autocomplete(_item){
// 		_item.find('.item_id').autocomplete({
// 			source:function(request, response){
// 				$.ajax({
// 					url:_base_url_+"classes/Master.php?f=search_items",
// 					method:'POST',
// 					data:{q:request.term},
// 					dataType:'json',
// 					error:err=>{
// 						console.log(err)
// 					},
// 					success:function(resp){
// 						response(resp)
// 					}
// 				})
// 			},
// 			select:function(event,ui){
// 				console.log(ui)
// 				_item.find('input[name="item_id[]"]').val(ui.item.id)
// 				_item.find('.item-description').text(ui.item.description)
// 			}
// 		})
// 	}

// 	$(document).ready(function(){
// 		$('#add_row').click(function(){
// 			var tr = $('#item-clone tr').clone()
// 			$('#item-list tbody').append(tr)
// 			_autocomplete(tr)
// 			tr.find('[name="quantity"],[name="unit_price"]','[name="m_startdate"]','[name="m_enddate"]').on('input keypress',function(e){
// 				calculate()
// 			})
// 			$('#item-list tfoot').find('[name="discount_percentage"],[name="tax_percentage"]').on('input keypress',function(e){
// 				calculate()
// 			})
// 		})
// 		if($('#item-list .po-item').length > 0){
// 			$('#item-list .po-item').each(function(){
// 				var tr = $(this)
// 				_autocomplete(tr)
// 				tr.find('[name="quantity"],[name="unit_price"],[name="m_startdate"],[name="m_enddate"]').on('input keypress',function(e){
// 					calculate()
// 				})
// 				$('#item-list tfoot').find('[name="discount_percentage"],[name="tax_percentage"]').on('input keypress',function(e){
// 					calculate()
// 				})
// 				tr.find('[name="quantity"],[name="unit_price"],[name="m_startdate"],[name="m_enddate"]').trigger('keypress')
// 			})
// 		}else{
// 		$('#add_row').trigger('click')
// 		}
//         $('.select2').select2({placeholder:"Please Select here",width:"relative"})
		
// 	})


// po milestone table script






</script>