<?php 
require_once '../config/autoload.php';
require_once '../config/db.php';

$grade = new Manager($db);
// var_dump($_POST['rating']);
// var_dump($_POST['name']);
// var_dump($_POST['link']);
// var_dump($_POST['grade_total']);
// var_dump($_POST['grade_count']);
// var_dump($_POST['isPremium']);
if (
    isset($_POST['id']) && 
    isset($_POST['rating']) && !empty($_POST['rating'])&&
    isset($_POST['name']) && 
    isset($_POST['link']) && 
    isset($_POST['grade_total']) && 
    isset($_POST['grade_count']) && 
    isset($_POST['isPremium']) &&
    isset($_POST['location']) 
) {
        // var_dump($_POST['rating']);
        // var_dump($_POST['name']);
        // var_dump($_POST['link']);
        // var_dump($_POST['grade_total']);
        // var_dump($_POST['grade_count']);

    //    $all= $grade->getAllDestinationId($_POST['id']);
    //    foreach($all as $one){

           
               $newGradeCount = $_POST['grade_count']+1;
               $newGradeTotal = $grade->MoyenOperatorGrade($_POST['rating'], $_POST['grade_total'] );
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
           
               $grade->UpdateOperatorGrade($newTour);
               $_SESSION['location']=$_POST['location'];
       }

    header('Location: ../comparer.php');

?>