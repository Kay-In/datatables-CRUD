<?php

$title = "Modifier un Contact";
ob_start();

?>
<h1>Modifier un Contact</h1>
<form  action="index.php?action=modif" method="POST" id="monform">
    <table class="table col-12 table-dark table-striped">
        <tr>
            <td class="col-3"><label for="prenom">Prénom</label></td>
            <td class="col-3"><input type="text" name="prenom" id="prenom" value="<?php if (isset($_POST["prenom"])) {
                                                                        echo $_POST["prenom"];
                                                                    } else {
                                                                        echo $contact["prenom"];
                                                                    } ?>" autocomplete="off"></td>
            <td class="col-3 tderreur">
                <div class="erreur"><?php if (!empty($erreurs["prenom"])) {
                                        echo $erreurs["prenom"];
                                    } ?></div>
            </td>
            <input type="hidden" name="id" value="<?php if (isset($_POST["id"])) {
                                                        echo $_POST["id"];
                                                    } else {
                                                        echo $contact["id"];
                                                    } ?>">
        </tr>
        <tr>
            <td><label for="nom">Nom</label></td>
            <td><input type="text" name="nom" id="nom" value="<?php if (isset($_POST["nom"])) {
                                                                    echo $_POST["nom"];
                                                                } else {
                                                                    echo $contact["nom"];
                                                                } ?>" autocomplete="off"></td>
            <td class="tderreur">
                <div class="erreur"><?php if (!empty($erreurs["nom"])) {
                                        echo $erreurs["nom"];
                                    } ?></div>
            </td>
        </tr>
        <tr>
            <td><label for="tel">Téléphone</label></td>
            <td><input type="tel" name="tel" id="tel" value="<?php if (isset($_POST["tel"])) {
                                                                    echo $_POST["tel"];
                                                                } else {
                                                                    echo $contact["telephone"];
                                                                } ?>" autocomplete="off"></td>
            <td class="tderreur">
                <div class="erreur"><?php if (!empty($erreurs["tel"])) {
                                        echo $erreurs["tel"];
                                    } ?></div>
            </td>
        </tr>
        <tr>
            <td><label for="mail">E-mail</label></td>
            <td><input type="mail" name="mail" id="mail" value="<?php if (isset($_POST["mail"])) {
                                                                    echo $_POST["mail"];
                                                                } else {
                                                                    echo $contact["email"];
                                                                } ?>" autocomplete="off"></td>
            <td class="tderreur">
                <div class="erreur"><?php if (!empty($erreurs["mail"])) {
                                        echo $erreurs["mail"];
                                    } ?></div>
            </td>
        </tr>
        <tr>
            <td><input type="submit" id="submit" name="submit" value="Envoyer"></td>
            <td><input type="reset" id="reset" value="Annuler"></td>
            <td class="tderreur">
            </td>
        </tr>
    </table>
</form>
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
<?php
$content = ob_get_clean();
include "baselayout.php";
?>