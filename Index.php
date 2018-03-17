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

<?php include $_SERVER['DOCUMENT_ROOT'].'/Formats/Basic_Header.php'; ?>


<table class="Index_Table">
<col width="32px">
<col width="220px">
<col width="*">

<tr>
<td class="Index_Heading_Cell" colspan="3">EQUIPMENT</td>
</tr>

<tr>
<?php $Link = "Equipment_Register.php"; $Get_Data = ""; ?>
<td class="Index_Icon_Cell"><?php Check_Link($Link); ?></td>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>">Equipment Register</a></td>
<td class="Index_Information_Cell">=>Insert Description Here<=</td>
</tr>

<tr>
<td class="Index_Heading_Cell" colspan="3">SERVICES</td>
</tr>

<tr>
<?php $Link = ""; $Get_Data = ""; ?>
<td class="Index_Icon_Cell"><?php Check_Link($Link); ?></td>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>">Service Register</a></td>
<td class="Index_Information_Cell">=>Insert Description Here<=</td>
</tr>

<tr>
<?php $Link = ""; $Get_Data = ""; ?>
<td class="Index_Icon_Cell"><?php Check_Link($Link); ?></td>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>">Service Management</a></td>
<td class="Index_Information_Cell">=>Insert Description Here<=</td>
</tr>

<tr>
<td class="Index_Heading_Cell" colspan="3">TASKS</td>
</tr>

<tr>
<?php $Link = ""; $Get_Data = ""; ?>
<td class="Index_Icon_Cell"><?php Check_Link($Link); ?></td>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>">Task Management</a></td>
<td class="Index_Information_Cell">=>Insert Description Here<=</td>
</tr>


<tr>
<td class="Index_Heading_Cell" colspan="3">PARTS</td>
</tr>

<tr>
<?php $Link = ""; $Get_Data = ""; ?>
<td class="Index_Icon_Cell"><?php Check_Link($Link); ?></td>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>">Part Replacement Management</a></td>
<td class="Index_Information_Cell">=>Insert Description Here<=</td>
</tr>

<tr>
<?php $Link = ""; $Get_Data = ""; ?>
<td class="Index_Icon_Cell"><?php Check_Link($Link); ?></td>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>">Part Ordering Management</a></td>
<td class="Index_Information_Cell">=>Insert Description Here<=</td>
</tr>

<tr>
<?php $Link = ""; $Get_Data = ""; ?>
<td class="Index_Icon_Cell"><?php Check_Link($Link); ?></td>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>">Documents</a></td>
<td class="Index_Information_Cell">=>Insert Description Here<=</td>
</tr>


<tr>
<td class="Index_Heading_Cell" colspan="3">TOOLS</td>
</tr>

<tr>
<?php $Link = "Template.php"; $Get_Data = "?ID=1"; ?>
<td class="Index_Icon_Cell"><?php Check_Link($Link); ?></td>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>">Template Page</a></td>
<td class="Index_Information_Cell">=>Insert Description Here<=</td>
</tr>

<tr>
<?php $Link = "System_Configuration.php"; $Get_Data = ""; ?>
<td class="Index_Icon_Cell"><?php Check_Link($Link); ?></td>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>">System Configuration</a></td>
<td class="Index_Information_Cell">=>Insert Description Here<=</td>
</tr>



</table>

<?php
function Check_Link($Link){
	
	
	if(file_exists($Link)){
	echo "<img src=\"Images\Icons\Checked.svg\" alt=\"\" width=\"20\" height=\"20\">";
	}else{
		echo "<img src=\"Images\Icons\Warning.svg\" alt=\"\" width=\"20\" height=\"20\">";
	}	
}
?>

<br>
<div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/Formats/Basic_Footer.php'; ?>