<?php
class Manager{
    private $db;



    public function __construct(PDO $db){
        $this->db=$db;
}
// method
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
   $id_operator= $query->fetchAll();
   
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
    $query = $this->db->prepare("SELECT * FROM review WHERE tour_operator_id=".$id);
    $query->execute(); // You need to execute the query to get results
   $id_review= $query->fetchAll();
   
   return $id_review;
}
public function getAllOperator(){
    $query = $this->db->prepare("SELECT * FROM tour_operator ");
    $query->execute(); // You need to execute the query to get results
   $tour_operators= $query->fetchAll();
   
   return $tour_operators;
}
public function UpdateOperatorToPremium(TourOperator $tourOperator){
    
    $query = $this->db->prepare("UPDATE tour_operator SET is_premium = :is_premium WHERE id = :id");
    $query->execute([
        ':is_premium'=> $tourOperator->getIsPremium(),
        ':id'=> $tourOperator->getId(),
    ]);
    
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

}

?>