<!-- accueille l'action transmise par l'url -->
<!-- pour afficher le détail d'un film par exemple, c'est encore une fois 
l'URL qui fera passer un "id" en paramètre -->



<?php

/*use les controller*/

use Controller\cinemaController;

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
        case "detailFilm":
            $ctrlCinema->detailFilms($id);
            break;
    }
}


    public function detActeur($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("SELECT * FROM acteur WHERE id_acteur = :id"); //prepare car on dde l'id $id
        $requete->execute(["id" => $id]);
        require "view/acteur/detailActeur.php";
    }
}
?>