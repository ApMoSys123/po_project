<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `poc_po_list` where id = '{$_GET['id']}' ");
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
		<h3 class="card-title"><b><u><?php echo isset($id) ? " POC Purchase Order Details/ Letter Of Intent Details": "New Purchase Order" ?></u></b> </h3>
        <div class="card-tools">
            <button class="btn btn-sm btn-flat btn-success" id="print" type="button"><i class="fa fa-print"></i> Print</button>
            <?php if($_settings->userdata('type') == 1): ?>
		    <a class="btn btn-sm btn-flat btn-primary" href="?page=purchase_orders_poc/manage_poc&id=<?php echo $id ?>">Edit</a>
             <?php endif; ?>
		    <a class="btn btn-sm btn-flat btn-default" href="?page=purchase_orders_poc">Back</a>
        </div>
	</div>
	<div class="card-body" id="out_print">
        <div class="row">
        <div class="col-6 d-flex align-items-center">
            <div>
                <p class="m-0"><?php echo $_settings->info('company_name') ?></p>
                <p class="m-0"><?php echo $_settings->info('company_email') ?></p>
                <p class="m-0"><?php echo $_settings->info('company_address') ?></p>
            </div>
        </div>
        <div class="col-6">
            <center><img src="<?php echo validate_image($_settings->info('logo')) ?>" alt="" height="120px"></center>
            <h3 class="text-center"><b>PURCHASE ORDER / LETTER OF INTENT</b></h3>
        </div>
        </div>
        <div class="row mb-2">
            <div class="col-6">
                <p class="m-0"><b>Client Details :</b></p>
                <?php echo $client_id ?>
            </div>
            <div class="col-6 row">
                <div class="col-6">
                    <p  class="m-0"><b>P.O. #:</b></p>
                    <p><b><?php echo $po_no ?></b></p>
                </div>
                <div class="col-6">
                <dt class="col-md-4">Start Date</dt>
                <dd class="col-md-8">: <?php echo $startdate ?></dd>
                <dt class="col-md-4">End Date</dt>
                <dd class="col-md-8">: <?php echo $enddate ?></dd>
                </div>
            </div>
            <div class="col-6 row">
                
                <dt class="col-md-4">Project Name</dt>
                <dd class="col-md-8">: <?php echo $pname ?></dd>
                <dt class="col-md-4">RM ApMoSys</dt>
                <dd class="col-md-8">: <?php echo $rm_apmosys ?></dd>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered" id="item-list">
                    <colgroup>
                        <col width="3%">
                        <!-- <col width="10%">
                        <col width="10%"> -->
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                        <col width="10%">
                    </colgroup>
                    <thead>
                        <tr class="bg-navy disabled" style="">
                            <!-- <th class="bg-navy disabled text-light px-1 py-1 text-center">Resource Count</th>
                            <th class="bg-navy disabled text-light px-1 py-1 text-center">Resource Names</th> -->
                            <th class="bg-navy disabled text-light px-1 py-1 text-center">Milestones Name</th>
                            <th class="bg-navy disabled text-light px-1 py-1 text-center">Milestone %</th>
                            <th class="bg-navy disabled text-light px-1 py-1 text-center">Description</th>
                            <th class="bg-navy disabled text-light px-1 py-1 text-center">startdate</th>
                            <th class="bg-navy disabled text-light px-1 py-1 text-center">enddate</th>
                            <th class="bg-navy disabled text-light px-1 py-1 text-center">Status</th>
                            <th class="bg-navy disabled text-light px-1 py-1 text-center">PO Value</th>
                            <th class="bg-navy disabled text-light px-1 py-1 text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(isset($id)):
                        $order_items_qry = $conn->query("SELECT * FROM `poc_po_list` o inner join poc_po_list i on o.id = i.id inner join project_list pl on o.id = name where o.`id` = '$id' ");
                        $sub_total = 0;
                        while($row = $order_items_qry->fetch_assoc()):
                            $sub_total += $row['unit_price'];  
                        ?>
                        <tr class="po-item" data-id="">
                            <!-- <td class="align-middle p-0 text-center"><?php echo $row['quantity'] ?></td>
                            <td class="align-middle p-1 text-center"><?php echo $row['r_name'] ?></td> -->
                            <td class="align-middle p-1 text-center"><?php echo $row['unit'] ?></td>
                            <td class="align-middle p-1 text-center"><?php echo $row['m_percent'] ?></td>
                            <td class="align-middle p-1 text-center"><?php echo $row['m_description'] ?></td>
                            <td class="align-middle p-1 text-center"><?php echo $row['m_startdate'] ?></td>
                            <td class="align-middle p-1 text-center"><?php echo $row['m_enddate'] ?></td>
                            <td class="align-middle p-1 text-center">
                                
                            <!-- <?php
							switch ($m_status) {
								case 'Approved':
                                    echo '<span class="badge badge-success">Approved</span>';
                                    break;
                                case 'Pending':
                                    echo '<span class="badge badge-secondary">Pending</span>';
                                    break;
                                case 'Rejected':
                                    echo '<span class="badge badge-danger">Rejected</span>';
                                    break;
								}
							?>	 -->
                           
                            <?php echo $row['m_otstatus'] ?>
                            </td>

                            <td class="align-middle p-1 text-right total-price"><?php echo number_format($row['unit_price']) ?></td>
                            <td class="align-middle p-1 text-right total-price"><?php echo number_format($row['unit_price']) ?></td>
                        </tr>
                        <?php endwhile;endif; ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-lightblue">
                            <tr>
                                <th class="p-1 text-right" colspan="7">Sub Total</th>
                                <th class="p-1 text-right" id="sub_total"><?php echo number_format($sub_total) ?></th>
                            </tr>
                            <tr>
                                <th class="p-1 text-right" colspan="7">Tax Inclusive (<?php echo isset($tax_percentage) ? $tax_percentage : 0 ?>%)</th>
                                <th class="p-1 text-right"><?php echo isset($tax_amount) ? number_format($tax_amount) : 0 ?></th>
                            </tr>
                            <tr>
                                <th class="p-1 text-right" colspan="7">Total</th>
                                <th class="p-1 text-right" id="total"><?php echo isset($tax_amount) ? number_format($sub_total ) : 0 ?></th>
                            </tr>
                        </tr>
                    </tfoot>
                </table>
                <div class="row">
                    <div class="col-6">
                        <label for="businesshead_name" class="control-label">Business Head Name :</label>
                        <?php echo isset($businesshead_name) ? $businesshead_name : '' ?>
                    </div>
                    <div class="col-6">
                        <label for="accountshead_name" class="control-label">Accounts Head Name :</label>
                        <?php echo isset($accountshead_name) ? $accountshead_name : '' ?>
                    </div>
                   
                    
                    
                    <div class="col-md-6">
                        <div id="accordion" class="my-2">
                            <div class="card bg-modal box-shadow">
                                <button class="btn  text-left collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTrue" id="headingTwo">
                                Business Head Comments
                                </button>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" style>
                                    <div class="card-body ">
                                        <p class="text-justify"><?php echo isset($notes2) ? $notes2 : '' ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div id="accordion" class="my-2">
                            <div class="card bg-modal box-shadow">
                                <button class="btn  text-left collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTrue" id="headingTwo">
                                Business Team Comments
                                </button>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" style>
                                    <div class="card-body ">
                                        <p class="text-justify"><?php echo isset($notes6) ? $notes6 : '' ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div id="accordion2" class="my-2">
                            <div class="card bg-modal box-shadow">
                                <button class="btn  text-left collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapsesix" id="headingSix">
                                Accounts Head Comments
                                </button>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion2" style>
                                    <div class="card-body ">
                                        <p class="text-justify"><?php echo isset($notes3) ? $notes3 : '' ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div id="accordion3" class="my-2">
                            <div class="card bg-modal box-shadow">
                                <button class="btn  text-left collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven" id="headingSeven">
                                Accounts Team Comments
                                </button>
                                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion3" style>
                                    <div class="card-body ">
                                        <p class="text-justify"><?php echo isset($notes4) ? $notes4 : '' ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="accordion4" class="my-2">
                            <div class="card bg-modal box-shadow">
                                <button class="btn  text-left collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight" id="headingEight">
                                Director Comment
                                </button>
                                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion4" style>
                                    <div class="card-body ">
                                        <p class="text-justify"><?php echo isset($notes5) ? $notes5 : '' ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="accordion4" class="my-2">
                            <!-- <div class="card bg-modal box-shadow">
                                <button class="btn  text-left collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="headingone">
                                Pending
                                </button>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style>
                                    <div class="card-body ">
                                        <p class="text-justify"><?php echo isset($notes) ? $notes : '' ?></p>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    
                    <div class="col-6">
                        <label for="status" class="control-label">PO Status :</label>
                        
                        <?php
							switch ($status) {
										
								case 'Expired':
                                    echo "<span class='py-0 px-1 btn-flat btn-secondary'>Expired</span>";
                                    break;  		
								case 'Active':
									echo '<span class="badge badge-success">Active</span>';
									break;
								// case 'Expired':
								// 	echo '<span class="badge badge-danger">Expired</span>';
								// 	break;
                                // case 'Rejected':
                                //     echo "<span class='py-0 px-1 btn-flat btn-danger'>Rejected</span>";
                                //     break;
								}
							?>	
                        
                    </div>
                    <div class="col-6">
                        <label for="project_type" class="control-label">Project Type :</label>
                        
                        <?php
							switch ($project_type) {
								
								case 'POC':
									echo '<span class="badge badge-secondary">POC</span>';
									break;
								}
							?>	
                        
                    </div>
                    <div class="col-6">
                        <label for="bhead_approval" class="control-label">Business Head Approved :</label>
                        
                        <?php
							switch ($bhead_approval) {
								case 'Approved':
                                    echo '<span class="badge badge-success">Approved</span>';
                                    break;
                                case 'Pending':
                                    echo '<span class="badge badge-secondary"Eight>Pending</span>';
                                    break;
								}
							?>	
                        
                    </div>
                    <div class="col-6">
                        <label for="invoice" class="control-label">Invoice Raised  :</label>
                        
                        <?php
							switch ($invoice) {
								case 'Not Selected':
                                    echo '<span class="badge badge-secondary">Not Selected</span>';
                                    break;		
                                case 'Yes':
                                    echo '<span class="badge badge-success">Yes</span>';
                                    break;
                                case 'No':
                                    echo '<span class="badge badge-secondary">No</span>';
                                    break;	
								}
							?>	
                        
                    </div>
                    <div class="col-6">
                        <label for="ahead_approval" class="control-label">Accounts Head Approved :</label>
                        
                        <?php
							switch ($ahead_approval) {
								case 'Approved':
                                    echo '<span class="badge badge-success">Approved</span>';
                                    break;
                                case 'Pending':
                                    echo '<span class="badge badge-secondary"Eight>Pending</span>';
                                    break;
								}
							?>	
                        
                    </div>
                    <div class="col-6">
                        <label for="payment" class="control-label">Payment Released :</label>
                        
                        <?php
							switch ($payment) {
								case 'Done':
                                    echo '<span class="badge badge-success">Done</span>';
                                    break;
                                case 'Pending':
                                    echo '<span class="badge badge-secondary"Eight>Pending</span>';
                                    break;
								}
							?>	
                        
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
<table class="d-none" id="item-clone">
	<tr class="po-item" data-id="">
		<td class="align-middle p-1 text-center">
			<button class="btn btn-sm btn-danger py-0" type="button" onclick="rem_item($(this))"><i class="fa fa-times"></i></button>
		</td>
		<!-- <td class="align-middle p-0 text-center">
			<input type="number" class="text-center w-100 border-0" step="any" name="quantity"/>
		</td> -->
		<td class="align-middle p-1">
			<input type="text" class="text-center w-100 border-0" name="unit[]"/>
		</td>
		<td class="align-middle p-1">
			<input type="hidden" name="item_id[]">
			<input type="text" class="text-center w-100 border-0 item_id" required/>
		</td>
		<td class="align-middle p-1 item-description"></td>
        <td class="align-middle p-1 item-rm_client"></td>
		<td class="align-middle p-1">
			<input type="number" step="any" class="text-center w-100 border-0" name="unit_price[]" value="0"/>
		</td>
		<td class="align-middle p-1 text-center total-price">0</td>
	</tr>
</table>
<script>
	$(function(){
        $('#print').click(function(e){
            e.preventDefault();
            start_loader();
            var _h = $('head').clone()
            var _p = $('#out_print').clone()
            var _el = $('<div>')
                _p.find('thead th').attr('style','color:black !important')
                _el.append(_h)
                _el.append(_p)
                
            var nw = window.open("","","width=1200,height=950")
                nw.document.write(_el.html())
                nw.document.close()
                setTimeout(() => {
                    nw.print()
                    setTimeout(() => {
                        end_loader();
                        nw.close()
                    }, 300);
                }, 200);
        })
    })
</script>