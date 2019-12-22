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
// 2019-12-21 	|| Phillip Kraguljac 		|| Updated - v1.9.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL

?>

<?php 

// PURPOSE: EXTRACTING PAGE DETAILS
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-12

function Retrieve_Offset($Get_Data, $Dashboard_Indetifier){
$Offset = 0;
if(isset($Get_Data[$Dashboard_Indetifier])){
	$Offset=$Get_Data[$Dashboard_Indetifier];
	}
	//echo $Dashboard_Indetifier;
	//var_dump($Get_Data);
return $Offset;
}
?>


<?php 

// PURPOSE: EXTRACT DATA FROM ANOTHER EXTERNAL TABLE
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2019-12-21

function Retrieve_Detail($Tool_Array){
$Offset = "";
$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "admin";
$Database_Name = "User_Data_Collection";

$Table_Name = $Tool_Array[1];
$Table_Item_Index_To_Display = $Tool_Array[2];
$Table_Column_To_Display =  $Tool_Array[3];

$MySQL_Connection_2 = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection_2->connect_error) {die("Connection failed: " . $MySQL_Connection_2->connect_error);}
$MySQL_Command_Script = "SELECT * FROM ".$Table_Name." WHERE `ID` = '".$Table_Item_Index_To_Display."'";
$result = $MySQL_Connection_2->query($MySQL_Command_Script);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$Offset = $row[$Table_Column_To_Display];
}
} else {}
$MySQL_Connection_2->close();
return $Offset;
}

?>












