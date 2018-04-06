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


}
?>