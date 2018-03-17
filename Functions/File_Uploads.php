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
// along with Foobar.  If not, see <http://www.gnu.org/licenses/>.

// /////////////////////////////////////////////////////////////////////// COPYRIGHT NOTICE

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL

// PAGE CREATED BY: Phillip Kraguljac
// PAGE CREATED DATE: 2018-03-13

// DATE   		|| NAME 					|| MODIFICATION
// 2018-03-13 	|| Phillip Kraguljac 		|| Released.

// /////////////////////////////////////////////////////////////////////// VERSION CONTROL

?>

<?php

function Upload_File($Upload_Array){

$Target_File = $Upload_Array['Upload Directory'] ."[".$Upload_Array['ID']."].pdf";

echo $Target_File;
$Upload_OK_Flag = 1;
$Image_File_Type = strtolower(pathinfo($Target_File,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["WMSUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $Upload_OK_Flag = 1;
    } else {
        echo "File is not an image.";
        $Upload_OK_Flag = 0;
    }
}

// Check if file already exists
if (file_exists($Target_File)) {
    echo "Sorry, file already exists.";
    $Upload_OK_Flag = 0;
}

// Check file size
if ($_FILES["WMSUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $Upload_OK_Flag = 0;
}


// Allow certain file formats
// if($Image_File_Type != "jpg" && $Image_File_Type != "png" && $Image_File_Type != "jpeg"
// && $Image_File_Type != "gif" ) {
    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    // $Upload_OK_Flag = 0;
// }

// Check if $Upload_OK_Flag is set to 0 by an error
if ($Upload_OK_Flag == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["WMSUpload"]["tmp_name"], $Target_File)) {
        echo "The file ". basename( $_FILES["WMSUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}




}



?>