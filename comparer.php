<?php
require_once('./config/autoload.php');
require_once('./config/db.php');

$tour = new Manager($db);
//  var_dump($_POST['location']);

if(!isset($_POST['location']) && isset($_SESSION['location'])) {
    // $_SESSION['location'] = $_POST['location'];
    $location = $_SESSION['location'];
    $locs = $tour->getOperatorBydis($location);
    $reviews = [];
    foreach ($locs as $value) {

        $reviews[$value['tour_operator_id']] = $tour->getReviewByOperatorId($value['tour_operator_id']);
        // var_dump($reviews);

}
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['location'])) 
{
    // var_dump($_SESSION['location']);
    $location = $_POST['location'];
    $locs = $tour->getOperatorBydis($location);
    $reviews = [];
    foreach ($locs as $value) {

        $reviews[$value['tour_operator_id']] = $tour->getReviewByOperatorId($value['tour_operator_id']);
        // var_dump($reviews);
    }

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
    <div class="row d-flex justify-content-around aligne-items-center p-5">

        <?php foreach ($locs as $loc) { ?>
            <div class="col-3 card bg-dark m-3" style="width: 18rem;">
                <div class=" logoAgence">
                    <img class="imgLogo" src="images/<?php echo $loc['location'] ?>.jpg" class="card-img-top" alt="...">
                </div>
                
                <div class="card-body text-white mt-5">
                    <h2 class="card-title text-success mb-4"><?php echo  $loc['name'] ?> </h2>
                    <h5 class="card-title"><?php echo $loc['location'] ?></h5>
                    <p class="card-text">Des voyages qui décollent vers l'extraordinaire! Réservez dès maintenant et envolez-vous vers l'aventure.</p>
                </div>
                <ul class="list-group list-group-flush ">
                    <li class="list-group-item bg-dark text-white">Price : <?php echo $loc['price'] ?> </li>


                    <li class="list-group-item bg-dark text-white">Grade total : <?php echo  $loc['grade_total'] ?> </li>
                    <li class="list-group-item bg-dark text-white">Premium : <?php echo  $loc['is_premium'] ?> </li>

                </ul>
                <div class="card-body ">
                    <div>
                        <ul class="list-unstyled">
                            <?php foreach ($reviews[$loc['tour_operator_id']] as $rev) { ?>
                                <li class="text-white"><?php echo $rev['message'] ?></li>
                                <li class="text-success">(<?php echo $rev['author'] ?>)</li>

                            <?php } ?>


                        </ul>
                    </div>
                    <form action="./process/review.php" method="post">
                        <label class="text-white-50" for="author">Saisir votre nom:</label>
                        <input class="w-100 bg-transparent text-white border shadow" type="text" name="author" id="author" required>

                        <label class="text-white-50" for="message">Saisir votre commentaire:</label>
                        <textarea class="w-100 bg-transparent text-white border shadow" name="message" id="message" required></textarea>

                        <button type="submit" name="but" class="btn btn-success m-2">Envoyer</button>
                        <input type="hidden" name="id" value="<?php echo $loc['tour_operator_id']; ?>">
                        <input type="hidden" name="location" value="<?php echo isset($_POST['location']) ? htmlspecialchars($_POST['location']) : htmlspecialchars($_SESSION['location']); ?>">
                    </form>
                    <a href="<?php echo $loc['link'] ?>" target="_blank"><button type="submit" class=" btn btn-success card-link text-decoration-none text-white">Voir le site</button></a>

                </div>
            </div>
        <?php } ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./main.js"></script>
</body>

</html>