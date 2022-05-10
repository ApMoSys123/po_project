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
    span.select2-selection.select2-selection--single {
        border-radius: 0;
        padding: 0.25rem 0.5rem;
        padding-top: 0.25rem;
        padding-right: 0.5rem;
        padding-bottom: 0.25rem;
        padding-left: 0.5rem;
        height: auto;
    }
</style>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title"><u><b>Update TNM Project Details</b></u> </h3>
	</div>
    <br>
<form action="" id="project-form">
     <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
    <div class="row">
    <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group">
                <label for="name" class="control-label col-md-5">Project Name : <span class="po_err_msg text-danger">*</span></label>
               
                <select name="name" id="name" class="custom-select col-sm-3 rounded-0 select2 ml-2"  required>
						<option value="" disabled <?php echo !isset($name) ? "selected" :'' ?>></option>
						<?php 
							$supplier_qry = $conn->query("SELECT * FROM `tnm_po_list` order by `project_name` asc");
							while($row = $supplier_qry->fetch_assoc()):
						?>
					
                        <option value="<?php echo $row['id'] ?>" <?php echo isset($name) && $name == $row['id'] ? 'selected' : '' ?> <?php echo $row['status'] == 0? 'disabled' : '' ?>><?php echo $row['project_name'] ?></option>
						<?php endwhile; ?>
				</select>
            </div>
           
            
            <div class="col-md-6 form-group">  
            <label for="tpstartdate" class="control-label col-md-5 mt-2">Start Date : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="tpstartdate" id="date_picker1" class="ml-2" value="<?php echo isset($tpstartdate) ? $tpstartdate :"" ?>" required>
            </div>
            <div class="col-md-6 form-group">  
            <label for="tpenddate" class="control-label col-md-5">End Date : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="tpenddate" id="date_picker2" class="ml-2" value="<?php echo isset($tpenddate) ? $tpenddate :"" ?>" required>
            </div>
            <?php endif; ?>



            <?php if($_settings->userdata('type') ==  2): ?>
            <div class="col-md-6 form-group">
                <label for="name" class="control-label col-md-5">Project Name : <span class="po_err_msg text-danger">*</span></label>
               
                <select name="name" id="name" class="custom-select col-sm-3 rounded-0 select2 ml-2"  required>
						<option value="" disabled <?php echo !isset($name) ? "selected" :'' ?>></option>
						<?php 
							$supplier_qry = $conn->query("SELECT * FROM `tnm_po_list` order by `project_name` asc");
							while($row = $supplier_qry->fetch_assoc()):
						?>
					
                        <option value="<?php echo $row['id'] ?>" <?php echo isset($name) && $name == $row['id'] ? 'selected' : '' ?> <?php echo $row['status'] == 0? 'disabled' : '' ?>><?php echo $row['project_name'] ?></option>
						<?php endwhile; ?>
				</select>
            </div>
           
            
            <div class="col-md-6 form-group">  
            <label for="tpstartdate" class="control-label col-md-5 mt-2">Start Date : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="tpstartdate" id="date_picker1" class="ml-2" value="<?php echo isset($tpstartdate) ? $tpstartdate :"" ?>" required>
            </div>
            <div class="col-md-6 form-group">  
            <label for="tpenddate" class="control-label col-md-5">End Date : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="tpenddate" id="date_picker2" class="ml-2" value="<?php echo isset($tpenddate) ? $tpenddate :"" ?>" required>
            </div>
            <?php endif; ?>



            <?php if($_settings->userdata('type') ==  3): ?>
            <div class="col-md-6 form-group">
                <label for="name" class="control-label col-md-5">Project Name : <span class="po_err_msg text-danger">*</span></label>
               
                <select name="name" id="name" class="custom-select col-sm-3 rounded-0 select2 ml-2"  required>
						<option value="" disabled <?php echo !isset($name) ? "selected" :'' ?>></option>
						<?php 
							$supplier_qry = $conn->query("SELECT * FROM `tnm_po_list` order by `project_name` asc");
							while($row = $supplier_qry->fetch_assoc()):
						?>
					
                        <option value="<?php echo $row['id'] ?>" <?php echo isset($name) && $name == $row['id'] ? 'selected' : '' ?> <?php echo $row['status'] == 0? 'disabled' : '' ?>><?php echo $row['project_name'] ?></option>
						<?php endwhile; ?>
				</select>
            </div>
           
            
            <div class="col-md-6 form-group">  
            <label for="tpstartdate" class="control-label col-md-5 mt-2">Start Date : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="tpstartdate" id="date_picker1" class="ml-2" value="<?php echo isset($tpstartdate) ? $tpstartdate :"" ?>" required>
            </div>
            <div class="col-md-6 form-group">  
            <label for="tpenddate" class="control-label col-md-5">End Date : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="tpenddate" id="date_picker2" class="ml-2" value="<?php echo isset($tpenddate) ? $tpenddate :"" ?>" required>
            </div>
            <?php endif; ?>



            <?php if($_settings->userdata('type') ==  7): ?>
                <div class="col-md-6 form-group">
                <label for="name" class="control-label col-md-5">Project Name : <span class="po_err_msg text-danger">*</span></label>
                <?php 
							$supplier_qry = $conn->query("SELECT * FROM `tnm_po_list` order by `project_name` asc");
							while($row = $supplier_qry->fetch_assoc()):
						?>
               
                <select name="name" id="name" class="custom-select col-sm-3 rounded-0 select2 ml-2"  disabled>
						<option value="" disabled <?php echo !isset($name) ? "selected" :'' ?>></option>
						
					
                        <option value="<?php echo $row['id'] ?>" <?php echo isset($name) && $name == $row['id'] ? 'selected' : '' ?> <?php echo $row['status'] == 0? 'disabled' : '' ?>><?php echo $row['project_name'] ?></option>
						
				</select>
                <input type="hidden" name="name" value="<?php echo $row['id'] ?>">
                <?php endwhile; ?>
            </div>
           
            
            <div class="col-md-6 form-group">  
            <label for="tpstartdate" class="control-label col-md-5 mt-2">Start Date : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="tpstartdate" id="date_picker1" class="ml-2" value="<?php echo isset($tpstartdate) ? $tpstartdate :"" ?>" disabled>
            </div>
            <div class="col-md-6 form-group">  
            <label for="tpenddate" class="control-label col-md-5">End Date : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="tpenddate" id="date_picker2" class="ml-2" value="<?php echo isset($tpenddate) ? $tpenddate :"" ?>" disabled>
            </div>
            <?php endif; ?>



            <?php if($_settings->userdata('type') ==  8): ?>
            <div class="col-md-6 form-group">
                <label for="name" class="control-label col-md-5">Project Name : <span class="po_err_msg text-danger">*</span></label>
                <?php 
							$supplier_qry = $conn->query("SELECT * FROM `tnm_po_list` order by `project_name` asc");
							while($row = $supplier_qry->fetch_assoc()):
						?>
               
                <select name="name" id="name" class="custom-select col-sm-3 rounded-0 select2 ml-2"  disabled>
						<option value="" disabled <?php echo !isset($name) ? "selected" :'' ?>></option>
						
					
                        <option value="<?php echo $row['id'] ?>" <?php echo isset($name) && $name == $row['id'] ? 'selected' : '' ?> <?php echo $row['status'] == 0? 'disabled' : '' ?>><?php echo $row['project_name'] ?></option>
						
				</select>
                <input type="hidden" name="name" value="<?php echo $row['id'] ?>">
                <?php endwhile; ?>
            </div>
           
            
            <div class="col-md-6 form-group">  
            <label for="tpstartdate" class="control-label col-md-5 mt-2">Start Date : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="tpstartdate" id="date_picker1" class="ml-2" value="<?php echo isset($tpstartdate) ? $tpstartdate :"" ?>" disabled>
            </div>
            <div class="col-md-6 form-group">  
            <label for="tpenddate" class="control-label col-md-5">End Date : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="tpenddate" id="date_picker2" class="ml-2" value="<?php echo isset($tpenddate) ? $tpenddate :"" ?>" disabled>
            </div>
            <?php endif; ?>



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
            <?php if($_settings->userdata('type') ==  8): ?>
            <div class="col-md-6 form-group">
            <label for="department_id" class="control-label col-md-5">Department : <span class="po_err_msg text-danger">*</span></label>
            
				<select name="department" id="department" class="custom-select col-sm-3 rounded-0 select2 ml-2"  disabled>
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
            <input type ="hidden" name="department_head" value ="<?php echo $row['department_head'] ?>">
				<select name="department_head" id="department_head" class="custom-select col-sm-3 rounded-0 select2 ml-2"   disabled>
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
            
            <?php if($_settings->userdata('type') ==  1): ?>
                <div class="col-md-6 form-group">     
            <label for="teamlead" class="control-label col-md-5">Team Lead : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="teamlead" id="teamlead" class="ml-2" value="<?php echo isset($teamlead) ? $teamlead :"" ?>" required>
            </div>
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
            <?php endif; ?>


            <?php if($_settings->userdata('type') ==  2): ?>
                <div class="col-md-6 form-group">     
            <label for="teamlead" class="control-label col-md-5">Team Lead : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="teamlead" id="teamlead" class="ml-2" value="<?php echo isset($teamlead) ? $teamlead :"" ?>" required>
            </div>
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
            <?php endif; ?>


            <?php if($_settings->userdata('type') ==  3): ?>
                <div class="col-md-6 form-group">     
            <label for="teamlead" class="control-label col-md-5">Team Lead : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="teamlead" id="teamlead" class="ml-2" value="<?php echo isset($teamlead) ? $teamlead :"" ?>" required>
            </div>
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
            <?php endif; ?>

            <?php if($_settings->userdata('type') ==  7): ?>
                <div class="col-md-6 form-group">     
            <label for="teamlead" class="control-label col-md-5">Team Lead : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="teamlead" id="teamlead" class="ml-2" value="<?php echo isset($teamlead) ? $teamlead :"" ?>" required>
            </div>
            <div class="col-md-6 form-group">  
            <label for="rm_client" class="control-label col-md-5">RM Client : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="rm_client" id="rm_client" class="ml-2" value="<?php echo isset($rm_client) ? $rm_client :"" ?>" readonly>
            </div>

            <div class="col-md-6 form-group">  
            <label for="email" class="control-label col-md-5">RM Client_Email : <span class="po_err_msg text-danger">*</span></label>
            <input type="rmclient_email" name="rmclient_email" id="rmclient_email" class="ml-2" value="<?php echo isset($rmclient_email) ? $rmclient_email :"" ?>" readonly>
            </div>
            


            <div class="col-md-6 form-group">  
            <label for="rmclient_contact" class="control-label col-md-5">RM Client_Contact No. : <span class="po_err_msg text-danger">*</span></label>
            <input type="rmclient_contact" name="rmclient_contact" id="rmclient_contact" class="ml-2" value="<?php echo isset($rmclient_contact) ? $rmclient_contact :"" ?>" readonly>
            </div>
            <div class="col-md-6 form-group">  
            <label for="rmclient_location" class="control-label col-md-5">RM Client_Location : <span class="po_err_msg text-danger">*</span></label>
            <input type="rmclient_location" name="rmclient_location" id="rmclient_location" class="ml-2" value="<?php echo isset($rmclient_location) ? $rmclient_location :"" ?>" readonly>
            </div>
            <?php endif; ?>

            <?php if($_settings->userdata('type') ==  8): ?>
                <div class="col-md-6 form-group">     
            <label for="teamlead" class="control-label col-md-5">Team Lead : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="teamlead" id="teamlead" class="ml-2" value="<?php echo isset($teamlead) ? $teamlead :"" ?>" readonly>
            </div>
            <div class="col-md-6 form-group">  
            <label for="rm_client" class="control-label col-md-5">RM Client : <span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="rm_client" id="rm_client" class="ml-2" value="<?php echo isset($rm_client) ? $rm_client :"" ?>" readonly>
            </div>

            <div class="col-md-6 form-group">  
            <label for="email" class="control-label col-md-5">RM Client_Email : <span class="po_err_msg text-danger">*</span></label>
            <input type="rmclient_email" name="rmclient_email" id="rmclient_email" class="ml-2" value="<?php echo isset($rmclient_email) ? $rmclient_email :"" ?>" readonly>
            </div>
            


            <div class="col-md-6 form-group">  
            <label for="rmclient_contact" class="control-label col-md-5">RM Client_Contact No. : <span class="po_err_msg text-danger">*</span></label>
            <input type="rmclient_contact" name="rmclient_contact" id="rmclient_contact" class="ml-2" value="<?php echo isset($rmclient_contact) ? $rmclient_contact :"" ?>" readonly>
            </div>
            <div class="col-md-6 form-group">  
            <label for="rmclient_location" class="control-label col-md-5">RM Client_Location : <span class="po_err_msg text-danger">*</span></label>
            <input type="rmclient_location" name="rmclient_location" id="rmclient_location" class="ml-2" value="<?php echo isset($rmclient_location) ? $rmclient_location :"" ?>" readonly>
            </div>
            <?php endif; ?>

            <?php if($_settings->userdata('type') ==  3): ?>
           
            <div class="col-md-6 form-group">
            <label for="businesshead_comment" class="control-label col-md-5">Business Head Comments : <span class="po_err_msg text-danger">*</span></label>
            <textarea rows="3" cols="22" name="businesshead_comment" id="businesshead_comment" class="ml-2"><?php echo isset($businesshead_comment) ? $businesshead_comment :"" ?> </textarea>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group">
            <label for="businessteam_comment" class="control-label col-md-5">Business Team Comments : <span class="po_err_msg text-danger">*</span></label>
            <textarea rows="3" cols="22" name="businessteam_comment" id="businessteam_comment" class="ml-2"><?php echo isset($businessteam_comment) ? $businessteam_comment :"" ?> </textarea>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  3): ?>
            <div class="col-md-6 form-group">
            <label for="businesshead_comment" class="control-label col-md-5">Business Head Comments : <span class="po_err_msg text-danger">*</span></label>
            <textarea rows="3" cols="22" name="businesshead_comment" id="businesshead_comment" class="ml-2"><?php echo isset($businesshead_comment) ? $businesshead_comment :"" ?> </textarea>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  2): ?>
            <div class="col-md-6 form-group">
            <label for="businessteam_comment" class="control-label col-md-5">Business Team Comments : <span class="po_err_msg text-danger">*</span></label>
            <textarea rows="3" cols="22" name="businessteam_comment" id="businessteam_comment" class="ml-2"><?php echo isset($businessteam_comment) ? $businessteam_comment :"" ?> </textarea>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group">
            <label for="rmgteam_comment" class="control-label col-md-5">RMG Team Comments : <span class="po_err_msg text-danger">*</span></label>
            <textarea rows="3" cols="22" name="rmgteam_comment" id="rmgteam_comment" class="ml-2"><?php echo isset($rmgteam_comment) ? $rmgteam_comment :"" ?> </textarea>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  7): ?>
            <div class="col-md-6 form-group">
            <label for="rmgteam_comment" class="control-label col-md-5">RMG Team Comments : <span class="po_err_msg text-danger">*</span></label>
            <textarea rows="3" cols="22" name="rmgteam_comment" id="rmgteam_comment" class="ml-2"><?php echo isset($rmgteam_comment) ? $rmgteam_comment :"" ?> </textarea>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group">
            <label for="otteam_comment" class="control-label col-md-5">Operation Team Comments : <span class="po_err_msg text-danger">*</span></label>
            <textarea rows="3" cols="22" name="otteam_comment" id="otteam_comment" class="ml-2"><?php echo isset($otteam_comment) ? $otteam_comment :"" ?> </textarea>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  6): ?>
            <div class="col-md-6 form-group">
            <label for="otteam_comment" class="control-label col-md-5">Operation Team Comments : <span class="po_err_msg text-danger">*</span></label>
            <textarea rows="3" cols="22" name="otteam_comment" id="otteam_comment" class="ml-2"><?php echo isset($otteam_comment) ? $otteam_comment :"" ?> </textarea>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group">
            <label for="director_comment" class="control-label col-md-5">Director Comments : <span class="po_err_msg text-danger">*</span></label>
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
            <label for="tp_status" class="control-label col-md-5">Status :</label>
            <select name="tp_status" id="tp_status" class="ml-2" required>
                <option value="Not Selected" <?php echo isset($tp_status) && $tp_status =="Not Selected" ? "selected": "Not Selected" ?> >Not Selected</option>
                <option value="Started" <?php echo isset($tp_status) && $tp_status =="Started" ? "selected": "Started" ?> >Started</option>
                <option value="Issue" <?php echo isset($tp_status) && $tp_status =="Issue" ? "selected": "Issue" ?>>Issue</option>
                <option value="In Progress" <?php echo isset($tp_status) && $tp_status =="In Progress" ? "selected": "In Progress" ?>>In Progress</option>
                <option value="On hold" <?php echo isset($tp_status) && $tp_status =="On hold" ? "selected": "On hold" ?>>On hold</option>
                <option value="Completed" <?php echo isset($tp_status) && $tp_status =="Completed" ? "selected": "Completed" ?>>Completed</option>
            </select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  8): ?>
                <div class="col-md-6 form-group">  
            <label for="tp_status" class="control-label col-md-5">Status :</label>
            <select name="tp_status" id="tp_status" class="ml-2" required>
                <option value="Not Selected" <?php echo isset($tp_status) && $tp_status =="Not Selected" ? "selected": "Not Selected" ?> >Not Selected</option>
                <option value="Started" <?php echo isset($tp_status) && $tp_status =="Started" ? "selected": "Started" ?> >Started</option>
                <option value="Issue" <?php echo isset($tp_status) && $tp_status =="Issue" ? "selected": "Issue" ?>>Issue</option>
                <option value="In Progress" <?php echo isset($tp_status) && $tp_status =="In Progress" ? "selected": "In Progress" ?>>In Progress</option>
                <option value="On hold" <?php echo isset($tp_status) && $tp_status =="On hold" ? "selected": "On hold" ?>>On hold</option>
                <option value="Completed" <?php echo isset($tp_status) && $tp_status =="Completed" ? "selected": "Completed" ?>>Completed</option>
            </select>
            </div>
            <?php endif; ?>
            
            <?php if($_settings->userdata('type') ==  1): ?>
            <div class="col-md-6 form-group" >
			<label for="rmg_verified" class="col-md-5">RMG Head Verified :</label>
			<select name="rmg_verified" id="rmg_verified" class="ml-2" required>
                <option value="Pending" <?php echo isset($rmg_verified) && $rmg_verified =="Pending" ? "selected": "Pending" ?> >Pending</option>
                <option value="Verified" <?php echo isset($rmg_verified) && $rmg_verified =="Verified" ? "selected": "Verified" ?>>Verified</option>
            </select>
            </div>
            <?php endif; ?>
            <?php if($_settings->userdata('type') ==  7): ?>
                <div class="col-md-6 form-group" >
			<label for="rmg_verified" class="col-md-5">RMG Head Verified :</label>
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
								
								<td class="align-middle p-1">
                                <?php if($_settings->userdata('type') ==  1): ?>
									<select name="r_status" id="r_status" class="text-center w-100 border-0" required>
                						<option value="Approved" <?php echo isset($r_status) && $r_status =="Approved" ? "selected": "Approved" ?>>Approved</option>
										<option value="Denied" <?php echo isset($r_status) && $r_status =="Denied" ? "selected": "Denied" ?>>Denied</option>
										<option value="Pending" <?php echo isset($r_status) && $r_status =="Pending" ? "selected": "Pending" ?>>Pending</option>
            						</select>
                                    <?php endif; ?>
                                    <?php if($_settings->userdata('type') ==  2): ?>
									<select name="r_status" id="r_status" class="text-center w-100 border-0" disabled>
                						<option value="Approved" <?php echo isset($r_status) && $r_status =="Approved" ? "selected": "Approved" ?>>Approved</option>
										<option value="Denied" <?php echo isset($r_status) && $r_status =="Denied" ? "selected": "Denied" ?>>Denied</option>
										<option value="Pending" <?php echo isset($r_status) && $r_status =="Pending" ? "selected": "Pending" ?>>Pending</option>
            						</select>
                                    <?php endif; ?>
                                    <?php if($_settings->userdata('type') ==  3): ?>
									<select name="r_status" id="r_status" class="text-center w-100 border-0" disabled>
                						<option value="Approved" <?php echo isset($r_status) && $r_status =="Approved" ? "selected": "Approved" ?>>Approved</option>
										<option value="Denied" <?php echo isset($r_status) && $r_status =="Denied" ? "selected": "Denied" ?>>Denied</option>
										<option value="Pending" <?php echo isset($r_status) && $r_status =="Pending" ? "selected": "Pending" ?>>Pending</option>
            						</select>
                                    <?php endif; ?>
                                    <?php if($_settings->userdata('type') ==  7): ?>
									<select name="r_status" id="r_status" class="text-center w-100 border-0" required>
                						<option value="Approved" <?php echo isset($r_status) && $r_status =="Approved" ? "selected": "Approved" ?>>Approved</option>
										<option value="Denied" <?php echo isset($r_status) && $r_status =="Denied" ? "selected": "Denied" ?>>Denied</option>
										<option value="Pending" <?php echo isset($r_status) && $r_status =="Pending" ? "selected": "Pending" ?>>Pending</option>
            						</select>
                                    <?php endif; ?>
                                    <?php if($_settings->userdata('type') ==  8): ?>
									<select name="r_status" id="r_status" class="text-center w-100 border-0" required>
                						<option value="Approved" <?php echo isset($r_status) && $r_status =="Approved" ? "selected": "Approved" ?>>Approved</option>
										<option value="Denied" <?php echo isset($r_status) && $r_status =="Denied" ? "selected": "Denied" ?>>Denied</option>
										<option value="Pending" <?php echo isset($r_status) && $r_status =="Pending" ? "selected": "Pending" ?>>Pending</option>
            						</select>
                                    <?php endif; ?>
								</td>
                                <td class="align-middle p-1">
                                    
									<input type="text" class="text-center w-100 border-0" name="r_comments"  id="r_comments"  value="<?php echo isset($r_comments) ? $r_comments :"" ?>"  required/>
								</td>
								
							</tr>
							<?php endwhile ?>
						</tbody>
						
					</table>
        
    </div>
    
</form>
<div class="project_form">
		<button class="btn btn-flat btn-primary" form="project-form" name="save_tnmproject">Save</button>
		<a class="btn btn-flat btn-default" href="?page=projects_tnm">Cancel</a>
	</div>
<br>

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
	alert("Project End Date Should Be Greater Than Project Start Date");
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
				url:_base_url_+"classes/Master.php?f=save_tnmproject",
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
