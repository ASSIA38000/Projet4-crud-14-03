<?php
session_start();
if(isset($_SESSION["email"])){
    ?>

    <!doctype html>
    <html lang="fr">
    <head>   
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../assets/css/styles.css" rel="stylesheet"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
        <title>PRODUITS</title>
    </head>

    <body>

    <header>
        <?php
        require_once "menu.php";
        ?>
    </header>
    <?php

        $user = "root";
        $pass = "";
        $hote = "localhost";
        $dbname = "produits_1";

    //  CONNEXION A MYSQL
    try {
        $basedonnees = new PDO('mysql:host=localhost;dbname="produits_1"', $user, $pass);

        //  Débug de la connexion à MySql
        $basedonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p class='alert alert-success text-center p-3'>VOUS ETES CONNECTE A PDO MYSQL</p>";

    }catch (PDOException $exception){
        echo "Erreur de connexion à MySql " . $exception->getMessage();
    }

    //  REQUETE SQL

        //  Vérifier la connexion à MySql
    if($basedonnees == true){
        //  Ecrire ma requête sql stockée dans une variable
        $nomtable = "livres";
        $sql = "SELECT * FROM livres";
        $produitsTableau = $basedonnees->query($sql);
    }

    ?>

    <div class="container-fluid">
            <span class="mt-3 d-flex justify-content-around">
                <h3 class="mt-3 text-warning">BIENVENUE <?= $_SESSION['email'] ?></h3>
                <form method="post">
                    <button id="btn-deconnexion" name="btn-deconnexion" class="btn btn-danger">DECONNEXION</button>
                </form>
            </span>
        </div>

        <div class="container">
            <div class="row">
                <h4 class="text-warning text-center">NOS PRODUITS</h4>
                <?php
                    foreach ($produitsTableau as $produit){
                        //Afficher la date de depot
                        $date_depot = new DateTime($produit['date_depot']);
                        ?>
                            <div class="col-md-4 col-sm-12 p-3">
                                <div class="card p-3">
                                    <div class="text-center">
                                        <h4 class="card-title text-info">
                                            <?= $produit['nom_produit'] ?>
                                        </h4>

                                        <a href="details_produit.php?id_produit=<?= $produit['id_produit'] ?>" class="btn btn-warning">
                                        <img src="<?= $produit['image_produit'] ?>" alt="<?= $produit['nom_produit'] ?>" title="<?= $produit['nom_produit'] ?>" class="card-img-top img-fluid">
                                        </a>

                                        <div class="card-body">
                                            <p class="card-text"><?= $produit['description_produit'] ?></p>
                                            <p>PRIX : <?= $produit['prix_produit'] ?> €</p>
                                            <p>Stock :
                                                <?php
                                                if($produit['stock_produit'] == true){
                                                    echo "OUI";
                                                }else{
                                                    echo "NON";
                                                }
                                                ?>
                                            </p>
                                            <p>Date de depot : <?= $date_depot->format("d/m/Y h:i:s") ?></p>
                                            <a href="details_produit.php?id_produit=<?= $produit['id_produit'] ?>" class="btn btn-info">Detail produits</a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#test<?= $produit['id_produit'] ?>">
                                                popup details produit
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="test<?= $produit['id_produit'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Détail du produit <?= $produit['nom_produit'] ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <?= $produit['nom_produit'] ?>
                                                            <img src="<?= $produit['image_produit'] ?>" alt="<?= $produit['nom_produit'] ?>" title="<?= $produit['nom_produit'] ?>" class="card-img-top img-fluid">
                                                            <p class="card-text"><?= $produit['description_produit'] ?></p>
                                                            <p>PRIX : <?= $produit['prix_produit'] ?> €</p>
                                                            <p>Stock :
                                                                <?php
                                                                if($produit['stock_produit'] == true){
                                                                    echo "OUI";
                                                                }else{
                                                                    echo "NON";
                                                                }
                                                                ?>
                                                            </p>
                                                            <p>Date de depot : <?= $date_depot->format("d/m/Y h:i:s") ?></p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <?php
                    }
                ?>
            </div>

        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
    </html>

    <?php
    //Deconnexion et destruction de la session $_SESSION['email']
    function deconnexion(){
        var_dump("hello");
        echo "elloo";
        session_unset();
        session_destroy();
        header('Location: ../index.php');
    }

    //Click sur le bouton de deconnexion
    if(isset($_POST['btn-deconnexion'])){
        deconnexion();
    }

}else{
    echo "<a href='' class='btn btn-warning'>S'inscrire</a>";
    header('Location: ../index.php');
}

