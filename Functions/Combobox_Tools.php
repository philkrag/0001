

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

$Combobox_Data[$i]['Option'] = $row['Option'];
$Combobox_Data[$i]['Description'] = $row['Description'];
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