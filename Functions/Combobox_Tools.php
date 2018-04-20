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

<?php 
function Get_Combobox_Data_If_Available($Table_Name, $Input_Name){
$Combobox_Data = null;

$Server_Name = "localhost:3306";
$User_Name = "admin";
$Password = "password";
$Database_Name = "System_Configuration";

$MySQL_Connection = new mysqli($Server_Name, $User_Name, $Password, $Database_Name);
if ($MySQL_Connection->connect_error) {die("Connection failed: " . $MySQL_Connection->connect_error);} 

$i = 0;
$MySQL_Command_Script = "SELECT * FROM Combo_Options WHERE `Table` = '{$Table_Name}' AND `Element` = '{$Input_Name}'";
$result = $MySQL_Connection->query($MySQL_Command_Script);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

$Combobox_Data[$i]['Option'] = Basic_Filter_Input($row['Option']);
$Combobox_Data[$i]['Description'] = Basic_Filter_Input($row['Description']);
$i = $i + 1;
}	
}else{}
$MySQL_Connection->close();	

return $Combobox_Data;
}

?>


<?php
function Display_Combobox($Combobox_Data, $Input_Name, $Current_Value){ ?>

<select name="<?php echo $Input_Name; ?>" class="Inputs_ComboBox">
<?php 
for ($x = 0; $x < count($Combobox_Data); $x++) { 
$Selectable_Inset = ""; if($Combobox_Data[$x]['Option']==$Current_Value){$Selectable_Inset = "Selected";}
$More_Information_Inset = "";  if($Combobox_Data[$x]['Description']!=Null){$More_Information_Inset = " - ".$Combobox_Data[$x]['Description'];}

?>

<option value="<?php echo str_replace(" ", "_", $Combobox_Data[$x]['Option']); ?>" <?php echo $Selectable_Inset; ?>><?php echo "[".strtoupper($Combobox_Data[$x]['Option'])."]".$More_Information_Inset; ?></option>
<?php } ?>
</select>

<?php } ?>