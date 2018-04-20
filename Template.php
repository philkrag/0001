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
// 2018-04-07 	|| Phillip Kraguljac 		|| Updated - v1.2.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL
?>


<?php include $_SERVER['DOCUMENT_ROOT'].'/Formats/Basic_Header.php'; ?>


<?php // GET INCOMING DATA

$ID=null; if(isset($_GET['ID'])){$ID=$_GET['ID'];}

?>


<?php // BASIC INPUT V1.0

$Input_Array['Title'] = "TEST INPUTS";
$Input_Array['Dashboard_Indetifier'] = "I001";
$Input_Array['ID'] = $ID;

$Input_Array['Column_Headings'] = array("ID label", "Last Modified Date", "Deleted Date");
$Input_Array['Displayed_Columns'] = array("ID", "Last Modified Date", "Deleted Date");
$Input_Array['Highlight_Columns'] = array(null, null);

$Input_Array['MySQL_Action'] = "SELECT * ";
$Input_Array['MySQL_Table'] = "FROM Task_Records ";
$Input_Array['MySQL_Filter'] = "WHERE `ID` = {$ID} ";
$Input_Array['MySQL_Order'] = "";
$Input_Array['MySQL_Limit'] = "LIMIT 1";
$Input_Array['MySQL_Offset'] = "";

Display_Input_Basic($Input_Array); // <<< RESOURCE 0001

?>


<?php // BASIC DASHBOARD V1.4

$Dashboard_Array['Title'] = "TEST DASHBOARD";
$Dashboard_Array['Dashboard_Indentifier'] = "D001";
$Dashboard_Array['Item_Link'] = "test.php";
$Dashboard_Array['Dashboard_Offset'] = Retrieve_Offset($_GET, $Dashboard_Array['Dashboard_Indentifier']); // <<< RESOURCE 0002
$Dashboard_Array['Dashboard_Limit'] = 5;

$Dashboard_Array['Column_Headings'] = array("ID label", "BT label"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Displayed_Columns'] = array("ID", "Basic Text"); // Recommended x3 minimum (when images used).
$Dashboard_Array['Highlight_Columns'] = array(null, null);

$Dashboard_Array['New_Item_Link_Headings'] = array();
$Dashboard_Array['New_Item_Link_Values'] = array();

$Dashboard_Array['Include_Warnings'] = "No";

$Dashboard_Array['MySQL_Action'] = "SELECT * ";
$Dashboard_Array['MySQL_Table'] = "FROM Task_Records ";
$Dashboard_Array['MySQL_Filter'] = "WHERE `ID` IS NOT NULL ";
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