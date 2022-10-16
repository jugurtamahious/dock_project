<?php
session_start();
$filter_username=filter_input(INPUT_POST,"username");
$filter_password=filter_input(INPUT_POST,"password");

if(!empty($filter_username) && !empty( $filter_password)){
    $pdo = new PDO("mysql:host=database:3306;dbname=php_db", "root", "password");
    $query = $pdo->prepare("SELECT * FROM user WHERE username = :filter_username ");
    $query->execute(array(":filter_username" => $filter_username));
    $stat= $query->fetch(PDO::FETCH_ASSOC);
    $password = password_verify($filter_password,$stat["password"]);
    if($password){
        $_SESSION["id"]=$stat["id"];
        header("location:post.php");
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
<form method="POST">
<h1>Connexion</h1>
<div>
<label>Nom d'utilisateur</label>
<input type="text"  name="username" placeholder="Nom d'utilisateur" required>
</div>  
<br>
<div>
<label>Mot de passe</label>
<input type="password"  name="password" placeholder="Mot de passe" required>
</div>
<input type="submit" id='submit' value ='CONNECT'>

</body>
</html>




