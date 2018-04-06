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

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL
?>

<?php

// PURPOSE: SETTING BASIC DASHBOARDS
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-12

function Display_Report_Table_Basic($Dashboard_Array){ ?>

<br>

<?php // CONNECT TO MYSQL DATABASE

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "password";
$Database_Name = Return_Database($Dashboard_Array['MySQL_Table']);

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection->connect_error) {die("Connection failed: " . $MySQL_Connection->connect_error);} 

?>


<?php // EXTRACT COLUMN DATA TO VARIABLE

//$Column_Data;
$Table_Name = substr(str_replace("FROM ","",$Dashboard_Array['MySQL_Table']),0,-1);
$i = 0;

$MySQL_Command_Script = "SELECT COLUMN_NAME, DATA_TYPE 
FROM INFORMATION_SCHEMA.COLUMNS
WHERE `TABLE_SCHEMA`='{$Database_Name}' 
AND `TABLE_NAME`='{$Table_Name}';";

$MySQL_Result = $MySQL_Connection->query($MySQL_Command_Script);

if ($MySQL_Result->num_rows > 0) {

while($row = $MySQL_Result->fetch_assoc()) {
$Column_Data[$i]['Name'] = $row['COLUMN_NAME'];
$Column_Data[$i]['Type'] = $row['DATA_TYPE'];
$i = $i + 1;
}	
} else {

}
// var_dump($Column_Data);
?>


<?php // EXTRACT DATABASE DATA TO VARIABLE

// ADDING A DELETE FILTER TO QUERY
$Deleted_Item_Inset = "";	
if($Dashboard_Array['Include_Deleted_Items']=="No"){
$Deleted_Item_Inset = " AND ( `Deleted Date` > '".date('Y-m-d')."'
OR `Deleted Date` = '' 
OR `Deleted Date` IS NULL) ";		
}	

$i = 0;

$MySQL_Command_Script = 
$Dashboard_Array['MySQL_Action'].
$Dashboard_Array['MySQL_Table'].
$Dashboard_Array['MySQL_Filter'].$Deleted_Item_Inset.
$Dashboard_Array['MySQL_Order'].
$Dashboard_Array['MySQL_Limit'].
$Dashboard_Array['MySQL_Offset'];

$MySQL_Result = $MySQL_Connection->query($MySQL_Command_Script);

if ($MySQL_Result->num_rows > 0) {

while($row = $MySQL_Result->fetch_assoc()) {

for ($x = 0; $x <= count($Column_Data); $x++) {
if(isset($Column_Data[$x]['Name'])){
$Extracted_Data[$i][$Column_Data[$x]['Name']] = $row[$Column_Data[$x]['Name']];
}
} 
$i = $i + 1;
}	
} else {
echo "0 results";
}

//echo $MySQL_Command_Script;	

?>


<?php

$MySQL_Connection->close();

?>


<?php // GET TABLE NAME ONLY

$Table_Name = str_replace("FROM","",$Dashboard_Array['MySQL_Table']);
$Table_Name = str_replace(" ","",$Table_Name);

?>


<?php // INCLUDED DELETE ITEM NOTIFICATION
$Deleted_Item_Heading_Inset = "";
if($Dashboard_Array['Include_Deleted_Items']=="Yes"){$Deleted_Item_Heading_Inset = " *";}
?>


<table class="Report_Content_Table">
<?php // COLUMN WIDTH FORMATTING

for ($x = 0; $x < count($Dashboard_Array['Column_Spacing']); $x++) {
if(isset($Dashboard_Array['Column_Spacing'][$x])){
echo "<col width=\"".$Dashboard_Array['Column_Spacing'][$x]."\">";
}else{
echo "<col width=\"*\">";
}
}

?>


<tr>
<td class="Report_Main_Heading_Cell" colspan="<?php echo count($Dashboard_Array['Displayed_Columns']); ?>">
<?php echo $Dashboard_Array['Title'].$Deleted_Item_Heading_Inset; ?></td>		
</tr>


<?php if(isset($Extracted_Data)){ ?>

<?php // COLUMN HEADINGS

echo "<tr>";
$i = 0;
foreach ($Dashboard_Array['Displayed_Columns'] as &$value) {	
echo "<td class=\"Report_Main_SubHeading_Cell\" >".$Dashboard_Array['Column_Headings'][$i]."</td>";
$i = $i + 1;	
}
echo "</tr>";

?>

<?php // COLUMN DATA
	
$Column_Sum = null;
	
for ($x = 0; $x < count($Extracted_Data); $x++) {
	
echo "<tr>";
$i = 0;
	
foreach ($Dashboard_Array['Displayed_Columns'] as &$value) {
if($x==0){$Column_Sum[$i]=0;} 																									// Set default values for summing array
echo "<td class=\"Report_Main_Value_Cell\" >".$Extracted_Data[$x][$value]."</td>";												// Display current value
if(is_numeric($Extracted_Data[$x][$value])){$Column_Sum[$i] = $Column_Sum[$i] + $Extracted_Data[$x][$value];}					// Add current value to cumulative value
$i = $i + 1;
}
echo "</tr>";

}} 

?>


<?php // TOTAL ROW

if(count($Dashboard_Array['Sum_Columns'])>0){
echo "<tr>";
$i = 0;
foreach ($Dashboard_Array['Displayed_Columns'] as &$value) {

if (in_array($value, $Dashboard_Array['Sum_Columns'])) {
if(strpos($Dashboard_Array['Column_Headings'][$i], 'Cost') !== false){$Total_Value =  number_format($Column_Sum[$i], 2, '.', ' ');}else{$Total_Value =  $Column_Sum[$i];}
echo "<td class=\"Report_Main_Value_Cell\" >".$Total_Value."</td>";	
}else{
echo "<td class=\"Report_Main_Empty_Cell\" ></td>";	
}
$i = $i + 1;
}
echo "</tr>";
}

?>


</table>


<?php } ?>
