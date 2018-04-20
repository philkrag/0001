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

// PURPOSE: UPLOADING FILES ONTO SERVER
// AUTHOR: PHILLIP KRAGULJAC
// CREATED: 2018-03-12



function Upload_File($Upload_Array){

	Upload_PDF_Document("WMS_PDFs", $Upload_Array['ID']);	
	Upload_PDF_Document("MSDS_PDFs", $Upload_Array['ID']);
	Upload_PDF_Document("Quote_PDFs", $Upload_Array['ID']);
	Upload_PDF_Document("Purchase_Request_PDFs", $Upload_Array['ID']);
	Upload_PDF_Document("Purchase_Order_PDFs", $Upload_Array['ID']);
	Upload_PDF_Document("Tax_Invoice_PDFs", $Upload_Array['ID']);
	Upload_PDF_Document("Document_PDFs", $Upload_Array['ID']);
		
	
	Upload_Image_File("User_Logos", $Upload_Array['ID']);
	Upload_Image_File("Chemical_Register_Photos", $Upload_Array['ID']);
	Upload_Image_File("Equipment_Register_Photos", $Upload_Array['ID']);
	Upload_Image_File("Task_Record_Photos", $Upload_Array['ID']);
	Upload_Image_File("Project_Register_Photos", $Upload_Array['ID']);
}

// THE FOLLOWING IS A GENERIC PDF UPLOAD FUNCTION
function Upload_PDF_Document($File_Type, $ID){
if(isset($_FILES[$File_Type])){

$Target_File = "../Files/".$File_Type."/"."[".$ID."].pdf";
echo "<br>".$Target_File."<br>";

echo $Target_File;
$Upload_OK_Flag = 1;
$Image_File_Type = strtolower(pathinfo($Target_File,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
$check = getimagesize($_FILES[$File_Type]["tmp_name"]);
if($check !== false) {
echo "File is an image - " . $check["mime"] . ".";
$Upload_OK_Flag = 1;
} else {
echo "<br>File is not an image.";
$Upload_OK_Flag = 0;
}
}

if (file_exists($Target_File)) {
echo "<br>Sorry, file already exists.";
$Upload_OK_Flag = 0;
}

if ($_FILES[$File_Type]["size"] > 100000000) {
echo "<br>Sorry, your file is too large.";
$Upload_OK_Flag = 0;
}

// if($Image_File_Type != "jpg" && $Image_File_Type != "png" && $Image_File_Type != "jpeg"
// && $Image_File_Type != "gif" ) {
// echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
// $Upload_OK_Flag = 0;
// }

if ($Upload_OK_Flag == 0) {
echo "<br>Sorry, your file was not uploaded.";

} else {
if (move_uploaded_file($_FILES[$File_Type]["tmp_name"], $Target_File)) {
echo "<br>The file ". basename( $_FILES[$File_Type]["name"]). " has been uploaded.";
} else {
echo "<br>Sorry, there was an error uploading your file.";
}
}
}
}




// THE FOLLOWING IS IMAGE UPLOAD
function Upload_Image_File($File_Type, $ID){
if(isset($_FILES[$File_Type])){

$Target_File = "../Files/".$File_Type."/"."[".$ID."].jpg";
echo "<br>".$Target_File."<br>";

echo $Target_File;
$Upload_OK_Flag = 1;
$Image_File_Type = strtolower(pathinfo($Target_File,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
$check = getimagesize($_FILES[$File_Type]["tmp_name"]);
if($check !== false) {
echo "<br>File is an image - " . $check["mime"] . ".";
$Upload_OK_Flag = 1;
} else {
echo "<br>File is not an image.";
$Upload_OK_Flag = 0;
}
}

if (file_exists($Target_File)) {
if (!unlink($Target_File))
  {
  echo ("<br>Error while deleting existing file.");
  }
else
  {
  echo ("<br>Existing file deleted.");
  }
}

if ($_FILES[$File_Type]["size"] > 2500000) {
echo "<br>Sorry, your file is too large.";
$Upload_OK_Flag = 0;
}

//if($Image_File_Type != "jpg" && $Image_File_Type != "png" && $Image_File_Type != "jpeg" && $Image_File_Type != "gif" ) {
if($Image_File_Type != "jpg" && $Image_File_Type != "png") {
echo "<br>Sorry, only JPG, & PNG files are allowed.";
$Upload_OK_Flag = 0;
}

if ($Upload_OK_Flag == 0) {
echo "<br>Sorry, your file was not uploaded.";

} else {
if (move_uploaded_file($_FILES[$File_Type]["tmp_name"], $Target_File)) {
echo "<br>The file ". basename( $_FILES[$File_Type]["name"]). " has been uploaded.";
} else {
echo "<br>Sorry, there was an error uploading your file.";
}
}
}
	}



?>