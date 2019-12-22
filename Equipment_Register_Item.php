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
// PAGE CREATED DATE: 2018-03-13

// DATE   		|| NAME 					|| MODIFICATION
// 2018-03-13 	|| Phillip Kraguljac 		|| Released.
// 2018-04-07 	|| Phillip Kraguljac 		|| v1.2.
// 2018-04-22 	|| Phillip Kraguljac 		|| Added Risk Database.
// 2019-12-22 	|| Phillip Kraguljac 		|| v1.9.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL

?>


<?php include $_SERVER['DOCUMENT_ROOT'].'/Formats/Basic_Header.php'; ?>


<?php // GET INCOMING DATA

$ID=null; if(isset($_GET['ID'])){$ID=$_GET['ID'];}

?>


<?php // BASIC MENU V1.1

$Input_Array['Heading'] = "TOOLS";

$Input_Array['ID'] = $ID;

$Input_Array['Item_Description'] = array(
"Risk Assessment Tool [under construction]"

);

$Input_Array['Item_Link'] = array(
"Risk_Checklist.php"
);

Display_Menu_Items($Input_Array); // <<< RESOURCE 0001

?>


<?php // BASIC MENU V1.1

$Input_Array['Heading'] = "REPORTS";

$Input_Array['ID'] = $ID;

$Input_Array['Item_Description'] = array(
"Risk Assessment Report [under construction]"

);

$Input_Array['Item_Link'] = array(
"Reports/Risk_Assessment_Hazard_Report.php"
);

Display_Menu_Items($Input_Array); // <<< RESOURCE 0001

?>


<?php // BASIC INPUT V1.0

$Input_Array['Title'] = "EQUIPMENT REGISTER ITEM";
$Input_Array['Dashboard_Indetifier'] = "I001";
$Input_Array['ID'] = $ID;

$Input_Array['Column_Headings'] = array(
"ID",
"Name",
"Manufacturer",
"Manufacturer Model",
"Introduced into Service Date",
"Last Modified Date",
"Last Modified Time",
"Last Modified by User",
"Deleted Date"
);

$Input_Array['Displayed_Columns'] = array(
"ID",
"Name",
"Manufacturer",
"Manufacturer Model",
"Introduced into Service Date",
"Last Modified Date",
"Last Modified Time",
"Last Modified by User",
"Deleted Date"
);

$Input_Array['Highlight_Columns'] = array(null, null, null, null, null, null, null, null, null);

$Input_Array['MySQL_Action'] = "SELECT * ";
$Input_Array['MySQL_Table'] = "FROM Equipment_Register ";
$Input_Array['MySQL_Filter'] = "WHERE `ID` = {$ID} ";
$Input_Array['MySQL_Order'] = "";
$Input_Array['MySQL_Limit'] = "LIMIT 1";
$Input_Array['MySQL_Offset'] = "";

Display_Input_Basic($Input_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "DOCUMENT(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D001";
$Dashboard_Array['Item_Link'] = "Document_Record_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Description", "Type", "Status"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Description", "Type", "Status"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array(null, null);

$Dashboard_Array['New_Item_Link_Headings'] = array("Equipment_Register_ID");
$Dashboard_Array['New_Item_Link_Values'] = array("{$ID}");

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Document_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Equipment Register ID` = '{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "No";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "SERVICE(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D002";
$Dashboard_Array['Item_Link'] = "Service_Register_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array(null, null);

$Dashboard_Array['New_Item_Link_Headings'] = array("Equipment_Register_ID");
$Dashboard_Array['New_Item_Link_Values'] = array("{$ID}");

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Service_Register ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Equipment Register ID` = '{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "No";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "WMS(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D003";
$Dashboard_Array['Item_Link'] = "WMS_Register_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array(null, null);

$Dashboard_Array['New_Item_Link_Headings'] = array("Equipment_Register_ID");
$Dashboard_Array['New_Item_Link_Values'] = array("{$ID}");

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM WMS_Register ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Equipment Register ID` = '{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "No";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "LUBRICANT(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D004";
$Dashboard_Array['Item_Link'] = "Lubricant_Register_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array(null, null);

$Dashboard_Array['New_Item_Link_Headings'] = array("Equipment_Register_ID");
$Dashboard_Array['New_Item_Link_Values'] = array("{$ID}");

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Lubricant_Register ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Equipment Register ID` = '{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "No";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "TRACKABLE PART(S) DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D005";
$Dashboard_Array['Item_Link'] = "Part_Register_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Description"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array(null, null);

$Dashboard_Array['New_Item_Link_Headings'] = array("Equipment_Register_ID");
$Dashboard_Array['New_Item_Link_Values'] = array("{$ID}");

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Part_Register ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Equipment Register ID` = '{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "No";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "TASK(S)";
$Dashboard_Array['Dashboard_Indentifier'] = "D006";
$Dashboard_Array['Item_Link'] = "Task_Record_Item.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Task Description", "Status"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Task Description", "Status"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array();

$Dashboard_Array['New_Item_Link_Headings'] = array("Equipment_Register_ID");
$Dashboard_Array['New_Item_Link_Values'] = array("{$ID}");

$Dashboard_Array['Include_Warnings'] = "Yes";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Task_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `ID` IS NOT NULL AND `Equipment Register ID` = '{$ID}'";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "Yes";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.5

$Dashboard_Array['Title'] = "RISK(S)";
$Dashboard_Array['Dashboard_Indentifier'] = "D007";
$Dashboard_Array['Item_Link'] = "Risk_Record_Item.php";
$Dashboard_Array['Item_Link_Concurrent'] = "&Equipment_Register_ID={$ID}";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID", "Description", "Status"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Description", "Status"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array();

$Dashboard_Array['New_Item_Link_Headings'] = array("Equipment_Register_ID");
$Dashboard_Array['New_Item_Link_Values'] = array("{$ID}");

$Dashboard_Array['Include_Warnings'] = "Yes";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Risk_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `ID` IS NOT NULL AND `Equipment Register ID` = '{$ID}'";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "LIMIT {$Dashboard_Array['Dashboard_Limit']} ";
$Dashboard_Array['MySQL_Offset'] = "OFFSET {$Dashboard_Array['Dashboard_Offset']}";

$Dashboard_Array['Display_Item_Photos'] = "Yes";
$Dashboard_Array['Allow_New_Items'] = "Yes";
$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Dashboard_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php Display_Item_Page_Legend(); ?>


<?php include $_SERVER['DOCUMENT_ROOT'].'/Formats/Basic_Footer.php'; ?>