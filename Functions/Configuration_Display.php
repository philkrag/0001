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
// 2018-03-13 	|| Phillip Kraguljac 		|| Created.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL
?>

<?php

// PURPOSE: SETTING BASIC INPUT PAGES
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-12

function Get_Company_Name(){ ?>

<?php // CONNECT TO MYSQL DATABASE

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "password";
$Database_Name = "User_Configuration";

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection->connect_error) {die("Connection failed: " . $MySQL_Connection->connect_error);} 

?>

<?php // EXTRACT DATABASE DATA TO VARIABLE
$MySQL_Command_Script = "SELECT * FROM `User_Configuration` WHERE `ID` = '1'";
$Query_Result = $MySQL_Connection->query($MySQL_Command_Script);
if ($Query_Result->num_rows > 0) {
while($row = $Query_Result->fetch_assoc()) {
$Company_Name = $row['Company Name'];
}	
} else {
echo "!!!NO DETAILS!!!";
}
$MySQL_Connection->close();
return $Company_Name;

} ?>




