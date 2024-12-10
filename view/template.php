<!-- base pour l'ensemble des vues : doctype/link etc-->
<!-- variables qui vont accueillir les éléments provenant des vues -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Ciné Sphéry</title>
</head>

<body>
    <header>
        <nav>
            <img src="./public/img/logo_cinema.png" alt="Logo de l'entreprise Ciné Sphéry">
            <ol>
                <li><a href="./view/accueil.php">Accueil</a></li>
                <li><a href="index.php?action=listFilms">Films</a></li>
                <li><a href="./view/listReals.php">Réalisateurs</a></li>
                <li><a href="./view/listActeurs.php">Acteurs</a></li>
            </ol>
        </nav>
    </header>

    <?= $contenu ?>

    <footer>
        <p>Copyright Ciné Sphery - made by Laury with <i class="fa-solid fa-heart"></i></p>
    </footer>
</body>

</html>