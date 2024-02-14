<?php
class Manager{
    private $bdd;



    public function __construct(){
        
}
// method
public function getAllDestination(){

}
public function getOperatorByDestination(){
    
}
public function createReview(){
    
}
public function getReviewByOperatorId(){
    
}
public function getAllOperator(){
    
}
public function UpdateOperatorToPremium(){
    
}
public function createTourOperator(){
    
}
public function createDestination(){
    
}
    /**
     * Get the value of bdd
     */ 
    public function getBdd()
    {
        return $this->bdd;
    }

    /**
     * Set the value of bdd
     *
     * @return  self
     */ 
    public function setBdd($bdd)
    {
        $this->bdd = $bdd;

        return $this;
    }
}

?>