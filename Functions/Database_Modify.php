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

<?php include $_SERVER['DOCUMENT_ROOT'].'/Functions/File_Uploads.php'; ?>


<?php

$Method = ""; if(isset($_POST['Method'])){$Method=$_POST['Method'];}

if($Method=="Save"){Save_To_Database($_POST);}
if($Method=="New"){Create_In_Database($_POST);}
if($Method=="Delete"){Delete_From_Database($_POST);}

?>



<?php // DATABASE CONNECTION FUNCTION

function Save_To_Database(){

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "password";
$Database_Name = "User_Data_Collection";

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection->connect_error) {die("Connection failed: " . $MySQL_Connection->connect_error);} 

?>


<?php // EXTRACT DATABASE DATA TO VARIABLE

$i = 0;

$Input_Array['MySQL_Action'] = "UPDATE ";
$Input_Array['MySQL_Table'] = $_POST['Table']." ";
$Input_Array['MySQL_Set'] = "SET ";
$Input_Array['MySQL_Filter'] = "WHERE `ID` = ".$_POST['ID']." ";
$Input_Array['MySQL_Order'] = "";
$Input_Array['MySQL_Limit'] = "";
$Input_Array['MySQL_Offset'] = "";

$Comma_Insert = "";
foreach ($_POST as $key => $value) {
if($key!="ID"&&$key!="Method"&&$key!="Table"){
$Input_Array['MySQL_Set'] = $Input_Array['MySQL_Set'].$Comma_Insert." `".str_replace("_", " ", $key)."`='".str_replace("_", " ", $value)."'";
$Comma_Insert = ",";
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

$Upload_Array['ID'] = $_POST['ID'];
$Upload_Array['Upload Directory'] = $_SERVER['DOCUMENT_ROOT']."/Files/WMS/";

if($_FILES){
Upload_File($Upload_Array);
}
?>

<?php

$MySQL_Connection->close();
header('Location: ' . $_SERVER['HTTP_REFERER']."#".$_POST['Dashboard_Indetifier']);

?>

<?php } ?>






<?php // DATABASE UPDATE FUNCTION

function Delete_From_Database(){

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "password";
$Database_Name = "User_Data_Collection";

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection->connect_error) {die("Connection failed: " . $MySQL_Connection->connect_error);} 

?>


<?php // EXTRACT DATABASE DATA TO VARIABLE

$i = 0;

$Input_Array['MySQL_Action'] = "UPDATE ";
$Input_Array['MySQL_Table'] = $_POST['Table']." ";
$Input_Array['MySQL_Set'] = "SET `Deleted Date`='".date('Y-m-d')."' ";
$Input_Array['MySQL_Filter'] = "WHERE `ID` = ".$_POST['ID']." ";
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
header('Location: ' . $_SERVER['HTTP_REFERER']."#".$_POST['Dashboard_Indetifier']);

?>

<?php } ?>







<?php // DATABASE UPDATE FUNCTION

function Create_In_Database(){

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "password";
$Database_Name = "User_Data_Collection";

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection->connect_error) {die("Connection failed: " . $MySQL_Connection->connect_error);} 

?>


<?php // EXTRACT DATABASE DATA TO VARIABLE

$i = 0;

$Input_Array['MySQL_Action'] = "INSERT INTO ";
$Input_Array['MySQL_Table'] = $_POST['Table']." ";
$Input_Array['MySQL_Set'] = "(`Last Modified Date`) VALUES ('".date('Y-m-d')."') ";
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
header('Location: ' . $_SERVER['HTTP_REFERER']."#".$_POST['Dashboard_Indetifier']);

?>

<?php } ?>








