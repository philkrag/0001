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
// along with Foobar.  If not, see <http://www.gnu.org/licenses/>.

// /////////////////////////////////////////////////////////////////////// COPYRIGHT NOTICE

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL

// PAGE CREATED BY: Phillip Kraguljac
// PAGE CREATED DATE: 2018-03-13

// DATE   		|| NAME 					|| MODIFICATION
// 2018-03-13 	|| Phillip Kraguljac 		|| Released.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL

?>

<?php


// PURPOSE: SETTING BASIC INPUT PAGES
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-12

function Display_Input_Basic($Dashboard_Array){ ?>


<?php // CONNECT TO MYSQL DATABASE

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "password";
$Database_Name = "User_Data_Collection";

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

$result = $MySQL_Connection->query($MySQL_Command_Script);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
		$Column_Data[$i]['Name'] = $row['COLUMN_NAME'];
		$Column_Data[$i]['Type'] = $row['DATA_TYPE'];
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
$Dashboard_Array['MySQL_Action'].
$Dashboard_Array['MySQL_Table'].
$Dashboard_Array['MySQL_Filter'].
$Dashboard_Array['MySQL_Order'].
$Dashboard_Array['MySQL_Limit'].
$Dashboard_Array['MySQL_Offset'];

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

	
	
	
<form action="Functions/Database_Modify.php" method="post" enctype="multipart/form-data">

<input type="hidden" name="Method" value="Save">
<input type="hidden" name="Table" value="<?php echo $Table_Name; ?>">

<table class="Input_Table">

<col width="30%">
<col width="*">

<tr>
<td class="Input_Heading_Cell" colspan="2"><?php echo $Dashboard_Array['Title']; ?></td>		
</tr>




<tr>
<td class="Input_Label_Cell">Upload WMS</td>
<td class="Input_Value_Cell"><?php File_Add_Button("WMS", $Dashboard_Array); ?></td>
</tr>

	

	
	

<?php for ($x = 0; $x < count($Extracted_Data); $x++) { ?>

<?php 
$i = 0;
//$ID="";
foreach ($Dashboard_Array['Displayed_Columns'] as $key => $value) {

// FOR EXTRACTING THE ID => MYSQL INDEXING

// if($key=="ID"){$ID=$Extracted_Data[$x][$value];
// echo "=>".$ID."<=";
// }

echo "<tr>";
echo "<td class=\"Input_Label_Cell\" >".$Dashboard_Array['Column_Headings'][$i]."</td>";

echo "<td class=\"Input_Value_Cell\" >";
Insert_Input(str_replace(" ", "_", $Dashboard_Array['Displayed_Columns'][$i]) , $Extracted_Data[$x][$value]);

echo "</td>";
echo "</tr>";

$i = $i + 1;
}	?>

</table>



<table class="Lower_Submit_Table">
<col width="80px">
<col width="*">
<col width="80px">

<?php // GET TABLE NAME ONLY

// $Table_Name = str_replace("FROM","",$Dashboard_Array['MySQL_Table']);
// $Table_Name = str_replace(" ","",$Table_Name);

$Table_Name = str_replace("FROM","",$Dashboard_Array['MySQL_Table']);
$Table_Name = str_replace(" ","",$Table_Name);

?>


<tr>
<td class="Lower_Submit_Spacer_Cell"></td>
<td class="Lower_Submit_Cell">Save changes to database.</td>
<td class="Lower_Submit_Cell"><button class="Lower_Submit_Button" type="submit" value="Submit">Save</button></td>
</tr>

</form>

<tr>
<td class="Lower_Submit_Spacer_Cell"></td>
<td class="Lower_Submit_Cell">Reset all values to loaded.</td>
<td class="Lower_Submit_Cell"><button class="Lower_Submit_Button" type="reset" value="Submit">Reset</button></td>
</tr>

<form action="Functions/Database_Modify.php" method="post">

<input type="hidden" name="Method" value="Delete">
<input type="hidden" name="Table" value="<?php echo $Table_Name; ?>">
<input type="hidden" name="ID" value="<?php echo $_GET['ID']; ?>">

<tr>
<td class="Lower_Submit_Spacer_Cell"></td>
<td class="Lower_Submit_Cell">Delete this item.</td>
<td class="Lower_Submit_Cell"><button class="Lower_Delete_Button" type="submit" value="Submit">Delete</button></td>
</tr>

</form>

</table>


<?php } ?>







<?php } ?>


<?php function Insert_Input($Input_Name, $Current_Value){ ?>
<input class="Inputs_Text" type="text" name="<?php echo $Input_Name; ?>" value="<?php echo $Current_Value; ?>">
<?php } ?>

<?php
function File_Add_Button($Type, $Dashboard_Array){
	switch ($Type) {
    case "WMS":
        $File_Path = "Files/WMS/";
        break;
	default:
	}

	$File_Path_Complete = $File_Path."[".$Dashboard_Array['ID']."].pdf";
		
if (file_exists($File_Path_Complete)) {?>    
<a href="<?php echo $File_Path_Complete; ?>">Open File</a>	
<?php } else { ?>
    <input type="file" name="WMSUpload" id="WMSUpload">	
<?php } } ?>




