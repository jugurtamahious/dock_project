<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['creer']))
    {
        
        $title =htmlspecialchars($_POST['title']);

      
        $blog =htmlspecialchars($_POST['blog']);

        if(!empty($title) && !empty($blog) && isset($_SESSION['id']))
        {

            try {
                
                $pdo = new PDO("mysql:host=database:3306;dbname=php_db", "root", "password");
                $queryy = $pdo->prepare("INSERT INTO post (title, blog, user_id) VALUES (:title, :blog, :user_id)");

                $queryy->execute([
                    ":title" => $title,
                    ":blog" => $blog,
                    ":user_id" => $_SESSION['id'],
                ]);
            }
            catch (Exception $e)
            {
                echo 'Erreur vous devez remplir tous les champ ! ' . $e;
            }
        }
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
<article class="blogpost">
        <form method="post">
            <div>
            <label for="newPostTitle">Titre :</label>
            <input type="texte" name="title">
            <textarea style="width: 100%; height: 50%; resize:none" rows="5" cols="30" name="blog" class="postBody" placeholder="Entrez votre texte ici"></textarea>
            <button class="createPost" name="creer">Créer</button>
            </div> 
        </form>
    </article>
</body>
</html>
<?php
    $pdo = new PDO("mysql:host=database:3306;dbname=php_db", "root", "password");
    $query = $pdo->prepare("SELECT * FROM post inner join user on user.id=post.user_id");

    $query->execute();

    $allpost = $query->fetchAll(PDO::FETCH_ASSOC);

    if(count($allpost) > 0)
   
    {
        foreach($allpost as $onepost) {
            echo '
                    <article class="blogpost">
                        <h3 class="postTitle">' . $onepost['title'] . ', par '. $onepost['username'] .'</h3>
                        <p class="postBody">'. $onepost['blog'] .'</p>
                       
                    </article>';
        }
    }
    ?>