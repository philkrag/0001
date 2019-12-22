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
// PAGE CREATED DATE: 2018-03-30

// DATE   		|| NAME 					|| MODIFICATION
// 2018-03-13 	|| Phillip Kraguljac 		|| Released.
// 2018-04-07 	|| Phillip Kraguljac 		|| Updated - v1.2.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL

?>

<?php 

// PURPOSE: DISPLAY PDF FILE UPLOAD INPUTS
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-30

function Display_PDF_Upload_Inputs($Table_Name, $Input_Array){

if($Table_Name == "Task_Record"){?>
<tr>
<td class="Input_Label_Cell">Upload Completed WMS</td>
<td class="Input_Value_Cell"><?php File_Add_Button("WMS_PDFs", $Input_Array); ?></td>
</tr>
<?php } 
	
	
if($Table_Name == "Chemical_Register"){?>
<tr>
<td class="Input_Label_Cell">Upload OEM MSDS</td>
<td class="Input_Value_Cell"><?php File_Add_Button("MSDS_PDFs", $Input_Array); ?></td>
</tr>
<?php } 


if($Table_Name == "Quote_Record"){?>
<tr>
<td class="Input_Label_Cell">Upload Quote PDF</td>
<td class="Input_Value_Cell"><?php File_Add_Button("Quote_PDFs", $Input_Array); ?></td>
</tr>
<?php } 

if($Table_Name == "Purchase_Request_Record"){?>
<tr>
<td class="Input_Label_Cell">Upload Purchase Request PDF</td>
<td class="Input_Value_Cell"><?php File_Add_Button("Purchase_Request_PDFs", $Input_Array); ?></td>
</tr>
<?php } 

if($Table_Name == "Purchase_Order_Record"){?>
<tr>
<td class="Input_Label_Cell">Upload Purchase Order PDF</td>
<td class="Input_Value_Cell"><?php File_Add_Button("Purchase_Order_PDFs", $Input_Array); ?></td>
</tr>
<?php }

if($Table_Name == "Tax_Invoice_Record"){?>
<tr>
<td class="Input_Label_Cell">Upload Tax Invoice PDF</td>
<td class="Input_Value_Cell"><?php File_Add_Button("Tax_Invoice_PDFs", $Input_Array); ?></td>
</tr>
<?php }

if($Table_Name == "Approval_Record"){?>
<tr>
<td class="Input_Label_Cell">Upload Signed Approval PDF</td>
<td class="Input_Value_Cell"><?php File_Add_Button("Approval_PDFs", $Input_Array); ?></td>
</tr>
<?php }

if($Table_Name == "Document_Record"){?>
<tr>
<td class="Input_Label_Cell">Upload Document PDF</td>
<td class="Input_Value_Cell"><?php File_Add_Button("Document_PDFs", $Input_Array); ?></td>
</tr>
<?php }


}
?>


<?php

// PURPOSE: DISPLAYING IMAGE FILE UPLOAD INPUTS
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-30

function Display_Image_Upload_Inputs($Table_Name, $Input_Array){

if($Table_Name == "Equipment_Register"){?>
<tr>
<td class="Input_Label_Cell">Upload Photo</td>
<?php $Photo_Type = $Table_Name."_Photos"; ?>
<td class="Input_Value_Cell"><?php File_Add_Button($Photo_Type, $Input_Array); ?></td>
</tr>
<?php } 

if($Table_Name == "Task_Record"){?>
<tr>
<td class="Input_Label_Cell">Upload Photo</td>
<?php $Photo_Type = $Table_Name."_Photos"; ?>
<td class="Input_Value_Cell"><?php File_Add_Button($Photo_Type, $Input_Array); ?></td>
</tr>
<?php }

if($Table_Name == "User_Configuration"){?>
<tr>
<td class="Input_Label_Cell">Upload Logo</td>
<?php $Photo_Type = "User_Logos"; ?>
<td class="Input_Value_Cell"><?php File_Add_Button($Photo_Type, $Input_Array); ?></td>
</tr>
<?php }

if($Table_Name == "Project_Register"){?>
<tr>
<td class="Input_Label_Cell">Upload Photo</td>
<?php $Photo_Type = $Table_Name."_Photos"; ?>
<td class="Input_Value_Cell"><?php File_Add_Button($Photo_Type, $Input_Array); ?></td>
</tr>
<?php }

if($Table_Name == "Chemical_Register"){?>
<tr>
<td class="Input_Label_Cell">Upload Photo</td>
<?php $Photo_Type = $Table_Name."_Photos"; ?>
<td class="Input_Value_Cell"><?php File_Add_Button($Photo_Type, $Input_Array); ?></td>
</tr>
<?php }


}
?>

