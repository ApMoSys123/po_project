<?php
// require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `project_list` where id = '{$_GET['id']}' ");
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
		<h3 class="card-title"><u><b>Add New FC Project Details</b> </u></h3>
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
							$supplier_qry = $conn->query("SELECT * FROM `po_list` order by `project_name` asc");
							while($row = $supplier_qry->fetch_assoc()):
						?>
						<option value="<?php echo $row['id'] ?>" <?php echo isset($name) && $name == $row['id'] ? 'selected' : '' ?> <?php echo $row['bhead_approval'] == 'Pending'? 'disabled' : '' ?>><?php echo $row['project_name'] ?></option>
						<?php endwhile; ?>
				</select>
            </div>
         
            
            <div  class="col-md-6 form-group">
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#name').on('change', function() {
                        var project_name = $("#name").val();
                        $.ajax ({
                             url: "ajax.php",
                            data: { project_name : project_name },
                            success: function( result ) {
                                alert("Hi, testing");
                                alert( result );
                            }
                        });
                    });
             });

<?php $abc = "<script>document.writeln(project_name)</script>"?>   
</script>
            <?php 
			//	$supplier_qry = $conn->query("SELECT startdate FROM `po_list` where project_name=");
			//		while($row = $supplier_qry->fetch_assoc()):
			?>

            <label for="pstartdate" class="control-label col-md-5 mt-2">Start Date : <span class="po_err_msg text-danger">*</span></label>
            <input type="search" name="pstartdate" id="date_picker5" class="ml-2" value="<?php echo isset($pstartdate) ? $pstartdate :"" ?>" required>
            </div>
            <div  class="col-md-6 form-group">
            <label for="penddate" class="control-label col-md-5">End Date : <span class="po_err_msg text-danger">*</span></label>
            <input type="search" name="penddate" id="date_picker6" class="ml-2" value="<?php echo isset($penddate) ? $penddate :"" ?>" required>
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
                <option value="Not Selected" <?php echo isset($bill) && $bill =="Not Selected" ? "selected": "Not Selected" ?> >Not Selected</option>
                <option value="Billable" <?php echo isset($bill) && $bill =="Billable" ? "selected": "Billable" ?> >Billable</option>
                <option value="Non Billable" <?php echo isset($bill) && $bill =="Non Billable" ? "selected": "Non Billable" ?>>Non Billable</option>
            </select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  8): ?>
            <div class="col-md-6 form-group">
            <label for="bill" class="control-label col-md-5">Billable/Non-Billable :</label>
            <select name="bill" id="bill" class="ml-2" required>
                <option value="Not Selected" <?php echo isset($bill) && $bill =="Not Selected" ? "selected": "Not Selected" ?> >Not Selected</option>
                <option value="Billable" <?php echo isset($bill) && $bill =="Billable" ? "selected": "Billable" ?> >Billable</option>
                <option value="Non Billable" <?php echo isset($bill) && $bill =="Non Billable" ? "selected": "Non Billable" ?>>Non Billable</option>
            </select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group">
            <label for="pstatus" class="control-label col-md-5">Status :</label>
            <select name="pstatus" id="pstatus" class="ml-2" required>
                <option value="Not Selected" <?php echo isset($pstatus) && $pstatus =="Not Selected" ? "selected": "Not Selected" ?> >Not Selected</option>
                <option value="Started" <?php echo isset($pstatus) && $pstatus =="Started" ? "selected": "Started" ?> >Started</option>
                <option value="Issue" <?php echo isset($pstatus) && $pstatus =="Issue" ? "selected": "Issue" ?>>Issue</option>
                <option value="In Progress" <?php echo isset($pstatus) && $pstatus =="In Progress" ? "In Progress": "In Progress" ?>>In Progress</option>
                <option value="On hold" <?php echo isset($pstatus) && $pstatus =="On hold" ? "On hold": "On hold" ?>>On hold</option>
                <option value="Completed" <?php echo isset($pstatus) && $pstatus =="Completed" ? "Completed": "4" ?>>Completed</option>
            </select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  8): ?>
                <div class="col-md-6 form-group">
            <label for="pstatus" class="control-label col-md-5">Status :</label>
            <select name="pstatus" id="pstatus" class="ml-2" required>
                <option value="Not Selected" <?php echo isset($pstatus) && $pstatus =="Not Selected" ? "selected": "Not Selected" ?> >Not Selected</option>
                <option value="Started" <?php echo isset($pstatus) && $pstatus =="Started" ? "selected": "Started" ?> >Started</option>
                <option value="Issue" <?php echo isset($pstatus) && $pstatus =="Issue" ? "selected": "Issue" ?>>Issue</option>
                <option value="In Progress" <?php echo isset($pstatus) && $pstatus =="In Progress" ? "selected": "In Progress" ?>>In Progress</option>
                <option value="On hold" <?php echo isset($pstatus) && $pstatus =="On hold" ? "selected": "3" ?>>On hold</option>
                <option value="Completed" <?php echo isset($pstatus) && $pstatus =="Completed" ? "selected": "4" ?>>Completed</option>
            </select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group" >
			<label for="rmg_verified" class="col-md-5">RMG Head Verified : </label>
			<select name="rmg_verified" id="rmg_verified" class="ml-2" required>
                <option value="Pending" <?php echo isset($rmg_verified) && $rmg_verified =="Pending" ? "selected": "Pending" ?> >Pending</option>
                <option value="Verified" <?php echo isset($rmg_verified) && $rmg_verified =="Verified" ? "selected": "Verified" ?>>Verified</option>
            </select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  7): ?>
                <div class="col-md-6 form-group" >
			<label for="rmg_verified" class="col-md-5">RMG Head Verified : </label>
			<select name="rmg_verified" id="rmg_verified" class="ml-2" required>
                <option value="Pending" <?php echo isset($rmg_verified) && $rmg_verified =="Pending" ? "selected": "Pending" ?> >Pending</option>
                <option value="Verified" <?php echo isset($rmg_verified) && $rmg_verified =="Verified" ? "selected": "Verified" ?>>Verified</option>
            </select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group">
			<label for="dept_verified"class="col-md-5">DEPARTMENT Head Verified : </label>
			<select name="dept_verified" id="dept_verified" class="ml-2" required>
                <option value="Pending" <?php echo isset($dept_verified) && $dept_verified =="Pending" ? "selected": "Pending" ?> >Pending</option>
                <option value="Verified" <?php echo isset($dept_verified) && $dept_verified =="Verified" ? "selected": "Verified" ?>>Verified</option>
            </select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  8): ?>
                <div class="col-md-6 form-group">
			<label for="dept_verified"class="col-md-5">DEPARTMENT Head Verified : </label>
			<select name="dept_verified" id="dept_verified" class="ml-2" required>
                <option value="Pending" <?php echo isset($dept_verified) && $dept_verified =="Pending" ? "selected": "Pending" ?> >Pending</option>
                <option value="Verified" <?php echo isset($dept_verified) && $dept_verified =="Verified" ? "selected": "Verified" ?>>Verified</option>
            </select>
            </div>
            <?php endif; ?>
            

        </div>
    
