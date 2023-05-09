<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Broc&amp;Landes</title>
    <!-- Balises meta de base -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Broc&amp;Landes est un site qui permet de découvrir les contrées et les légendes de Brocéliande">
    <meta name="author" content="Maïté">

    <!-- icones fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- script jquery pr bootstrapt -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <!-- lien vers le css  -->
    <link rel="stylesheet" href="./Public/css/style.css">

</head>

<body>
    <!-- Entête avec le logo et le menu principal -->
    <header id="bandeau" class="container">
        <nav class="navbar navbar-expand-md navbar-dark justify-content-center">
            <div class="logo">
                <a title="renvoi à l'accueil" href="?action=accueil">
                    <img src="./Public/images/logo.png" alt="logo Broc&amp;Landes" class="img-fluid">
                </a>
                <!-- Le bouton burger qui permettra de déclencher le menu déroulant -->
                <button id="burger" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <!-- La liste de liens du menu déroulant -->
            <div id="menu" class="collapse navbar-collapse">
                <ul class="navbar-nav justify-content-center">
                    <li class="nav-item d-flex justify-content-center active">
                        <a class="nav-link" href="?action=accueil">Accueil</a>
                    </li>
                    <li class="nav-item d-flex justify-content-center">
                        <a class="nav-link " href="?action=listeContrees">Contrées</a>
                    </li>
                    <li class="nav-item d-flex justify-content-center">
                        <a class="nav-link " href="?action=listeLegendes">Légendes</a>
                    </li>
                    <li class="nav-item d-flex justify-content-center">
                        <a class="nav-link " href="?action=contact">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Le script jQuery qui permet de faire fonctionner le menu déroulant -->
        <script src="Public/js/script.js"></script>
    </header>