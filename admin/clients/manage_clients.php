<?php
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `client_list` where id = '{$_GET['id']}' ");
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
<!-- <div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title"><u><b>Add New Client</b></u> </h3>
	</div>
    <br> -->
<form action="" id="client-form">
     <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
    <div class="row">
        <div class="col-md-11 form-group ml-2">
            <label for="name" class="control-label">Client Name :<span class="po_err_msg text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control rounded-0" value="<?php echo isset($name) ? $name :"" ?>" required>
        </div>


        <div class="col-md-11 form-group ml-2">
            			<label for="status" class="control-label">Status :</label><br>
						<input type="text" class="form-control rounded-0"  name="status" value="Active" readonly></input>
            		
            			<br/>
            			</div>



        <!-- <div class="col-md-6 form-group ml-2">
            <label for="status" class="control-label">Status :</label>
            <select name="status" id="status" class="form-control rounded-0" disabled>
                <option value="Active" <?php echo isset($status) && $status =="" ? "selected": "Active" ?> >Active</option>
                <option value="Inactive" <?php echo isset($status) && $status =="" ? "selected": "Inactive" ?>>Inactive</option>
            </select>
        </div> -->
    </div>
</form>
<!-- <div class="form_group ml-2">
		<button class="btn btn-flat btn-primary" form="client-form" name="save_client">Save</button>
		<a class="btn btn-flat btn-default" href="?page=clients">Cancel</a>
	</div>
<br> -->
<script>
    $(function(){
        $('#client-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_client",
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