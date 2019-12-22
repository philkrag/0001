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
// PAGE CREATED DATE: 2018-05-11

// DATE   		|| NAME 					|| MODIFICATION
// 2018-05-11 	|| Phillip Kraguljac 		|| Created.
// UNDER CONSTRUCTION ...

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
// CREATED: 2018-05-11
Check_Completion_Required_Dates();
function Check_Completion_Required_Dates(){

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "admin";
$Database_Name = "User_Data_Collection";

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection->connect_error) {die("Connection failed: " . $MySQL_Connection->connect_error);} 

?>


<?php // RETREIVE TABLE INFORMATION

echo "<br>*******************************************************************";
echo "<br>STEP: TABLE RETRIEVAL";
echo "<br>INFO: Retrieve all tables from database.";
echo "<br>";

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

echo "<br>ARRAY=><br>";
var_dump($Table_Listing);
echo "<br>";
echo "<br>";

?>

<?php

// GET SERVICE REGISTER CYCLE RATES

// 1. CYCLE THROUGH RECORD TABLES
// 2. CYCLE THROUGH REFERENCE IDS, DETERMINE IF ANY ARE PLANNED
// 3. IF NOT THEN
// 4. CYCLE THROUGH REFERENCE IDS, GET LAST COMPLETED
// 5. ADD RECORD BASED ON REFERENCE AND REGISTE CYCLE RATE
// 6. CYCLE THROUGH 

?>


<?php // COLLECT REGISTER CYCLE DURATIONS

echo "<br>*******************************************************************";
echo "<br>STEP: COLLECT REGISTER ITEM DETAILS";
echo "<br>INFO: Retrieve all relevant details from register tables.";
echo "<br>";

$i = 0;
$x = 0;

echo "<br>MYSQL=><br>";
for ($i = 0; $i < count($Table_Listing); $i++) {
if(substr($Table_Listing[$i], -9)=="_Register"){

$Input_Array['MySQL_Action'] = "SELECT * ";
$Input_Array['MySQL_Table'] = "FROM ".$Table_Listing[$i]." ";
$Input_Array['MySQL_Set'] = "";
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
echo $MySQL_Command_Script."<br>"; //TECHNICAL SUPPORT PURPOSES

$MySQL_Result = $MySQL_Connection->query($MySQL_Command_Script);

if ($MySQL_Result->num_rows > 0) {

    while($row = $MySQL_Result->fetch_assoc()) {
		$Register_Column_Data[$x]['Table'] = Basic_Filter_Input($Table_Listing[$i]);
		$Register_Column_Data[$x]['ID'] = Basic_Filter_Input($row['ID']);
		$Register_Column_Data[$x]['Service Interval (constant hours)'] = Basic_Filter_Input($row['Service Interval (constant hours)']);
		$x = $x + 1;
    }	
} else {}

}
}

echo "<br>ARRAY=><br>";
var_dump($Register_Column_Data);
echo "<br>";
echo "<br>";

?>


<?php // COLLECT RECORD PLANNING 

echo "<br>*******************************************************************";
echo "<br>STEP: COLLECT RECORD ITEM DETAILS";
echo "<br>INFO: Retrieve all relevant details from record tables.";
echo "<br>";

$i = 0;
$x = 0;

