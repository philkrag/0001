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

// PURPOSE: SETTING BASIC DASHBOARDS
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-12

function Display_Dashboard_Basic($Dashboard_Array){ ?>

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
		$Column_Data[$i]['Name'] = Basic_Filter_Input($row['COLUMN_NAME']);
		$Column_Data[$i]['Type'] = Basic_Filter_Input($row['DATA_TYPE']);
		$i = $i + 1;
    }	
} else {
    
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
//echo "0 results";
}

//echo $Extracted_Data[0]['Basic Text'];	

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
		
	
<table class="Dashboard_Table" id="<?php echo $Dashboard_Array['Dashboard_Indentifier']; ?>">
<col width="80px">
<col width="30%">
<col width="*">

<tr>
<td class="Dashboard_Heading_Cell" colspan="3">
<div class="Dashboard_Heading_Icon_Circle"><?php Display_Dashboard_Icon($Dashboard_Array['Title']); ?></div>
<?php echo $Dashboard_Array['Title'].$Deleted_Item_Heading_Inset; ?></td>		
</tr>



<form action="Functions/Database_Modify.php" method="post">

<input type="hidden" name="Method" value="New">
<input type="hidden" name="Table" value="<?php echo $Table_Name; ?>">
<?php for($x = 0; $x < 1; $x++) { ?><input type="hidden" name="<?php if(isset($Dashboard_Array['New_Item_Link_Headings'][$x])){ echo $Dashboard_Array['New_Item_Link_Headings'][$x];} ?>" value="<?php echo $Dashboard_Array['New_Item_Link_Values'][$x]; ?>"><?php } ?>
<input type="hidden" name="Dashboard_Indetifier" value="<?php echo $Dashboard_Array['Dashboard_Indentifier']; ?>">

<?php if($_SESSION['Logged_In_User']&&$_SESSION['Adjust_Inputs']=="Yes"&&$Dashboard_Array['Allow_New_Items']=="Yes"){ ?>

<tr>
<td class="Upper_Submit_Cell"><button class="Upper_Submit_Button" type="submit" value="Submit">New</button></td>
<td class="Upper_Submit_Cell" colspan="2">Add a new item to the database.</td>
<!--<td class="Upper_Submit_Spacer_Cell"></td>-->
</tr>

<?php } ?>

</form>

	
<?php 
if(isset($Extracted_Data)){
for ($x = 0; $x < count($Extracted_Data); $x++) {
?>


<tr>
<td class="Dashboard_Button_Cell" rowspan="<?php echo (count($Dashboard_Array['Column_Headings'])+1); ?>">

<?php $Edit_Button_Link = $Dashboard_Array['Item_Link']."?ID=".$Extracted_Data[$x]['ID']; ?>
<button class="Dashboard_Button" onclick="window.location.href='<?php echo $Edit_Button_Link; ?>'">View</button>

<?php if($Dashboard_Array['Display_Item_Photos'] == "Yes"){ 

	$File_Path = "Files/".$Table_Name."_Photos/";
	$File_Path_Complete = $File_Path."[".$Extracted_Data[$x]['ID']."].jpg";
	if (file_exists($File_Path_Complete)) {
	
?>
<img src="<?php echo $File_Path_Complete; ?>" alt=""  style="text-align:middle; max-width:64px; padding-top:2px;"></a>

<?php  }else{ ?>

<?php } ?>
<?php } ?>

</td>
<?php
$Icon_Inset = "";
if($Extracted_Data[$x]['Last Modified Date']==date("Y-m-d")){$Icon_Inset = $Icon_Inset."<img style=\"float:right;\" src=\"Images\Icons\Round_About.svg\" alt=\"View\" width=\"16\" height=\"16\">";}
?>
	
	
<td class="Dashboard_SubHeading_Cell" colspan="2"><?php echo $Icon_Inset; ?></td>	
</tr>

<?php

$i = 0;
foreach ($Dashboard_Array['Displayed_Columns'] as &$value) {
$Class = "Dashboard_Value_Cell";
//if($Extracted_Data[$x]['Last Modified Date']==date("Y-m-d")){$Class = "Dashboard_Value_Cell_Highlight";}
echo "<tr>";
echo "<td class=\"Dashboard_Label_Cell\" >".$Dashboard_Array['Column_Headings'][$i]."</td>";
echo "<td class=\"{$Class}\" >".$Extracted_Data[$x][$value]."</td>";
echo "</tr>";
$i = $i + 1;
}

?>


<?php if($Dashboard_Array['Include_Warnings'] == "Yes" && ($Extracted_Data[$x]['Warning ERRORS']>0 || $Extracted_Data[$x]['Overdue ERRORS']>0)){ ?>
<tr>
<td class="Dashboard_Spacer_Tools" colspan="1"></td>
<td class="" style="background-color:#f2f2f2;" colspan="2">

<table class="">
<col width="">
<col width="">
<tr>
<td class="Dashboard_Value_Cell"><img src="Images\Icons\Warning.svg" alt="" width="20" height="20"></td>
<td class="Dashboard_Value_Cell"><img src="Images\Icons\Siren.svg" alt="" width="20" height="20"></td>
</tr>
<tr>
<td class="Dashboard_Value_Cell_Warning"><?php echo $Extracted_Data[$x]['Warning ERRORS']; ?></td>
<td class="Dashboard_Value_Cell_Overdue"><?php echo $Extracted_Data[$x]['Overdue ERRORS']; ?></td>
</tr>
</table>

</td>
</tr>
<?php } ?>


<tr><td style="height:2px" colspan="2"></td></tr>

<?php }} ?>

