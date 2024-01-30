<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SGRDS</title>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/mdb-ui-kit/js/mdb.es.min.js" type="module"></script>
        <script src="/assets/mdb-ui-kit/js/mdb.umd.min.js"></script>

        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="/assets/css/mdb.min.css" rel="stylesheet" crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <header>   
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="#">
                        <img src="/assets/images/logos/logo-iut.png" class="header-logo" style="height:32px;" alt="Logo IUT du Havre">
                    </a>

                    <!-- Si connecté -->
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Voir les rattrapages<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Saisir un rattrapage</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <button class="btn btn-outline-success my-2 my-sm-0">Déconnexion</button>
                    </form>

                    <!-- Si non connecté -->
                    <!--<form class="form-inline my-2 my-lg-0">
                        <button class="btn btn-outline-success my-2 my-sm-0">Connexion</button>
                    </form>-->
                </div>
            </nav>
        </header>
        <body>