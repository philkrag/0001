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

// PURPOSE: SETTING BASIC DASHBOARDS
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-12


function Display_Dashboard_Basic($Dashboard_Array){ ?>
	

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
	
	
	
	
	
	
	
	
<form action="Functions/Database_Modify.php" method="post">
	
<table class="Upper_Submit_Table" id="<?php echo $Dashboard_Array['Dashboard_Indetifier']; ?>">
<col width="80px">
<col width="*">
<col width="80px">

<?php // GET TABLE NAME ONLY

$Table_Name = str_replace("FROM","",$Dashboard_Array['MySQL_Table']);
$Table_Name = str_replace(" ","",$Table_Name);

?>

<input type="hidden" name="Method" value="New">
<input type="hidden" name="Table" value="<?php echo $Table_Name; ?>">
<input type="hidden" name="Dashboard_Indetifier" value="<?php echo $Dashboard_Array['Dashboard_Indetifier']; ?>">




<tr>
<td class="Upper_Submit_Cell"><button class="Upper_Submit_Button" type="submit" value="Submit">New</button></td>
<td class="Upper_Submit_Cell">Add a new item to the database.</td>
<td class="Upper_Submit_Spacer_Cell"></td>
</tr>

</table>

</form>

	
	
	
	
<?php // INCLUDED DELETE ITEM NOTIFICATION
$Deleted_Item_Heading_Inset = "";
if($Dashboard_Array['Include_Deleted_Items']=="Yes"){$Deleted_Item_Heading_Inset = " *";}
?>
	
	
	<table class="Dashboard_Table">
<col width="80px">
<col width="30%">
<col width="*">

<tr>
<td class="Dashboard_Heading_Cell" colspan="3"><?php echo $Dashboard_Array['Title'].$Deleted_Item_Heading_Inset; ?></td>		
</tr>

	
<?php for ($x = 0; $x < count($Extracted_Data); $x++) { ?>



<tr>
<td class="Dashboard_Button_Cell" rowspan="3">
<?php $Edit_Button_Link = $Dashboard_Array['Item_Link']."?ID=".$Extracted_Data[$x]['ID']; ?>
<button class="Dashboard_Button" onclick="window.location.href='<?php echo $Edit_Button_Link; ?>'">Edit</button>
</td>	
<td class="Dashboard_SubHeading_Cell" colspan="2">Item:</td>	
</tr>

<?php 
$i = 0;
foreach ($Dashboard_Array['Displayed_Columns'] as &$value) {

echo "<tr>";
echo "<td class=\"Dashboard_Label_Cell\" >".$Dashboard_Array['Column_Headings'][$i]."</td>";
echo "<td class=\"Dashboard_Value_Cell\" >".$Extracted_Data[$x][$value]."</td>";
echo "</tr>";

$i = $i + 1;
}	?>

<tr><td style="height:10px" colspan="2"></td></tr>

<?php } ?>
	
	
	</table>
	
	
	
<table class="Dashboard_Table">
<col width="80px">
<col width="*">
<col width="80px">

<?php
$Next_Page = $Dashboard_Array['Dashboard_Offset']+($Dashboard_Array['Dashboard_Limit']*1);
$Previous_Page = $Dashboard_Array['Dashboard_Offset']+($Dashboard_Array['Dashboard_Limit']*-1);

?>

<tr>

<td class="Tool_Button_Cell">
<?php $Previous_Page_Link = Dashboard_Direct($_GET, $Dashboard_Array['Dashboard_Indetifier'],$Previous_Page); ?>
<button class="Dashboard_Button" onclick="window.location.href='<?php echo $Previous_Page_Link; ?>'"><= Page</button>
</td>
	
<td class="Dashboard_Label_Cell">---</td>

<td class="Tool_Button_Cell">
<?php $Next_Page_Link = Dashboard_Direct($_GET, $Dashboard_Array['Dashboard_Indetifier'],$Next_Page); ?>
<button class="Dashboard_Button" onclick="window.location.href='<?php echo $Next_Page_Link; ?>'">Page =></button>
</td>

</tr>

<?php // INCLUDED DELETE FOOT NOTE NOTIFICATION
if($Dashboard_Array['Include_Deleted_Items']=="Yes"){ ?>
<tr>
<td></td>
<td colspan="2">(*) Deleted Items included within Dashboard.<tr>
</tr>
<?php } ?>

</table>


	
<?php } ?>


<?php // THE FOLLOWING IS FOR SETTING THE DESIRE DASHBOARD PAGE


function Dashboard_Direct($Get_Data, $Dashboard_Indetifier, $Desired_Offset){

$Item_Found = false;
$Return = "?";
$Link = ""; 

$i = 0;
foreach ($Get_Data as $key => $value) {
if($key==$Dashboard_Indetifier){		
$Get_Data[$key]=$Desired_Offset;
$Item_Found = true;
}
$i = $i +1;
$Return = $Return.$Link.$key."=".$Get_Data[$key];
$Link = "&";
}

$Return = $Return;

if($Item_Found == false){$Return = $Return.$Link.$Dashboard_Indetifier."=".$Desired_Offset;}
$Url_Base = explode('?', $_SERVER['REQUEST_URI'], 2);
return $Url_Base[0].$Return."#".$Dashboard_Indetifier;

}

?>