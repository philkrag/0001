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
// PAGE CREATED DATE: 2018-04-05

// DATE   		|| NAME 					|| MODIFICATION
// 2018-03-13 	|| Phillip Kraguljac 		|| Released.
// 2018-04-07 	|| Phillip Kraguljac 		|| Updated - v1.2.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL

?>

<?php 

// PURPOSE: DISPLAY PDF FILE UPLOAD INPUTS
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-30
// CURRENT VERSION: V1.1

function Display_Menu_Items($Input_Array){ 

?>
	
<br><br>
<table class="Menu_Table">
<col width="80px">
<col width="*">


<tr>
<td class="Menu_Heading_Cell" colspan="3">
<div class="Menu_Heading_Icon_Circle">
<img class="Menu_Icon_Image" src="Images\Icons\Open-Book.svg" alt="" >
</div>
<?php if(!isset($Input_Array['Heading'])){echo "REPORTS"; }else{ echo $Input_Array['Heading']; } ?>
</td>		
</tr>


<?php for ($x = 0; $x < count($Input_Array['Item_Description']); $x++) { ?>


<tr>
<td class="Menu_Submit_Cell">

<form>
<input type="button" class="Upper_Submit_Button" value="View" onclick="window.location.href='<?php echo $Input_Array['Item_Link'][$x]; ?>?ID=<?php echo $Input_Array['ID']; ?>'" />
</form>
</td>

<td class="Menu_Description_Cell"><?php echo $Input_Array['Item_Description'][$x]; ?></td>

</tr>

<?php } ?>

</table>
<br>
<br>
	
<?php
	
} 

?>


