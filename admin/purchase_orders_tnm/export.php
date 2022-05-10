<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/
// Database Connection
require("db_connection.php");

// get Client List
// $query = "SELECT * FROM tnm_project_list";
// $query = "SELECT tpl.name, tpo.client_id, tpl.department, tpl.rm_client, tpl.description, tpl.teamlead, tpl.department_head, tpl.tpdate_created, tpl.tpstartdate, tpl.tpenddate, tpl.tp_status, tpl.type, tpl.comments, tpl.rmg_verified, tpl.dept_verified, tpl.acc_verified, tpl.bill, tpo.po_no, tpo.date_created, tpo.date_updated, tpo.startdate, tpo.enddate, toi.quantity, tpl.rmclient_contact, tpl.rmclient_email, tpl.rmclient_location, tpl.milestone, toi.unit, tpo.request, toi.unit_price, tpo.tax_percentage, tpo.tax_amount, tpo.notes, tpo.remarks FROM tnm_po_list tpo inner join  tnm_project_list tpl on tpo.client_id = tpl.client_id inner join tnm_order_items toi on tpo.id=toi.po_id";
$query = "SELECT tpo.project_name, tpo.client_id, tpl.department, tpl.department_head, tpl.teamlead, tpo.rm_apmosys, tpl.rm_client, tpl.rmclient_contact, tpl.rmclient_email, tpl.rmclient_location, tpl.tpdate_created, tpl.tpstartdate, tpl.tpenddate, tpl.tp_status, tpo.project_type, tpo.businesshead_name, tpo.bhead_approval, tpl.businesshead_comment, tpl.businessteam_comment, tpl.rmgteam_comment, tpl.otteam_comment, tpo.accountshead_name, tpl.director_comment, tpl.rmg_verified, tpl.dept_verified, tpo.ahead_approval, tpl.bill, tpo.po_no, tpo.date_created, tpo.date_updated, tpo.startdate, tpo.enddate, tpo.businesshead_comments, tpo.accountshead_comments, tpo.accountsteam_comments, tpo.director_comments,  tpo.status, tpo.invoice, tpo.payment FROM tnm_po_list tpo inner join tnm_project_list tpl on tpo.id = tpl.name";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

$tnm_project_list = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $tnm_project_list[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=tnm_purchase_order.csv');
$output = fopen('php://output', 'w');
// fputcsv($output, array('project id', 'project name', 'project type','RM ApMoSys', 'RM Client','Client ID', 'department', 'project status', 'rmg_verified', 'dept_verified', 'acc_verified', 'date_created', 'start_date', 'end_date', 'rmclient_contact', 'rmclient_email', 'rmclient_location', 'team lead'));
fputcsv($output, array('Project Name', 'Client Name', 'Department', 'Department Head', 'Team Lead', 'RM Apmosys', 'RM Client', 'Client Contact No.', 'Client Email', 'Client Location', 'Project Date Created', 'Project Start Date', 'Project Enddate', 'Project Status', 'Project Type', 'Business Head Name', 'Business Head Approval', 'Business Head Comments', 'Business Team Comment', 'Rmg Team Comment', 'Ot Team Comment', 'Accounts Head Name', 'Director Comment', 'Rmg Head Verfiied', 'department Head Verified', 'Account Head Approval', 'Billable/NonHBillable', 'Po Number', 'Po Date Created', 'Po Date Updated', 'Po Start Date', 'Po End Date', 'Business Head Comments', 'Account Head Comments', 'Account Team Comment', 'Director Comments', 'Po Status', 'Invoice Raised', 'Payment Done'));
if (count($tnm_project_list) > 0) {
    foreach ($tnm_project_list as $row) {
        fputcsv($output, $row);
    }
}
?>