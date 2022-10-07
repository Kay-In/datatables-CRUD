<?php
require_once "controller.php";

echo "En construction";
var_dump($_POST);


try {
    if (!isset($_GET["action"])) {
        liste_personnes();
    } else if (isset($_GET["action"])) {
        if ($_GET["action"] == "suppr") {
            if (isset($_GET["id"])) {
                supprimer_personne($_GET["id"]);
            } else {
                throw new Exception("<span style='color:red'>Aucun identifiant de contact envoyé</span>");
            }
        }
        if ($_GET["action"] == "add") {
            if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["tel"]) && isset($_POST["mail"])) {
                ajouter_personne($_POST);
            } else {
                require "templates/formadd.php";
            }
        }
        if ($_GET["action"] == "edit") {
            if (isset($_GET["id"])) {
                edit_personne($_GET["id"]);
            } else {
                throw new Exception("<span style='color:red'>Aucun identifiant de contact envoyé</span>");
            }
        }
        if ($_GET["action"] == "modif") {
            if (isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["tel"]) && isset($_POST["mail"])) {
                modifier_personne($_POST["nom"], $_POST["prenom"], $_POST["tel"], $_POST["mail"],$_POST["id"]);
            } else {
                require "templates/formedit.php";
            }
        }
    } else {
        throw new Exception(("<h1>Page non trouvée !!!</h1>"));
    }
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    echo erreur($msgErreur);
}
