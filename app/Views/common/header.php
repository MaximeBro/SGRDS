<?php $session = \Config\Services::session() ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8" />
        <title>SGRDS</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="/assets/css/style.css" type="text/css">
    </head>
    <body>
        <header>   
            <nav style="background-color: rgb(187,71,30) !important;">
                <div class="nav-wrapper">
                    <a href="/accueil" class="brand-logo"><img src="/assets/images/logos/logo-iut.png" style="height:58px !important;"></a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="/accueil">Voir les rattrapages</a></li>
                        <?php
                        if($session->get('role') === 'directeur')
                        {
                            echo('<li><a href="/etudiants">Import CSV</a></li>');
                        }
                        ?>
                        <?php
                        if($session->get('role') === 'directeur')
                        {
                            echo('<li><a href="/absences">Voir les absences</a></li>');
                        }
                        ?>

                        <?php
                        if($session->get('role') === 'enseignant')
                        {
                            echo('<li><a href="/saisieabsents">Saisir une absence</a></li>');
                        }
                        ?>

                        <?php
                        if($session->get('role') === 'directeur')
                        {
                            echo('<li><a href="/rattrapage">Saisir un rattrapage</a></li>');
                        }
                        ?>


                        <li><a href="/session/destroy" class="waves-effect waves-light btn black-text" style="background-color: white !important;">Déconnexion</a></li>
                    </ul>
                </div>
            </nav>

            <ul class="sidenav" id="mobile-demo">
                <li><a href="/accueil">Voir les rattrapages</a></li>
                <li><a href="/rattrapage">Saisir un rattrapage</a></li>
                <li><a class="waves-effect waves-light btn" href="/session/destroy">Déconnexion</a></li>
            </ul>
        </header>
    <body>