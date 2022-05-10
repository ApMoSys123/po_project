<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/
// Database Connection
require("db_connection.php");

// get Client List
// $query = "SELECT * FROM project_list";
$query = "SELECT po.project_name, po.client_id, pl.department, po.rm_apmosys, pl.rm_client, pl.department_head, pl.rmclient_contact, pl.rmclient_email, pl.rmclient_location, pl.pdate_created, pl.pstartdate, pl.penddate, pl.pstatus, po.project_type, po.businesshead_name, po.bhead_approval, pl.businesshead_comment, pl.businessteam_comment, pl.rmgteam_comment, pl.otteam_comment, po.accountshead_name, pl.director_comment, pl.rmg_verified, pl.dept_verified, po.ahead_approval, pl.bill, po.po_no, po.date_created, po.date_updated, po.startdate, po.enddate, pl.resourcecount, pl.resourcename, po.m_percent, po.milestone_name, po.m_description, po.m_startdate, po.m_enddate, pl.m_otstatus, pl.m_comments,po.businessteam_comments, po.businesshead_comments, po.accountshead_comments, po.accountsteam_comments, po.director_comments,  po.status, po.milestone_comments, po.billable, po.po_value, po.tax_percentage, po.tax_amount, po.consumed, po.balance, po.invoice, po.payment FROM po_list po inner join project_list pl on po.id = pl.name";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

$project_list = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $project_list[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=fc_purchase_order.csv');
$output = fopen('php://output', 'w');
// fputcsv($output, array('id', 'name', 'type','RM ApMoSys', 'RM Client','Client ID', 'department', 'status', 'rmg_verified', 'dept_verified', 'acc_verified', 'date_created', 'start_date', 'end_date', 'rmclient_contact', 'rmclient_email', 'rmclient_location'));
fputcsv($output, array('Project Name', 'Client Name', 'Department', 'RM Apmosys', 'RM Client', 'Department Head', 'Client Contact No.', 'Client Email', 'Client Location', 'Project Date Created', 'Project Start Date', 'Project Enddate', 'Project Status', 'Project Type', 'Business Head Name', 'Business Head Approval', 'Business Head Comment', 'Business Team Comment', 'Rmg Team Comment', 'Ot Team Comment', 'Accounts Head Name', 'Director Comment', 'Rmg Head Verfiied', 'Department Head Verified', 'Account Head Approval', 'Billable/Non Billable', 'Po Number', 'Po Date Created', 'Po Date Updated', 'Po Start Date', 'Po End Date', 'Resource Count', 'Resource Names', 'Milestone Percent', 'Milestone Name', 'Milestone Description','Mlestone Startdate', 'Milestone Enddate', 'Milestone Status', 'Milestone OT Comments', 'Business Team Comments', 'Business Head Comments', 'Account Head Comments', 'Account_Team Comment', 'Director Comments', 'Po Status', 'Milestone Comments', 'Milestone Billable', 'PO_Value', 'Tax Percent', 'Tax Amount', 'Amount Consumed', 'Balance Amount', 'Invoice Raised', 'Payment Done'));
if (count($project_list) > 0) {
    foreach ($project_list as $row) {
        fputcsv($output, $row);
    }
}
?>