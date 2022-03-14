<?php
session_start();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/styles.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <title>CONNEXION</title>
</head>

<body>

<div class="container-fluid">
    <form id="form-login" method="post">
        <div class="text-center">
            <h3 class="text-center text-primary">CONNEXION A VOTRE ESPACE PERSONNEL</h3>
        </div>
        <div class="text-center" id="logo-pcshop">
            <img src="assets/img/logo.png" alt="logo pcshop" title="PC Shop">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>

        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <a href="">Mot de passe oublié ?</a>
        <br />
        <button type="submit" name="btn-connexion" class="mt-3 btn btn-primary">Connexion</button>
    </form>
</div>

<?php
function connexion(){
    $emailUtilisateur = trim(htmlspecialchars($_POST['email']));
    $passwordUtilisateur = trim(htmlspecialchars($_POST['password']));

    if(isset($emailUtilisateur) && !empty($emailUtilisateur) && isset($passwordUtilisateur) && !empty($passwordUtilisateur)){

        $email = "admin@admin.fr";
        $password = "azerty";

        if($emailUtilisateur === $email && $passwordUtilisateur === $password){
            $_SESSION["email"] = $emailUtilisateur;
            header("Location: pages/produits.php");
        }else{
            echo "<div class='mt-3 container'>
                    <p class='alert alert-danger p-3'>Erreur de connexion : Merci de verifier votre email et votre mot de passe</p>
            </div>";
        }

    }else{
        echo "<div class='mt-3 container'>
                    <p class='alert alert-danger p-3'>Erreur de connexion : Merci de remplir tous les champs</p>
            </div>";
    }

    var_dump($emailUtilisateur);
    var_dump($passwordUtilisateur);
}

if(isset($_POST['btn-connexion'])){
    connexion();
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
