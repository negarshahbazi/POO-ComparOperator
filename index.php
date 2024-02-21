<?php
require_once('./config/autoload.php');
require_once('./config/db.php');

if (isset($_POST['mot-de-pass']) && !empty($_POST['mot-de-pass']) && isset($_POST['send'])) {
    if ($_POST['mot-de-pass'] === "sn2024") {
        header('Location: ./destination.php');
        exit();
    } else {
        echo " le mot de passe n'est pas correct!";
    }
}
$newManager = new Manager($db);
$new = $newManager->getAllDestination();
// limit 4
// var_dump($new);
foreach ($new as $pay) {
    $tab[] = new Destination($pay);
    //  var_dump($tab);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPAROPERATOR</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Capriola&family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <div id="large-bg-image">
        <nav class="navbar navbar-expand-lg  container bg-black rounded-5 shadow">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand text-white logo" href="#"><img class="rounded-pill logo" src="./images/logo4.png" alt=""></a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#"><button class="bg-transparent border border-0 text-white" data-toggle="modal" id="myAdministrateur" data-toggle="modal" data-target="#administateur">Administrateur</button></a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        

        <div class="move mt-5">
            <span class="marker-title">TUNIS</span>
            <span class="marker-caption"><img class="imageville" src="./images/Tunis.jpg" alt=""></span>
            <span class="marker-title">2390€</span>
        </div>
        <div class="move2 mt-5 m">
            <span class="marker-title">MONACO</span>
            <span class="marker-caption"><img class="imageville" src="./images/monaco.jpg" alt=""></span>
            <span class="marker-title">1390€</span>
        </div>
        <div class="move3 mt-5" :>
            <span class="marker-title">LONDRES</span>
            <span class="marker-caption"><img class="imageville" src="./images/londre.jpg" alt=""></span>
            <span class="marker-title">1100€</span>
        </div>
        <div class="move4 mt-5">
            <span class="marker-title">ROME</span>
            <span class="marker-caption"><img class="imageville" src="./images/rome.jpg" alt=""></span>
            <span class="marker-title">1650€</span>
        </div>
    </div>
    <!-- modal comment Add this to the end of your HTML body -->
     
     <form action="" method="post" enctype="multipart/form-data">
        <div class="modal mt-5 text-center" id="administrateur" tabindex="-1" role="dialog">
            <div class="modal-dialog " role="document">
                <div class="modal-content mt-5 ">
                    <div class="modal-header">
                        <h5 class="modal-title">Connecter:</h5>
                        <button onclick="closeImage()" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body d-flex flex-column justify-content-center aligne-items-enter">
                        <img class="w-50" src="./images/avatar.gif" class="opacity-75"alt="">
                        


                        <label for="">Saisir votre mot de pass:</label>
                        <input type="text" class=" rounded-pill bg-transparent mb-5" name="mot-de-pass" value="">

                        <div class="modal-footer">
                            <button type="submit" name="send" class="btn btn-primary">Enter</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </form>
    <!-- destinations -->
    <div class="container d-flex justify-content-center aligne-items-center ">
        <div class="row">
            <?php foreach ($tab as $newDestination) { ?>
                <div class="col-6 m-3 p-2 card bg-dark " style="width: 18rem;">
                    <div class="logoAgence">
                        <img class="imgLogo" src="images/<?php echo $newDestination->getLocation() ?>.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body text-white mt-5 d-flex justify-content-between aligne-items-center">
                        <h3 class="card-title"><?php echo $newDestination->getLocation() ?></h3>
                        <img class="avion" src="./images/flight-route-traveling-svgrepo-com.svg" alt="">

                    </div>
                    <ul class="list-group list-unstyled">
                        <div class="d-flex justify-content-between aligne-items-center">
                     
                            <li class=" bg-dark text-warning fw-bold"><?php echo $newDestination->getPrice() ?> € </li>

                        </div>
                    </ul>
                    <form action="./comparer.php" method="post">
                        <button type="submit" class="text-center btn btn-success card-link text-decoration-none text-white">Comparer</button>
                        <input type="hidden" name="location" value="<?php echo $newDestination->getLocation() ?>">

                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./main.js"></script>

</body>

</html>