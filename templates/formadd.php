<?php

$title = "Ajouter un Contact";
ob_start();

?>
<h1>Ajouter un contact</h1>

<!-- utilisation de la méthode post -->
<form action="<?php "index.php"; ?>" method="POST" id="monForm">
    <table class="table col-12 table-dark table-striped">
        <tr>
            <td class="col-4"><label for="prenom">Prénom</label></td>
            <td class="col-4"><input type="text" name="prenom" id="prenom" value="<?php if (isset($_POST["prenom"])) {
                                                                                        echo $_POST["prenom"];
                                                                                    } ?>" autocomplete="off"></td>
            <td class="tderreur">
                <div class="erreur"><?php if (!empty($erreurs["prenom"])) {
                                        echo $erreurs["prenom"];
                                    } ?></div>
            </td>
        </tr>
        <tr>
            <td><label for="nom">Nom</label></td>
            <td><input type="text" name="nom" id="nom" value="<?php if (isset($_POST["nom"])) {
                                                                    echo $_POST["nom"];
                                                                } ?>" autocomplete="off"></td>
            <td class="tderreur">
                <div class="erreur "><?php if (!empty($erreurs["nom"])) {
                                            echo $erreurs["nom"];
                                        } ?></div>
            </td>
        </tr>
        <tr>
            <td><label for="nom">Téléphone</label></td>
            <td><input type="tel" name="tel" id="tel" value="<?php if (isset($_POST["tel"])) {
                                                                    echo $_POST["tel"];
                                                                } ?>" autocomplete="off"></td>
            <td class="tderreur">
                <div class="erreur "><?php if (!empty($erreurs["tel"])) {
                                            echo $erreurs["tel"];
                                        } ?></div>
            </td>
        </tr>
        <tr>
            <td><label for="nom">Email</label></td>
            <td><input type="mail" name="mail" id="mail" value="<?php if (isset($_POST["mail"])) {
                                                                    echo $_POST["mail"];
                                                                } ?>" autocomplete="off"></td>
            <td class="tderreur">
                <div class="erreur "><?php if (!empty($erreurs["mail"])) {
                                            echo $erreurs["mail"];
                                        } ?></div>
            </td>
        </tr>
        <tr>
            <td><input type="submit" id="submit" name="enregister" value="Envoyer"></td>
            <td><input type="reset" id="reset" name="annuler" value="Annuler"></td>
        </tr>
    </table>
</form>
<?php
$content = ob_get_clean();
include "baselayout.php";
?>
<script>
    $("#nom").on("keyup", function() {

        $(this).val($(this).val().toUpperCase());
    });

    $("#prenom").on("keyup", function() {

        $(this).val($(this).val().charAt(0).toUpperCase() + $(this).val().substr(1).toLowerCase());

    });

    $("#reset").on("click", function() {
        $(".erreur").html("");


    });
</script>