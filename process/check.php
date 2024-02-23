<?php
require_once '../config/autoload.php';
require_once '../config/db.php';

$reveiwAuthor = new Manager($db);

if (isset($_POST['message']) && !empty($_POST['message']) &&
    isset($_POST['author']) && !empty($_POST['author']) &&
    isset($_POST['rating']) && !empty($_POST['rating']) &&
    isset($_POST['id']) &&
    isset($_POST['location'])) {


    $pseudoSession = $_POST['author'];
    $id = $_POST['id'];

    $author = $reveiwAuthor->getReviewByAuthor($pseudoSession, $id);
    // var_dump($author);
    // die();

    //si le pseudo est dans la bd
    if ($author == true) {

        echo "vous avez deja donné votre avis";
    } else {
        $newreview = new Review([
            'message' => $_POST['message'],
            'author' => $_POST['author'],
            'tour_operator_id' => $_POST['id']
        ]);

        $reveiwAuthor->createReview($newreview);
        $tourOperateurbyId = $reveiwAuthor->getOperatorByid($_POST['id']);
        // after every grade star 
        $newGradeCount = $tourOperateurbyId['grade_count'] + 1;
        $newGradeTotal = $reveiwAuthor->MoyenOperatorGrade($_POST['rating'], $tourOperateurbyId['grade_total']);
        // var_dump($newGradeTotal);
        // var_dump($newGradeCount);
        
        $newTour = new TourOperator([
            'name' => $tourOperateurbyId['name'],
            'link' => $tourOperateurbyId['link'],
            'grade_count' => $newGradeCount,
            'grade_total' => $newGradeTotal,
            'id' => $tourOperateurbyId['id'],
            'is_premium' => $tourOperateurbyId['isPremium']
        ]);

        $reveiwAuthor->UpdateOperatorGrade($newTour);
        $_SESSION['location'] = $_POST['location'];

        header('Location: ../comparer.php');
    }
} else {
    echo "le formulaire n'est pas rempli correctement";
}
