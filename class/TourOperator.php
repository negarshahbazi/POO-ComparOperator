<?php
class TourOperator
{

    private $id;
    private $name;
    private $link;
    private $gradeCount;
    private $gradeTotal;
    private $isPremium;



    public function __construct()
    {
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
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the value of link
     *
     * @return  self
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get the value of gradeCount
     */
    public function getGradeCount()
    {
        return $this->gradeCount;
    }

    /**
     * Set the value of gradeCount
     *
     * @return  self
     */
    public function setGradeCount($gradeCount)
    {
        $this->gradeCount = $gradeCount;

        return $this;
    }

    /**
     * Get the value of gradeTotal
     */
    public function getGradeTotal()
    {
        return $this->gradeTotal;
    }

    /**
     * Set the value of gradeTotal
     *
     * @return  self
     */
    public function setGradeTotal($gradeTotal)
    {
        $this->gradeTotal = $gradeTotal;

        return $this;
    }

    /**
     * Get the value of isPremium
     */
    public function getIsPremium()
    {
        return $this->isPremium;
    }

    /**
     * Set the value of isPremium
     *
     * @return  self
     */
    public function setIsPremium($isPremium)
    {
        $this->isPremium = $isPremium;

        return $this;
    }
}
