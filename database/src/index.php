<?php 

$filter_username=filter_input(INPUT_POST,"username");
$filter_password=filter_input(INPUT_POST,"password");

if(!empty($filter_username) && !empty( $filter_password) ){
    $password_hach = password_hash ($filter_password,PASSWORD_DEFAULT);
    $pdo = new PDO("mysql:host=database:3306;dbname=php_db", "root", "password");
    $query = $pdo->prepare("INSERT INTO user (username,password) VALUES ( ?,?)");
    $query->execute(array($filter_username,$password_hach ));
    header("location:login.php");
}

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Coucou</title>
</head>
<body>
 <form method="POST">
        <h1>Inscription</h1>
        <div>
            <label>Nom d'utilisateur</label>
            <input type="text"  name="username" placeholder="Nom d'utilisateur" required>
        </div>
        <br>
        <div>
            <label>Mot de passe</label>
            <input type="password"  name="password" placeholder="Mot de passe" required>
        </div>
        <br>
        <div>
            <input type="submit" id='submit' value='LOGIN' >
            <a href="login.php">Sign up </a>
            <a href="login.php"></a>
        </div>
 </form>
<!--if (!filter_input(INPUT_GET, "email", je ne sais pas)) {
      jsp = true:
} else {
    jsp = false;
}-->


</body>
</html>
