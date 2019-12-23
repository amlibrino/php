<?php
/* ici j'ai fait inclusion d'un entete et bas de page ( include())
*avant tout : ne jamais inclure avant de mettre les controles ou des liens qui contiennent des rederections des header,
*mettre la variable titre avant d'inclure l'entete (important)
*entrer le code php*/
require_once "../controllers/connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$titre = 'liste_produit'; // titre de la page <title>... </title>
include('entete.php'); //inclusion de l'entete de la page avec la fonction include en php-->
$db = connexionBase(); // Appel de la fonction de connexion

?>
<div class="container">
    <!-- container bootstrap-->
    <?php

    $requete = "SELECT * FROM produits JOIN categories ON cat_id = pro_cat_id ORDER BY pro_id";
    // requête SQL pour obtenir la liste des enregistrements de la table produits

    $result = $db->query($requete); //on stocke le résultat de la requête, qui est un tableau d'objets, dans la variable $result

    if (!$result) { // si la variable $result vaut NULL ou query n a rien recuperer 
        $tableauErreurs = $db->errorInfo();
        echo $tableauErreur[2];
        die("Erreur dans la requête"); // on affiche un mesage d'erreur pour chaque cas.
    }

    if ($result->rowCount() == 0) {
        // Pas d'enregistrement
        die("La table est vide");
    }
    ?>
    <div class="table-responsive">
        <!--rendre le tableau responsif avec bootstrap-->
        <!--resultat de la requete recuperé sous forme de table-->
        <table class="table table-striped table-hover table-bordered table-w-auto">
            
            <caption> Tableau de nos articles </caption><!-- legende du tableau-->
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Catégorie</th>
                    <th>Libellé</th>
                    <th>Reference</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Couleur</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch(PDO::FETCH_OBJ)) { // boucle while : tant qu'un enregistrement est présent dans la variable $result avec  la fonction fetch(PDO::FETCH_OBJ)    
                    ?>
                    <tr>
                        <td><img class="responsive-img" width=200em src="../assets/images/jarditou_photos/<?= $row->pro_id . '.' . $row->pro_photo; ?>" alt="Image de <?= $row->pro_libelle; ?>"></td>
                        <td><?= $row->cat_nom ?>
                        <td><a href="detail.php?pro_id=<?= $row->pro_id ?>"><?= $row->pro_libelle ?></a></td>
                        <td><?= $row->pro_ref ?></td>
                        <td><?= $row->pro_prix ?></td>
                        <td><?= $row->pro_stock ?></td>
                        <td><?= $row->pro_couleur ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
    </div>
</div>

<?php include('bas_de_page.php'); ?>

</body>

</html>