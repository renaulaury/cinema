<?php

use Controller\cinemaController; /*use les controller*/

/*recup des classes*/

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

/*instanciation du controller*/
$ctrlCinema = new cinemaController();

$id = (isset($_GET['id'])) ? $_GET['id'] : null; //si existe ds l url alors $id=get sinon $id=null

/*init de l'action*/
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "listFilms":
            $ctrlCinema->listFilms();
            break;
        case "listActeurs":
            $ctrlCinema->listActeurs();
            break;
        case "listReals":
            $ctrlCinema->listReals();
            break;
        case "detFilm":
            $ctrlCinema->detFilm();
            break;
    }
}

?>

<!-- accueille l'action transmise par l'url -->
<!-- pour afficher le détail d'un film par exemple, c'est encore une fois 
l'URL qui fera passer un "id" en paramètre -->