<?php

class Product{
    private int $id;
    private string $name;
    private string $price;
    private string $photo1;
    private string $photo2;
    private string $description;
    private string $category;

    public function __construct($id, $name, $price, $photo1, $photo2, $description, $category){
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->photo1 = $photo1;
        $this->photo2 = $photo2;
        $this->description = $description;
        $this->category = $category;
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
     * Get the value of photo1
     */ 
    public function getPhoto1()
    {
        return $this->photo1;
    }

    /**
     * Set the value of photo1
     *
     * @return  self
     */ 
    public function setPhoto1($photo1)
    {
        $this->photo1 = $photo1;

        return $this;
    }

    /**
     * Get the value of photo2
     */ 
    public function getPhoto2()
    {
        return $this->photo2;
    }

    /**
     * Set the value of photo2
     *
     * @return  self
     */ 
    public function setPhoto2($photo2)
    {
        $this->photo2 = $photo2;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

}