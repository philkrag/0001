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

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL
?>


<?php

// PURPOSE: DISPLAYING BASIC ITEM PAGE LEGENDS
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-12

function Display_Index_Page_Legend(){ ?>

<table class="Legend_Table">
<col width="*">
<col width="32px">
<col width="300px">

<tr>
<td class="Legend_Spacer_Cell"></td>
<td class="Legend_Heading_Cell" colspan="2">LEGEND</td>
</tr>

<tr>
<td class="Legend_Spacer_Cell"></td>
<td class="Legend_Icon_Cell"><img src="Images\Icons\Barrier.svg" alt="" width="20" height="20"></td>
<td class="Legend_Information_Cell">Under Construction.</td>
</tr>

</table>

<?php } ?>


<?php

// PURPOSE: DISPLAYING BASIC ITEM PAGE LEGENDS
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-12

function Display_Item_Page_Legend(){ ?>

<table class="Legend_Table">
<col width="*">
<col width="32px">
<col width="300px">

<tr>
<td class="Legend_Spacer_Cell"></td>
<td class="Legend_Heading_Cell" colspan="2">LEGEND</td>
</tr>

<tr>
<td class="Legend_Spacer_Cell"></td>
<td class="Legend_Icon_Cell"><img src="Images\Icons\Writing.svg" alt="" width="20" height="20"></td>
<td class="Legend_Information_Cell">Item edit section.</td>
</tr>

<tr>
<td class="Legend_Spacer_Cell"></td>
<td class="Legend_Icon_Cell"><img src="Images\Icons\Open-Book.svg" alt="" width="20" height="20"></td>
<td class="Legend_Information_Cell">Available reports.</td>
</tr>

<tr>
<td class="Legend_Spacer_Cell"></td>
<td class="Legend_Icon_Cell"><img src="Images\Icons\Notes.svg" alt="" width="20" height="20"></td>
<td class="Legend_Information_Cell">Related dashboard section(s).</td>
</tr>

<tr>
<td class="Legend_Spacer_Cell"></td>
<td class="Legend_Icon_Cell"><img src="Images\Icons\Warning.svg" alt="" width="20" height="20"></td>
<td class="Legend_Information_Cell">Item(s) which will require attention soon.</td>
</tr>

<tr>
<td class="Legend_Spacer_Cell"></td>
<td class="Legend_Icon_Cell"><img src="Images\Icons\Siren.svg" alt="" width="20" height="20"></td>
<td class="Legend_Information_Cell">Item(s) which requrie attention.</td>
</tr>

</table>

<?php } ?>





