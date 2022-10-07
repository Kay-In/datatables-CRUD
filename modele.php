<?php

require "connect.php";

// Connexion à la BDD
function connect_db()
{
    $dsn = "mysql:dbname=" . BASE . ";host=" . SERVER;
    try {
        $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        $connexion = new PDO($dsn, USER, PASSWD, $option);
    } catch (PDOException $e) {
        printf("Echec connexion : %s\n", $e->getMessage());
        exit();
    }
    return $connexion;
}

//création de la liste annuaire
function get_all_personnes()
{

    $connexion = connect_db();
    $personnes = array();
    $sql = "SELECT * FROM personne";

    foreach ($connexion->query($sql) as $row) {
        $personnes[] = $row;
    }
    return $personnes;
}

//Suppresion d'un contact par id
function delete_personne_by_id($id)
{
    $connexion = connect_db();
    $sql = "DELETE FROM personne WHERE id=:id";
    $reponse = $connexion->prepare($sql);
    $reponse->bindValue(":id", $_GET["id"], PDO::PARAM_INT);
    $reponse->execute();
}

function add_personne($nom, $prenom, $telephone, $mail)
{
    $connexion = connect_db();
    $sql = "INSERT INTO personne(nom,prenom,telephone,email) VALUES (:nom,:prenom,:telephone,:mail)";
    $reponse = $connexion->prepare($sql);
    $reponse->bindParam(":nom", $nom);
    $reponse->bindParam(":prenom", $prenom);
    $reponse->bindParam(":telephone", $telephone);
    $reponse->bindParam(":mail", $mail);
    $reponse->execute();
}

function recup_personne($id)
{
    $connexion = connect_db();
    $sql = "SELECT * FROM personne WHERE id=:id";
    $reponse = $connexion->prepare($sql);
    $reponse->bindParam(":id", $id, PDO::PARAM_INT);
    $reponse->execute();

    $contact = $reponse->fetch();

    return $contact;
}

function modify_personne($nom, $prenom, $tel, $mail,$id)
{
    $connexion = connect_db();
    $sql = "UPDATE personne SET nom=:nom,prenom=:prenom,telephone=:telephone,email=:email WHERE id=:id";
    $reponse = $connexion->prepare($sql);
    $reponse->bindParam(":nom", $nom);
    $reponse->bindParam(":prenom", $prenom);
    $reponse->bindParam(":telephone", $tel);
    $reponse->bindParam(":email", $mail);
    $reponse->bindParam(":id", $id,PDO::PARAM_INT);
    $reponse->execute();
}
