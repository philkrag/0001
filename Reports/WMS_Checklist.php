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
// PAGE CREATED DATE: 2018-04-17

// DATE   		|| NAME 					|| MODIFICATION
// 2018-03-13 	|| Phillip Kraguljac 		|| Released.
// 2018-04-07 	|| Phillip Kraguljac 		|| Updated - v1.2.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL
?>


<?php include $_SERVER['DOCUMENT_ROOT'].'/Formats/Report_Header.php'; ?>


<?php // GET INCOMING DATA

$ID=null; if(isset($_GET['ID'])){$ID=$_GET['ID'];}

?>


<?php // BASIC REPORT ITEM V1.0

$Input_Array['Title'] = "WMS CHECKLIST";
$Input_Array['ID'] = $ID;

$Input_Array['Column_Headings'] = array(
"ID",
"Description",
"Status"
);

$Input_Array['Displayed_Columns'] = array(
"ID",
"Description",
"Status"
);

$Input_Array['Highlight_Columns'] = array(null, null);

$Input_Array['MySQL_Action'] = "SELECT * ";
$Input_Array['MySQL_Table'] = "FROM WMS_Register ";
$Input_Array['MySQL_Filter'] = "WHERE `ID` = {$ID} ";
$Input_Array['MySQL_Order'] = "";
$Input_Array['MySQL_Limit'] = "LIMIT 1";
$Input_Array['MySQL_Offset'] = "";

Display_Report_Item_Basic($Input_Array); // <<< RESOURCE 0001

?>


<?php // BASIC REPORT TABLE V1.1

$Dashboard_Array['Title'] = "PROCEDURE(S)";

$Dashboard_Array['Column_Headings'] = array("Step", "Quick Reference", "Details"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("Step", "Quick Reference", "Details"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Column_Spacing'] = array("50px", "30%", "*");
$Dashboard_Array['Highlight_Columns'] = array();
$Dashboard_Array['Sum_Columns'] = array();

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Procedure_Record ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `WMS Register ID` = {$ID} ";
$Dashboard_Array['MySQL_Order'] = "";
$Dashboard_Array['MySQL_Limit'] = "";
$Dashboard_Array['MySQL_Offset'] = "";

$Dashboard_Array['Include_Deleted_Items'] = "No";

Display_Report_Table_Basic($Dashboard_Array); // <<< RESOURCE 0001

?>


<br>
<table class="Report_Content_Table">
<col width="40%">
<col width="40%">
<col width="*">

<tr>
<td class="Report_Main_Sign_Cell">Completed By:</td>
<td class="Report_Main_Sign_Cell">Signature:</td>
<td class="Report_Main_Sign_Cell">Date:</td>
</tr>

</table>


<?php include $_SERVER['DOCUMENT_ROOT'].'/Formats/Report_Footer.php'; ?>