echo "<br>MYSQL=><br>";
for ($i = 0; $i < count($Table_Listing); $i++) {
if(substr($Table_Listing[$i], -7)=="_Record"){

$Input_Array['MySQL_Action'] = "SELECT * ";
//$Input_Array['MySQL_Table'] = "FROM Service_Record ";
$Input_Array['MySQL_Table'] = "FROM ".$Table_Listing[$i]." ";
$Input_Array['MySQL_Set'] = "";
$Input_Array['MySQL_Filter'] = "WHERE `Status` = 'Planned' OR `Status` = 'Completed'";
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
echo $MySQL_Command_Script."<br>"; //TECHNICAL SUPPORT PURPOSES

$MySQL_Result = $MySQL_Connection->query($MySQL_Command_Script);

if ($MySQL_Result->num_rows > 0) {

    while($row = $MySQL_Result->fetch_assoc()) {
		$Column_Data[$x]['Table'] = Basic_Filter_Input($Table_Listing[$i]);
		$Change_Type_Table = str_replace("_Record","_Register",$Table_Listing[$i]);
		$Remove_Spaces = str_replace("_"," ",$Change_Type_Table);
		$Add_ID_Refence = $Remove_Spaces." ID";
		$Reference_ID = $Add_ID_Refence;
		$Column_Data[$x]['Related Reference'] = Basic_Filter_Input($Reference_ID);
		$Column_Data[$x]['Related Index'] = Basic_Filter_Input($row[$Reference_ID]);
		$Column_Data[$x]['ID'] = Basic_Filter_Input($row['ID']);
		$Column_Data[$x]['Status'] = Basic_Filter_Input($row['Status']);
		$Column_Data[$x]['Actual Completion Date'] = Basic_Filter_Input($row['Actual Completion Date']);
		$Column_Data[$x]['Planned Maintenance Date'] = Basic_Filter_Input($row['Planned Maintenance Date']);
		$x = $x + 1;
    }	
} else {}

}
}

echo "<br>ARRAY=><br>";
var_dump($Column_Data);
echo "<br>";
echo "<br>";

?>


<?php // COMPLETE TABLE CHECK

$Related_Reference = "";
$Related_Index = "";
$Status = "";
$Last_Completed_Date = null;
$Last_Planned_Date = null;
$Record_Planned = false;

echo "<br>*******************************************************************";
echo "<br>STEP: CHECK FOR RECORD FOR ITEM NOT PLANNED";
echo "<br>INFO: ";
echo "<br>";

echo "<br>PROCESS=><br>";
for ($i = 0; $i < count($Register_Column_Data); $i++)
{	


	echo "<br>SEARCH=>".$Register_Column_Data[$i]['Table'].":".$Register_Column_Data[$i]['ID'];
	$Register_Item_Found = false;
	
	for ($x = 0; $x < count($Column_Data); $x++)
	{			
		echo "<br>SCAN=>";
		echo $Column_Data[$x]['Related Reference'].":".$Column_Data[$x]['Related Index'];		
		echo " || "."Status".":".$Column_Data[$x]['Status'];		
		echo " || "."Actual Completion Date".":".$Column_Data[$x]['Actual Completion Date'];		
		echo " || "."Planned Maintenance Date".":".$Column_Data[$x]['Planned Maintenance Date'];		
		
		
		$Master_Format_Reference_Column = str_replace("_", " ", $Register_Column_Data[$i]['Table']." ID");
		$Search_Column = $Column_Data[$x]['Related Reference'];		
		$Master_Index = $Register_Column_Data[$i]['ID'];
		$Search_Index = $Column_Data[$x]['Related Index'];
		
		
		if($Master_Format_Reference_Column==$Search_Column &&
		$Master_Index==$Search_Index)
		{			
			$Register_Item_Found = true;
			echo " || REG. MATCHED"; 
			
			if($Last_Completed_Date < strtotime($Column_Data[$x]['Actual Completion Date'])){$Last_Completed_Date = $Column_Data[$x]['Actual Completion Date'];}
			if($Last_Planned_Date < strtotime($Column_Data[$x]['Planned Maintenance Date'])){$Last_Planned_Date = $Column_Data[$x]['Planned Maintenance Date'];}
		
			if($Last_Planned_Date < $Last_Completed_Date){$Record_Planned = false;}
		
			if($Column_Data[$x]['Status']=="Planned" &&
			strtotime($Column_Data[$x]['Planned Maintenance Date']) > $Last_Completed_Date)
			{
				$Record_Planned = true;
			}
		
		}	
		
		
	}
	
	if($Register_Item_Found==false)
	{
		$Table = $Register_Column_Data[$i]['Table'];
		$Related_Reference = $Master_Format_Reference_Column;
		$Related_Index = $Master_Index;
		//$Date_Last_Completed = 

		echo "<br>RESULT=> Register Item(s) Not Found.";
		echo "<br>CYCLE=>".$Register_Column_Data[$i]['Service Interval (constant hours)'];	

		if($Register_Column_Data[$i]['Service Interval (constant hours)']>0)
		{
		echo "<br>ACTION=> Only Cycle Duration Exists - Record to be Added.";
		Insert_Record($Table, $Related_Reference, $Related_Index, null, null);

		// >>>>>>>>>>>>>>>>>>>>>>>>>>>. NEED TO ADD DATE LAST COMPLETED FUNCTION - NO EXTRACT TO DATE.


		$Related_Reference = "";
		$Related_Index = "";
		}else{
			echo "<br>ACTION=> No Cycle Duration or Record(s) - Record Cannot Be Added.";		
		}
	}else{	
	
	$Table = $Register_Column_Data[$i]['Table'];
	$Related_Reference = $Master_Format_Reference_Column;
	$Related_Index = $Master_Index;
	
	echo "<br>RESULT=> Register Item(s) Found.";	
	echo "<br>EXTRACT=> Last Completed Date:".$Last_Completed_Date;
	echo "<br>EXTRACT=> Last Planned Date:".$Last_Planned_Date;
	echo "<br>CYCLE=>".$Register_Column_Data[$i]['Service Interval (constant hours)'];	
	
	if($Register_Column_Data[$i]['Service Interval (constant hours)'] != null &&
	$Record_Planned != true)
	{
		
		echo "<br>ACTION=> Cycle Duration and Records Exist - Record to be Added.";
		Insert_Record($Table, $Related_Reference, $Related_Index, $Last_Completed_Date, $Register_Column_Data[$i]['Service Interval (constant hours)']);

		
	}else{
		echo "<br>ACTION=> No Cycle Duration - Record Cannot Be Added.";
	}
	
	
	}
	
	echo "<br>";	
}

