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

<?php

// PURPOSE: SETTING BASIC INPUT PAGES
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-12

function Display_Input_Basic($Input_Array){ ?>


<?php // CONNECT TO MYSQL DATABASE

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "password";
$Database_Name = Return_Database($Input_Array['MySQL_Table']);

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection->connect_error) {die("Connection failed: " . $MySQL_Connection->connect_error);} 

?>
	
	
<?php // EXTRACT COLUMN DATA TO VARIABLE

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

echo "<br>";	

?>
	
	
	
	
<?php // EXTRACT DATABASE DATA TO VARIABLE

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
	
$Extracted_Data[$x]['Name'] = $Column_Data[$x]['Name'];
$Extracted_Data[$x]['Value'] = $row[$Column_Data[$x]['Name']];
$Extracted_Data[$x]['Type'] = $Column_Data[$x]['Type'];

} 
$i = $i + 1;
}	
} else {
echo "0 results";
}

?>
	
<?php

$MySQL_Connection->close();

?>
	
<form action="Functions/Database_Modify.php" method="post" enctype="multipart/form-data">

<input type="hidden" name="Method" value="Save">
<input type="hidden" name="Table" value="<?php echo $Table_Name; ?>">

<table class="Input_Table">
<col width="30%">
<col width="*">

<tr>
<td class="Input_Heading_Cell" colspan="2">
<div class="Dashboard_Heading_Icon_Circle"><img class="Dashboard_Icon_Image" src="Images\Icons\Writing.svg" alt="" width="25" height="25"></div>
<?php echo $Input_Array['Title']; ?></td>		
</tr>

<?php Display_Image_Upload_Inputs($Table_Name, $Input_Array); ?>
<?php Display_PDF_Upload_Inputs($Table_Name, $Input_Array); ?>

<?php // CYCLE THROUGH COLUMNS AND DISPLAY INPUTS

for ($x = 0; $x < count($Extracted_Data); $x++) {
if (in_array($Extracted_Data[$x]['Name'], $Input_Array['Displayed_Columns'])) {
$ID_Link_Inset = Display_ID_Link_Button($Extracted_Data[$x]['Name'], $Extracted_Data[$x]['Value']);
$Info_Link_Inset = Display_Information_Link_Button($Table_Name, $Extracted_Data[$x]['Name']);

echo "<tr>";
echo "<td class=\"Input_Label_Cell\" >".$Extracted_Data[$x]['Name'].$Info_Link_Inset.$ID_Link_Inset;
echo "</td>";
echo "<td class=\"Input_Value_Cell\">";
echo Insert_Input($Table_Name, $Extracted_Data[$x]['Name'], $Extracted_Data[$x]['Value'], $Extracted_Data[$x]['Type']);
echo "</td>";
echo "</tr>";
}
}

?>

</table>


<?php // STANDARDISING SUBMIT BUTTON SPACING

$Submit_Section_Spacing = "80px";
$Submit_Section_Information = "*";
$Submit_Section_Button = "80px";

?>


<table class="Lower_Submit_Table">
<col width="<?php echo $Submit_Section_Spacing ; ?>">
<col width="<?php echo $Submit_Section_Information ; ?>">
<col width="<?php echo $Submit_Section_Button ; ?>">

<?php // GET TABLE NAME ONLY

$Table_Name = str_replace("FROM","",$Input_Array['MySQL_Table']);
$Table_Name = str_replace(" ","",$Table_Name);

?>

<?php if($_SESSION['Logged_In_User']&&$_SESSION['Adjust_Inputs']=="Yes"){ ?>
<tr>
<td class="Lower_Submit_Spacer_Cell"></td>
<td class="Lower_Submit_Cell">Save changes to database.</td>
<td class="Lower_Submit_Cell"><button class="Lower_Submit_Button" type="submit" value="Submit">Save</button></td>

</tr>
<?php } ?>


