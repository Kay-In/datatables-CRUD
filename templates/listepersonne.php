<?php

$title="Annuaire DataTables";

ob_start();

?>

<h1>DataTables</h1>
<table class="display" id="myTable">
    <thead>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Téléphone</th>
        <th>Email</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </thead>
    <tbody>
        <?php

        foreach ($personnes as $personne){
            echo "<tr>";
            echo "<td class='colid'>$personne[nom]</td>";
            echo "<td>$personne[prenom]</td>";
            echo "<td>$personne[telephone]</td>";
            echo "<td>$personne[email]</td>";
            echo "<td><a href=index.php?action=edit&id=$personne[id]>Modifier</a></td>";
            echo "<td><a href=index.php?action=suppr&id=$personne[id]>Supprimer</a></td>";
        }
        ?>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" class="text-center"><a href="index.php?action=add">Ajouter une personne</a></td>
        </tr>
    </tfoot>
</table>
<script>
    $(document).ready(function(){
        $("#myTable").DataTable({
            language:{
                url:"//cdn.datatables.net/plug-ins/1.11.4/i18n/fr_fr.json"
            }
        });
    });
</script>
<?php

$content=ob_get_clean();
include "baselayout.php";

?>