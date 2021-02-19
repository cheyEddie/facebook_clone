<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header('location:../');
    }
    include '../php/config.php';
    $req = "SELECT * FROM users WHERE email = '$_SESSION[email]'";
    $result = $conn->query($req);
    $row = $result->fetch(); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="../php/disconnect.php">Déconnexion</a></li>
        </ul>
    </nav>
    <div class="member">
        <h1>Bonjour <?php echo"$_SESSION[firstname] $_SESSION[lastname]"?> !<h1>
        <img src="<?=$row['photo_url']?>" width=500 height=300 alt="pdp">  
    </div>  
</body>
</html>