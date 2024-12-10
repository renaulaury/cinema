<!-- base pour l'ensemble des vues : doctype/link etc-->
<!-- variables qui vont accueillir les éléments provenant des vues -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Ciné Sphery</title>
</head>

<body>
    <div id="container">
        <header>
            <nav>
                <img src="./public/img/logo_cinema.png" alt="Logo de l'entreprise Ciné Sphéry">
                <ol>
                    <li><a href="index.php?action=accueil">Accueil</a></li>
                    <li><a href="index.php?action=listFilms">Films</a></li>
                    <li><a href="index.php?action=listReals">Réalisateurs</a></li>
                    <li><a href="listActeurs.php?action=listActeurs">Acteurs</a></li>
                </ol>
            </nav>
        </header>

        <main>
            <h1><?= $titre ?></h1>
            <?= $contenu ?>
        </main>
    </div>
    <footer>
        <p>Copyright Ciné Sphery - made by Laury with <i class="fa-solid fa-heart"></i></p>
    </footer>
</body>

</html>