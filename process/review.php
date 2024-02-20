<?php 
require_once '../config/autoload.php';
require_once '../config/db.php';
$review = new Manager($db);

if($_SERVER["REQUEST_METHOD"] == "POST" && 
isset($_POST['id']) && !empty($_POST['id']) && 
isset($_POST['message']) && !empty($_POST['message']) && 
isset($_POST['author']) && !empty($_POST['author'])&&
isset($_POST['location']) && !empty($_POST['location']) )
{
 

    $newreview = new Review([
        'message'=>$_POST['message'],
        'author'=>$_POST['author'],
        'tour_operator_id'=>$_POST['id']
    ]);
 
    $review->createReview($newreview);
    $_SESSION['location']=$_POST['location'];

    var_dump($_SESSION['location']);// die();
    header('Location: ../comparer.php');
}
?>