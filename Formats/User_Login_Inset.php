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
// 2018-04-07 	|| Phillip Kraguljac 		|| Updated - v1.2.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL
?>


<form class="" action="Functions/User_Login.php" method="POST">

<table class="User_Login_Table">
<col width="64px">
<col width="100px">
<col width="*">
<col width="80px">

<tr>
<td class="User_Login_Icon_Cell" rowspan="3"><img src="Images\Icons\User.svg" alt="" width="64px" height="64px"></td>
<td class="User_Login_Label_Cell">Username</td>
<?php if($_SESSION['Logged_In_User']){ ?>
<td class="User_Login_Value_Cell" colspan="2"><?php echo $_SESSION['Logged_In_User']; ?></td>
<?php } else { ?>
<td class="User_Login_Value_Cell" colspan="2"><input class="Inputs_Text" type="text" name="User_Name" value="" required></td>
<?php } ?>
</tr>

<tr>
<?php if($_SESSION['Logged_In_User']){ ?>
<td class="User_Login_Label_Cell">Status</td>
<td class="User_Login_Value_Cell" colspan="2">Logged In.</td>
<?php } else { ?>
<td class="User_Login_Label_Cell">Password</td>
<td class="User_Login_Value_Cell" colspan="2"><input class="Inputs_Text" type="password" name="Password" value=""></td>
<?php } ?>
</tr>

<tr>
<?php if($_SESSION['Logged_In_User']){ ?>
<td class="User_Login_Spacer_Cell" colspan="2"></td>
<td class="User_Login_Button_Cell" colspan="1"><button class="Lower_Submit_Button" type="submit" name="Mode" value="Log_Out">Log Out</button></td>
<?php } else { ?>
<td class="User_Login_Spacer_Cell" colspan="2"></td>
<td class="User_Login_Button_Cell" colspan="1"><button class="Lower_Submit_Button" type="submit" name="Mode" value="Log_In">Enter</button></td>

<?php } ?>
</tr>

</table>

</form>