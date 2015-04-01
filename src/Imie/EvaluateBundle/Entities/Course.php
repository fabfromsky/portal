<?php

namespace Imie\EvaluateBundle\Entities;

use Dotrine\ORM\Mapping as ORM;
/**
 * Short description of class Course
 * @ORM\Entity
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class Course
{    /**
     * Short description of attribute id
     * @ORM\Id
     * @ORM\Column(type = "integer", nullable = false)
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * Short description of attribute name
     * @ORM\Column(type="string")
     * @var String
     */
    protected $name;

    /**
     * 
     * @return \Imie\EvaluateBundle\Entities\int
     */
    public function getId() {
    	return $this->id;
    }
    
    /**
     * 
     */
    public function setId() {
    	$this->id = $id;
    }
    
    /**
     * 
     * @return \Imie\EvaluateBundle\Entities\String
     */
    public function getName() {
    	return $this->name;
    }
    
    /**
     * 
     */
    public function setName() {
    	$this->name = $name;
    }

} 