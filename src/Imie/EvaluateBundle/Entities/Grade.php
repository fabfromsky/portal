<?php

namespace Imie\EvaluateBundle\Entities;

use Imie\CoreBundle\Entity\Student;
use Doctrine\ORM\Mapping as ORM;
/**
 * Short description of class Grade
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class Grade
{

    /**
     * Short description of attribute id
     * @ORM\Id
     * @ORM\GeneratedValue(strategy = "AUTO")
     * @ORM\Column(type = "integer", nullable = false)
     * @var int
     */
    protected $id;

    /**
     * Short description of attribute gradevalue
     * @ORM\Column(type = "double")
     * @var double
     */
    protected $gradevalue;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Imie\CoreBundle\Entity\Student", cascade={"persist"})
     * @ORM\JoinColumn(name="student_id", referenceColumnName="id")
     * @var Imie\CoreBundle\Entity\Student
     */
    protected $student;
    
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
     * @return \Imie\EvaluateBundle\Entities\double
     */
    public function getGradevalue() {
    	return $this->gradevalue;
    }
    /**
     * 
     */
    public function setValue() {
    	$this->gradevalue = $gradevalue;
    }
}