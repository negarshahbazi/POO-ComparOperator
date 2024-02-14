<?php
if(isset($_POST['name'])&& !empty($_POST['name'])&&isset($_POST['mot-de-pass'])&& !empty($_POST['mot-de-pass'])&&isset($_POST['send'])){
    
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

     <div class="move">
            <span class="marker-title">TUNISIE</span>
            <span class="marker-caption"><img class="imageville" src="./images/tunisie.jpg" alt=""></span>
        </div>
        <div class="move2">
            <span class="marker-title">ESPANIA</span>
            <span class="marker-caption"><img class="imageville" src="./images/spain.jpg" alt=""></span>
        </div>
        <div class="move3">
            <span class="marker-title">DUBAI</span>
            <span class="marker-caption"><img class="imageville" src="./images/dubai.jpg" alt=""></span>
        </div>
        <div class="move4">
            <span class="marker-title">Amazon</span>
            <span class="marker-caption"><img class="imageville" src="./images/amazon.jpg" alt=""></span>
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
                        <label for="">Saisir votre nom:</label>
                        <input type="text" class="rounded-pill bg-transparent mb-5" name="name" value=""><br>
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