<?php
    include 'config.php';
    //Signup
    if(isset($_POST['signup'])){
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $email = htmlspecialchars($_POST['email']);
        $password = md5($_POST['password']);
        $birth = htmlspecialchars($_POST['birth']);
        $gender = htmlspecialchars($_POST['gender']);
        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($birth) && !empty($gender)){
            $result = $conn->query("SELECT * FROM users WHERE email='$email'");
            if($result->rowcount()>0){
                session_start();
                $_SESSION['signerror'] = "cette adresse email est déjà utilisée !";
                header('location:../');
            }else{
                $req = "INSERT INTO users (firstname,lastname,email,password,birth,gender)
                VALUES('$firstname','$lastname','$email','$password','$birth','$gender')";
                $conn->exec($req);
                session_start();
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['email'] = $email;
                header('location:photo.php');
            }
        } else{
            session_start();
            $_SESSION['signerror'] = "Veuillez remplir tous les champs svp !";
            header('location:../');
        }
    }
    if(isset($_POST['upload'])){
       if(!empty($_FILES['photo']['name'])){
           session_start();
           $file_name = $_FILES['photo']['name'];
           $file_type = $_FILES['photo']['type'];
           $file_tmp_name = $_FILES['photo']['tmp_name'];
           $file_dest = '../uploads/'.$file_name;
           $file_extension = strrchr($file_name,".");
           $allowed_extension = array('.jpg','.JPG');
           if(in_array($file_extension,$allowed_extension)){
               if(move_uploaded_file($file_tmp_name,$file_dest)){
                   $req = "UPDATE users SET photo_name='$file_name',photo_url='$file_dest' WHERE email='$_SESSION[email]'";
                   $conn->exec($req);
                   header('location:../espacemembre');
               }
           }
           else{
               echo "ERROR";
           }
       }
   }
    if(isset($_POST['login'])){
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];
        if(!empty($email) && !empty($password)){
            $result = $conn->query("SELECT * FROM users WHERE email='$email'");
            $row = $result->fetch();
            if($result->rowcount()>0 && md5($password) == $row['password']){
                session_start();
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['email'] = $row['email'];
                header('location:../espacemembre');
            } else{
                session_start();
                $_SESSION['logerror'] = "Email ou mot de passe incorrect!";
                header('location:../');
            }
        }else{
            session_start();
            $_SESSION['logerror'] = "Veuillez remplir tous les champs!";
            header('location:../');  
        }
   }
?>