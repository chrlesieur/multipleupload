





<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Multiple file upload</title>
</head>
<body>
<div class="container">

    <form method="POST" action="upload.php" enctype="multipart/form-data">
        <div>
            <label for='upload'>Add Attachments:</label>
            <input id='upload' name="upload[]" type="file" multiple="multiple" />
        </div>

        <p><input type="submit" name="submit" value="Submit"></p>
    </form>

    <?php
    $it = new FilesystemIterator('../uploaded/'); // pour lister les fichiers dans le dossier upload
    //$it ressort le nom de l'image
    var_dump($it);
    foreach ($it as $fileinfo) :?>
            <div class="img-thumbnail">
                <img src="../uploaded/<?=$it?>" height="352" width="470">
                 <div>
                     <h3><?=$it?></h3>
                     <form action="" method="post" role="form">
                        <input type="hidden"  name="deleteImage" value="<?=$it?>" >
                        <input type="submit" class="btn-danger" name="delete" value="delete">
                     </form>
                 </div>
             </div>
<?php endforeach?>
</div>

<?php
$file_destination = '../uploaded/';
if(isset($_POST['deleteImage'])){
    unlink($file_destination.$_POST['deleteImage']);

}
?>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
