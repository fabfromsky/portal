<?php

namespace Imie\EvaluateBundle\Entities;

use Imie\CoreBundle\Entity\Teacher;
use Doctrine\ORM\Mapping as ORM;
/**
 * Exam entity
 * @ORM\Entity
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class Exam
{
    /**
     * id of the exam
     * @ORM\Id
     * @ORM\Column(type = "integer", nullable = false)
     * @ORM\GeneratedValue(strategy = "AUTO")
     * @var int
     */
    private $id;

    /**
     * libele of the exam
     * @ORM\Column(type = "string")
     * @var String
     */
    private $name;
    
    /**
     * coefficient of the exam
     * it's a multiplicator applicated on the grade
     * @ORM\Column(type = "integer")
     * @var unknown
     */
    protected $coefficient;

    /**
     * maxvalue of the exam (ex: 20, 40...)
     * 
     * @ORM\Column(type = "integer")
     * @var int
     */
    protected $maxvalue;
    
    /**
     * teacher affected to the exam 
     * @ORM\ManyToOne(targetEntity="Imie\CoreBundle\Entity\Teacher", cascade={"persist"})
     * @ORM\JoinColumn(name="teacher_id", referenceColumnName="id")
     * 
     * @var Imie\CoreBundle\Entity\Teacher
     */
    protected $teacher;
    
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
    
    /**
     * 
     * @return \Imie\EvaluateBundle\Entities\unknown
     */
    public function getCoefficient() {
    	return $this->coefficient;
    }
    
    /**
     * 
     * 
     */
    public function setCoefficient() {
    	$this->coefficient = $coefficient;
    }
    
    /**
     * 
     * @return \Imie\EvaluateBundle\Entities\unknown
     */
    public function getMaxvalue() {
    	return $this->maxvalue;
    }
    
    /**
     * 
     */
    public function setMaxValue() {
    	$this->maxvalue = $maxvalue;
    }
}