<?php 

// PURPOSE: DISPLAY ID LINK BUTTON
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-04-18

function Display_ID_Link_Button($Input_Name, $Input_Value){
$Return_String = "";
$Link_String = str_replace(" ", "_",substr($Input_Name, 0, -3))."_Item.php?ID=".$Input_Value;
if(substr($Input_Name, -3)==" ID"){
$Return_String = $Return_String."<a href=\"".$Link_String."\">";	
$Return_String = $Return_String."<div class=\"Input_Label_Icon_Circle\">";
$Return_String = $Return_String."<img class=\"Input_Label_Icon_Image\" src=\"Images\Icons\Visibility.svg\" title=\"Go To Item.\" alt=\"View\" width=\"16\" height=\"16\">";
$Return_String = $Return_String."</div>";
$Return_String = $Return_String."</a>";	
}
return $Return_String;
}

?>



<?php 

// PURPOSE: EXTRACT ADDITIONAL INFORMATION ENTRIES
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-04-20
// MODIFIED: 2018-05-22

function Get_Info_Data_If_Available($System_Table_Name, $User_Table_Name, $Input_Name){
$Combobox_Data = null;

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "admin";
$Database_Name = "System_Configuration";

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection->connect_error) {die("Connection failed: " . $MySQL_Connection->connect_error);} 

$i = 0;
$MySQL_Command_Script = "SELECT * FROM {$System_Table_Name} WHERE `Table` = '{$User_Table_Name}' AND `Element` = '{$Input_Name}'";
$result = $MySQL_Connection->query($MySQL_Command_Script);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

$Combobox_Data[$i]['Description'] = Basic_Filter_Input($row['Description']);
$i = $i + 1;
}	
}else{}
$MySQL_Connection->close();	

return $Combobox_Data;
}

?>


<?php 

// PURPOSE: DISPLAY INFORMATION LINK BUTTON
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-04-20
// MODIFIED: 2018-05-22

function Display_Information_Link_Button($User_Table_Name, $Input_Name){
$Info_Data = null;
$Info_Data = Get_Info_Data_If_Available("Input_Information", $User_Table_Name, $Input_Name);

if($Info_Data != NULL){	
$Return_String = "";
// $Link_String = str_replace(" ", "_",substr($Input_Name, 0, -3))."_Item.php?ID=".$Input_Value;
// if(substr($Input_Name, -3)==" ID"){
//$Return_String = $Return_String."<a href=\"".$Link_String."\">";	
$Return_String = $Return_String."<div class=\"Input_Label_Icon_Circle\">";
$Return_String = $Return_String."<img class=\"Input_Label_Icon_Image\" src=\"Images\Icons\Info.svg\" title=\"".$Info_Data[0]['Description']."\" alt=\"View\" width=\"16\" height=\"16\">";
$Return_String = $Return_String."</div>";
//$Return_String = $Return_String."</a>";	
// }
return $Return_String;
}
}

?>


<?php 

// PURPOSE: DISPLAY IMPORTANT INFORMATION LINK BUTTON
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-05-22
// MODIFIED: 2018-05-22

function Display_Important_Link_Button($User_Table_Name, $Input_Name){
$Info_Data = null;
$Info_Data = Get_Info_Data_If_Available("Input_Important", $User_Table_Name, $Input_Name);

if($Info_Data != NULL){	
$Return_String = "";
// $Link_String = str_replace(" ", "_",substr($Input_Name, 0, -3))."_Item.php?ID=".$Input_Value;
// if(substr($Input_Name, -3)==" ID"){
//$Return_String = $Return_String."<a href=\"".$Link_String."\">";	
$Return_String = $Return_String."<div class=\"Input_Label_Icon_Circle\">";
$Return_String = $Return_String."<img class=\"Input_Label_Icon_Image\" src=\"Images\Icons\Important.svg\" title=\"".$Info_Data[0]['Description']."\" alt=\"View\" width=\"16\" height=\"16\">";
$Return_String = $Return_String."</div>";
//$Return_String = $Return_String."</a>";	
// }
return $Return_String;
}
}

?>

