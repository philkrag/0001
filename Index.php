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

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/Formats/Basic_Header.php'; ?>


<table class="Index_Table">

<col width="260px">
<col width="*">


<tr>
<td class="Index_Heading_Cell" colspan="3">
<div class="Index_Heading_Icon_Circle">
<img class="Index_Icon_Image" src="Images\Icons\Warning.svg" alt="" >
</div>
MONITORS
</td>		
</tr>

<tr>
<?php $Link = "Warnings.php"; $Get_Data = ""; ?>

<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>"><?php Check_Link($Link); ?>Warnings</a></td>
<td class="Index_Information_Cell">This section highlights any records which are near the required completion date.</td>
</tr>

<tr>
<?php $Link = "Overdues.php"; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>"><?php Check_Link($Link); ?>Overdue Records</a></td>
<td class="Index_Information_Cell">This section highlights any records which are over the required completion date.</td>
</tr>


<tr>
<td class="Index_Heading_Cell" colspan="3">
<div class="Index_Heading_Icon_Circle">
<img class="Index_Icon_Image" src="Images\Icons\Folders.svg" alt="" >
</div>
EQUIPMENT
</td>		
</tr>

<tr>
<?php $Link = "Equipment_Register.php"; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>"><?php Check_Link($Link); ?>Equipment Management</a></td>
<td class="Index_Information_Cell">This section lists all of the equipment you have added to the portal from your site.</td>
</tr>


<tr>
<td class="Index_Heading_Cell" colspan="3">
<div class="Index_Heading_Icon_Circle">
<img class="Index_Icon_Image" src="Images\Icons\Folders.svg" alt="" >
</div>
SERVICES
</td>		
</tr>

<tr>
<?php $Link = "Service_Register.php"; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>"><?php Check_Link($Link); ?>Service Management</a></td>
<td class="Index_Information_Cell">This section lists all services required by every piece of equipment within your site.</td>
</tr>


<tr>
<td class="Index_Heading_Cell" colspan="3">
<div class="Index_Heading_Icon_Circle">
<img class="Index_Icon_Image" src="Images\Icons\Folders.svg" alt="" >
</div>
TASKS
</td>		
</tr>

<tr>
<?php $Link = "Task_Records.php"; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>"><?php Check_Link($Link); ?>Task Management</a></td>
<td class="Index_Information_Cell">This section lists all of the current tasks for every piece of equipment, service and or project.</td>
</tr>



<tr>
<td class="Index_Heading_Cell" colspan="3">
<div class="Index_Heading_Icon_Circle">
<img class="Index_Icon_Image" src="Images\Icons\Folders.svg" alt="" >
</div>
PARTS
</td>		
</tr>

<tr>
<?php $Link = "Supplier_Register.php"; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>"><?php Check_Link($Link); ?>Supplier Management</a></td>
<td class="Index_Information_Cell">This section lists all of the preferred suppliers and purchasing preferences.</td>
</tr>


<tr>
<?php $Link = "Part_Register.php"; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>"><?php Check_Link($Link); ?>Availability / Suitability</a></td>
<td class="Index_Information_Cell">This section lists items which require successor investigations and suitability checks.</td>
</tr>

<tr>
<?php $Link = "Part_Record.php"; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>"><?php Check_Link($Link); ?>Part Order Management</a></td>
<td class="Index_Information_Cell">This section allows for you to easily manage part orders.</td>
</tr>

<tr>
<?php $Link = "Part_Documentation.php"; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>"><?php Check_Link($Link); ?>Documents (Open)</a></td>
<td class="Index_Information_Cell">This section allows for easy uploading and recovery of ordering documentation including but not limited to quotes, purchase requests, purchase orders, order acknowledgement, delivery notices and tax invoices.</td>
</tr>


<tr>
<td class="Index_Heading_Cell" colspan="3">
<div class="Index_Heading_Icon_Circle">
<img class="Index_Icon_Image" src="Images\Icons\Folders.svg" alt="" >
</div>
PROJECTS
</td>		
</tr>

<tr>
<?php $Link = "Project_Register.php"; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>"><?php Check_Link($Link); ?>Project Management</a></td>
<td class="Index_Information_Cell">This section lists of your current and closed projects.</td>
</tr>


<tr>
<td class="Index_Heading_Cell" colspan="3">
<div class="Index_Heading_Icon_Circle">
<img class="Index_Icon_Image" src="Images\Icons\Folders.svg" alt="" >
</div>
MATERIAL SAFETY DATA SHEETS (MSDS)
</td>		
</tr>

<tr>
<?php $Link = "Chemical_Register.php"; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>"><?php Check_Link($Link); ?>Chemical Register</a></td>
<td class="Index_Information_Cell">This section lists all of the chemical currently used on your site.</td>
</tr>


<tr>
<td class="Index_Heading_Cell" colspan="3">
<div class="Index_Heading_Icon_Circle">
<img class="Index_Icon_Image" src="Images\Icons\Folders.svg" alt="" >
</div>
SAFE OPERATING PROCEDURE (SOP) DOCUMENTATION
</td>		
</tr>

<tr>
<?php $Link = ""; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>"><?php Check_Link($Link); ?>SOPs Register</a></td>
<td class="Index_Information_Cell">This section will list all of your current Standard Operating Procedures.</td>
</tr>


<tr>
<td class="Index_Heading_Cell" colspan="3">
<div class="Index_Heading_Icon_Circle">
<img class="Index_Icon_Image" src="Images\Icons\Folders.svg" alt="" >
</div>
WORK METHOD STATEMENT (WMS) DOCUMENTATION
</td>		
</tr>

<tr>
<?php $Link = ""; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>"><?php Check_Link($Link); ?>WMS Register</a></td>
<td class="Index_Information_Cell">This section will list all of your current Work Method Statements.</td>
</tr>


<tr>
<td class="Index_Heading_Cell" colspan="3">
<div class="Index_Heading_Icon_Circle">
<img class="Index_Icon_Image" src="Images\Icons\Folders.svg" alt="" >
</div>
TOOLS
</td>		
</tr>

<tr>
<?php $Link = "Functions\ERROR_Checking.php"; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>"><?php Check_Link($Link); ?>Run Scan</a></td>
<td class="Index_Information_Cell">=>Insert Description Here<=</td>
</tr>

<tr>
<?php $Link = "System_Configuration.php"; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>"><?php Check_Link($Link); ?>System Configuration</a></td>
<td class="Index_Information_Cell">=>Insert Description Here<=</td>
</tr>

<?php if($_SESSION['Logged_In_User']=="admin"){ ?>
<tr>
<?php $Link = "User_Register.php"; $Get_Data = ""; ?>
<td class="Index_Link_Cell"><a href="<?php echo $Link.$Get_Data; ?>"><?php Check_Link($Link); ?>User Configuration</a></td>
<td class="Index_Information_Cell">=>Insert Description Here<=</td>
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
<div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/Formats/Basic_Footer.php'; ?>