<?php if($_SESSION['Logged_In_User']&&$_SESSION['Adjust_Inputs']=="Yes"){ ?>
<tr>
<td class="Lower_Submit_Spacer_Cell"></td>
<td class="Lower_Submit_Cell">Reset all values to loaded.</td>
<td class="Lower_Submit_Cell"><button class="Lower_Submit_Button" type="reset" value="Submit">Reset</button></td>
</tr>
<?php } ?>

</table>
</form>


<table class="Lower_Submit_Table">
<col width="<?php echo $Submit_Section_Spacing ; ?>">
<col width="<?php echo $Submit_Section_Information ; ?>">
<col width="<?php echo $Submit_Section_Button ; ?>">

<form action="Functions/Database_Modify.php" method="post">

<?php if($_SESSION['Logged_In_User']&&$_SESSION['Adjust_Inputs']=="Yes"){ ?>
<input type="hidden" name="Method" value="Delete">
<input type="hidden" name="Table" value="<?php echo $Table_Name; ?>">
<input type="hidden" name="ID" value="<?php echo $_GET['ID']; ?>">

<tr>
<td class="Lower_Submit_Spacer_Cell"></td>
<td class="Lower_Submit_Cell">Delete this item.</td>
<td class="Lower_Submit_Cell"><button class="Lower_Delete_Button" type="submit" value="Submit">Delete</button></td>
</tr>
<?php } ?>


</form>

</table>


<?php //} ?>

<br>
<br>
<br>

<?php } ?>


<?php 

// PURPOSE: MAIN INPUT INSERT FUNCTION
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: ???

function Insert_Input($Table_Name, $Input_Name, $Current_Value, $Type){
if($_SESSION['Logged_In_User']&&$_SESSION['Adjust_Inputs']=="Yes"){ ?>

<?php 
$Combobox_Data = Get_Combobox_Data_If_Available($Table_Name, $Input_Name);
if($Combobox_Data != NULL){
Display_Combobox($Combobox_Data, $Input_Name, $Current_Value);	
}else{?>

<?php // DISPLAY INPUT BASE ON MYSQL TYPE
switch ($Type) {
case "int": echo "<input class=\"Inputs_Text\" type=\"number\" name=\"".$Input_Name."\" value=\"".$Current_Value."\">"; break;
case "date": echo "<input class=\"Inputs_Text\" type=\"date\" name=\"".$Input_Name."\" value=\"".$Current_Value."\">"; break;
case "mediumtext": echo "<textarea class=\"Inputs_Text_Area\" name=\"".$Input_Name."\" >".$Current_Value."</textarea>"; break;
default: echo "<input class=\"Inputs_Text\" type=\"text\" name=\"".$Input_Name."\" value=\"".$Current_Value."\">";
}
}
?>

<?php }else{ 
echo $Current_Value;
}} ?>


<?php 

// PURPOSE: ADD FILE FUNCTIONALITY [DISPLAYS ADD / OR PHOTO ]
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: ???

function File_Add_Button($Document_Type, $Input_Array){
if($_SESSION['Logged_In_User']&&$_SESSION['Adjust_Inputs']=="Yes"){
$File_Path = "Files/".$Document_Type."/";	
if(substr($Document_Type, -5) == "_PDFs"){$File_Path_Complete = $File_Path."[".$Input_Array['ID']."].pdf";}
if(substr($Document_Type, -7) == "_Photos"){$File_Path_Complete = $File_Path."[".$Input_Array['ID']."].jpg";}

if (file_exists($File_Path_Complete)) {?>    
<?php if(substr($Document_Type, -5) == "_PDFs"){ ?><a href="<?php echo $File_Path_Complete; ?>">Open File</a><?php } ?>
<?php if(substr($Document_Type, -7) == "_Photos"){ ?><img src="<?php echo $File_Path_Complete; ?>" alt=""  style="text-align:middle; max-width:300px; padding-top:2px;"></a><?php } ?>

<?php } else { ?>
<input type="file" name="<?php echo $Document_Type; ?>" id="<?php echo $Document_Type; ?>">	
<?php }}} ?>














