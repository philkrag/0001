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

<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Filter_Tools.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Configuration_Display.php'; ?>

<html>
<head>
<title><?php echo Get_Company_Name(); ?> Portal</title>

<link rel="stylesheet" type="text/css" href="Site_Style.css">
<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Page_Navigation.php'; ?>

</head>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Database_Selection.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Dashboard_Display.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Dashboard_Tools.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Input_Display.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Input_Tools.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Menu_Display.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Combobox_Tools.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Legend_Display.php'; ?>
<?php //phpinfo(); 
set_time_limit(25);
?>

<table class="Header_Table">
<col width="250px">
<col width="*">
<col width="30%">

<tr class="Header_Row">
<?php 

$Image_Found = false;
if(file_exists('Files/User_Logos/[1].jpg')){$Image_Inset = "Files/User_Logos/[1].jpg"; $Image_Found = true;}
if(file_exists('Files/User_Logos/[1].png')){$Image_Inset = "Files/User_Logos/[1].png"; $Image_Found = true;}

 ?>
 
 <?php if($Image_Found == true){ ?>
<td class="Header_Logo_Cell"><img src="<?php echo $Image_Inset; ?>" style="max-width:120px;" alt=""></td>
<?php } ?>

<?php if($Image_Found == false){ ?>
<td class="Header_Logo_Cell"></td>
<?php } ?>

<td class="Header_Title_Cell"><?php echo Get_Company_Name(); ?></td>
<td class="Header_Credential_Cell">

<?php include $_SERVER['DOCUMENT_ROOT'].'/Formats/User_Login_Inset.php'; ?>

</td>
</tr>

</table>


<table class="Tool_Table">
<col width="100px">
<col width="80px">
<col width="*">
<col width="80px">
<col width="80px">
<col width="100px">

<tr>
<td class="Tool_Spacer_Cell"></td>
<td class="Tool_Cell"><button class="Tool_Button" onclick="window.location.href='index.php'">Home</button></td>

<td class="Tool_Spacer_Cell"></td>
<td class="Tool_Cell"><button class="Tool_Button" onclick="goBack()">Back</button></td>
<td class="Tool_Cell"><button class="Tool_Button" onclick="goForward()">Forward</button></td>
<td class="Tool_Spacer_Cell"></td>
</tr>

</table>


<table class="Content_Table">
<col width="100px">
<col width="*">
<col width="100px">

<tr>
<td class="Left_Content_Cell"></td>
<td class="Main_Content_Cell">

