<?php
require_once('../config.php');
Class Master extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
	function capture_err(){
		if(!$this->conn->error)
			return false;
		else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			return json_encode($resp);
			exit;
		}
	}
	function save_client(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				$v = addslashes(trim($v));
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `client_list` where REPLACE(`name`, ' ','') = REPLACE('{$name}',' ','') ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Client already exist.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `client_list` set {$data} ";
			$save = $this->conn->query($sql);
		}else{
			$sql = "UPDATE `client_list` set {$data} where id = '{$id}' ";
			$save = $this->conn->query($sql);
		}
		if($save){
			$resp['status'] = 'success';
			if(empty($id))
				$this->settings->set_flashdata('success',"New Client successfully saved.");
			else
				$this->settings->set_flashdata('success',"Client successfully updated.");
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		return json_encode($resp);
	}
	function delete_client(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `client_list` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',"Client successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	// for fc projects
	function save_project(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id','description'))){
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(isset($_POST['description'])){
			if(!empty($data)) $data .=",";
				$data .= " `description`='".addslashes(htmlentities($description))."' ";
		}
		$check = $this->conn->query("SELECT * FROM `project_list` where `name` = '{$name}' ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Project Name already exist.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `project_list` set {$data} ";
		}else{
			$sql = "UPDATE `project_list` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if($save){
			$resp['status'] = 'success';
			if(empty($id))
				$this->settings->set_flashdata('success',"New Project successfully saved.");
			else
				$this->settings->set_flashdata('success',"Project successfully updated.");
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		return json_encode($resp);
	}

	// for tnm projects
	function save_tnmproject(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id','description'))){
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(isset($_POST['description'])){
			if(!empty($data)) $data .=",";
				$data .= " `description`='".addslashes(htmlentities($description))."' ";
		}
		$check = $this->conn->query("SELECT * FROM `tnm_project_list` where `name` = '{$name}' ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Project Name already exist.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `tnm_project_list` set {$data} ";
		}else{
			$sql = "UPDATE `tnm_project_list` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if($save){
			$resp['status'] = 'success';
			if(empty($id))
				$this->settings->set_flashdata('success',"New Project successfully saved.");
			else
				$this->settings->set_flashdata('success',"Project successfully updated.");
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		return json_encode($resp);
	}


	// for mixed projects
	function save_mixedproject(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id','description'))){
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(isset($_POST['description'])){
			if(!empty($data)) $data .=",";
				$data .= " `description`='".addslashes(htmlentities($description))."' ";
		}
		$check = $this->conn->query("SELECT * FROM `mixed_project_list` where `name` = '{$name}' ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Project Name already exist.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `mixed_project_list` set {$data} ";
		}else{
			$sql = "UPDATE `mixed_project_list` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if($save){
			$resp['status'] = 'success';
			if(empty($id))
				$this->settings->set_flashdata('success',"New Project successfully saved.");
			else
				$this->settings->set_flashdata('success',"Project successfully updated.");
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		return json_encode($resp);
	}

	//for poc project

	function save_pocproject(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id','description'))){
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(isset($_POST['description'])){
			if(!empty($data)) $data .=",";
				$data .= " `description`='".addslashes(htmlentities($description))."' ";
		}
		$check = $this->conn->query("SELECT * FROM `poc_project_list` where `name` = '{$name}' ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Project Name already exist.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `poc_project_list` set {$data} ";
		}else{
			$sql = "UPDATE `poc_project_list` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if($save){
			$resp['status'] = 'success';
			if(empty($id))
				$this->settings->set_flashdata('success',"New Project successfully saved.");
			else
				$this->settings->set_flashdata('success',"Project successfully updated.");
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		return json_encode($resp);
	}

	// for fc projects

	function delete_project(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `project_list` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',"Project successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}

// for tnm projects 
function delete_tnmproject(){
	extract($_POST);
	$del = $this->conn->query("DELETE FROM `tnm_project_list` where id = '{$id}'");
	if($del){
		$resp['status'] = 'success';
		$this->settings->set_flashdata('success',"Project successfully deleted.");
	}else{
		$resp['status'] = 'failed';
		$resp['error'] = $this->conn->error;
	}
	return json_encode($resp);

}


// for mixed projects 
function delete_mixedproject(){
	extract($_POST);
	$del = $this->conn->query("DELETE FROM `mixed_project_list` where id = '{$id}'");
	if($del){
		$resp['status'] = 'success';
		$this->settings->set_flashdata('success',"Project successfully deleted.");
	}else{
		$resp['status'] = 'failed';
		$resp['error'] = $this->conn->error;
	}
	return json_encode($resp);

}


//for poc project

function delete_pocproject(){
	extract($_POST);
	$del = $this->conn->query("DELETE FROM `poc_project_list` where id = '{$id}'");
	if($del){
		$resp['status'] = 'success';
		$this->settings->set_flashdata('success',"Project successfully deleted.");
	}else{
		$resp['status'] = 'failed';
		$resp['error'] = $this->conn->error;
	}
	return json_encode($resp);

}


// for fc projects


	function search_projects(){
		extract($_POST);
		$qry = $this->conn->query("SELECT * FROM project_list where `name` LIKE '%{$q}%'");
		$data = array();
		while($row = $qry->fetch_assoc()){
			$data[] = array("label"=>$row['name'],"id"=>$row['id'],"description"=>$row['description']);
		}
		return json_encode($data);
	}

	//for tnm projects

	function search_tnmprojects(){
		extract($_POST);
		$qry = $this->conn->query("SELECT * FROM tnm_project_list where `name` LIKE '%{$q}%'");
		$data = array();
		while($row = $qry->fetch_assoc()){
			$data[] = array("label"=>$row['name'],"id"=>$row['id'],"description"=>$row['description']);
		}
		return json_encode($data);
	}

	//for mixed projects

	function search_mixedprojects(){
		extract($_POST);
		$qry = $this->conn->query("SELECT * FROM mixed_project_list where `name` LIKE '%{$q}%'");
		$data = array();
		while($row = $qry->fetch_assoc()){
			$data[] = array("label"=>$row['name'],"id"=>$row['id'],"description"=>$row['description']);
		}
		return json_encode($data);
	}

	//for poc project

	function search_pocprojects(){
		extract($_POST);
		$qry = $this->conn->query("SELECT * FROM poc_project_list where `name` LIKE '%{$q}%'");
		$data = array();
		while($row = $qry->fetch_assoc()){
			$data[] = array("label"=>$row['name'],"id"=>$row['id'],"description"=>$row['description']);
		}
		return json_encode($data);
	}


// for fc projects

	function save_po(){
		//echo "<pre>";print_r($_POST);die();
		extract($_POST);
		//echo "<pre>";print_r($milestone_no);die();
		$data = "";
		foreach($_POST as $k =>$v){
			if(in_array($k,array('discount_amount','tax_amount')))
				$v= str_replace(',','',$v);
			if(!in_array($k,array('id','po_no')) && !is_array($_POST[$k])){
				$v = addslashes(trim($v));
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(!empty($po_no)){
			$check = $this->conn->query("SELECT * FROM `po_list` where `po_no` = '{$po_no}' ".($id > 0 ? " and id != '{$id}' ":""))->num_rows;
			if($this->capture_err())
				return $this->capture_err();
			if($check > 0){
				$resp['status'] = 'po_failed';
				$resp['msg'] = "Purchase Order Number already exist.";
				return json_encode($resp,true);
				exit;
			}
		}else{
			$po_no ="";
			while(true){
				$po_no = "TEMP-".(sprintf("%'.011d", mt_rand(1,99999999999)));
				$check = $this->conn->query("SELECT * FROM `po_list` where `po_no` = '{$po_no}'")->num_rows;
				if($check <= 0)
				break;
			}
		}
		$data .= ", po_no = '{$po_no}' ";
		//echo "<pre>";print_r($data);die();
		if(empty($id)){
			$sql = "INSERT INTO `po_list` set {$data} ";
		}else{

			//..............................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................echo "<pre>";print_r($_POST);die();
			$no = count($milestone_no);
	
			$sql1 = "DELETE FROM milestone_tablefc  where po_id = '{$id}' ";
			 $result1 = $this->conn->query($sql1);
			
			 	
			  for($i=0; $i<$no; $i++)
                                                {   
			
			    $po_id =$_POST['id'];
			    $milestone_no =$_POST['milestone_no'][$i];
			    $milestone_name = $_POST['milestone_name'][$i];
			    $m_percent = $_POST['m_percent'][$i];
			    $m_description = $_POST['m_description'][$i];
			    $m_startdate = $_POST['m_startdate'][$i];
			    $m_enddate = $_POST['m_enddate'][$i];
			    $milestone_comments = $_POST['milestone_comments'][$i];
			    $invoice = $_POST['m_invoice'][$i];
			    $billable = $_POST['billable'][$i];
			    $po_value = $_POST['po_value'][$i];
			                            //'seo_id ' => $seo_id,
			  $sql = "INSERT INTO milestone_tablefc(po_id,milestone_no,milestone_name,m_percent,m_description,m_startdate,m_enddate,milestone_comments,invoice,billable,po_value) VALUES ('{$po_id}','{$milestone_no}','{$milestone_name}','{$m_percent}','{$m_description}','{$m_startdate}','{$m_enddate}','{$milestone_comments}','{$invoice}','{$billable}','{$po_value}')";
                              	
		
			$save = $this->conn->query($sql);
			}
			////.............................................................
		
			$sql = "UPDATE `po_list` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if($save){
			$resp['status'] = 'success';
			$id = empty($id) ? $this->conn->insert_id : $id ;
			$resp['id'] = $id;
			$data = "";
		
			if(empty($id))
				$this->settings->set_flashdata('success',"Purchase Order successfully saved.");
			else
				$this->settings->set_flashdata('success',"Purchase Order successfully updated.");
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		echo json_encode($resp,true);
	}

// for tnm projects

function save_tnmpo(){
	//echo "<pre>";print_r($_POST);die();
	extract($_POST);
	$data = "";
	foreach($_POST as $k =>$v){
		if(in_array($k,array('discount_amount','tax_amount')))
			$v= str_replace(',','',$v);
		if(!in_array($k,array('id','po_no')) && !is_array($_POST[$k])){
			$v = addslashes(trim($v));
			if(!empty($data)) $data .=",";
			$data .= " `{$k}`='{$v}' ";
		}
	}
	if(!empty($po_no)){
		$check = $this->conn->query("SELECT * FROM `tnm_po_list` where `po_no` = '{$po_no}' ".($id > 0 ? " and id != '{$id}' ":""))->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'po_failed';
			$resp['msg'] = "Purchase Order Number already exist.";
			return json_encode($resp);
			exit;
		}
	}else{
		$po_no ="";
		while(true){
			$po_no ="TEMP-".(sprintf("%'.011d", mt_rand(1,99999999999)));
			$check = $this->conn->query("SELECT * FROM `tnm_po_list` where `po_no` = '{$po_no}'")->num_rows;
			if($check <= 0)
			break;
		}
	}
	$data .= ", po_no = '{$po_no}' ";

	if(empty($id)){
		//echo "<pre>";print_r($_POST);die();
		$sql = "INSERT INTO `tnm_po_list` set {$data} ";
	}else{
		
			$no = count($resource_count);
	
			$sql1 = "DELETE FROM resource_table  where po_id = '{$id}' ";
			 $result1 = $this->conn->query($sql1);
			
			 	
			  for($i=0; $i<$no; $i++)
                                                {   
			
			    $po_id =$_POST['id'];
			    $resource_count =$_POST['resource_count'][$i];
			    $resource_level = $_POST['resource_level'][$i];
			    $resource_name = $_POST['resource_name'][$i];
			    $r_startdate = $_POST['r_startdate'][$i];
			    $r_enddate = $_POST['r_enddate'][$i];
			    $monthly_billing = $_POST['monthly_billing'][$i];
			    $per_resourcecount = $_POST['per_resourcecount'][$i];
			    
			                            //'seo_id ' => $seo_id,
			  $sql = "INSERT INTO resource_table(po_id,resource_count,resource_level,resource_name,r_startdate,r_enddate,monthly_billing,per_resourcecount) VALUES ('{$po_id}','{$resource_count}','{$resource_level}','{$resource_name}','{$r_startdate}','{$r_enddate}','{$monthly_billing}','{$per_resourcecount}')";
                              	
		       // echo $sql	;die();
		
			$save = $this->conn->query($sql);
			}
			////.............................................................
		
			$sql = "UPDATE `tnm_po_list` set {$data} where id = '{$id}' ";



	}
	$save = $this->conn->query($sql);
	if($save){
		$resp['status'] = 'success';
		$id = empty($id) ? $this->conn->insert_id : $id ;
		$resp['id'] = $id;
		$data = "";
	
		if(empty($id))
			$this->settings->set_flashdata('success',"Purchase Order successfully saved.");
		else
			$this->settings->set_flashdata('success',"Purchase Order successfully updated.");
	}else{
		$resp['status'] = 'failed';
		$resp['err'] = $this->conn->error."[{$sql}]";
	}
	return json_encode($resp);
}


//for mixed

function save_mixedpo(){
	extract($_POST);
	$data = "";
	foreach($_POST as $k =>$v){
		if(in_array($k,array('discount_amount','tax_amount')))
			$v= str_replace(',','',$v);
		if(!in_array($k,array('id','po_no')) && !is_array($_POST[$k])){
			$v = addslashes(trim($v));
			if(!empty($data)) $data .=",";
			$data .= " `{$k}`='{$v}' ";
		}
	}
	if(!empty($po_no)){
		$check = $this->conn->query("SELECT * FROM `mixed_po_list` where `po_no` = '{$po_no}' ".($id > 0 ? " and id != '{$id}' ":""))->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'po_failed';
			$resp['msg'] = "Purchase Order Number already exist.";
			return json_encode($resp);
			exit;
		}
	}else{
		$po_no ="";
		while(true){
			$po_no = "TEMP-".(sprintf("%'.011d", mt_rand(1,99999999999)));
			$check = $this->conn->query("SELECT * FROM `mixed_po_list` where `po_no` = '{$po_no}'")->num_rows;
			if($check <= 0)
			break;
		}
	}
	$data .= ", po_no = '{$po_no}' ";

	if(empty($id)){
		$sql = "INSERT INTO `mixed_po_list` set {$data} ";
	}else{
		$sql = "UPDATE `mixed_po_list` set {$data} where id = '{$id}' ";
	}
	$save = $this->conn->query($sql);
	if($save){
		$resp['status'] = 'success';
		$id = empty($id) ? $this->conn->insert_id : $id ;
		$resp['id'] = $id;
		$data = "";
		// foreach($item_id as $k =>$v){
		// 	if(!empty($data)) $data .=",";
		// 	$data .= "('{$po_id}','{$v}','{$unit[$k]}','{$unit_price[$k]}','{$qty[$k]}')";
		// }
		// if(!empty($data)){
		// 	$this->conn->query("DELETE FROM `order_items` where po_id = '{$po_id}'");
		// 	$save = $this->conn->query("INSERT INTO `order_items` (`po_id`,`item_id`,`unit`,`unit_price`,`quantity`) VALUES {$data} ");
		// }
		if(empty($id))
			$this->settings->set_flashdata('success',"Purchase Order successfully saved.");
		else
			$this->settings->set_flashdata('success',"Purchase Order successfully updated.");
	}else{
		$resp['status'] = 'failed';
		$resp['err'] = $this->conn->error."[{$sql}]";
	}
	return json_encode($resp);
}


//for poc 

function save_pocpo(){
	extract($_POST);
	$data = "";
	foreach($_POST as $k =>$v){
		if(in_array($k,array('discount_amount','tax_amount')))
			$v= str_replace(',','',$v);
		if(!in_array($k,array('id','po_no')) && !is_array($_POST[$k])){
			$v = addslashes(trim($v));
			if(!empty($data)) $data .=",";
			$data .= " `{$k}`='{$v}' ";
		}
	}
	if(!empty($po_no)){
		$check = $this->conn->query("SELECT * FROM `poc_po_list` where `po_no` = '{$po_no}' ".($id > 0 ? " and id != '{$id}' ":""))->num_rows;
		if($this->capture_err())
			return $this->capture_err();
		if($check > 0){
			$resp['status'] = 'po_failed';
			$resp['msg'] = "Purchase Order Number already exist.";
			return json_encode($resp);
			exit;
		}
	}else{
		$po_no ="";
		while(true){
			$po_no = "TEMP-".(sprintf("%'.011d", mt_rand(1,99999999999)));
			$check = $this->conn->query("SELECT * FROM `poc_po_list` where `po_no` = '{$po_no}'")->num_rows;
			if($check <= 0)
			break;
		}
	}
	$data .= ", po_no = '{$po_no}' ";

	if(empty($id)){
		$sql = "INSERT INTO `poc_po_list` set {$data} ";
	}else{
		$sql = "UPDATE `poc_po_list` set {$data} where id = '{$id}' ";
	}
	$save = $this->conn->query($sql);
	if($save){
		$resp['status'] = 'success';
		$id = empty($id) ? $this->conn->insert_id : $id ;
		$resp['id'] = $id;
		$data = "";
		// foreach($item_id as $k =>$v){
		// 	if(!empty($data)) $data .=",";
		// 	$data .= "('{$po_id}','{$v}','{$unit[$k]}','{$unit_price[$k]}','{$qty[$k]}')";
		// }
		// if(!empty($data)){
		// 	$this->conn->query("DELETE FROM `order_items` where po_id = '{$po_id}'");
		// 	$save = $this->conn->query("INSERT INTO `order_items` (`po_id`,`item_id`,`unit`,`unit_price`,`quantity`) VALUES {$data} ");
		// }
		if(empty($id))
			$this->settings->set_flashdata('success',"Purchase Order successfully saved.");
		else
			$this->settings->set_flashdata('success',"Purchase Order successfully updated.");
	}else{
		$resp['status'] = 'failed';
		$resp['err'] = $this->conn->error."[{$sql}]";
	}
	return json_encode($resp);
}



// for fc projects

	function delete_po(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `po_list` where unit_id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',"Purchase Order successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}

// for tnm projects

function delete_tnmpo(){
	extract($_POST);
	$del = $this->conn->query("DELETE FROM `tnm_po_list` where unit_id = '{$id}'");
	if($del){
		$resp['status'] = 'success';
		$this->settings->set_flashdata('success',"Purchase Order successfully deleted.");
	}else{
		$resp['status'] = 'failed';
		$resp['error'] = $this->conn->error;
	}
	return json_encode($resp);

}

// for mixed projects

function delete_mixedpo(){
	extract($_POST);
	$del = $this->conn->query("DELETE FROM `mixed_po_list` where unit_id = '{$id}'");
	if($del){
		$resp['status'] = 'success';
		$this->settings->set_flashdata('success',"Purchase Order successfully deleted.");
	}else{
		$resp['status'] = 'failed';
		$resp['error'] = $this->conn->error;
	}
	return json_encode($resp);

}

//for poc 

function delete_pocpo(){
	extract($_POST);
	$del = $this->conn->query("DELETE FROM `poc_po_list` where unit_id = '{$id}'");
	if($del){
		$resp['status'] = 'success';
		$this->settings->set_flashdata('success',"Purchase Order successfully deleted.");
	}else{
		$resp['status'] = 'failed';
		$resp['error'] = $this->conn->error;
	}
	return json_encode($resp);

}


// for fc projects

	function get_price(){
		extract($_POST);
		 $qry = $this->conn->query("SELECT * FROM price_list where unit_id = '{$unit_id}'");
		 $this->capture_err();
		 if($qry->num_rows > 0){
			 $res = $qry->fetch_array();
			 switch($rent_type){
				 case '1':
					$resp['price'] = $res['monthly'];
					break;
				case '2':
					$resp['price'] = $res['quarterly'];
					break;
				case '3':
					$resp['price'] = $res['annually'];
					break;
			 }
		 }else{
			 $resp['price'] = "0";
		 }
		 return json_encode($resp);
	}

// for tnm projects

function get_tnmprice(){
	extract($_POST);
	 $qry = $this->conn->query("SELECT * FROM tnm_price_list where unit_id = '{$unit_id}'");
	 $this->capture_err();
	 if($qry->num_rows > 0){
		 $res = $qry->fetch_array();
		 switch($rent_type){
			 case '1':
				$resp['price'] = $res['monthly'];
				break;
			case '2':
				$resp['price'] = $res['quarterly'];
				break;
			case '3':
				$resp['price'] = $res['annually'];
				break;
		 }
	 }else{
		 $resp['price'] = "0";
	 }
	 return json_encode($resp);
}


//for mixed

function get_mixedprice(){
	extract($_POST);
	 $qry = $this->conn->query("SELECT * FROM mixed_price_list where unit_id = '{$unit_id}'");
	 $this->capture_err();
	 if($qry->num_rows > 0){
		 $res = $qry->fetch_array();
		 switch($rent_type){
			 case '1':
				$resp['price'] = $res['monthly'];
				break;
			case '2':
				$resp['price'] = $res['quarterly'];
				break;
			case '3':
				$resp['price'] = $res['annually'];
				break;
		 }
	 }else{
		 $resp['price'] = "0";
	 }
	 return json_encode($resp);
}

//for poc

function get_pocprice(){
	extract($_POST);
	 $qry = $this->conn->query("SELECT * FROM poc_price_list where unit_id = '{$unit_id}'");
	 $this->capture_err();
	 if($qry->num_rows > 0){
		 $res = $qry->fetch_array();
		 switch($rent_type){
			 case '1':
				$resp['price'] = $res['monthly'];
				break;
			case '2':
				$resp['price'] = $res['quarterly'];
				break;
			case '3':
				$resp['price'] = $res['annually'];
				break;
		 }
	 }else{
		 $resp['price'] = "0";
	 }
	 return json_encode($resp);
}

// for fc projects 

	function save_rent(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id')) && !is_array($_POST[$k])){
				if(!empty($data)) $data .=",";
				$v = addslashes($v);
				$data .= " `{$k}`='{$v}' ";
			}
		}
		switch ($rent_type) {
			case 1:
				$data .= ", `date_end`='".date("Y-m-d",strtotime($date_rented.' +1 month'))."' ";
				break;
			
			case 2:
				$data .= ", `date_end`='".date("Y-m-d",strtotime($date_rented.' +3 month'))."' ";
				break;
			case 3:
				$data .= ", `date_end`='".date("Y-m-d",strtotime($date_rented.' +1 year'))."' ";
				break;
			default:
				# code...
				break;
		}
		if(empty($id)){
			$sql = "INSERT INTO `rent_list` set {$data} ";
		}else{
			$sql = "UPDATE `rent_list` set {$data} where id = '{$id}' ";
		}
		$save = $this->conn->query($sql);
		if($save){
			$resp['status'] = 'success';
			if(empty($id))
				$this->settings->set_flashdata('success',"New PO successfully saved.");
			else
				$this->settings->set_flashdata('success',"PO successfully updated.");
			$this->settings->conn->query("UPDATE `unit_list` set `status` = '{$status}' where id = '{$unit_id}'");
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		return json_encode($resp);
	}

// for tnm projects

function save_tnmrent(){
	extract($_POST);
	$data = "";
	foreach($_POST as $k =>$v){
		if(!in_array($k,array('id')) && !is_array($_POST[$k])){
			if(!empty($data)) $data .=",";
			$v = addslashes($v);
			$data .= " `{$k}`='{$v}' ";
		}
	}
	switch ($rent_type) {
		case 1:
			$data .= ", `date_end`='".date("Y-m-d",strtotime($date_rented.' +1 month'))."' ";
			break;
		
		case 2:
			$data .= ", `date_end`='".date("Y-m-d",strtotime($date_rented.' +3 month'))."' ";
			break;
		case 3:
			$data .= ", `date_end`='".date("Y-m-d",strtotime($date_rented.' +1 year'))."' ";
			break;
		default:
			# code...
			break;
	}
	if(empty($id)){
		$sql = "INSERT INTO `tnm_rent_list` set {$data} ";
	}else{
		$sql = "UPDATE `tnm_rent_list` set {$data} where id = '{$id}' ";
	}
	$save = $this->conn->query($sql);
	if($save){
		$resp['status'] = 'success';
		if(empty($id))
			$this->settings->set_flashdata('success',"New PO successfully saved.");
		else
			$this->settings->set_flashdata('success',"PO successfully updated.");
		$this->settings->conn->query("UPDATE `unit_list` set `status` = '{$status}' where id = '{$unit_id}'");
	}else{
		$resp['status'] = 'failed';
		$resp['err'] = $this->conn->error."[{$sql}]";
	}
	return json_encode($resp);
}

//for mixed


function save_mixedrent(){
	extract($_POST);
	$data = "";
	foreach($_POST as $k =>$v){
		if(!in_array($k,array('id')) && !is_array($_POST[$k])){
			if(!empty($data)) $data .=",";
			$v = addslashes($v);
			$data .= " `{$k}`='{$v}' ";
		}
	}
	switch ($rent_type) {
		case 1:
			$data .= ", `date_end`='".date("Y-m-d",strtotime($date_rented.' +1 month'))."' ";
			break;
		
		case 2:
			$data .= ", `date_end`='".date("Y-m-d",strtotime($date_rented.' +3 month'))."' ";
			break;
		case 3:
			$data .= ", `date_end`='".date("Y-m-d",strtotime($date_rented.' +1 year'))."' ";
			break;
		default:
			# code...
			break;
	}
	if(empty($id)){
		$sql = "INSERT INTO `mixed_rent_list` set {$data} ";
	}else{
		$sql = "UPDATE `mixed_rent_list` set {$data} where id = '{$id}' ";
	}
	$save = $this->conn->query($sql);
	if($save){
		$resp['status'] = 'success';
		if(empty($id))
			$this->settings->set_flashdata('success',"New PO successfully saved.");
		else
			$this->settings->set_flashdata('success',"PO successfully updated.");
		$this->settings->conn->query("UPDATE `unit_list` set `status` = '{$status}' where id = '{$unit_id}'");
	}else{
		$resp['status'] = 'failed';
		$resp['err'] = $this->conn->error."[{$sql}]";
	}
	return json_encode($resp);
}

//for poc

function save_pocrent(){
	extract($_POST);
	$data = "";
	foreach($_POST as $k =>$v){
		if(!in_array($k,array('id')) && !is_array($_POST[$k])){
			if(!empty($data)) $data .=",";
			$v = addslashes($v);
			$data .= " `{$k}`='{$v}' ";
		}
	}
	switch ($rent_type) {
		case 1:
			$data .= ", `date_end`='".date("Y-m-d",strtotime($date_rented.' +1 month'))."' ";
			break;
		
		case 2:
			$data .= ", `date_end`='".date("Y-m-d",strtotime($date_rented.' +3 month'))."' ";
			break;
		case 3:
			$data .= ", `date_end`='".date("Y-m-d",strtotime($date_rented.' +1 year'))."' ";
			break;
		default:
			# code...
			break;
	}
	if(empty($id)){
		$sql = "INSERT INTO `poc_rent_list` set {$data} ";
	}else{
		$sql = "UPDATE `poc_rent_list` set {$data} where id = '{$id}' ";
	}
	$save = $this->conn->query($sql);
	if($save){
		$resp['status'] = 'success';
		if(empty($id))
			$this->settings->set_flashdata('success',"New PO successfully saved.");
		else
			$this->settings->set_flashdata('success',"PO successfully updated.");
		$this->settings->conn->query("UPDATE `unit_list` set `status` = '{$status}' where id = '{$unit_id}'");
	}else{
		$resp['status'] = 'failed';
		$resp['err'] = $this->conn->error."[{$sql}]";
	}
	return json_encode($resp);
}

// for fc projects

	function delete_rent(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `po_list` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',"PO successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}

// for tnm projects
function delete_tnmrent(){
	extract($_POST);
	$del = $this->conn->query("DELETE FROM `tnm_po_list` where id = '{$id}'");
	if($del){
		$resp['status'] = 'success';
		$this->settings->set_flashdata('success',"PO successfully deleted.");
	}else{
		$resp['status'] = 'failed';
		$resp['error'] = $this->conn->error;
	}
	return json_encode($resp);

}


// for mixed projects


function delete_mixedrent(){
	extract($_POST);
	$del = $this->conn->query("DELETE FROM `mixed_po_list` where id = '{$id}'");
	if($del){
		$resp['status'] = 'success';
		$this->settings->set_flashdata('success',"PO successfully deleted.");
	}else{
		$resp['status'] = 'failed';
		$resp['error'] = $this->conn->error;
	}
	return json_encode($resp);

}

//for poc 

function delete_pocrent(){
	extract($_POST);
	$del = $this->conn->query("DELETE FROM `poc_po_list` where id = '{$id}'");
	if($del){
		$resp['status'] = 'success';
		$this->settings->set_flashdata('success',"PO successfully deleted.");
	}else{
		$resp['status'] = 'failed';
		$resp['error'] = $this->conn->error;
	}
	return json_encode($resp);

}






	function delete_img(){
		extract($_POST);
		if(is_file($path)){
			if(unlink($path)){
				$resp['status'] = 'success';
			}else{
				$resp['status'] = 'failed';
				$resp['error'] = 'failed to delete '.$path;
			}
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = 'Unkown '.$path.' path';
		}
		return json_encode($resp);
	}

// for fc projects

	function renew_rent(){
		extract($_POST);
		$qry = $this->conn->query("SELECT * FROM `rent_list` where id ='{$id}'");
		$res = $qry->fetch_array();
		switch ($res['rent_type']) {
			case 1:
				$date_end = " `date_end`='".date("Y-m-d",strtotime($res['date_end'].' +1 month'))."' ";
				break;
			case 2:
				$date_end = " `date_end`='".date("Y-m-d",strtotime($res['date_end'].' +3 month'))."' ";
				break;
			case 3:
				$date_end = " `date_end`='".date("Y-m-d",strtotime($res['date_end'].' +1 year'))."' ";
				break;
			default:
				# code...
				break;
		}
		$update = $this->conn->query("UPDATE `rent_list` set {$date_end}, date_rented = date_end where id = '{$id}' ");
		if($update){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Rent successfully renewed.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}

// for tnm projects

function renew_tnmrent(){
	extract($_POST);
	$qry = $this->conn->query("SELECT * FROM `tnm_rent_list` where id ='{$id}'");
	$res = $qry->fetch_array();
	switch ($res['rent_type']) {
		case 1:
			$date_end = " `date_end`='".date("Y-m-d",strtotime($res['date_end'].' +1 month'))."' ";
			break;
		case 2:
			$date_end = " `date_end`='".date("Y-m-d",strtotime($res['date_end'].' +3 month'))."' ";
			break;
		case 3:
			$date_end = " `date_end`='".date("Y-m-d",strtotime($res['date_end'].' +1 year'))."' ";
			break;
		default:
			# code...
			break;
	}
	$update = $this->conn->query("UPDATE `tnm_rent_list` set {$date_end}, date_rented = date_end where id = '{$id}' ");
	if($update){
		$resp['status'] = 'success';
		$this->settings->set_flashdata('success'," Rent successfully renewed.");
	}else{
		$resp['status'] = 'failed';
		$resp['error'] = $this->conn->error;
	}
	return json_encode($resp);
}



// for mixed projects

function renew_mixedrent(){
	extract($_POST);
	$qry = $this->conn->query("SELECT * FROM `mixed_rent_list` where id ='{$id}'");
	$res = $qry->fetch_array();
	switch ($res['rent_type']) {
		case 1:
			$date_end = " `date_end`='".date("Y-m-d",strtotime($res['date_end'].' +1 month'))."' ";
			break;
		case 2:
			$date_end = " `date_end`='".date("Y-m-d",strtotime($res['date_end'].' +3 month'))."' ";
			break;
		case 3:
			$date_end = " `date_end`='".date("Y-m-d",strtotime($res['date_end'].' +1 year'))."' ";
			break;
		default:
			# code...
			break;
	}
	$update = $this->conn->query("UPDATE `mixed_rent_list` set {$date_end}, date_rented = date_end where id = '{$id}' ");
	if($update){
		$resp['status'] = 'success';
		$this->settings->set_flashdata('success'," Rent successfully renewed.");
	}else{
		$resp['status'] = 'failed';
		$resp['error'] = $this->conn->error;
	}
	return json_encode($resp);
}


//for poc

function renew_pocrent(){
	extract($_POST);
	$qry = $this->conn->query("SELECT * FROM `poc_rent_list` where id ='{$id}'");
	$res = $qry->fetch_array();
	switch ($res['rent_type']) {
		case 1:
			$date_end = " `date_end`='".date("Y-m-d",strtotime($res['date_end'].' +1 month'))."' ";
			break;
		case 2:
			$date_end = " `date_end`='".date("Y-m-d",strtotime($res['date_end'].' +3 month'))."' ";
			break;
		case 3:
			$date_end = " `date_end`='".date("Y-m-d",strtotime($res['date_end'].' +1 year'))."' ";
			break;
		default:
			# code...
			break;
	}
	$update = $this->conn->query("UPDATE `poc_rent_list` set {$date_end}, date_rented = date_end where id = '{$id}' ");
	if($update){
		$resp['status'] = 'success';
		$this->settings->set_flashdata('success'," Rent successfully renewed.");
	}else{
		$resp['status'] = 'failed';
		$resp['error'] = $this->conn->error;
	}
	return json_encode($resp);
}


}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'save_client':
		echo $Master->save_client();
	break;
	case 'delete_client':
		echo $Master->delete_client();
	break;
	case 'save_project':
		echo $Master->save_project();
	break;
	case 'save_tnmproject':
		echo $Master->save_tnmproject();
	break;
	case 'save_mixedproject':
		echo $Master->save_mixedproject();
	break;
	case 'save_pocproject':
		echo $Master->save_pocproject();
	break;
	case 'delete_project':
		echo $Master->delete_project();
	break;
	case 'delete_tnmproject':
		echo $Master->delete_tnmproject();
	break;
	case 'delete_mixedproject':
		echo $Master->delete_mixedproject();
	break;
	case 'delete_pocproject':
		echo $Master->delete_pocproject();
	break;
	// case 'search_items':
	// 	echo $Master->search_projects();
	// break;
	case 'search_tnmitems':
		echo $Master->search_tnmprojects();
	break;
	case 'search_mixeditems':
		echo $Master->search_mixedprojects();
	break;
	case 'search_pocitems':
		echo $Master->search_pocprojects();
	break;
	case 'save_po':
		echo $Master->save_po();
	break;
	case 'save_tnmpo':
		echo $Master->save_tnmpo();
	break;
	case 'save_mixedpo':
		echo $Master->save_mixedpo();
	break;
	case 'save_pocpo':
		echo $Master->save_pocpo();
	break;
	case 'delete_po':
		echo $Master->delete_po();
	break;
	case 'delete_tnmpo':
		echo $Master->delete_tnmpo();
	break;
	case 'delete_mixedpo':
		echo $Master->delete_mixedpo();
	break;
	case 'delete_pocpo':
		echo $Master->delete_pocpo();
	break;
	case 'get_price':
		echo $Master->get_price();
		break;
	case 'get_tnmprice':
		echo $Master->get_tnmprice();
		break;
		case 'get_mixedprice':
			echo $Master->get_mixedprice();
			break;
			case 'get_pocprice':
				echo $Master->get_pocprice();
				break;
	case 'save_rent':
		echo $Master->save_rent();
	break;
	case 'save_tnmrent':
		echo $Master->save_tnmrent();
	break;
	case 'save_mixedrent':
		echo $Master->save_mixedrent();
	break;
	case 'save_pocrent':
		echo $Master->save_pocrent();
	break;
	case 'delete_rent':
		echo $Master->delete_rent();
	break;
	case 'delete_tnmrent':
		echo $Master->delete_tnmrent();
	break;
	case 'delete_mixedrent':
		echo $Master->delete_mixedrent();
	break;
	case 'delete_pocrent':
		echo $Master->delete_pocrent();
	break;
	case 'renew_rent':
		echo $Master->renew_rent();
	break;
	case 'renew_tnmrent':
		echo $Master->renew_tnmrent();
	break;
	case 'renew_mixedrent':
		echo $Master->renew_mixedrent();
	break;
	case 'renew_pocrent':
		echo $Master->renew_pocrent();
	break;
	
	default:
		// echo $sysset->index();
		break;
}