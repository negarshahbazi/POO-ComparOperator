<?php
class Destination{
private $id;
private $location;
private $price;
private $tourOperatorId;


public function __construct($data){
    if(isset($data['id'])) {
    $this->id=$data['id'];
    }
    $this->location=$data['location'];
    $this->price=$data['price'];
    $this->tourOperatorId=$data['tour_operator_id'];

}



/**
 * Get the value of id
 */ 
public function getId()
{
return $this->id;
}

/**
 * Set the value of id
 *
 * @return  self
 */ 
public function setId($id)
{
$this->id = $id;

return $this;
}

/**
 * Get the value of location
 */ 
public function getLocation()
{
return $this->location;
}

/**
 * Set the value of location
 *
 * @return  self
 */ 
public function setLocation($location)
{
$this->location = $location;

return $this;
}

/**
 * Get the value of price
 */ 
public function getPrice()
{
return $this->price;
}

/**
 * Set the value of price
 *
 * @return  self
 */ 
public function setPrice($price)
{
$this->price = $price;

return $this;
}

/**
 * Get the value of tourOperatorId
 */ 
public function getTourOperatorId()
{
return $this->tourOperatorId;
}

/**
 * Set the value of tourOperatorId
 *
 * @return  self
 */ 
public function setTourOperatorId($tourOperatorId)
{
$this->tourOperatorId = $tourOperatorId;

return $this;
}
}


?>