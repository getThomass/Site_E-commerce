<?php


$file = $_FILES["file"];

move_uploaded_file($file["tmp_name"], "uploads/"/*le nom du dossier image créé*/ . $file["name"]);


header("Location: " . $_SERVER["HTTP_REFERER"]);

?>