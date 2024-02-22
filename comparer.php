<?php
require_once('./config/autoload.php');
require_once('./config/db.php');

$tour = new Manager($db);
//  var_dump($_POST['location']);

if (!isset($_POST['location']) && isset($_SESSION['location'])) {
    // $_SESSION['location'] = $_POST['location'];
    $location = $_SESSION['location'];
    $locs = $tour->getOperatorBydis($location);
    $reviews = [];
    foreach ($locs as $value) {

        $reviews[$value['tour_operator_id']] = $tour->getReviewByOperatorId($value['tour_operator_id']);
        // var_dump($reviews);
     
    
       
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['location'])) {
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
                <a class="navbar-brand text-white logo" href="#"><img class="rounded-pill logo" src="./images/logo4.png" alt=""></a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="./index.php">Home</a>
                        </li>


                    </ul>
             
                </div>
            </div>
        </nav>


    </div>
    <div class="container p-5">

        <?php 
      
        foreach ($locs as $loc) { 
        ?>
            <div class=" card bg-dark m-3 p-3">
                <div class="row">
                    <div class="col-md-5">
                        <div class=" logoAgence p-0 ">
                            <img class="imgLogo " src="images/<?php echo $loc['location'] ?>.jpg" class="card-img-top" alt="...">
                        </div>

                        <div class=" card-body text-white p-3 ">
                            <h2 class="card-title text-success "><?php echo  $loc['name'] ?> </h2>
                            <div class="d-flex justify-content-between aligne-items-center mb-2">
                                <h5 class="card-title"><?php echo $loc['location'] ?></h5>
                                <a href="<?php echo $loc['link'] ?>" target="_blank"><button type="submit" class=" btn btn-success card-link text-decoration-none text-white rounded-pill">Voir + </button></a>
                            </div>
                            <div class="row d-flex justify-content-center aligne-items-center">
                                <p class="card-text">Des voyages qui décollent vers l'extraordinaire! Réservez dès maintenant et envolez-vous vers l'aventure.</p>


                                <div class="col-8 d-flex flex-column justify-content-center aligns-items-center text-center">
                                    <ul class="list-group list-group-flush ">
                                        <li class="list-group-item bg-dark text-white"><span class="text-warning fw-bolder"><?php echo $loc['price'] ?> € <svg viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--noto w-25" preserveAspectRatio="xMidYMid meet" fill="#000000">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <g fill="none">
                                                            <path d="M93.46 39.45c6.71-1.49 15.45-8.15 16.78-11.43c.78-1.92-3.11-4.92-4.15-6.13c-2.38-2.76-1.42-4.12-.5-7.41c1.05-3.74-1.44-7.87-4.97-9.49s-7.75-1.11-11.3.47c-3.55 1.58-6.58 4.12-9.55 6.62c-2.17-1.37-5.63-7.42-11.23-3.49c-3.87 2.71-4.22 8.61-3.72 13.32c1.17 10.87 3.85 16.51 8.9 18.03c6.38 1.92 13.44.91 19.74-.49z" fill="#FFCA28"> </path>
                                                            <path d="M104.36 8.18c-.85 14.65-15.14 24.37-21.92 28.65l4.4 3.78s2.79.06 6.61-1.16c6.55-2.08 16.12-7.96 16.78-11.43c.97-5.05-4.21-3.95-5.38-7.94c-.61-2.11 2.97-6.1-.49-11.9zm-24.58 3.91s-2.55-2.61-4.44-3.8c-.94 1.77-1.61 3.69-1.94 5.67c-.59 3.48 0 8.42 1.39 12.1c.22.57 1.04.48 1.13-.12c1.2-7.91 3.86-13.85 3.86-13.85z" fill="#E2A610"> </path>
                                                            <path d="M61.96 38.16S30.77 41.53 16.7 68.61c-14.07 27.08-2.11 43.5 10.55 49.48c12.66 5.98 44.56 8.09 65.31 3.17s25.94-15.12 24.97-24.97c-1.41-14.38-14.77-23.22-14.77-23.22s.53-17.76-13.25-29.29c-12.23-10.24-27.55-5.62-27.55-5.62z" fill="#FFCA28"> </path>
                                                            <path d="M74.76 83.73c-6.69-8.44-14.59-9.57-17.12-12.6c-1.38-1.65-2.19-3.32-1.88-5.39c.33-2.2 2.88-3.72 4.86-4.09c2.31-.44 7.82-.21 12.45 4.2c1.1 1.04.7 2.66.67 4.11c-.08 3.11 4.37 6.13 7.97 3.53c3.61-2.61.84-8.42-1.49-11.24c-1.76-2.13-8.14-6.82-16.07-7.56c-2.23-.21-11.2-1.54-16.38 8.31c-1.49 2.83-2.04 9.67 5.76 15.45c1.63 1.21 10.09 5.51 12.44 8.3c4.07 4.83 1.28 9.08-1.9 9.64c-8.67 1.52-13.58-3.17-14.49-5.74c-.65-1.83.03-3.81-.81-5.53c-.86-1.77-2.62-2.47-4.48-1.88c-6.1 1.94-4.16 8.61-1.46 12.28c2.89 3.93 6.44 6.3 10.43 7.6c14.89 4.85 22.05-2.81 23.3-8.42c.92-4.11.82-7.67-1.8-10.97z" fill="#6B4B46"> </path>
                                                            <path d="M71.16 48.99c-12.67 27.06-14.85 61.23-14.85 61.23" stroke="#6B4B46" stroke-width="5" stroke-miterlimit="10"> </path>
                                                            <path d="M81.67 31.96c8.44 2.75 10.31 10.38 9.7 12.46c-.73 2.44-10.08-7.06-23.98-6.49c-4.86.2-3.45-2.78-1.2-4.5c2.97-2.27 7.96-3.91 15.48-1.47z" fill="#6D4C41"> </path>
                                                            <path d="M81.67 31.96c8.44 2.75 10.31 10.38 9.7 12.46c-.73 2.44-10.08-7.06-23.98-6.49c-4.86.2-3.45-2.78-1.2-4.5c2.97-2.27 7.96-3.91 15.48-1.47z" fill="#6B4B46"> </path>
                                                            <path d="M96.49 58.86c1.06-.73 4.62.53 5.62 7.5c.49 3.41.64 6.71.64 6.71s-4.2-3.77-5.59-6.42c-1.75-3.35-2.43-6.59-.67-7.79z" fill="#E2A610"> </path>
                                                        </g>
                                                    </g>
                                                </svg> </li>


                                        <li class="list-group-item bg-dark text-white">Grade:<span class="text-warning"> <?php echo  $loc['grade_total'] ?> </span>/10</li>
                                        <li class="list-group-item bg-dark text-white">Premium: <span class="text-warning"> <?php echo  $loc['is_premium'] ?> </span></li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                 
                    <div class="card-body col-md-5 m-5 d-flex flex-column justify-content-between aligne-items-center">
                        <!-- scroll bar in the comment -->
                        <div class="comments-container bg-success p-2 text-dark bg-opacity-10 mb-5" style="max-height: 200px; overflow-y: auto;">
                            <ul class="list-unstyled">
                                <?php foreach ($reviews[$loc['tour_operator_id']] as $rev) { ?>
                                    <li class="text-white"><span class="text-success fst-italic "><?php echo $rev['author'] ?> : </span> <span class="commentText"><?php echo $rev['message'] ?> </span></li>


                                <?php } ?>


                            </ul>
                        </div>
                        <div>
                        <form action="./process/review.php" method="post">
                        <h6 class="text-white">commenter:</h6>

                            <label class="text-white-50" for="author">Saisir votre nom:</label>
                            <input class="w-100 bg-transparent text-white border shadow " type="text" name="author" id="author" required>

                            <label class="text-white-50" for="message">Saisir votre commentaire:</label>
                            <textarea class="w-100 bg-transparent text-white border shadow" name="message" id="message" required></textarea>

                            <button type="submit" name="but" class="btn btn-success m-2">Envoyer</button>
                            <input type="hidden" name="id" value="<?php echo $loc['tour_operator_id']; ?>">
                            <input type="hidden" name="location" value="<?php echo isset($_POST['location']) ? htmlspecialchars($_POST['location']) : htmlspecialchars($_SESSION['location']); ?>">
                        </form>
                        </div>
                     
                        <!-- /============etoile=====/ -->
                        <form class="box mt-5" action="./process/note.php" method="post">

                            <h6 class="text-white">Donnez une note</h6>


                            <fieldset class="rating">
                                <input class="input" type="radio" id="star5" name="rating" value="5" />
                                <label class="label full" for="star5" title="Awesome - 5 stars"></label>

                                <input class="input" type="radio" id="star4" name="rating" value="4" />
                                <label class="label full" for="star4" title="Pretty good - 4 stars"></label>

                                <input class="input" type="radio" id="star3" name="rating" value="3" />
                                <label class="label full" for="star3" title="Meh - 3 stars"></label>

                                <input class="input" type="radio" id="star2" name="rating" value="2" />
                                <label class="label full" for="star2" title="Kinda bad - 2 stars"></label>

                                <input class="input" type="radio" id="star1" name="rating" value="1" />
                                <label class="label full" for="star1" title="Sucks big time - 1 star"></label>
                            </fieldset>
                            <button type="submit" class="rounded btn btn-success card-link text-decoration-none text-white" title="Envoyer votre note">Voter</button>
                            <input type="hidden" name="id" value="<?php echo $loc['tour_operator_id']; ?>">
                            <input type="hidden" name="grade_count" value="<?php echo $loc['grade_count']; ?>">
                            <input type="hidden" name="grade_total" value="<?php echo $loc['grade_total']; ?>">
                            <input type="hidden" name="isPremium" value="<?php echo $loc['is_premium']; ?>">
                            <input type="hidden" name="link" value="<?php echo $loc['link']; ?>">
                            <input type="hidden" name="name" value="<?php echo $loc['name']; ?>">
                            <input type="hidden" name="location" value="<?php echo isset($_POST['location']) ? htmlspecialchars($_POST['location']) : htmlspecialchars($_SESSION['location']); ?>">


                        </form>
                        <!-- /===========/ -->
                    </div>
                </div>
            </div>
          <?php } ?>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('.input');
        inputs.forEach((input) => {
            input.addEventListener('click', () => {
                console.log(input);
            })
        });
    });

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./main.js"></script>

</body>

</html>