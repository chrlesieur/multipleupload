<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 20/10/18
 * Time: 11:46
 */
const EXTENSION = ['png','jpeg','jpg'];
const MAX_SIZE = 1048576;

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (count($_FILES['upload']['name']) == 0) {
        $errors[] = 'Aucun fichier sélectionné';
    } else {
        for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
            $length = filesize($_FILES['upload']['tmp_name'][$i]);
            $ext = pathinfo($_FILES['upload']['name'][$i], PATHINFO_EXTENSION);
            if ($length > MAX_SIZE) {
                $errors[] = 'Votre fichier ne peut exceder 1Mo';
            } elseif ((!in_array($ext, EXTENSION)) and (!empty($_FILES['upload']['name'] [$i]))) {
                $errors[] = 'Votre fichier peut uniquement posseder l\'extension ' . implode(' , ', EXTENSION);
            }
            if (empty($errors)) {
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                //Make sure we have a filepath
                if ($tmpFilePath != "") {

                    //save the filename
                    $fileName = 'image' . uniqid() . '.' . $ext;

                    //save the url and the file
                    $filePath = "../uploaded/" . $fileName;
                }

                //Upload the file into the temp dir
                if (move_uploaded_file($tmpFilePath, $filePath)) {

                    $files[] = $fileName;
                    //insert into db
                    //use $shortname for the filename
                    //use $filePath for the relative url to the file

                }
                echo 'téléchargement réussi';

            }
        }
    }
}






