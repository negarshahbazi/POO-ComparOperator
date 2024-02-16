<?php
require_once('./config/autoload.php');
require_once('./config/db.php');

if(isset($_POST['id_tour_operator'])){
    $idOperator=$_POST['id_tour_operator'];
} else if(isset($_SESSION['id_tour_operator'])) {
    $idOperator = $_SESSION['id_tour_operator'];
}

$destinationManager = new Manager($db);
$destinations = $destinationManager->getAllDestinationId($idOperator);
foreach ($destinations as $destination ) {
    $dests[] = new Destination($destination);
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

<body id="background-destination">
    <div>
        <nav class="navbar navbar-expand-lg  container bg-black rounded-5 shadow">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand text-white logo" href="#"><img class="rounded-pill logo" src="./images/logo.png" alt=""></a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="./index.php">Home</a>
                        </li>


                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <div class="container d-flex justify-content-center aligne-items-center ">
    <div class="row">
        <?php foreach ($dests as $dest) { ?>
            <div class="col-6 m-3 p-2 card bg-dark " style="width: 18rem;">
                <div class="logoAgence">
                    <img class="imgLogo" src="images/<?php echo $dest->getLocation() ?>.jpg" class="card-img-top" alt="...">
                </div>
                <div class="card-body text-white mt-5">
                    <h5 class="card-title"><?php echo $dest->getLocation() ?></h5>

                </div>
                <ul class="list-group list-group-flush ">
                    <li class="list-group-item bg-dark text-white">price : <?php echo $dest->getPrice()?> € / person</li>

                </ul>
                <button type="submit" class=" btn btn-success card-link text-decoration-none text-white">Réserver</button>
            </div>
        <?php } ?>
    </div>
    </div>
 <!-- + -->
 <div class="card bg-dark mx-auto" style="width: 18rem;">
                <div class="d-flex justify-content-center aligne-items-center">
                    <a href=""><svg class="plus"viewBox="0 0 117.00 117.00" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <desc></desc> <defs></defs> <g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"> <g fill-rule="nonzero" id="add"> <path d="M58.5,0.5 C26.5,0.5 0.4,26.5 0.4,58.5 C0.4,90.5 26.4,116.5 58.5,116.5 C90.5,116.5 116.5,90.5 116.5,58.5 C116.5,26.5 90.5,0.5 58.5,0.5 Z M58.5,108.4 C31,108.4 8.6,86 8.6,58.5 C8.6,31 31,8.6 58.5,8.6 C86,8.6 108.4,31 108.4,58.5 C108.4,86 86,108.4 58.5,108.4 Z" fill="#4A4A4A" id="Shape"></path> <path d="M85.2,53.9 L62.6,53.9 L62.6,31.2 C62.6,28.9 60.8,27.1 58.5,27.1 C56.2,27.1 54.4,28.9 54.4,31.2 L54.4,53.8 L31.8,53.8 C29.5,53.8 27.7,55.6 27.7,57.9 C27.7,60.2 29.5,62 31.8,62 L54.4,62 L54.4,84.6 C54.4,86.9 56.2,88.7 58.5,88.7 C60.8,88.7 62.6,86.9 62.6,84.6 L62.6,62 L85.2,62 C87.5,62 89.3,60.2 89.3,57.9 C89.3,55.6 87.5,53.9 85.2,53.9 Z" fill="#17AB13" id="Shape"></path> </g> </g> </g></svg></a>
                </div>
                <div class="card-body text-white mt-5">
                    <h5 class="card-title">Ajouter votre destination</h5>
                </div>
                <form action="./process/create_destination.php" method="post">
                    <label class="text-white-50" for="">saisir le nom de votre déstination:</label>
                    <select class="w-100 bg-transparent text-white border shadow "name="location" id="">
                <option class=" bg-transparent text-dark border shadow "value="Amazon">Amazon</option>
                <option class=" bg-transparent text-dark border shadow "value="Dubai">Dubai</option>
                <option class=" bg-transparent text-dark border shadow "value="Greece">Greece</option>

                <option class=" bg-transparent text-dark border shadow "value="Hawaii">Hawaii</option>

                <option class=" bg-transparent text-dark border shadow "value="Iran">Iran</option>

                <option class=" bg-transparent text-dark border shadow "value="Spain">Spain</option>

                <option class=" bg-transparent text-dark border shadow "value="Maldive">Maldive</option>

            </select>
                <label class="text-white-50"for="">saisir le prix:</label>
                <input class="w-100 bg-transparent text-white  border shadow " type="text" name="price" value="">

                <input type="hidden" value="<?php echo $idOperator?>" name="id_tour_operator">
            <button type="submit" name="submitnew"class="btn btn-success m-2">save</button>
               </form>
               
            </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./main.js"></script>
</body>

</html>