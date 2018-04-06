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

<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/File_Uploads.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/Filter_Tools.php'; ?>


<?php

$Method = ""; if(isset($_POST['Method'])){$Method=$_POST['Method'];}

if($Method=="Save"){Save_To_Database();}
if($Method=="New"){Create_In_Database();}
if($Method=="Delete"){Delete_From_Database();}

?>



<?php // CONNECT TO MYSQL DATABASE

// PURPOSE: SAVING DATA TO THE DATABASE
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-12

function Save_To_Database(){

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "password";
$Database_Name = Return_Database($_POST['Table']);

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection->connect_error) {die("Connection failed: " . $MySQL_Connection->connect_error);} 

?>


<?php // MODIFY MYSQL DATABASE

$Table = ""; if(isset($_POST['Table'])){$Table = Basic_Filter_Input($_POST['Table']);}
$ID = ""; if(isset($_POST['ID'])){$ID = Basic_Filter_Input($_POST['ID']);}
$Dashboard_Indetifier = ""; if(isset($_POST['Dashboard_Indetifier'])){$Dashboard_Indetifier = Basic_Filter_Input($_POST['Dashboard_Indetifier']);}


$i = 0;

$Input_Array['MySQL_Action'] = "UPDATE ";
$Input_Array['MySQL_Table'] = Basic_Filter_Input($_POST['Table'])." ";
$Input_Array['MySQL_Set'] = "SET ";
$Input_Array['MySQL_Filter'] = "WHERE `ID` = ".$ID." ";
$Input_Array['MySQL_Order'] = "";
$Input_Array['MySQL_Limit'] = "";
$Input_Array['MySQL_Offset'] = "";

$Comma_Insert = "";
foreach ($_POST as $key => $value) {
if($key!="ID" && $key!="Method" && $key!="Table" && $key!="Last_Modified_Date"){
$Input_Array['MySQL_Set'] = $Input_Array['MySQL_Set'].$Comma_Insert." `".str_replace("_", " ", $key)."`='".str_replace("_", " ", Basic_Filter_Input($value))."'";
$Comma_Insert = ",";
}

if($key=="Last_Modified_Date"){
$Input_Array['MySQL_Set'] = $Input_Array['MySQL_Set'].", `Last Modified Date`='".date("Y-m-d")."'";
}

}
$Input_Array['MySQL_Set'] = $Input_Array['MySQL_Set']." ";

$MySQL_Command_Script = 
$Input_Array['MySQL_Action'].
$Input_Array['MySQL_Table'].
$Input_Array['MySQL_Set'].
$Input_Array['MySQL_Filter'].
$Input_Array['MySQL_Order'].
$Input_Array['MySQL_Limit'].
$Input_Array['MySQL_Offset'];
echo $MySQL_Command_Script; //TECHNICAL SUPPORT PURPOSES

if ($MySQL_Connection->query($MySQL_Command_Script) === TRUE) {
echo "Record updated successfully";
} else {
echo "Error updating record: " . $MySQL_Connection->error;
}

?>	

<?php

$Upload_Array['ID'] = $ID;
if($_FILES){Upload_File($Upload_Array);}

?>

<?php

$MySQL_Connection->close();
header('Location: ' . $_SERVER['HTTP_REFERER']."#".$Dashboard_Indetifier);

?>

<?php } ?>






<?php // CONNECT TO MYSQL DATABASE

// PURPOSE: DELETING DATA FROM DATABASE
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-12

function Delete_From_Database(){

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "password";
$Database_Name = Return_Database($_POST['Table']);

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection->connect_error) {die("Connection failed: " . $MySQL_Connection->connect_error);} 

?>


<?php // MODIFY MYSQL DATABASE

$i = 0;

$Input_Array['MySQL_Action'] = "UPDATE ";
$Input_Array['MySQL_Table'] = Basic_Filter_Input($_POST['Table'])." ";
$Input_Array['MySQL_Set'] = "SET `Deleted Date`='".date('Y-m-d')."' ";
$Input_Array['MySQL_Filter'] = "WHERE `ID` = ".Basic_Filter_Input($_POST['ID'])." ";
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
echo "Record updated successfully";
} else {
echo "Error updating record: " . $MySQL_Connection->error;
}

?>	

<?php

$MySQL_Connection->close();
header('Location: ' . $_SERVER['HTTP_REFERER']."#".Basic_Filter_Input($_POST['Dashboard_Indetifier']));

?>

<?php } ?>







<?php // CONNECT TO MYSQL DATABASE

// PURPOSE: CREATING NEW ENTRY IN DATABASE
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-12

function Create_In_Database(){

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "password";
$Database_Name = Return_Database($_POST['Table']);

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection->connect_error) {die("Connection failed: " . $MySQL_Connection->connect_error);} 

?>


<?php // CROSS LINKING INJECTION

// PURPOSE: CROSS LINKING OF ITEMS BETWEEN TABLES
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-19

$Inset_Column = "";
$Inset_Value = "";

var_dump($_POST);

foreach ($_POST as $key => $value){
	if(substr($key, -2)=="ID" && strlen($key)>2){		
	$Inset_Column = $Inset_Column. ", `".str_replace("_", " ", $key)."`";
	$Inset_Value = $Inset_Value. ", '".$value."'";
	echo $Inset_Column;
}
}

?>


<?php // MODIFY MYSQL DATABASE

$i = 0;

$Input_Array['MySQL_Action'] = "INSERT INTO ";
$Input_Array['MySQL_Table'] = Basic_Filter_Input($_POST['Table'])." ";
$Input_Array['MySQL_Set'] = "(`Last Modified Date`{$Inset_Column}) VALUES ('".date('Y-m-d')."'{$Inset_Value}) ";
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
echo "Record updated successfully";
} else {
echo "Error updating record: " . $MySQL_Connection->error;
}

?>	

<?php

$MySQL_Connection->close();
header('Location: ' . $_SERVER['HTTP_REFERER']."#".Basic_Filter_Input($_POST['Dashboard_Indetifier']));

?>

<?php } ?>



<?php // THE FOLLOWING DETERMINES WHICH DATABASE TO DRAW THE DATA FROM
function Return_Database($From_Statement){
	$Required_Datebase = "User_Data_Collection";
	if(
	$From_Statement=="User_Configuration" || 
	$From_Statement=="User_Details"
	){$Required_Datebase = "User_Configuration";}
	return $Required_Datebase;
} ?>






