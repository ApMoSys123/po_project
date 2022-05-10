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
$query = "SELECT poc.pname, poc.client_id, pl.department, poc.rm_apmosys, pl.rm_client, pl.department_head, pl.rmclient_contact, pl.rmclient_email, pl.rmclient_location, pl.pdate_created, pl.pstartdate, pl.penddate, pl.pstatus, poc.project_type, poc.businesshead_name, poc.bhead_approval, pl.businesshead_comment, pl.businessteam_comment, pl.rmgteam_comment, pl.otteam_comment, poc.accountshead_name, pl.director_comment, pl.rmg_verified, pl.dept_verified, poc.ahead_approval, pl.bill, poc.po_no, poc.date_created, poc.date_updated, poc.startdate, poc.enddate, pl.resourcecount, pl.resourcename, poc.m_percent, poc.unit, poc.m_description, poc.m_startdate, poc.m_enddate, pl.m_otstatus, pl.m_comments, poc.notes2, poc.notes3, poc.notes4, poc.notes5,  poc.status, poc.unit_price, poc.tax_percentage, poc.tax_amount, poc.invoice, poc.payment FROM poc_po_list poc inner join poc_project_list pl on poc.id = pl.name";
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
header('Content-Disposition: attachment; filename=poc_purchase_order.csv');
$output = fopen('php://output', 'w');
// fputcsv($output, array('id', 'name', 'type','RM ApMoSys', 'RM Client','Client ID', 'department', 'status', 'rmg_verified', 'dept_verified', 'acc_verified', 'date_created', 'start_date', 'end_date', 'rmclient_contact', 'rmclient_email', 'rmclient_location'));
fputcsv($output, array('Project Name', 'Client Name', 'Department', 'RM Apmosys', 'RM Client', 'Department Head', 'Client Contact No.', 'Client Email', 'Client Location', 'Project Date Created', 'Project Start Date', 'Project Enddate', 'Project Status', 'Project Type', 'Business Head Name', 'Business Head Approval', 'Business Head Comment', 'Business Team Comment', 'Rmg Team Comment', 'Ot Team Comment', 'Accounts Head Name', 'Director Comment', 'Rmg Head Verfiied', 'Department Head Verified', 'Account Head Approval', 'Billable/Non Billable', 'Po Number', 'Po Date Created', 'Po Date Updated', 'Po Start Date', 'Po End Date', 'Resource Count', 'Resource Names', 'Milestone Percent', 'Milestone Name', 'Milestone Description','Mlestone Startdate', 'Milestone Enddate', 'Milestone Status', 'Milestone OT Comments', 'Business Head Comments', 'Account Head Comments', 'Account_Team Comment', 'Director Comments', 'Po Status', 'Total Amount', 'Tax Percent', 'Tax Amount', 'Invoice Raised', 'Payment Done'));
if (count($project_list) > 0) {
    foreach ($project_list as $row) {
        fputcsv($output, $row);
    }
}
?>