<?php session_start(); ?>

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

<?php
// /////////////////////////////////////////////////////////////////////// VERSION CONTROL

// PAGE CREATED BY: Phillip Kraguljac
// PAGE CREATED DATE: 2018-03-18

// DATE   		|| NAME 					|| MODIFICATION
// 2018-03-18 	|| Phillip Kraguljac 		|| Released.
// 2018-04-07 	|| Phillip Kraguljac 		|| Updated - v1.2.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL
?>

<?php // DATABASE CONNECTION FUNCTION

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "password";
$Database_Name = "User_Configuration";

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);

?>


<?php  // 

$Username_Match = null;
$Username_And_Password_Match = null;
$Username_Logout = null;

$_SESSION['Logged_In_User'] = null;
$_SESSION['Adjust_Inputs'] = "No";

?>


<?php // PROCESS LOGIN REQUEST

if($_POST['Mode']=="Log_In"){

if(isset($_POST['User_Name']) && isset($_POST['Password'])){
$Site_User_Name = Basic_Filter_Input($_POST['User_Name']);
$Password = $_POST['Password'];

// echo $Site_User_Name."<br>";
// echo $Password."<br>";

$MySQL_Command_Script = "SELECT * FROM `User_Details` WHERE `User Name`='{$Site_User_Name}'";
$MySQL_Result = $MySQL_Connection->query($MySQL_Command_Script);
$Count_Entries = mysqli_num_rows($MySQL_Result);
if($Count_Entries == 1){	
echo "User name found.<br>";
$Username_Match = true;

}else{
echo "User name not found.<br>";
$Username_Match = false;
}

$MySQL_Command_Script = "SELECT * FROM `User_Details` WHERE `User Name`='{$Site_User_Name}' and `Password`='".md5($Password)."'";
$MySQL_Result = $MySQL_Connection->query($MySQL_Command_Script);

$Entry_Detected = false;
while($row = $MySQL_Result->fetch_assoc()) {
	$_SESSION['Adjust_Inputs'] = Basic_Filter_Input($row['Adjust Inputs?']);
	$_SESSION['Display_Connectivity'] = Basic_Filter_Input($row['Display Connectivity?']);		
	$Entry_Detected = true;
}


if($Entry_Detected == true){	

$_SESSION['Logged_In_User'] = $Site_User_Name;
echo "User and password matched.<br>";
echo "User has been logged in.<br>";
$Username_And_Password_Match = true;

}else{
echo "User and password not matched.<br>";
echo "User not logged in.<br>";
$Username_And_Password_Match = false;
}
}
}
?>


<?php // PROCESS LOGOUT REQUEST

if($_POST['Mode']=="Log_Out"){
$Site_User_Name = Basic_Filter_Input($_SESSION['Logged_In_User']);
$_SESSION['Logged_In_User'] = null;
$Username_Logout = true;
echo "User has been logged out.<br>";
}

?>


<?php // DETERMINE LOG INFORMATION

$Details = "";
if($Username_Match == false){$Details = "User not found.";}
if($Username_Match == true && $Username_And_Password_Match == false){$Details = "Incorrect password entered.";}
if($Username_Match == true && $Username_And_Password_Match == true){$Details = "User logged in.";}
if($Username_Logout == true){$Details = "User logged out.";}

?>


<?php // ENTER LOG DATA INTO DATABASE

$i = 0;

$Input_Array['MySQL_Action'] = "INSERT INTO ";
$Input_Array['MySQL_Table'] = "User_Login_Records ";
$Input_Array['MySQL_Set'] = "(`User Name`, `Details`, `Last Modified Date`) VALUES ('{$Site_User_Name}', '{$Details}', '".date('Y-m-d')."') ";
$Input_Array['MySQL_Filter'] = "";
$Input_Array['MySQL_Order'] = "";
$Input_Array['MySQL_Limit'] = "";
$Input_Array['MySQL_Offset'] = "";

$MySQL_Command_Script = 
$Input_Array['MySQL_Action'].
$Input_Array['MySQL_Table'].
$Input_Array['MySQL_Set'].
$Input_Array['MySQL_Filter'].
$Input_Array['MySQL_Order'].
$Input_Array['MySQL_Limit'].
$Input_Array['MySQL_Offset'];

echo $MySQL_Command_Script;

if ($MySQL_Connection->query($MySQL_Command_Script) === TRUE) {
echo "Record updated successfully.<br>";
} else {
echo "Error updating record: " .$MySQL_Connection->error."<br>";
}

?>

<?php

$MySQL_Connection->close();
$Dashboard_Indetifier = ""; if(isset($_POST['Dashboard_Indetifier'])){$Dashboard_Indetifier = $_POST['Dashboard_Indetifier'];}
header('Location: ' . $_SERVER['HTTP_REFERER']."#".$Dashboard_Indetifier);

?>
