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
// PAGE CREATED DATE: 2018-03-22

// DATE   		|| NAME 					|| MODIFICATION
// 2018-03-13 	|| Phillip Kraguljac 		|| Released.
// 2018-04-07 	|| Phillip Kraguljac 		|| Updated - v1.2.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/File_Uploads.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Filter_Tools.php'; ?>

<?php

$Associate_Table_Warnings;
$Associate_Table_Overdues;

?>


<?php // CONNECT TO MYSQL DATABASE

// PURPOSE: SAVING DATA TO THE DATABASE
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-12
Check_Completion_Required_Dates();
function Check_Completion_Required_Dates(){

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "password";
$Database_Name = "User_Data_Collection";

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection->connect_error) {die("Connection failed: " . $MySQL_Connection->connect_error);} 

?>


<?php // RETREIVE TABLE INFORMATION

$i = 0;
$Table_Listing;

$MySQL_Command_Script = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE `TABLE_SCHEMA`='{$Database_Name}';";
$MySQL_Result = $MySQL_Connection->query($MySQL_Command_Script);

if ($MySQL_Result->num_rows > 0) {

    while($row = $MySQL_Result->fetch_assoc()) {		
		$Table_Listing[$i] = Basic_Filter_Input($row['TABLE_NAME']);
		$i = $i + 1;
    }	
} else {
    
}
//var_dump($Table_Listing)."<br>";

?>


<?php // RESET ALL WARNINGS

for ($i = 0; $i < count($Table_Listing); $i++) {
if(substr($Table_Listing[$i], -7)=="_Record"){

$Input_Array['MySQL_Action'] = "UPDATE ";
$Input_Array['MySQL_Table'] = $Table_Listing[$i]." ";
$Input_Array['MySQL_Set'] = "SET `Warning ERRORS` = NULL, `Overdue ERRORS` = NULL ";
$Input_Array['MySQL_Filter'] = " ";
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
//echo $MySQL_Command_Script; //TECHNICAL SUPPORT PURPOSES

if ($MySQL_Connection->query($MySQL_Command_Script) === TRUE) {
echo "[WARNING/OVERDUE ERRORS]=> All reset.<br>";
} else {
echo "[WARNING/OVERDUE ERRORS]=> Error:" . $MySQL_Connection->error . "<br>";
}
}
}

?>


<?php // ADJUST WARNING [RECORDS ONLY]

for ($i = 0; $i < count($Table_Listing); $i++) {
if(substr($Table_Listing[$i], -7)=="_Record"){

$Input_Array['MySQL_Action'] = "UPDATE ";
$Input_Array['MySQL_Table'] = $Table_Listing[$i]." ";
$Input_Array['MySQL_Set'] = "SET `Warning ERRORS` = 1 ";
$Input_Array['MySQL_Filter'] = "WHERE `Required Completion Date` < DATE(NOW()+INTERVAL 7 DAY) AND `Required Completion Date` > DATE(NOW())";
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
//echo $MySQL_Command_Script; //TECHNICAL SUPPORT PURPOSES

if ($MySQL_Connection->query($MySQL_Command_Script) === TRUE) {
echo "[WARNING ERRORS]=> All adjusted.<br>";
} else {
echo "[WARNING ERRORS]=> Error:" . $MySQL_Connection->error . "<br>";
}
}
}

?>


<?php // ADJUST OVERDUE [RECORDS ONLY]

for ($i = 0; $i < count($Table_Listing); $i++) {
if(substr($Table_Listing[$i], -7)=="_Record"){

$Input_Array['MySQL_Action'] = "UPDATE ";
$Input_Array['MySQL_Table'] = $Table_Listing[$i]." ";
$Input_Array['MySQL_Set'] = "SET `Overdue ERRORS` = 1 ";
$Input_Array['MySQL_Filter'] = "WHERE `Required Completion Date` < DATE(NOW())";
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
//echo $MySQL_Command_Script; //TECHNICAL SUPPORT PURPOSES

if ($MySQL_Connection->query($MySQL_Command_Script) === TRUE) {
echo "[OVERDUE ERRORS]=> All adjusted.<br>";
} else {
echo "[OVERDUE ERRORS]=> Error:" . $MySQL_Connection->error . "<br>";
}
}
}

?>


<?php

$MySQL_Connection->close();
//header('Location: ' . $_SERVER['HTTP_REFERER']."#".Basic_Filter_Input($_POST['Dashboard_Indetifier']));

Count_Occurences($MySQL_Connection, "Equipment_Register", "ID");

?>

<?php } ?>










