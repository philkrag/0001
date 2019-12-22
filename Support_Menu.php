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
// PAGE CREATED DATE: 2018-05-25

// DATE   		|| NAME 					|| MODIFICATION
// 2018-05-25 	|| Phillip Kraguljac 		|| Created.
// 2018-05-26 	|| Phillip Kraguljac 		|| v1.8.
// 2019-12-22 	|| Phillip Kraguljac 		|| v1.9.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/Formats/Basic_Header.php'; ?>


<table class="Index_Table">

<col width="80px">
<col width="240px">
<col width="*">

<tr><td class="Index_Spacer_Cell" colspan="3"></td></tr>

<tr>
<td class="Index_Heading_Cell" colspan="3">
<div class="Index_Heading_Icon_Circle">
<img class="Index_Icon_Image" src="Images\Icons\Folders.svg" alt="" >
</div>
TOOLS
</td>		
</tr>

<tr>
<?php $Link = "Functions/ERROR_Checking.php"; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><button class="Tool_Button" onclick="window.location.href='<?php echo $Link.$Get_Data; ?>'">View</button></td>
<td class="Index_Label_Cell"><?php echo Check_Link($Link); ?> Run Error Scan </td>
<td class="Index_Information_Cell">Scans database and flags any records which are near or past due dates.</td>
</tr>

<tr>
<?php $Link = "Functions/Service_Record_Checking.php"; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><button class="Tool_Button" onclick="window.location.href='<?php echo $Link.$Get_Data; ?>'">View</button></td>
<td class="Index_Label_Cell"><?php echo Check_Link($Link); ?> Add Service Record(s) Scan </td>
<td class="Index_Information_Cell">Scans database and creates new service records if required.</td>
</tr>

<?php if($_SESSION['Logged_In_User']=="admin"){ ?>
<tr>
<?php $Link = "User_Register.php"; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><button class="Tool_Button" onclick="window.location.href='<?php echo $Link.$Get_Data; ?>'">View</button></td>
<td class="Index_Label_Cell"><?php echo Check_Link($Link); ?> User Configuration</td>
<td class="Index_Information_Cell">Modify User credentials.</td>
</tr>
<?php } ?>

</table>

<?php Display_Index_Page_Legend(); ?>



<?php
function Check_Link($Link){
	
	if($_SESSION['Display_Connectivity']=="Yes"){
	if(file_exists($Link)){
	echo "";
	}else{
		echo "<img src=\"Images\Icons\Barrier.svg\" style=\"padding-right:10px;\" alt=\"\" width=\"20\" height=\"20\">";
	}	
	}
}
?>

<br>

<?php include $_SERVER['DOCUMENT_ROOT'].'/Formats/Basic_Footer.php'; ?>