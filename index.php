<?php

/*use les controller*/
use Controller\AccueilController;
use Controller\FilmController;
use Controller\RealController;
use Controller\ActeurController;
use Controller\GenreController;
use Controller\RoleController;

/*recup des classes*/

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

/*instanciation du controller*/
$ctrlAccueil = new AccueilController();
$ctrlFilm = new FilmController();
$ctrlReal = new RealController();
$ctrlActeur = new ActeurController();
$ctrlGenre = new GenreController();
$ctrlRole = new RoleController();

$id = (isset($_GET['id'])) ? $_GET['id'] : null; //si existe ds l url alors $id=get sinon $id=null



//Pb dans accueil : secion 1+ req 1 ok mais avec la 2 > bug
//Manque dans detRole : nom de l'acteur + liens



/*init de l'action*/
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "accueil":
            $ctrlAccueil->accueil();
            break;

        case "listFilms":
            $ctrlFilm->listFilms();
            break;
        case "detFilm":
            $ctrlFilm->detFilm($id);
            break;
        case "addFilm":
            $ctrlFilm->addFilm();
            break;

        case "listReals":
            $ctrlReal->listReals();
            break;
        case "detReal":
            $ctrlReal->detReal($id);
            break;
        case "addReal":
            $ctrlReal->addReal();
            break; 

        case "listActeurs":
            $ctrlActeur->listActeurs();
            break;
        case "detActeur":
            $ctrlActeur->detActeur($id);
            break;

        case "listGenres":
            $ctrlGenre->listGenres();
            break;
        case "detGenre":
            $ctrlGenre->detGenre($id);
            break;
        case "addGenre":
            $ctrlGenre->addGenre();
            break;

        case "listRoles":
            $ctrlRole->listRoles();
            break;
        case "detRole":
            $ctrlRole->detRole($id);
            break;

    }
}

?>

<!-- accueille l'action transmise par l'url -->
<!-- pour afficher le détail d'un film par exemple, c'est encore une fois 
l'URL qui fera passer un "id" en paramètre -->