</table>
	
	
<table class="Tool_Table">
<col width="80px">
<col width="*">
<col width="80px">

<?php
$Next_Page = $Dashboard_Array['Dashboard_Offset']+($Dashboard_Array['Dashboard_Limit']*1);
$Previous_Page = $Dashboard_Array['Dashboard_Offset']+($Dashboard_Array['Dashboard_Limit']*-1);

?>

<tr>

<td class="Tool_Button_Cell">
<?php $Previous_Page_Link = Dashboard_Direct($_GET, $Dashboard_Array['Dashboard_Indentifier'],$Previous_Page); ?>
<button class="Dashboard_Button" onclick="window.location.href='<?php echo $Previous_Page_Link; ?>'"><= Page</button>
</td>
	
<td class="Dashboard_Label_Cell">---</td>

<td class="Tool_Button_Cell">
<?php $Next_Page_Link = Dashboard_Direct($_GET, $Dashboard_Array['Dashboard_Indentifier'],$Next_Page); ?>
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

<br>
<br>
<br>
	
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


<?php // THE FOLLOWING IS FOR DISPALYING THE TABLE ICON IMAGE
function Display_Dashboard_Icon($Dashboard_Title){
$Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Notes.svg\" alt=\"\" width=\"25\" height=\"25\">";

// if (strpos($Dashboard_Title, 'SERVICE') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Calendar.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'TASK') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Tasks.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'PERSONNEL RISK') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Cardiogram.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'EQUIPMENT RISK') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Fire.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'FAVOURITE') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Lace.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'PRIORITIES') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Tactics.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'PREFERRED SUPPLIER') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Lace.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'NEW ITEM') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Star.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'WAITING FOR INFORMATION') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Chatting.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'QUOTE') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Check-Mark.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'PURCHASE') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Coin.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'EQUIPMENT') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Trucking.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'INVESTIGATION') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Loupe.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'PROJECT') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Folders.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'STAKEHOLDER') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Team.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'COMMUNICATION') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Chatting.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'RISK') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Fire.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'TAX INVOICE') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Contract.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'LABOUR') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Helmet.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'CHEMICAL') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Flask.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'PART') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\Control-Panel.svg\" alt=\"\" width=\"25\" height=\"25\">"; }
// if (strpos($Dashboard_Title, 'SUITABILITY') !== false) { $Image_Inset = "<img class=\"Dashboard_Icon_Image\" src=\"Images\Icons\List.svg\" alt=\"\" width=\"25\" height=\"25\">"; }

echo $Image_Inset;
}

?>





