<?php

require_once "modele.php";

function liste_personnes()
{
    $personnes=get_all_personnes();
    require "templates/listepersonne.php";
}

function supprimer_personne($id){

    delete_personne_by_id($id);
    $personnes=get_all_personnes();
    require "templates/listepersonne.php";
}

function ajouter_personne($data)
{
    add_personne($data["nom"],$data["prenom"],$data["tel"],$data["mail"]);
    $personnes=get_all_personnes();
    require "templates/listepersonne.php";
}

function edit_personne($id)
{
    $contact=recup_personne($id);
    require "templates/formedit.php";
}

function modifier_personne($nom,$prenom,$tel,$mail,$id)
{
    modify_personne($nom,$prenom,$tel,$mail,$id);
    $personnes=get_all_personnes();
    require "templates/listepersonne.php";
}
//***************************************************************************************************************** */
//gestion des erreurs et controles
//***************************************************************************************************************** */
// Affiche une erreur dans une vue erreur.php 
// qui centralise toutes les levées d'Exceptions 
function erreur($msgErreur)
{
    require 'templates/erreur.php';
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function control_form_fields($prenom, $nom)
{
    $erreurs = array();

    if ((!empty($nom)) && (!empty($prenom))) {

        if (!preg_match("#^[A-Za-z-']{2,}$#", $nom)) {

            $erreurs["nom"] = "Veuillez saisir un nom valide !<br>";
        }

        if (!preg_match("#^[A-Za-z-']{2,}$#", $prenom)) {

            $erreurs["prenom"] = "Veuillez saisir un prénom valide !<br>";
        }
    } else {

        if (empty($nom)) {

            $erreurs["nom"] = "Veuillez saisir un nom pour le stagiaire !";
        } else {

            if (!preg_match("#^[A-Za-z-']{2,}$#", $nom)) {

                $erreurs["nom"] = "Veuillez saisir un nom valide !<br>";
            }
        }

        if (empty($prenom)) {

            $erreurs["prenom"] = "Veuillez saisir un prénom pour le stagiaire !";
        } else {

            if (!preg_match("#^[A-Za-z-']{2,}$#", $prenom)) {

                $erreurs["prenom"] = "Veuillez saisir un prénom valide !<br>";
            }
        }
    }

    return $erreurs;
}