<!-- milestone view with fetch -->







		
    </div>
    
</form>


<div class="project_form">
		<button class="btn btn-flat btn-primary" form="project-form" name="save_project">Save</button>
		<a class="btn btn-flat btn-default" href="?page=projects">Cancel</a>
	</div>


   




<script>



    //date start
            
$(document).ready(function(){
    $('#date_picker5').datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth:true,
        changeYear: true
        // $('#date_picker2').datepicker('option','minDate','startdate');
    });
})
$(document).ready(function(){
    $('#date_picker6').datepicker({
      
        dateFormat: "yy-mm-dd",
        changeMonth:true,
        changeYear: true
    });
})
                  
$("#date_picker6").change(function () {

var objFromDate = document.getElementById("date_picker5").value; 
var objToDate = document.getElementById("date_picker6").value;

var FromDate = new Date(objFromDate);
var ToDate = new Date(objToDate);

if(FromDate > ToDate )
{
	alert("Project End Date Should Be Greater Than Project Start Date");
	document.getElementById("date_picker6").value = "";
	return false; 
}

});

$("#date_picker5").change(function () {

var objFromDate = document.getElementById("date_picker1").value; 
var objToDate = document.getElementById("date_picker5").value;

var FromDate = new Date(objFromDate);
var ToDate = new Date(objToDate);

if(FromDate > ToDate )
{
	alert("Project Start Date Should Be Greater Than PO Start Date");
	document.getElementById("date_picker5").value = "";
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
				url:_base_url_+"classes/Master.php?f=save_project",
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










</script>