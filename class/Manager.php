<?php
class Manager{
    private $db;



    public function __construct(PDO $db){
        $this->db=$db;
}
// method
public function findLocation($location){
    $query = $this->db->prepare("SELECT * FROM destination WHERE location=:location");
    $query->execute([
        ':location'=>$location
    ]); // You need to execute the query to get results
   $locations= $query->fetchAll();
   
   return $locations;
}
public function getAllDestination(){
    $query = $this->db->prepare("SELECT * FROM destination ");
    $query->execute(); // You need to execute the query to get results
   $destinations= $query->fetchAll();
   
   return $destinations;
}
public function getAllDestinationId($id){
    $query = $this->db->prepare("SELECT * FROM destination WHERE tour_operator_id= ".$id);
    $query->execute(); // You need to execute the query to get results
   $destinationsId= $query->fetchAll();
   
   return $destinationsId;
}

public function getOperatorByDestination($id){
    $query = $this->db->prepare("SELECT * FROM destination WHERE tour_operator_id=".$id);
    $query->execute(); // You need to execute the query to get results
   $id_operator= $query->fetch();
   
   return $id_operator;
}
public function createReview(Review $review){
    $query = $this->db->prepare("INSERT INTO review (message, author,tour_operator_id) VALUES (:message, :author,:tour_operator_id) ");
    $query->execute([
        ':message' =>$review->getMessage(),
        ':author'=> $review->getAuthor(),
        ':tour_operator_id'=> $review->getTourOperatorId()
     
       
    ]);
    $id = $this->db->lastInsertId();
    $review->setId($id);
  
}
public function getReviewByOperatorId($id){
    $query = $this->db->prepare("SELECT * FROM review WHERE tour_operator_id= :id ORDER BY review.id DESC");
    $query->execute([
        ':id'=>$id,
    ]); // You need to execute the query to get results
   $id_review= $query->fetchAll();

   return $id_review;
}
public function getAllOperator(){
    $query = $this->db->prepare("SELECT * FROM tour_operator ");
    $query->execute(); // You need to execute the query to get results
   $tour_operators= $query->fetchAll();
   
   return $tour_operators;
}
public function getOperatorByid($id){
    $query = $this->db->prepare("SELECT * FROM tour_operator WHERE id=".$id);
    $query->execute(); // You need to execute the query to get results
   $id_operator= $query->fetch();

   return $id_operator;
}
public function UpdateOperatorToPremium(TourOperator $tourOperator){
    // var_dump($tourOperator);
    $query = $this->db->prepare("UPDATE tour_operator SET is_premium = :is_premium WHERE id = :id");
    $query->execute([
        ':is_premium'=> $tourOperator->getIsPremium(),
        ':id'=> $tourOperator->getId(),
    ]);
    
}
public function UpdateOperatorGrade(TourOperator $tourOperator){
    $query = $this->db->prepare("UPDATE tour_operator SET grade_count = :grade_count, grade_total = :grade_total WHERE id = :id");
    $query->execute([
        ':grade_count' => $tourOperator->getGradeCount(), 
        ':grade_total' => $tourOperator->getGradeTotal(),
        ':id' => $tourOperator->getId(),
    ]);
}

public function MoyenOperatorGrade($a , $b){
    return ($a + $b) / 2;
}
public function createTourOperator(TourOperator $tourOperator){
    $query = $this->db->prepare("INSERT INTO tour_operator (name, link, grade_count, grade_total, is_premium) VALUES (:name, :link,:grade_count,:grade_total,:is_premium) ");
    $query->execute([
        ':name' =>$tourOperator->getName(),
        ':link' =>$tourOperator->getLink(),
        ':grade_count' =>$tourOperator->getGradeCount(),
        ':grade_total' =>$tourOperator->getGradeTotal(),
        ':is_premium' =>$tourOperator->getIsPremium(),
    
    
     
       
    ]);
    $id = $this->db->lastInsertId();
    $tourOperator->setId($id);
    
}
public function createDestination(Destination $destination){
    $query = $this->db->prepare("INSERT INTO destination (location, price, tour_operator_id) VALUES (:location, :price, :tour_operator_id) ");
    $query->execute([
        ':location' =>$destination->getLocation(),
        ':price' =>$destination->getPrice(),
        ':tour_operator_id' =>$destination->getTourOperatorId(),
 
    
     
       
    ]);
    $id = $this->db->lastInsertId();
    $destination->setId($id);
}


public function getOperatorBydis($location){
    $query = $this->db->prepare("SELECT * FROM destination LEFT JOIN tour_operator ON destination.tour_operator_id= tour_operator.id WHERE location=:location ORDER BY destination.price ASC" );
    $query->execute([
        'location'=>$location
    ]); // You need to execute the query to get results
   $id_operator= $query->fetchAll();
//    $id_operator['location']=$location;


   return $id_operator;
}
}
?>