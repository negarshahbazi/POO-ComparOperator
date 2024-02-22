<?php 
require_once '../config/autoload.php';
require_once '../config/db.php';
$tour = new Manager($db);

// modifier premium
if(isset($_POST['modifierPremiumIdOperator']) && isset($_POST['sendModifier'])){
    $myOperator=$tour->getOperatorByid($_POST['modifierPremiumIdOperator']);
    
    if($myOperator['is_premium']===0){
        $dataTour = ([
            'id'=>$_POST['modifierPremiumIdOperator'],
            'name' => $myOperator['name'],
            'link' => $myOperator['link'],
            'grade_count' => $myOperator['grade_count'],
            'grade_total' => $myOperator['grade_total'],
            'is_premium' => 1
    
        ]);
        $tourupdate = new TourOperator($dataTour);
        $tour->UpdateOperatorToPremium($tourupdate);
    }else{
        $dataTour = ([
            'id'=>$_POST['modifierPremiumIdOperator'],
            'name' => $myOperator['name'],
            'link' => $myOperator['link'],
            'grade_count' =>  $myOperator['grade_count'],
            'grade_total' => $myOperator['grade_total'],
            'is_premium' => 0
    
        ]);
        $tourupdate = new TourOperator($dataTour);
        $tour->UpdateOperatorToPremium($tourupdate);
    }
    
    }


    header('Location: ../destination.php');

?>