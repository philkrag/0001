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
// PAGE CREATED DATE: 2019-12-21

// DATE   		|| NAME 					|| MODIFICATION
// 2019-12-21 	|| Phillip Kraguljac 		|| v1.9.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL
?>


<?php include $_SERVER['DOCUMENT_ROOT'].'/Formats/Report_Header.php'; ?>


<?php // GET INCOMING DATA

$ID=null; if(isset($_GET['ID'])){$ID=$_GET['ID'];}

?>


<?php // BASIC REPORT ITEM V1.0

$Input_Array['Title'] = "EQUIPMENT REGISTER ITEM";
$Input_Array['Dashboard_Indetifier'] = "I001";
$Input_Array['ID'] = $ID;

$Input_Array['Column_Headings'] = array(
"ID",
"Name",
"Manufacturer",
"Manufacturer Model",
"Introduced into Service Date"
);

$Input_Array['Displayed_Columns'] = array(
"ID",
"Name",
"Manufacturer",
"Manufacturer Model",
"Introduced into Service Date"
);

$Input_Array['Highlight_Columns'] = array(null, null, null, null, null, null, null, null, null);

$Input_Array['MySQL_Action'] = "SELECT * ";
$Input_Array['MySQL_Table'] = "FROM Equipment_Register ";
$Input_Array['MySQL_Filter'] = "WHERE `ID` = {$ID} ";
$Input_Array['MySQL_Order'] = "";
$Input_Array['MySQL_Limit'] = "LIMIT 1";
$Input_Array['MySQL_Offset'] = "";

Display_Report_Item_Basic($Input_Array); // <<< RESOURCE 0001

?>


<?php // BASIC REPORT TABLE V1.1

$Dashboard_Array['Title'] = "ORIGINAL RISK ASSESSMENT";

$Dashboard_Array['Column_Headings'] = array(
"Risk ID", 
"Description", 
"FE",
"DE",
"PO",
"PA",
"CI",
"CD"


); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array(
"ID", 
"Description", 
"Original Risk - Frequency of Exposure",
"Original Risk - Duration of Exposure",
"Original Risk - Probability of Occurrence",
"Original Risk - Possibility of Avoidance",
"Original Risk - Consequence Injury",
"Original Risk - Consequence Damage"

); // Recommended x3 minimum (when images used).
$Dashboard_Array['Column_Spacing'] = array("80px", "*", "10%", "10%", "10%", "10%", "10%", "10%");
$Dashboard_Array['Highlight_Columns'] = array();
$Dashboard_Array['Sum_Columns'] = array();

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Risk_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Equipment Register ID` = '{$ID}'";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "";
$Dashboard_Array['MySQL_Offset'] = "";

$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Report_Table_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC REPORT TABLE V1.1

$Dashboard_Array['Title'] = "CONTROL METHOD(S)";

$Dashboard_Array['Column_Headings'] = array("Control ID", "Description", "Linked to Risk ID", "Control Measure Rating"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "ExtData:Control_Register:Control Register ID:Description", "Risk Record ID", "ExtData:Control_Register:Control Register ID:Control Measure Rating"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Column_Spacing'] = array("80px", "", "20%", "20%");
$Dashboard_Array['Highlight_Columns'] = array();
$Dashboard_Array['Sum_Columns'] = array();

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Control_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Equipment Register ID` = '{$ID}' ";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "";
$Dashboard_Array['MySQL_Offset'] = "";

$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Report_Table_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php // BASIC REPORT TABLE V1.1

$Dashboard_Array['Title'] = "RESULTING RISK ASSESSMENT";

$Dashboard_Array['Column_Headings'] = array(
"Risk ID", 
"Description", 
"FE",
"DE",
"PO",
"PA",
"CI",
"CD"


); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array(
"ID", 
"DupData:Description", 
"Current Risk - Frequency of Exposure",
"Current Risk - Duration of Exposure",
"Current Risk - Probability of Occurrence",
"Current Risk - Possibility of Avoidance",
"Current Risk - Consequence Injury",
"Current Risk - Consequence Damage"

); // Recommended x3 minimum (when images used).
$Dashboard_Array['Column_Spacing'] = array("80px", "*", "10%", "10%", "10%", "10%", "10%", "10%");
$Dashboard_Array['Highlight_Columns'] = array();
$Dashboard_Array['Sum_Columns'] = array();

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Risk_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `Equipment Register ID` = '{$ID}'";
$Dashboard_Array['MySQL_Order'] = "ORDER BY `ID` ASC ";
$Dashboard_Array['MySQL_Limit'] = "";
$Dashboard_Array['MySQL_Offset'] = "";

$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Report_Table_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<?php include $_SERVER['DOCUMENT_ROOT'].'/Formats/Report_Footer.php'; ?>