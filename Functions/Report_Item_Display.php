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
// PAGE CREATED DATE: 2018-04-01

// DATE   		|| NAME 					|| MODIFICATION
// 2018-03-13 	|| Phillip Kraguljac 		|| Released.
// 2018-04-07 	|| Phillip Kraguljac 		|| Updated - v1.2.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL
?>

<?php

// PURPOSE: DISPLAY BASIC ITEM DATA
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-04-01

function Display_Report_Item_Basic($Input_Array){ ?>


<?php // CONNECT TO MYSQL DATABASE

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "admin";
$Database_Name = Return_Database($Input_Array['MySQL_Table']);

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection->connect_error) {die("Connection failed: " . $MySQL_Connection->connect_error);} 

?>
	
	
<?php // EXTRACT COLUMN DATA TO VARIABLE

//$Column_Data;
$Table_Name = substr(str_replace("FROM ","",$Input_Array['MySQL_Table']),0,-1);
$i = 0;

$MySQL_Command_Script = "SELECT COLUMN_NAME, DATA_TYPE 
FROM INFORMATION_SCHEMA.COLUMNS
WHERE `TABLE_SCHEMA`='{$Database_Name}' 
AND `TABLE_NAME`='{$Table_Name}';";

$result = $MySQL_Connection->query($MySQL_Command_Script);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
$Column_Data[$i]['Name'] = Basic_Filter_Input($row['COLUMN_NAME']);
$Column_Data[$i]['Type'] = Basic_Filter_Input($row['DATA_TYPE']);
$i = $i + 1;
}	
} else {
echo "0 results";
}
// var_dump($Column_Data);
echo "<br>";
?>

	
<?php // EXTRACT DATABASE DATA TO VARIABLE

//$Extracted_Data;
$i = 0;

$MySQL_Command_Script = 
$Input_Array['MySQL_Action'].
$Input_Array['MySQL_Table'].
$Input_Array['MySQL_Filter'].
$Input_Array['MySQL_Order'].
$Input_Array['MySQL_Limit'].
$Input_Array['MySQL_Offset'];

$result = $MySQL_Connection->query($MySQL_Command_Script);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {

for ($x = 0; $x < count($Column_Data); $x++) {
$Extracted_Data[$i][$Column_Data[$x]['Name']] = $row[$Column_Data[$x]['Name']];
} 
$i = $i + 1;
}	
} else {
echo "0 results";
}

//echo $Extracted_Data[0]['Basic Text'];	

?>
	
	
<?php

$MySQL_Connection->close();

?>


<table class="Report_Content_Table">
<col width="300px">
<col width="*">

<tr>
<td class="Report_Main_Heading_Cell" colspan="2">
<?php echo $Input_Array['Title']; ?></td>		
</tr>


<?php for ($x = 0; $x < count($Extracted_Data); $x++) { ?>

<?php 
$i = 0;
//$ID="";
foreach ($Input_Array['Displayed_Columns'] as $key => $value) {

echo "<tr>";
echo "<td class=\"Report_Main_Label_Cell\" ><b>".$Input_Array['Column_Headings'][$i]."</b></td>";
echo "<td class=\"Report_Main_Value_Cell\" >".$Extracted_Data[$x][$value]."</td>";
echo "</tr>";

$i = $i + 1;
}	?>

</table>

<?php } ?>

<?php } ?>