echo count($Register_Column_Data);

?>

<?php

$MySQL_Connection->close();
//header('Location: ' . $_SERVER['HTTP_REFERER']."#".Basic_Filter_Input($_POST['Dashboard_Indetifier']));

Count_Occurences($MySQL_Connection, "Equipment_Register", "ID");

?>

<?php } ?>




<?php // CONNECT TO MYSQL DATABASE

// PURPOSE: INSERT NEW RECORD INTO THE DATABASE
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-05-14
// LAST MODIFIED: 2018-05-22

//Insert_Record();
function Insert_Record($Table, $Related_Reference, $Related_Index, $Last_Date, $Constant_Cycle_Hours){
	
?>


<?php // MODIFY MYSQL DATABASE

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "admin";
$Database_Name = "User_Data_Collection";

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection->connect_error) {die("Connection failed: " . $MySQL_Connection->connect_error);} 

?>


<?php

$i = 0;
$Current_Date = date('Y-m-d');
$Current_Time = date('H:m:s');


$Calculated_Require_By_Date = date('Y-m-d', strtotime('+'.$Constant_Cycle_Hours.' hours', strtotime($Last_Date)));
if($Last_Date==null && $Constant_Cycle_Hours==null)
{
	$Calculated_Require_By_Date = date('Y-m-d');	
}


$Input_Array['MySQL_Action'] = "INSERT INTO ";
$Input_Array['MySQL_Table'] = Basic_Filter_Input(str_replace("_Register", "_Record", $Table))." ";
$Input_Array['MySQL_Set'] = "(`{$Related_Reference}`, `Status`, `Required Completion Date`, `Last Modified Date`, `Last Modified Time`, `Last Modified by User`) VALUES ('{$Related_Index}', 'Planned', '{$Calculated_Require_By_Date}', '{$Current_Date}', '{$Current_Time}', 'Auto') ";
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

echo "<br>".$MySQL_Command_Script;

echo "<br>test";

if ($MySQL_Connection->query($MySQL_Command_Script) === TRUE) {
echo "Record updated successfully";
} else {
echo "Error updating record: " . $MySQL_Connection->error;
}

?>


<?php

$MySQL_Connection->close();

?>	


<?php } ?>






