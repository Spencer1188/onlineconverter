<?php


$upload_folder = '../../readfiles/'; //Das Upload-Verzeichnis
$filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
$status;
 
//Überprüfung der Dateiendung
$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
if(!in_array($extension, $allowed_extensions)) {
 $status = "Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt";
}
 
/*
//Überprüfung der Dateigröße
$max_size = 500*1024; //500 KB
if($_FILES['file']['size'] > $max_size) {
$status ="Bitte keine Dateien größer 500kb hochladen";
}
*/

//Pfad zum Upload
$new_path = '../../readfiles/img.png';
 
//Neuer Dateiname falls die Datei bereits existiert
if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
 $id = 1;
 do {
 $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
 $id++;
 } while(file_exists($new_path));
}
 
//Alles okay, verschiebe Datei an neuen Pfad
move_uploaded_file($_FILES['file']['tmp_name'], $new_path);


// Python

echo shell_exec("sudo python /var/www/onlineconverter/relais.py");



?>