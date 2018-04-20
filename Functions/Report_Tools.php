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
// PAGE CREATED DATE: 2018-03-03

// DATE   		|| NAME 					|| MODIFICATION
// 2018-03-13 	|| Phillip Kraguljac 		|| Released.
// 2018-04-07 	|| Phillip Kraguljac 		|| Updated - v1.2.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL

?>

<?php 

// PURPOSE: ... 
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-04-03

function Retrieve_Data($Enquiry_Array){
	
$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "password";
$Database_Name = Return_Database($Enquiry_Array['MySQL_Table']);

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection->connect_error) {die("Connection failed: " . $MySQL_Connection->connect_error);} 
	
	
	// ADDING A DELETE FILTER TO QUERY
$Deleted_Item_Inset = "";	
$Deleted_Item_Inset = " AND ( `Deleted Date` > '".date('Y-m-d')."'
OR `Deleted Date` = '' 
OR `Deleted Date` IS NULL) ";		

	
	
$MySQL_Command_Script = 
$Enquiry_Array['MySQL_Action'].
$Enquiry_Array['MySQL_Table'].
$Enquiry_Array['MySQL_Filter'].$Deleted_Item_Inset.
$Enquiry_Array['MySQL_Order'].
$Enquiry_Array['MySQL_Limit'].
$Enquiry_Array['MySQL_Offset'];

$MySQL_Result = $MySQL_Connection->query($MySQL_Command_Script);

$Return_String = "AND (";
$Joiner_Inset = "";

while($row = $MySQL_Result->fetch_assoc()) {


	$Return_String = $Return_String.$Joiner_Inset."`".$Enquiry_Array['Reference_Name']."` = '".Basic_Filter_Input($row['ID'])."'" ;
	

$Joiner_Inset = " OR ";
}

$Return_String = $Return_String.")";

$MySQL_Connection->close();

return $Return_String;
}
?>