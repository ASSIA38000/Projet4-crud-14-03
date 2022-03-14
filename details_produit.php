<?php
//Demarrer la session php
session_start();
if(isset($_SESSION["email"])){
    ?>
    <!doctype html>
    <html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../assets/css/styles.css" rel="stylesheet"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <title>PHP CRUD CONNEXION</title>
    </head>
    <body>
    <header>
        <?php
        require_once "menu.php";
        ?>
    </header>
    <?php
    //Connexion a la base de donnée via PDO
    //1 CONNECTER VOTRE SITE PHP A MYSQL (SGBDR syteme de gestion de base de données relationelle)
    //Outils SGBR = phpMyAdmin
    //2Stocker dans une variable la connexiona mysql via PHP DATA OBJECT PDO
    //AFFICHER UN MESSAGE DE REUSSITE OU UNE ERREUR

    //3 STOCKER DANS UNE VARIABLE UNE REQUETE SQL
    //4 RECUPERER LES DONNEES DE LA PRODUITS 5TABLEAU ASSOCIATIF AVEC LA METHODE QUERY DE PDO
    $user = "root";
    $pass = "";
    $hote = "localhost";
    $nomBaseDonnees = "";

    try {

        $connexionDataBase = new PDO("mysql:host=".$hote.";dbname=".$nomBaseDonnees.";charset=UTF8", $user, $pass);
        $connexionDataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connexiona la base de données";



    }catch (PDOException $exception){
        echo "Erreur de connexion a MySQL " .$exception->getMessage();
        die();
    }

    if($connexionDataBase == true){
        $sql = "SELECT * FROM produits WHERE id_produit = ?";
        $id_produit = $_GET['id_produit'];

        $requete = $connexionDataBase->prepare($sql);

        $requete->bindParam(1, $id_produit);
        $requete->execute();
        var_dump($requete);
        $details = $requete->fetch();

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
            <h4 class="text-warning text-center">DÉTAILS PRODUITS</h4>
            <h2 class="text-center text-info"><?= $details['nom_produit'] ?></h2>
            <img src="<?= $details['image_produit'] ?>"


        </div>

    </div>
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

}
else{
    echo "<a href='' class='btn btn-warning'>S'inscrire</a>";
    header('Location: ../index.php');
}

