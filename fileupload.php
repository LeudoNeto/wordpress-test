<?php
    $currentDirectory = getcwd();
    $uploadDirectory = "/img/";

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed 

    $fileName = $_FILES['foto']['name'];
    $fileSize = $_FILES['foto']['size'];
    $fileTmpName  = $_FILES['foto']['tmp_name'];
    $fileType = $_FILES['foto']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

    if (isset($_POST['submit'])) {

    if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
    }

    if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
    }

    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
        echo "The file " . basename($fileName) . " has been uploaded";
        } else {
        echo "An error occurred. Please contact the administrator.";
        }
    } else {
        foreach ($errors as $error) {
        echo $error . "These are the errors" . "\n";
        }
    }

    }
?>