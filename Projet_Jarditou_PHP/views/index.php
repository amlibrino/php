<?php
/* ici j'ai fait inclusion d'un entete et bas de page ( include())
*avant tout : ne jamais inclure avant de mettre les controles ou des liens qui contiennent des rederections des header,
*mettre la variable titre avant d'inclure l'entete (important)
*entrer le code php*/
$titre='index_jarditou';
include('entete.php'); 
?>


<h1> Accueil </h1>
<hr>

<div class="row">
    <!--rangée (ligne)-->
    <section class="col-8">
        <!--<div class="col-12 col-sm-6 col-md-7 col-lg-8 col-xl-9">Colonne 1</div>-->
        <article>
            <h2>L'entreprise</h2>

            <p id="lacible">Notre entreprise familiale met tout son savoir-faire à votre disposition dans le
                domaine du jardin et du paysagisme.</p>
            <p>Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés.</p>
            <p>Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens,
                Péronne, Abbeville, Corbie</p>

            <h2> Qualité</h2>
            <p>Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout
                votre projet.</p>
            <p>Vous serez séduit par notre expertise, nos compétences et notre sérieux.</p>

            <h2>Devis gratuit</h2>
            <p>Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande
                d’intervention. Vous souhaitez un devis ? Nous vous le réalisons gratuitement.</p>
        </article>
    </section>

    <aside class="col-xl-4">
        <!--<div class="d-lg-none d-xl-block"> display-non faire disparaitre pour une largeur en dessous de xl</div>-->
        <h1>[ Bienvenue sur votre site ]</h1>
    </aside>
</div>
<hr>

<!-- inclusion du bas_de_page la fonction include en php (dans un fichier externe-->
<?php include('bas_de_page.php'); ?>
</body>

</html>