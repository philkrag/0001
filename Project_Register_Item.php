<?php
// /////////////////////////////////////////////////////////////////////// COPYRIGHT NOTICE

// This file is part of Pip-Project Portal.

// Pip-Project Portal is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

// Pip-Project Portal is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// You should have received a copy of the GNU General Public License
// along with Pip-Project.  If not, see <http://www.gnu.org/licenses/>.

// /////////////////////////////////////////////////////////////////////// COPYRIGHT NOTICE

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL

// PAGE CREATED BY: Phillip Kraguljac
// PAGE CREATED DATE: 2018-03-27

// DATE   		|| NAME 					|| MODIFICATION
// 2018-03-13 	|| Phillip Kraguljac 		|| Released.
// 2018-04-07 	|| Phillip Kraguljac 		|| Updated - v1.2.
// 2018-04-22 	|| Phillip Kraguljac 		|| Changed risk dashboard new item setting - Yes.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL
?>


<?php include $_SERVER['DOCUMENT_ROOT'].'/Formats/Basic_Header.php'; ?>


<?php // GET INCOMING DATA

$ID=null; if(isset($_GET['ID'])){$ID=$_GET['ID'];}

?>


<?php // BASIC MENU V1.0

$Input_Array['ID'] = $ID;

$Input_Array['Item_Description'] = array(
"Project Scope Report",
"Change Order Form",
"Budget Breakdown",
"Work Breakdown",
"Issue Management Report",
"Communication Management Report",
"Task(s) Report",
"Cost Evaluation Report",
"Stakeholder Management Report",
"Accountability Report"

);

$Input_Array['Item_Link'] = array(
"Reports/Project_Scope_Report.php",
"Reports/Project_Change_Control_Report.php",
"Reports/Project_Budget_Breakdown_Report.php",
"Reports/Project_Work_Breakdown_Report.php",
"Reports/Project_Issue_Management_Report.php",
"Reports/Project_Communication_Management_Report.php",
"Reports/Project_Task_Report.php",
"Reports/Project_Cost_Evaluation_Report.php",
"Reports/Project_Stakeholder_Management.php",
"Reports/Project_Accountability_Report.php"
);

Display_Menu_Items($Input_Array); // <<< RESOURCE 0001

?>


<?php // BASIC INPUT V1.0

$Input_Array['Title'] = "PROJECT REGISTER ITEM";
$Input_Array['Dashboard_Indetifier'] = "I001";
$Input_Array['ID'] = $ID;

$Input_Array['Column_Headings'] = array(
"ID",
"Description",
"Status",
"Determined Personnel Risk",
"Determined Equipment Risk",
"Priority",
"Identified Date",
"Actual Start Date",
"Required Completion Date",
"Actual Completion Date",
"Completed By",
"Last Modified Date",
"Last Modified Time",
"Last Modified by User",
"Deleted Date"
);

$Input_Array['Displayed_Columns'] = array(
"ID",
"Description",
"Status",
"Determined Personnel Risk",
"Determined Equipment Risk",
"Priority",
"Identified Date",
"Required Completion Date",
"Actual Completion Date",
"Completed By",
"Last Modified Date",
"Last Modified Time",
"Last Modified by User",
"Deleted Date"
);

$Input_Array['Highlight_Columns'] = array(null, null);

$Input_Array['MySQL_Action'] = "SELECT * ";
$Input_Array['MySQL_Table'] = "FROM Project_Register ";
$Input_Array['MySQL_Filter'] = "WHERE `ID` = {$ID} ";
$Input_Array['MySQL_Order'] = "";
$Input_Array['MySQL_Limit'] = "LIMIT 1";
$Input_Array['MySQL_Offset'] = "";

