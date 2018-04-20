<?php session_start(); ?>
<?php if($_SERVER['PHP_SELF']!="/Login.php"){include $_SERVER['DOCUMENT_ROOT'].'/Functions/User_Authentication.php';} ?>
<?php if(!isset($_SESSION['Logged_In_User'])){$_SESSION['Logged_In_User']=null;} ?>

<!DOCTYPE html>

<!--
// /////////////////////////////////////////////////////////////////////// COPYRIGHT NOTICE

This file is part of Pip-Project Portal.

Pip-Project Portal is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Pip-Project Portal is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Pip-Project.  If not, see <http://www.gnu.org/licenses/>.

// /////////////////////////////////////////////////////////////////////// COPYRIGHT NOTICE
-->

<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Configuration_Display.php'; ?>

<html>
<head>
<title>BLANK TITLE</title>

<link rel="stylesheet" type="text/css" href="../Site_Style.css">
<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Page_Navigation.php'; ?>

</head>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Database_Selection.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Filter_Tools.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Report_Item_Display.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Report_Table_Display.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Report_Tools.php'; ?>

<table class="Report_Header_Table">
<col width="*">
<col width="400px">

<tr class="Report_Header_Row">

<?php 

$Image_Found = false;
if(file_exists('../Files/User_Logos/[1].jpg')){$Image_Inset = "../Files/User_Logos/[1].jpg"; $Image_Found = true;}
if(file_exists('../Files/User_Logos/[1].png')){$Image_Inset = "../Files/User_Logos/[1].png"; $Image_Found = true;}

 ?>
 
<?php if($Image_Found == true){ ?>
<td class="Report_Header_Logo_Cell"><img src="<?php echo $Image_Inset; ?>" style="max-width:120px;" alt=""></td>
<?php } ?>

<?php if($Image_Found == false){ ?>
<td class="Report_Header_Logo_Cell"></td>
<?php } ?>


<td>

<table class="Report_Tool_Table">
<col width="150px">
<col width="*">

<tr>
<td class="Report_Header_Label_Cell"><b>COMPANY</b></td>
<td class="Report_Header_Value_Cell"><?php echo Get_Company_Name(); ?></td>
</tr>

<tr>
<td class="Report_Header_Label_Cell"><b>PRINTED BY</b></td>
<td class="Report_Header_Value_Cell"><?php echo $_SESSION['Logged_In_User']; ?></td>
</tr>

<tr>
<td class="Report_Header_Label_Cell"><b>DATE PRINTED</b></td>
<td class="Report_Header_Value_Cell"><?php echo date('Y-m-d'); ?></td>
</tr>

<tr>
<td class="Report_Header_Label_Cell"><b>REPORT VERSION</b></td>
<td class="Report_Header_Value_Cell">1.0</td>
</tr>

</table>

</td>
</tr>
</table>


<table class="Report_Content_Table">
<col width="100px">


