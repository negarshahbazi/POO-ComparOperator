<?php

require_once '../config/autoload.php';
require_once '../config/db.php';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['location']) && !empty($_POST['location']) && isset($_POST['price']) && !empty($_POST['price']) && isset($_POST['submitnew']) ){
    $destinationManager = new Manager($db);
// var_dump($dests);
    $dataDest=([
'location'=>$_POST['location'],
'price'=>$_POST['price'],
'tour_operator_id'=> $_POST['id_tour_operator']
    ]);
$destinationManager->createDestination(new Destination($dataDest));

$_SESSION['id_tour_operator'] = $_POST['id_tour_operator'];
header('Location: ../alldestinations.php');
} else {
 echo "Il manque des informations";
}

?>