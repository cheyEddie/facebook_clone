<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajoutez une photo</title>
    <link rel="stylesheet" href="../css/photo.css">
</head>
<body>
    <div class="upload">
        <h2>Ajoutez un photo de profil</h2>
        <form action="process.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Choisissez une photo</label>
                <input type="file" name="photo" id="photo">
            </div>
            <input type="submit" name="upload" value="Ajouter">
        </form>
    </div>
</body>
</html>