Display_Input_Basic($Input_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "OBJECTIVE(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D001";
$Dashboard_Array['Item_Link'] = "Objective_Record_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array();

$Dashboard_Array['New_Item_Link_Headings'] = array("Project Register ID");
$Dashboard_Array['New_Item_Link_Values'] = array($ID);

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Objective_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Project Register ID` ='{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "No";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "DELIVERABLE(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D002";
$Dashboard_Array['Item_Link'] = "Deliverable_Record_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array();

$Dashboard_Array['New_Item_Link_Headings'] = array("Project Register ID");
$Dashboard_Array['New_Item_Link_Values'] = array($ID);

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Deliverable_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Project Register ID` ='{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "No";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "SPECIFICATION(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D003";
$Dashboard_Array['Item_Link'] = "Specification_Record_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array();

$Dashboard_Array['New_Item_Link_Headings'] = array("Project Register ID");
$Dashboard_Array['New_Item_Link_Values'] = array($ID);

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Specification_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Project Register ID` ='{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "No";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "QUAILITY ASSURANCE(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D004";
$Dashboard_Array['Item_Link'] = "Quality_Record_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array();

$Dashboard_Array['New_Item_Link_Headings'] = array("Project Register ID");
$Dashboard_Array['New_Item_Link_Values'] = array($ID);

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Quality_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Project Register ID` ='{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "No";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "STAKEHOLDER(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D005";
$Dashboard_Array['Item_Link'] = "Stakeholder_Record_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "First Name", "Last Name"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "First Name", "Last Name"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array();

$Dashboard_Array['New_Item_Link_Headings'] = array("Project Register ID");
$Dashboard_Array['New_Item_Link_Values'] = array($ID);

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Stakeholder_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Project Register ID` ='{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "No";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "COMMUNICATION PLAN(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D006";
$Dashboard_Array['Item_Link'] = "Communication_Register_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array();

$Dashboard_Array['New_Item_Link_Headings'] = array("Project Register ID");
$Dashboard_Array['New_Item_Link_Values'] = array($ID);

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Communication_Register ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Project Register ID` ='{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "No";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "RISK(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D007";
$Dashboard_Array['Item_Link'] = "Risk_Record_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array();

$Dashboard_Array['New_Item_Link_Headings'] = array("Project Register ID");
$Dashboard_Array['New_Item_Link_Values'] = array($ID);

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Risk_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Project Register ID` ='{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "No";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "APPROVAL(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D008";
$Dashboard_Array['Item_Link'] = "Approval_Record_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Status", "Required Completion Date"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Status", "Required Completion Date"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array();

$Dashboard_Array['New_Item_Link_Headings'] = array("Project Register ID");
$Dashboard_Array['New_Item_Link_Values'] = array($ID);

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Approval_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Project Register ID` ='{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "No";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "ISSUE(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D009";
$Dashboard_Array['Item_Link'] = "Issue_Record_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Description", "Status"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Description", "Status"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array();

$Dashboard_Array['New_Item_Link_Headings'] = array("Project Register ID");
$Dashboard_Array['New_Item_Link_Values'] = array($ID);

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Issue_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Project Register ID` ='{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "No";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "OBSTACLES(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D010";
$Dashboard_Array['Item_Link'] = "Obstacle_Record_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array();

$Dashboard_Array['New_Item_Link_Headings'] = array("Project Register ID");
$Dashboard_Array['New_Item_Link_Values'] = array($ID);

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Obstacle_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Project Register ID` ='{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "No";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "TASK(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D011";
$Dashboard_Array['Item_Link'] = "Task_Record_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Task Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Task Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array();

$Dashboard_Array['New_Item_Link_Headings'] = array("Project Register ID");
$Dashboard_Array['New_Item_Link_Values'] = array($ID);

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Task_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Project Register ID` ='{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "Yes";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "OUTCOME(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D012";
$Dashboard_Array['Item_Link'] = "Outcome_Record_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array();

$Dashboard_Array['New_Item_Link_Headings'] = array("Project Register ID");
$Dashboard_Array['New_Item_Link_Values'] = array($ID);

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Outcome_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Project Register ID` ='{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "No";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php Display_Item_Page_Legend(); ?>


<?php include $_SERVER['DOCUMENT_ROOT'].'/Formats/Basic_Footer.php'; ?>