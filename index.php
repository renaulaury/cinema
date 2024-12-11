<?php

use Controller\cinemaController; /*use les controller*/

/*recup des classes*/

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

/*instanciation du controller*/
$ctrlCinema = new cinemaController();

$id = (isset($_GET['id'])) ? $_GET['id'] : null; //si existe ds l url alors $id=get sinon $id=null


// Pb dans listFilm : affichage en boucle d'un meme film
//Pb dans accueil : secion 1+ req 1 ok mais avec la 2 > bug
//Manque dans detRole : nom de l'acteur + liens









/*init de l'action*/
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "accueil":
            $ctrlCinema->accueil();
            break;
        case "listFilms":
            $ctrlCinema->listFilms();
            break;
        case "detFilm":
            $ctrlCinema->detFilm($id);
            break;
        case "listReals":
            $ctrlCinema->listReals();
            break;
        case "detReal":
            $ctrlCinema->detReal($id);
            break;
        case "listActeurs":
            $ctrlCinema->listActeurs();
            break;
        case "detActeur":
            $ctrlCinema->detActeur($id);
            break;
        case "listGenres":
            $ctrlCinema->listGenres();
            break;
        case "detGenre":
            $ctrlCinema->detGenre($id);
            break;
        case "listRoles":
            $ctrlCinema->listRoles();
            break;
        case "detRole":
            $ctrlCinema->detRole($id);
            break;
    }
}

?>

<!-- accueille l'action transmise par l'url -->
<!-- pour afficher le détail d'un film par exemple, c'est encore une fois 
l'URL qui fera passer un "id" en paramètre -->