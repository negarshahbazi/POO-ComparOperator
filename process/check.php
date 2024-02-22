<?php
require_once '../config/autoload.php';
require_once '../config/db.php';
$reveiwAuthor = new Manager($db);

if(isset($_POST['message']) && !empty($_POST['message']) && 
isset($_POST['author']) && !empty($_POST['author'])&&
isset($_POST['rating']) && !empty($_POST['rating'])&&
isset($_POST['id']) && 
isset($_POST['name']) && 
isset($_POST['link']) && 
isset($_POST['grade_total']) && 
isset($_POST['grade_count']) && 
isset($_POST['isPremium'])&&
isset ($_POST['location'])
 )
{
    // var_dump($_POST['rating']);
    // var_dump($_POST['name']);
    // var_dump($_POST['link']);
    // var_dump($_POST['grade_total']);
    // var_dump($_POST['grade_count']);
    // var_dump($_POST['isPremium']);
    // var_dump($_POST['location']);

    $pseudoSession = $_POST['author'];
    $id=$_POST['id'];

    var_dump($pseudoSession);
    // verifier si il exist dans la bd
    $author=$reveiwAuthor->getReviewByAuthor($pseudoSession, $id);
    // var_dump($author);
    // die();
    //si le pseudo n'est pas dans la bd
    if ($author == true) {

        echo"tu est deja donner votre avie";

    }else {
        $newreview = new Review([
            'message'=>$_POST['message'],
            'author'=>$_POST['author'],
            'tour_operator_id'=>$_POST['id']
        ]);

        $reveiwAuthor->createReview($newreview);
$newGradeCount = $_POST['grade_count']+1;
    $newGradeTotal = $reveiwAuthor->MoyenOperatorGrade($_POST['rating'], $_POST['grade_total'] );
    var_dump($newGradeTotal);
    var_dump($newGradeCount);
    $newTour = new TourOperator([
        'name' => $_POST['name'],
        'link' => $_POST['link'],
        'grade_count' => $newGradeCount,
        'grade_total' => $newGradeTotal,
        'id' => $_POST['id'],
        'is_premium' => $_POST['isPremium']
    ]);

    $reveiwAuthor->UpdateOperatorGrade($newTour);
    $_SESSION['location']=$_POST['location'];

    header('Location: ../comparer.php');

}


    }else{
        echo"votre formulaire n'est pas completé"; 
    }