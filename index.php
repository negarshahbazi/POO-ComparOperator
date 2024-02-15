<?php
require_once('./config/autoload.php');
require_once('./config/db.php');

if(isset($_POST['name'])&& !empty($_POST['name']) && isset($_POST['mot-de-pass']) && !empty($_POST['mot-de-pass']) && isset($_POST['send'])){
if($_POST['mot-de-pass']==="sn2024"){
    header('Location: ./destination.php');
    exit();
}else{
    echo " le mot de passe n'est pas correct!";
}
}
$newManager=new Manager ($db);
$new=$newManager->getAllDestination();
// limit 4
// var_dump($new);
foreach($new as $pay){
$tabPrice[]=$pay['price'];
    //  var_dump($pay['price']);
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
                <a class="navbar-brand text-white logo" href="#"><img class="rounded-pill logo" src="./images/logo.png" alt=""></a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link text-white" data-toggle="modal" id="myAdministrateur" data-toggle="modal" data-target="#administateur">Administrateur</button>
                        </li>

                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

     <!-- poster -->

     <div class="move mt-5">
            <span class="marker-title">TUNIS</span>
            <span class="marker-caption"><img class="imageville" src="./images/tunisie.jpg" alt=""></span>
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
    <form action="" method="post" enctype="multipart/form-data ">
        <div class="modal mt-5" id="administrateur" tabindex="-1" role="dialog">
            <div class="modal-dialog " role="document">
                <div class="modal-content mt-5 ">
                    <div class="modal-header">
                        <h5 class="modal-title">Connecter:</h5>
                        <button onclick="closeImage()" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body d-flex flex-column justify-content-center aligne-items-enter">
                        <!-- <img src="./images/palmier.jpg" class="opacity-75"alt=""> -->
                        
                        <select class=" rounded-pill w-50 bg-transparent mb-5" name="name" id="pet-select">
                            <option value="">--Please choose an option--</option>
                            <option value="Salaun Holidays">Salaun Holidays</option>
                            <option value="Fram">Fram</option>
                            <option value="Heliades">Heliades</option>

                        </select>
                        <label for="">Saisir votre mot de pass:</label>
                        <input type="text" class=" rounded-pill bg-transparent mb-5" name="mot-de-pass" value="">
                        <div class="modal-footer">
                            <button type="submit" name="send" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./main.js"></script>
</body>

</html>